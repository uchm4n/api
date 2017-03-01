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
        $owner->display_name = 'Project Owner'; // optional
        $owner->description  = 'User is the owner of a given project'; // optional
        $owner->save();

        $admin = new Role();
        $admin->name         = 'admin';
        $admin->display_name = 'User Administrator'; // optional
        $admin->description  = 'User is allowed to manage and edit other users'; // optional
        $admin->save();

        // role attach alias
        $user->attachRole($owner); // parameter can be an Role object, array, or id
        $user->attachRole($admin);

        $dashboard = new Permission();
        $dashboard->name         = 'dashboard';
        $dashboard->display_name = 'Dashboard'; // optional
        $dashboard->description  = 'User dashboard access permission'; // optional
        $dashboard->save();

        $admin->attachPermission($dashboard);
        $owner->attachPermission($dashboard);

        return [
            $user->hasRole('owner'),   // true
            $user->hasRole('admin'),   // true
            $user->can('dashboard'),   // true
            $user->ability('admin,owner', 'dashboard')
        ];
    }
}
