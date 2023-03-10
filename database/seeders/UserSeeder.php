<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //     'name' => 'Administrator',
        //     'email' => 'admin@admin.com',
        //     'password' => bcrypt('123456'),
        // ]);
        for ($i = 0; $i < 1000; $i++) {
            // $f = Faker::create();
            User::create([
                'name' => $i,
                'email' => $i,
                'password' => bcrypt('123456'),
            ]);
        }
    }
}
