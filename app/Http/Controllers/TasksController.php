<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
class TasksController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('commons.index',['tasks' => $tasks]);
    }
    public function create(){
        $tasks = new Task;
        return view('commons.create',['tasks'=> $tasks]);
    }

    public function store(Request $request){
        $task = new Task;
        $task->id = $request->id;
        $task->name = $request->name;
        $task->content = $request->content;
        $task->save();

        return redirect('/');
    }

    public function show($id){
        $task = Task::findOrFail($id);

        return view('commons.show',['task'=> $task]);
    }

    public function edit($id){
        $tasks = Task::findOrFail($id);
        return view('commons.edit',['task'=> $tasks]);
    }

    public function update(Request $request, $id){
        $task = Task::findOrFail($id);
        $task->name = $request->name;
        $task->content = $request->content;
        $task->save();
        return redirect('/');
    }
}
