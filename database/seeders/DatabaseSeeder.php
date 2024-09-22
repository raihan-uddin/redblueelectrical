<?php

namespace Database\Seeders;

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
        // User::factory(10)->withPersonalTeam()->create();

        User::factory()->withPersonalTeam()->create([
            'name' => 'Raihan Uddin',
            'email' => 'blackedition.me@gmail.com',
            'password' => bcrypt('password'),
        ]);
        
        // CategorySeeder::class;
        $this->call(CategorySeeder::class);
    }
}
