<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Worker\FilterRequest;
use App\Http\Requests\Worker\StoreRequest;
use App\Http\Requests\Worker\UpdateRequest;
use App\Models\Worker;
use Illuminate\Http\Request;
use function Webmozart\Assert\Tests\StaticAnalysis\true;

class   WorkerController extends Controller
{
    //ВЫВОД ПОЛЬЗОВАТЕЛЕЙ НА НЕСКОЛЬКО СТРАНИЦ, ФИЛЬТР
    public function index(FilterRequest $request)
    {
        $data = $request->validated();
        $workerQuery = Worker::query();

        if (isset($data['name'])) {
            $workerQuery->where('name', 'like', "%{$data['name']}%");
        }

        if (isset($data['surname'])) {
            $workerQuery->where('surname', 'like', "%{$data['surname']}%");
        }

        if (isset($data['email'])) {
            $workerQuery->where('email', 'like', "%{$data['email']}%");
        }

        if (isset($data['from'])) {
            $workerQuery->where('age', '>', $data['from']);
        }

        if (isset($data['to'])) {
            $workerQuery->where('age', '<', $data['to']);
        }

        if (isset($data['description'])) {
            $workerQuery->where('description', 'like', "%{$data['description']}%");
        }

        if (isset($data['is_married'])) {
            $workerQuery->where('is_married', true);
        }

        $workers = $workerQuery->paginate(4);

        return view('worker.index', compact('workers'));
    }


    //ПРОСМОТР ОТДЕЛЬНО ВЗЯТОГО ПОЛЬЗОВАТЕЛЯ
    public function show(Worker $worker)
    {
        return view('worker.show', compact('worker'));
    }

    //ЗАПИСЬ ДАННЫХ НА СТОРОНЕ ПОЛЬЗОВАТЕЛЯ
    public function create()
    {

        return view('worker.create');
    }


    //ЗАПИСЬ ДАННЫХ НА СТОРОНЕ СЕРВЕРА
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['is_married'] = isset($data['is_married']);
        Worker::create($data);
        return redirect()->route('worker.index');
    }


    //ОБНОВЛЕНИЕ ДАННЫХ НА СТОРОНЕ ПОЛЬЗОВАТЕЛЯ
    public function edit(Worker $worker)
    {

        return view('worker.edit', compact('worker'));
    }


    //ОБНОВЛЕНИЕ ДАННЫХ НА СТОРОНЕ СЕРВЕРА
    public function update(UpdateRequest $request, Worker $worker){

        $data = $request->validated();
        $data['is_married'] = isset($data['is_married']);

        $worker->update($data);

        return redirect()->route('worker.show', $worker->id);
    }


    public function delete(Worker $worker){

        $worker->delete();
        return redirect()->route('worker.index');
    }
}

