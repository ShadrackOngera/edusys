<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class StudentsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function homeStudent()
    {



//        $user = User::where('id', '4')->first();
//
//        $user->assignRole('admin');

        return view('student.home');
    }
    public function resultsPage(){
        //results page

        return view('student.results');
    }
}
