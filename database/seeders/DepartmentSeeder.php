<?php

namespace Database\Seeders;

use App\Models\Department;
use DeepCopy\DeepCopy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::factory(4)->create();
    }
}
