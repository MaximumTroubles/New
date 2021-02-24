<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            'name' => 'Maxym Admin',
            'email' => 'Maxym@Admin.com',
            'password' => Hash::make('password')
            ],
            [
            'name' => 'Maxym Manager',
            'email' => 'Maxym@manager.com',
            'password' => Hash::make('password')
            ],
        ]);
        DB::table('roles')->insert([
            [
                'name' => 'Администратор',
                'slug' => 'admin',
            ],
            [
                'name' => 'Менеджер',
                'slug' => 'manager',
            ]
        ]);
        DB::table('permissions')->insert([
            [
                'name' => 'Управление категориями',
                'slug' => 'manage-categories',
            ],
            [
                'name' => 'Управление товарами',
                'slug' => 'manage-products',
            ]
        ]);
        DB::table('users_roles')->insert([
            [
                'user_id' => '1',
                'role_id' => '1',
            ],
            [
                'user_id' => '2',
                'role_id' => '2',
            ]
        ]);
    }
}
