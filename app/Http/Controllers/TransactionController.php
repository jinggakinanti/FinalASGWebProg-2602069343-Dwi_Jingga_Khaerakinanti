<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Avatar as AvatarModel;

class TransactionController extends Controller
{
    public function registered(){
        return view('connectfriend.registered');
    }
    public function pay_fee(Request $request){
        $fee = 100000;
        $user = Auth::user();

        $request->validate([
            'amount' => 'required|integer',
        ]);

        $amount = $request->input('amount');

        if ($amount < $fee) {
            $underpaid = $fee - $amount;
            return redirect()->back()->withErrors([
                'amount' => __('connectfriend.underpaid'). number_format($underpaid, 0, ',', '.') ,
            ]);
        } elseif ($amount > $fee) {
            $overpaid = $amount - $fee;

            return redirect()->back()->with('overpaid', $overpaid);
        }

        $user->isPaid = true;
        $user->save();

        return view('layout.success');
    }
    public function convert(Request $request){
        $user = Auth::user();
        $coins = $request->input('coins'); 
        $user->coin += $coins;
        $user->isPaid = true;
        $user->save();

        return view('layout.success');
    }
    public function topup(Request $request){
        $user = Auth::user();
        $request->validate([
            'topup' => 'required|integer|min:100',
        ]);

        $topupAmount = $request->input('topup');
        $user->coin += $topupAmount;
        $user->save();

        return back()->with('success', __('connectfriend.success_topup'));
    }
    public function avatar(){
        $user = Auth::user();
        
        $purchasedAvatars = $user->avatars;

        $availableAvatars = AvatarModel::whereNotIn('id', $purchasedAvatars->pluck('id'))->get();

        return view('connectfriend.avatar', compact('purchasedAvatars', 'availableAvatars'));
    }
    public function buy_avatar(Request $request, $id){
        $avatar = AvatarModel::findOrFail($id);
        $user = Auth::user();

        if ($user->coin >= $avatar->price) {
            $user->coin -= $avatar->price;
            $user->avatars()->attach($avatar->id);
            $user->save();

            return redirect()->back();
        }

        return back()->with('error', __('connectfriend.no_coin'));  
    }
    public function set_avatar($id){
        $user = Auth::user();

        $user->avatar_id = $id;
        $user->save();

        return back()->with('success', __('connectfriend.avatar_set'));
    }
    public function remove_avatar(){
        $user = Auth::user();

        $user->avatar_id = null;
        $user->save();

        return back()->with('success', __('connectfriend.avatar_dis'));   
    }
}
