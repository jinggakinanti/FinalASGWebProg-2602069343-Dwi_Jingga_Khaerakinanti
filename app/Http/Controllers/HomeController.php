<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User as UserModel;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }

    public function view(){
        if(!Auth::check()){
            $users = UserModel::with(['fields', 'avatar'])->where('isVisible', true)->orderBy('id', 'asc')->paginate(8);
        }
        else{
            $person = Auth::user();
            $users = UserModel::with(['fields'])->where('id', '!=', $person->id)->where('isVisible', true)->orderBy('id', 'asc')->paginate(8);
        }

        return view('connectfriend.home', compact('users'));
    }

    public function detail($id){
        $user = UserModel::with(['fields', 'bear', 'avatar'])->findOrFail($id);

        $isFriend = auth()->user()->friends->contains($user->id);

        return view('connectfriend.detail', compact('user', 'isFriend'));
    }

    public function search(Request $request){
        $query = $request->input('query');

        if(!Auth::check()){
            $users = UserModel::whereHas('fields', function($q) use ($query) {
                $q->where('field', 'LIKE', "%{$query}%");
                })->where('isVisible', true)->paginate(12);
        }
       else{
            $person = Auth::user();
            $users = UserModel::whereHas('fields', function($q) use ($query) {
                $q->where('field', 'LIKE', "%{$query}%");
                })->where('id', '!=', $person->id)->where('isVisible', true)->paginate(12);
       }

        return view('connectfriend.search', compact(['users', 'query']));
    }
    public function filter(Request $request){
        $filter = $request->query('filter', 'all');

        if(!Auth::check()){
            if($filter == 'all'){
                $users = UserModel::where('isVisible', true)->paginate(8);
            }
            elseif ($filter === 'male') {
                $users = UserModel::where('gender', 'Male')->where('isVisible', true)->paginate(8);
            } 
            elseif ($filter === 'female') {
                $users = UserModel::where('gender', 'Female')->where('isVisible', true)->paginate(8);
            } 
        }
        else{
            $person = Auth::user();
            if($filter == 'all'){
                $users = UserModel::where('id', '!=', $person->id)->where('isVisible', true)->paginate(8);
            }
            elseif ($filter === 'male') {
                $users = UserModel::where('gender', 'Male')->where('id', '!=', $person->id)->where('isVisible', true)->paginate(8);
            } 
            elseif ($filter === 'female') {
                $users = UserModel::where('gender', 'Female')->where('id', '!=', $person->id)->where('isVisible', true)->paginate(8);
            } 
        }
    
        return view('connectfriend.home', compact('users'));
    }
    public function settings(){
        $id = Auth::user();

        $user = UserModel::with('bear', 'avatar')->findOrFail($id->id);

        return view('connectfriend.settings', compact('user'));
    }
}
