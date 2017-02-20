<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ACL extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user = $user->where('email','ucha19871@gmail.com')->firstOrFail();

        //$role = Role::create(['name' => 'admin']);
        //$permission = Permission::create(['name' => 'access_backend']);
        //$role->givePermissionTo('access_backend');
        //$user->assignRole('admin');
        //$user->givePermissionTo('access_backend');
        //echo($user);
    }
}
