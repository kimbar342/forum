<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory()->create();

         \App\Models\User::factory()->create([
             'first_name' => 'Test User',
             'email' => 'test@example.com',
             'email_verified_at' => now(),
             'last_name' => 'Федоров',
             'surname' => "Иванович",
             'password' => "test",
             'birthday' => date('Y-m-d'),
             'post' => 'директор',
             'familyPost' => "холост",
             'city' => "Москва",
             'gender' => "мужской",
             'position_in_office' => "в коммандировке",
             'active' => true,
             'avatar' => '',
             'root' => 1,
         ]);
    }
}
