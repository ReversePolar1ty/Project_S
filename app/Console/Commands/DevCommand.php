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
//        $this->prepareData();
//        $this->prepareManyToMany();

        $position = Position::find(1);
        dd($position->marriedWorkers->toArray());
    }

    private function prepareData()
    {
        Client::create([
            'name'=>'Bob',
        ]);
        Client::create([
            'name'=>'Alex',
        ]);
        Client::create([
            'name'=>'John',
        ]);


        $department1 = Department::create([
            'title' => 'IT'
        ]);

        $department2 = Department::create([
            'title' => 'Analytics'
        ]);


        $position1 = Position::create([
            'title'=> 'Developer',
            'department_id' => $department1->id,
        ]);
        $position2 = Position::create([
            'title'=> 'Manager',
            'department_id' => $department1->id,
        ]);
        $position3 = Position::create([
            'title'=> 'Designer',
            'department_id' => $department1->id,
        ]);


        $workerData1 = [
            'surname'=>'Ivanov',
            'name'=>'Ivan',
            'email'=>'IvanIvanich@mail.ru',
            'position_id'=>$position1->id,
            'age'=>'22',
            'description'=>'Ванёк',
            'is_married'=> false,
        ];

        $workerData2 = [
            'surname'=>'Shlyapik',
            'name'=>'Sasha',
            'email'=>'Sasha123@mail.ru',
            'position_id'=>$position2->id,
            'age'=>'23',
            'description'=>'Sanyok',
            'is_married'=> true,
        ];

        $workerData3 = [
            'surname'=>'Demchog',
            'name'=>'Vadim',
            'email'=>'vadik@mail.ru',
            'position_id'=>$position2->id,
            'age'=>'40',
            'description'=>'Jokerge',
            'is_married'=> false,
        ];
        $workerData4 = [
            'surname'=>'Luzhin',
            'name'=>'Stas',
            'email'=>'stasik@gmail.com',
            'position_id'=>$position3->id,
            'age'=>'33',
            'description'=>'Trollface',
            'is_married'=> true,
        ];
        $workerData5 = [
            'surname'=>'Putin',
            'name'=>'Vladimir',
            'email'=>'volodya1337@mail.ru',
            'position_id'=>$position3->id,
            'age'=>'56',
            'description'=>'Mr.President',
            'is_married'=> false,
        ];
        $workerData6 = [
            'surname'=>'Bykov',
            'name'=>'Andrei',
            'email'=>'chikago-bulls@gmail.com',
            'position_id'=>$position1->id,
            'age'=>'45',
            'description'=>'Lobanov debil',
            'is_married'=> true,
        ];

        $worker1 = Worker::create($workerData1);
        $worker2 = Worker::create($workerData2);
        $worker3 = Worker::create($workerData3);
        $worker4 = Worker::create($workerData4);
        $worker5 = Worker::create($workerData5);
        $worker6 = Worker::create($workerData6);


        $profileData1 = [
            'finished_study_at'=> '2020-06-01',
            'experience'=> 5,
            'skill'=> 'Coder',
            'city'=> 'Tokyo',
        ];

        $profileData2 = [
            'finished_study_at'=> '2019-06-06',
            'experience'=> 3,
            'skill'=> 'Designer',
            'city'=> 'Beijing',
        ];

        $profileData3 = [
            'finished_study_at'=> '2015-06-06',
            'experience'=> 10,
            'skill'=> 'Boss',
            'city'=> 'Moscow',
        ];
        $profileData4 = [
            'finished_study_at'=> '2017-06-06',
            'experience'=> 7,
            'skill'=> 'Cringer',
            'city'=> 'Sevastopol',
        ];
        $profileData5 = [
            'finished_study_at'=> '2010-06-06',
            'experience'=> 8,
            'skill'=> 'NetRunner',
            'city'=> 'Saint-Petersburg',
        ];
        $profileData6 = [
            'finished_study_at'=> '2020-06-06',
            'experience'=> 15,
            'skill'=> 'Cleaner',
            'city'=> 'Rome',
        ];

        $worker1->profile()->create($profileData1);
        $worker2->profile()->create($profileData2);
        $worker3->profile()->create($profileData3);
        $worker4->profile()->create($profileData4);
        $worker5->profile()->create($profileData5);
        $worker6->profile()->create($profileData6);

    }

    private function prepareManyToMany()
    {
        $workerManager = Worker::find(2);
        $helper1 = Worker::find(3);
        $helper2 = Worker::find(6);
        $workerBackend = Worker::find(1);
        $workerDesigner = Worker::find(4);
        $workerFrontend = Worker::find(5);

        $project1 = Project::create([
            'title'=>'Shop'
        ]);
        $project2 = Project::create([
            'title'=>'Blog'
        ]);

        $project1->workers()->attach([
            $workerManager->id,
            $helper1->id,
            $workerBackend->id,
            $workerFrontend->id,

        ]);
        $project2->workers()->attach([
            $workerDesigner->id,
            $helper2->id,
            $workerManager->id,
            $workerBackend->id,
        ]);
    }
}
