<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\RegUnit;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function allUsers(){

        $users = User::orderBy('updated_at', 'DESC')->get();
        return view('admin.staff')->with('users', $users);
    }

    public function allChats(){

        $chats = Chat::orderBy('updated_at', 'ASC')->get()->groupBy('chat_id');

        return view('admin.chats')->with('chats', $chats );
    }

    public function allRegisterdUnits(){

        $regUNits = RegUnit::orderBy('updated_at', 'DESC')->with('user')->get();
        return view('admin.regUnits')->with('regUnits', $regUNits );
    }

    public function makeAdmin(Request $request){
        $request->validate([
            'user_id' => 'required',
        ]);


        $userId = $request->input('user_id');
        $user = User::where('id', $userId)->first();
        $user->assignRole('admin');

        $msg = 'User Id '. $userId . ' Is now an Admin ';

        return redirect('/admin/users')->with('message', $msg);
    }

    public function makeStaff(Request $request){
        $request->validate([
            'user_id' => 'required',
        ]);

        $userId = $request->input('user_id');
        $user = User::where('id', $userId)->first();
        $user->assignRole('staff');

        $msg = 'User Id '. $userId . ' Is now Staff ';

        return redirect('/admin/users')->with('message', $msg);
    }
}
