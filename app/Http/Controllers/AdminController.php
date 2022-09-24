<?php

namespace App\Http\Controllers;

use App\Models\Chat;
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

    public function allchats(){

        $chats = Chat::orderBy('updated_at', 'DESC')->get();
        return view('admin.chats')->with('chats', $chats );
    }
}
