<?php

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class ACL extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new App\User();
        $user = $user->where('email','demo@example.com')->firstOrFail();

        $owner = new Role();
        $owner->name         = 'owner';
        $owner->display_name = 'Project Owner';
        $owner->description  = 'User is the owner of a given project';
        $owner->save();

        $admin = new Role();
        $admin->name         = 'admin';
        $admin->display_name = 'User Administrator';
        $admin->description  = 'User is allowed to manage and administer site';
        $admin->save();


        $userRole = new Role();
        $userRole->name         = 'user';
        $userRole->display_name = 'Registered User';
        $userRole->description  = 'User is allowed to manage his own data';
        $userRole->save();

        // role attach alias
        $user->attachRole($owner); // parameter can be an Role object, array, or id
        $user->attachRole($admin);
        $user->attachRole($userRole);

        $dashboard = new Permission();
        $dashboard->name         = 'dashboard';
        $dashboard->display_name = 'Dashboard';
        $dashboard->description  = 'User dashboard access permission';
        $dashboard->save();

        $admin->attachPermission($dashboard);
        $owner->attachPermission($dashboard);

        return [
            $user->hasRole('owner'),
            $user->hasRole('admin'),
            $user->can('dashboard'),
            $user->ability('admin,owner', 'dashboard')
        ];
    }
}
