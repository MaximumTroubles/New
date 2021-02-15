<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\Category::factory(10)->create();
        // \App\Models\Product::factory(10)->create();
        // \App\Models\News::factory(30)->create();
        DB::table('roles')->insert([
            'name' => 'Администратор','Менеджер','Продавец',
            'slug' => 'admin','manager','seller',
        ]);

    }
}
