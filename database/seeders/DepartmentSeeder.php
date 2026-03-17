<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            [
                'name' => 'Software Development (IT)',
                'description' => 'Development of web and mobile applications.'
            ],
            [
                'name' => 'Design & UX',
                'description' => 'User interface and graphics design.'
            ],
            [
                'name' => 'Marketing & Sales',
                'description' => 'Digital marketing and customer relations.'
            ],
            [
                'name' => 'Human Resources (HR)',
                'description' => 'Personnel management and recruitment.'
            ],
        ];

        foreach ($departments as $dept) {
            Department::create($dept);
        }
    }
}