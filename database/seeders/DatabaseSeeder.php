<?php

namespace Database\Seeders;

use App\Models\Projects;
use App\Models\Roles;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\ProjectsFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            RolesSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@gamil.com',
            'password' => Hash::make('Abcd@1234'),
            'role_id' => Roles::where('name', 'admin')->first()->id,
        ]);

        Projects::factory(10)->create();
    }
}
