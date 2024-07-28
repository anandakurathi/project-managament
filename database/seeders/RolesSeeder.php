<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Roles::create(['name' => 'admin', 'status' => 'active']);
        Roles::create(['name' => 'user', 'status' => 'active']);
        Roles::create(['name' => 'unknown', 'status' => 'inactive']);
    }
}
