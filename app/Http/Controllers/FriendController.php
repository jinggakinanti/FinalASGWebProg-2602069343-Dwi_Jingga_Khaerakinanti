<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User as UserModel;
use App\Models\Wishlist as WishlistModel;
use App\Models\Friend as FriendModel;
use App\Models\Notification as NotificationModel;
use App\Models\Chat as ChatModel;

class FriendController extends Controller
{
    public function friend_list($id){
        $user = UserModel::with(['fields', 'avatar', 'bear'])->findOrFail($id);
        $friends = $user->friends;

        return view('connectfriend.list', compact('user', 'friends'));
    }
    public function request($id){
        $thisUser = auth()->user();
        $otherUser = UserModel::findOrFail($id);

        $incomingRequest = $thisUser->receivedRequests()
            ->where('sender_id', $otherUser->id)
            ->where('status', 'Pending')
            ->first();

        if ($incomingRequest) {
            $incomingRequest->update(['status' => 'Accepted']);

            FriendModel::create([
                'user1_id' => $thisUser->id,
                'user2_id' => $otherUser->id,
            ]);
            FriendModel::create([
                'user1_id' => $otherUser->id,
                'user2_id' => $thisUser->id,
            ]);

            $incomingRequest->delete();

            NotificationModel::create([
                'sender_id' => $thisUser->id,
                'receiver_id' => $otherUser->id,
                'type' => 'friend_accept',
            ]);

            return back()->with('success', __('connectfriend.acc'));
        }

        $outgoingRequest = $thisUser->sentRequests()
            ->where('receiver_id', $otherUser->id)
            ->where('status', 'Pending')
            ->first();

        if ($outgoingRequest) {
            return back()->with('success', __('connectfriend.already'));
        }

        WishlistModel::create([
            'sender_id' => $thisUser->id,
            'receiver_id' => $otherUser->id,
        ]);
        NotificationModel::create([
            'sender_id' => $thisUser->id,
            'receiver_id' => $otherUser->id,
            'type' => 'friend_request',
        ]);

        return redirect()->back()->with('success', __('connectfriend.sent'));
    }
    public function my_friends(){
        $auth = Auth::user();
        $id = $auth->id;

        $user = UserModel::with(['fields', 'bear', 'avatar'])->findOrFail($id);
        $friends = $user->friends;

        return view('connectfriend.mylist', compact('user', 'friends'));
    }
    public function chat($id){
        $user1 = UserModel::with('bear', 'avatar')->findOrFail($id);
        $user2 = Auth::user();

        $isFriend = $user2->friends()->where('user2_id', $user1->id)->exists();
        if (!$isFriend) {
            return redirect()->back();
        }

        $messages = ChatModel::where(function($query) use ($user1, $user2) {
            $query->where('user1_id', $user1->id)
                  ->where('user2_id', $user2->id);
        })->orWhere(function($query) use ($user1, $user2) {
            $query->where('user1_id', $user2->id)
                  ->where('user2_id', $user1->id);
        })->get();

        return view('connectfriend.chat', compact('user1', 'user2', 'messages'));
    }
    public function send_chat(Request $request, $id){
        $request->validate([
            'message' => 'required|string',
        ]);
    
        $sender = Auth::user();
    
        ChatModel::create([
            'user1_id' => $sender->id,
            'user2_id' => $id,
            'message' => $request->message,
        ]);
        NotificationModel::create([
            'sender_id' => $sender->id,
            'receiver_id' => $id,
            'type' => 'chat',
        ]);
        return redirect()->back();
    }
    public function chat_list(){
        $user = Auth::user();
        $userId = $user->id;

        $chatHistories = ChatModel::where('user1_id', $userId)
            ->orWhere('user2_id', $userId)
            ->with(['user1', 'user2']) // Eager load related users
            ->get()
            ->groupBy(function ($chat) use ($userId) {
            // Group chats by the other user
                return $chat->user1_id === $userId ? $chat->user2_id : $chat->user1_id;
        })
            ->map(function ($chats) {
            // Sort each group by date descending and get the latest chat
                $latestChat = $chats->sortByDesc('created_at')->first();
                $chatPartner = $latestChat->user1_id === Auth::id() ? $latestChat->user2 : $latestChat->user1;
                return [
                    'chatPartner' => $chatPartner,
                    'message' => $latestChat->message,
                    'created_at' => $latestChat->created_at,
                ];
        })
            ->sortByDesc('created_at'); // Sort all chats by latest message date

        return view('connectfriend.chatlist', compact('chatHistories'));
    }
    public function remove($id){
        $user = Auth::user();
        $friend = UserModel::findOrFail($id);

    // Detach the friend relationship for both directions (user1_id, user2_id)
        $user->friends()->detach($friend->id); // Remove the current user as a friend of the other user
        $friend->friends()->detach($user->id);

        return redirect()->back();
    }
}
