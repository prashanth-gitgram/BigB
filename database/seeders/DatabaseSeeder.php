<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@bb.com',
            'password' => bcrypt('test1234'),
            'role_id' => Role::create(['name'=> 'Manager'])->id,
            'email_verified_at' => now(),
        ]);
    }
}
