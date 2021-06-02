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
        // Modelのメソッドを呼び出す 有効
        return $this->task->get_tasks();

        // where系 有効
        return $this->task->whereNotNull('id')->get();
        return $this->task->where('id', 4)->get();

        // all 有効
        return $this->task->all();
    }

    public function store(Request $request)
    {
        // Modelのメソッドを呼び出す 有効
        return $this->task->save_task($request);

        // create 有効
        return $this->task->create($request->all());
    }

    public function show(Task $task)
    {
        // Modelのメソッドを呼び出す 有効
        return $this->task->get_task($task->id);

        // メソッドインジェクション 有効
        return $task;

        // find 有効
        return $this->task->find($task->id);
    }

    public function update(Request $request, Task $task)
    {

        // Modelのメソッドを呼び出す 有効
        return $this->task->update_task($task->id, $request);

        // メソッドインジェクション 有効
        return $task->update($request->all());

        // fill 有効
        $task = $this->task->find($request->id);
        $task->fill($request->all())->save();
        return $task;
    }

    public function destroy(Task $task)
    {
        // Modelのメソッドを呼び出す 有効
        return $this->task->delete_task($task->id);

        // メソッドインジェクション 有効
        return $task->delete();

        // delete 有効
        $this->task->find($task->id)->delete();
        return $task;
    }
}
