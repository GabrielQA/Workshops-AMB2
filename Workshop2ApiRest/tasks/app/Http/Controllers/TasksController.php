<?php

namespace Tasks\Http\Controllers;

use Illuminate\Http\Request;
use Tasks\Tasks;
class TasksController extends Controller
{
    public function getAll(){
        $tasks = Tasks::all();
        return $tasks;
    }
    public function add(Request $request){
        $task = Tasks::create($request->all());
        return $task;
}
public function get($id){
    $task = Tasks::find($id);
    return $task;
}
public function edit($id, Request $request){
    $task = $this->get($id);
    $task->fill($request->all())->save();
    return $task;
}
}