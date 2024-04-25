<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'JMTB',
            'email' => 'qa@lsv-tech.com',
            'password' => bcrypt('Testing24@'),
            'identification' => '1047484275',
            'identification_type' => 'cedula de ciudadania',
            'area_department' => 'tecnologia de la informacion',
            'position' => 'jefe de area',
            'contact' => '3018122192',
            'age' => '28',
            'address' => 'parque de heredia 4',
        ])->assignRole('Admin');

    }

}
