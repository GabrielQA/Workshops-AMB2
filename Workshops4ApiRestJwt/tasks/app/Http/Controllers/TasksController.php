<?php

namespace Tasks\Http\Controllers;

use Illuminate\Http\Request;
use Tasks\Tasks;

class TasksController extends Controller
{
    public function getAll()
    {
        $tasks = Tasks::all();
        return $tasks;
    }

    public function add(Request $request)
    {
        $tasks = Tasks::create($request->all());
        return $tasks;
    }

    public function get($id)
    {
        $tasks = Tasks::find($id);
        return $tasks;
    }

    public function edit(Request $request, $id)
    {
        $tasks = $this->get($id);
        $tasks->fill($request->all())->save();
        return $tasks;
    }

    public function delete($id)
    {
        $task = $this->get($id);
        $task->delete();
        return $task;
    }
}
