<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create an admin user
        User::factory()->create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johndoe@example.com',
            'role' => 'super',
            'created_at' => "2019-01-01 00:00:00",
        ]);

        // create our users
        User::factory(30)
            ->sequence(fn(Sequence $sequence) => ['role' => rand(0, 20) < 5 ? 'admin' : 'standard'])
            ->create();
    }
}
