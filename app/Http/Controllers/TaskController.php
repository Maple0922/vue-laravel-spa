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
        // where系 有効
        return $this->task->whereNotNull('id')->get();
        return $this->task->where('id', 4)->get();

        // all 有効
        return $this->task->all();
    }

    public function store(Request $request)
    {
        // create 有効
        return $this->task->create($request->all());
    }

    public function show(Task $task)
    {
        // メソッドインジェクション 有効
        return $task;

        // find 有効
        return $this->task->find($task->id);
    }

    public function update(Request $request, Task $task)
    {
        // メソッドインジェクション 有効
        $task->update($request->all());
        return $task;

        // fill 有効
        $task = $this->task->find($request->id);
        $task->fill($request->all())->save();
        return $task;
    }

    public function destroy(Task $task)
    {
        // メソッドインジェクション 有効
        $task->delete();
        return $task;

        // delete 有効
        $this->task->find($task->id)->delete();
        return $task;
    }
}
