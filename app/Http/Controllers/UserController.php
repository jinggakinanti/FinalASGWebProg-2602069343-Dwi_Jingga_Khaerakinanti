<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User as UserModel;
use App\Models\Notification as NotificationModel;
use App\Models\Bear as BearModel;

class UserController extends Controller
{
    public function profile(){
        $id = Auth::user();

        $user = UserModel::with(['fields', 'bear', 'avatar'])->findOrFail($id->id);
        return view('connectfriend.profile', compact('user'));
    }

    public function upload_image(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagename = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads'), $imagename);

        $user = Auth::user();
        $user->image = $imagename;
        $user->save();

        return redirect()->back();
    }

    public function notification(){
        $user = Auth::user();
        $id = $user->id;

        $notifs = NotificationModel::with(['sender'])->where('receiver_id', $id)->orderBy('created_at', 'desc')->get();

        return view('connectfriend.notification', compact('notifs'));
    }
    public function read($id){
        $notif = NotificationModel::findOrFail($id);
        $notif->update(['is_read' => true]);

        return back();
    }  
    public function visibility(){
        $user = Auth::user();

        if($user->isVisible){
            if($user->coin < 50){
                return redirect()->back();
            }
            $user->isVisible = false;
            $user->coin -= 50;

            $bear = BearModel::inRandomOrder()->first();
            $user->bear_id = $bear->id;
        }
        elseif(!$user->isVisible){
            if($user->coin < 5){
                return redirect()->back();
            }
            $user->isVisible = true;
            $user->coin -= 5;

            $user->bear_id = null;
        }
        $user->save();

        return redirect()->back();
    }  
}
