<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\RegUnit;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function allUsers(){


//        $user = auth()->user();
//        $user->hasAllRoles(Role::all());
//
//        return $user;

        $users = User::orderBy('updated_at', 'DESC')->paginate(20);
        return view('admin.staff')->with('users', $users);
    }

    public function allChats(){

        $chats = Chat::orderBy('updated_at', 'ASC')->paginate(10)->groupBy('chat_id');

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

    public function makeStudent(Request $request){
        $request->validate([
            'user_id' => 'required',
        ]);


        $userId = $request->input('user_id');
        $user = User::where('id', $userId)->first();
        $user->assignRole('student');

        $msg = 'User Id '. $userId . ' Now Has access to student routes ';

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
