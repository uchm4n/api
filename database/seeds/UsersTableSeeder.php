<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Ucha';
        $user->email = 'ucha19871@gmail.com';
        $user->password = '12345';
        $user->phone = '2342342342';
        $user->bio = 'Something Something Info';
        $user->image = 'http://placehold.it/32x32';
        $user->save();
        factory(User::class, 30)->create();
    }
}
