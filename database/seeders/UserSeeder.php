<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      

        \App\Models\User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@test.com',
            'password' => bcrypt('12345678')
        ])->assignRole('Admin');

        \App\Models\User::factory()->create([
            'name' => 'Registrado',
            'email' => 'registrado@test.com',
            'password' => bcrypt('12345678')
        ])->assignRole('Blogger');

        User::factory(20)->create();
    }
}
