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

    }
    public function homeStudent()
    {
//        //create role
//        $staffRole = Role::create(['name' => 'staff']);
//        $studentRole = Role::create(['name' => 'student']);
//        $adminRole = Role::create(['name' => 'admin']);
//
//        //create permission
//        $createUnitPermission = Permission::create(['name' => 'create unit']);
//        $editUnitPermission = Permission::create(['name' => 'edit unit']);
//        $deleteUnitPermission = Permission::create(['name' => 'delete unit']);
//
//        $createResultPermission = Permission::create(['name' => 'create result']);
//        $editResultPermission = Permission::create(['name' => 'edit result']);
//        $deleteResultPermission = Permission::create(['name' => 'delete result']);
//
//        $staffRole->givePermissionTo($createUnitPermission);
//        $staffRole->givePermissionTo($editUnitPermission);
//        $staffRole->givePermissionTo($createResultPermission);
//
//
//        $adminRole->givePermissionTo($createUnitPermission);
//        $adminRole->givePermissionTo($editUnitPermission);
//        $adminRole->givePermissionTo($deleteUnitPermission);
//        $adminRole->givePermissionTo($createResultPermission);
//        $adminRole->givePermissionTo($editResultPermission);
//        $adminRole->givePermissionTo($deleteResultPermission);


//        $user = User::where('id', '1')->first();
//
//        $user->assignRole('admin');

        return view('student.home');
    }
    public function resultsPage(){
        //results page

        $units = Unit::orderBy('updated_at', 'DESC')->paginate(2);
        return view('student.results')->with('units', $units);
    }

    public function unitsPage(){
        //units page

        $units = Unit::orderBy('updated_at', 'DESC')->paginate(2);
        return view('student.units')->with('units', $units);
    }
}
