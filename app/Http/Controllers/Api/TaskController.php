<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Resources\TaskResource;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::with(["department","user"])->get();
        return TaskResource::collection($tasks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "title"=>"required|string|max:255",
            "description"=>"required|string",
            "status"=>"required|in:Todo,Doing ,Done",
            "due_date"=>"nullable|date",
            'user_id' => 'required|exists:users,id',
            'department_id' => 'required|exists:departments,id',
        ]);

        $task = Task::create($validated);
        return request()->json($task,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return TaskResource::collection($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            "title" => "sometimes|string|max:100",
            "status" =>"sometimes|in:Todo,Doing,Done",
            "due_date"=>"sometimes|nullable|date"
        ]);

        $task->update($validated);
        return response()->json($task);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json(["Message"=>"task deleted successfully"]);
    }
}
