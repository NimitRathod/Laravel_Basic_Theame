<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [[
            'id'             => 1,
            'name'           => 'Admin',
            'email'          => 'nimitrathod1997@gmail.com',
            'password'       => '$2y$10$imU.Hdz7VauIT3LIMCMbsOXvaaTQg6luVqkhfkBcsUd.SJW2XSRKO',
            'remember_token' => null,
            'created_at'     => '2019-06-19 19:13:32',
            'updated_at'     => '2019-06-19 19:13:32',
            'deleted_at'     => null,
        ]];

        User::insert($users);

        User::findOrFail(1)->roles()->sync(1);
    }
}
