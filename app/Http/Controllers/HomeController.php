<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function homeAdmin()
    {

        $units_count = Unit::count();
        $users_count = User::count();

        $admin_count = User::role('student')->count();
        $staff_count = User::role('staff')->count();
        $students_count = User::role('student')->count();
        return view('admin.home')
            ->with('students_count', $students_count)
            ->with('units_count', $units_count)
            ->with('admin_count', $admin_count)
            ->with('staff_count', $staff_count)
            ->with('users_count', $users_count);
    }

    public function home()
    {
        return view('home');
    }

    public function studentsCount(){
        $students = User::class;
        $users = User::role('student')->get();
        $students_count = User::role('student')->count();
        return view('admin.home')->with('students' , $students);
    }

}
