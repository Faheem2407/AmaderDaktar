<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Speciality;

class SpecialitySeeder extends Seeder
{
    public function run(): void
    {
        $specialities = [
            ['name' => 'Cardiology', 'image' => 'specialities-01.png'],
            ['name' => 'Dermatology', 'image' => 'specialities-02.png'],
            ['name' => 'Neurology', 'image' => 'specialities-03.png'],
            ['name' => 'Orthopedics', 'image' => 'specialities-04.png'],
            ['name' => 'Pediatrics', 'image' => 'specialities-05.png'],
        ];

        foreach ($specialities as $spec) {
            Speciality::create([
                'name' => $spec['name'],
                'image' => 'assets/img/specialities/'.$spec['image'],
                'status' => 'active',
            ]);
        }
    }
}
