<?php

namespace Database\Seeders;

use App\Enums\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class StaticDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => Roles::ADMIN->value]);
        $instructor = Role::create(['name' => Roles::INSTRUCTOR->value]);
        $student = Role::create(['name' => Roles::STUDENT->value]);

    }
}
