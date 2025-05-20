<?php

namespace App\Console\Commands;

use App\Models\Department;
use Illuminate\Console\Command;
use App\Models\Worker;
use App\Models\Profile;
use App\Models\Position;
use App\Models\Project;
use App\Models\Avatar;
use App\Models\Client;
use App\Models\Review;
use App\Models\Tag;


class DevCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'develop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Some develops';



    public function handle()
    {
        $worker = Worker::find(1);
        $worker->update([
            'age' => '35.000',
        ]);
    }

}
