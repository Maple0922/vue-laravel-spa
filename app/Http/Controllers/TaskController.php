<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function index()
    {
        return $this->task->all();
    }

    public function store(Request $request)
    {
        return $this->task->create($request->all());
    }

    public function show(Task $task)
    {
        return $task;
    }

    public function update(Request $request, Task $task)
    {
        $task->update($request->all());

        return $task;
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return $task;
    }
}
