<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create role
        $staffRole = Role::create(['name' => 'staff']);
        $studentRole = Role::create(['name' => 'student']);
        $adminRole = Role::create(['name' => 'admin']);

        //create permission
        $createUnitPermission = Permission::create(['name' => 'create unit']);
        $editUnitPermission = Permission::create(['name' => 'edit unit']);
        $deleteUnitPermission = Permission::create(['name' => 'delete unit']);


        //Results Permissions
        $createResultPermission = Permission::create(['name' => 'create result']);
        $editResultPermission = Permission::create(['name' => 'edit result']);
        $deleteResultPermission = Permission::create(['name' => 'delete result']);

        //Account permissions
        $makeStaffPermission = Permission::create(['name' => 'make staff']);
        $makeAdminPermission = Permission::create(['name' => 'make admin']);

        //Assigning Staff Permissions
        $staffRole->givePermissionTo($createUnitPermission);
        $staffRole->givePermissionTo($editUnitPermission);
        $staffRole->givePermissionTo($createResultPermission);

        //Assigning admin Permissions
        $adminRole->givePermissionTo($createUnitPermission);
        $adminRole->givePermissionTo($editUnitPermission);
        $adminRole->givePermissionTo($deleteUnitPermission);
        $adminRole->givePermissionTo($makeStaffPermission);
        $adminRole->givePermissionTo($makeAdminPermission);


        $user = User::where('id', '1')->first();

        $user->assignRole('admin');
    }
}
