<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Worker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectWorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = Project::all();
        $workers = Worker::all();
        foreach ($projects as $project) {

            $assignedWorkers = $workers->random(10)->pluck('id')->toArray();
            $project->workers()->attach($assignedWorkers);

        }
    }
}
