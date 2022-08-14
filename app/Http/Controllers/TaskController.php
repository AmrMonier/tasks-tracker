<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tasks\CreateTask;
use App\Http\Requests\Tasks\UpdateTask;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myTasks()
    {
        $tasks = Task::query()->where('assigned_to', request()->user()->id);
        return response()->json($tasks);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTask $request, Project $project)
    {
        $task = new Task([
            'project_id' => $project->id,
            'name' => $request->name,
            'description' => $request->description,
            'assigned_to' => $request->assigned_to
        ]);
        $task->save();
        return response()->json($task, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return response()->json($task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTask $request, Task $task)
    {
        $task->update([
            'name' => $request->name,
            'description' => $request->description,
            'assigned_to' => $request->assigned_to,
            'status' => $request->status
        ]);
        return response()->json($task);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return response()->status(204);
    }
}
