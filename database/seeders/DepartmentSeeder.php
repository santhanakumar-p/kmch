<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = ([
            [
                'name' => 'Cardiology & Heart Institute'
            ],
            [
                'name' => 'KMCH Comprehensive Cancer Center'
            ],
            [
                'name' => 'Neurosciences'
            ],
            [
                'name' => 'Orthopedics and Joint Replacement'
            ],
            [
                'name' => 'KMCH Liver Institute'
            ],
            [
                'name' => 'Organ Transplant Program'
            ],
            [
                'name' => 'Obstetrics & Gynaecology'
            ],
            [
                'name' => 'Neonatology & Pediatrics'
            ],
            [
                'name' => 'Internal Medicine'
            ],
            [
                'name' => 'Gastroenterology & Hepatology'
            ],
            [
                'name' => 'Nephrology & Urology'
            ],
            [
                'name' => 'Pulmonology'
            ],
            [
                'name' => 'ENT and Head & Neck Surgery'
            ],
            [
                'name' => 'Dermatology & Cosmetic Dermatology'
            ],
            [
                'name' => 'Rheumatology'
            ],
            [
                'name' => 'Nuclear Medicine & PET CT'
            ],
            [
                'name' => 'Radiology'
            ],
            [
                'name' => 'Laboratory Medicine & Blood Bank'
            ],
            [
                'name' => 'Emergency Medicine'
            ],
            [
                'name' => 'Physiotherapy'
            ],
        ]);

        foreach ($departments as $department) {
            Department::updateOrCreate($department);
        }
    }
}
