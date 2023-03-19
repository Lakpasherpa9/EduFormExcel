<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Deletes all existing entries for users table
        DB::table('users')->truncate();

        $faker = Faker::create();
        $password = Hash::make('password');

        // Generate 10 random user records with role as 'student'
        $students = [];
        for ($i = 0; $i < 3; $i++) {
            $students[] = [
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => $password,
                'role' => '1',
                'studentid' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('users')->insert($students);
    }
}
