<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Worker\StoreRequest;
use App\Http\Requests\Worker\UpdateRequest;
use App\Http\Resources\WorkerResource;
use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workers = Worker::all();
        return WorkerResource::collection($workers)->resolve();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $worker = Worker::create($data);
        return WorkerResource::make($worker)->resolve();
    }

    /**
     * Display the specified resource.
     */
    public function show(Worker $worker)
    {
        return WorkerResource::make($worker)->resolve();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Worker $worker, UpdateRequest $request)
    {
        $data = $request->validated();
        $worker->update($data);
        $worker->fresh();
        return WorkerResource::make($worker)->resolve();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Worker $worker)
    {
        $worker->delete();
        return response()->json([
            "message" => "worker was deleted"
        ]);
    }
}
