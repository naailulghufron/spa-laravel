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
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
        ]);
        // $f = Faker::create(100);
        // User::create([
        //     'name' => $f->name,
        //     'email' => $f->email,
        //     'password' => bcrypt('123456'),
        // ]);
    }
}
