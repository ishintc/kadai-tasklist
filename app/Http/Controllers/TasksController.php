<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
class TasksController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy("id","desc")->paginate(10);
        //$tasks = Task::all();

        return view('commons.index', ['tasks' => $tasks]);
    }
    public function create()
    {
        $tasks = new Task;
        return view('commons.create', ['tasks' => $tasks]);
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|max:255']);
        $request->validate(['content' => 'required|max:255']);
        $request->validate(['status'=> 'required|max:10']);

        $task = new Task;
        $task->name = $request->name;
        $task->content = $request->content;
        $task->status = $request->status;
        $task->save();

        return redirect('/');
    }

    public function show($id)
    {
        $task = Task::findOrFail($id);

        return view('commons.show', ['task' => $task]);
    }

    public function edit($id)
    {
        $tasks = Task::findOrFail($id);
        return view('commons.edit', ['task' => $tasks]);
    }
    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required|max:255']);
        $request->validate(['content' => 'required|max:255']);
        $request->validate(['status'=> 'required|max:10']);

        $task = Task::findOrFail($id);
        $task->name = $request->name;
        $task->content = $request->content;
        $task->status = $request->status;
        $task->save();
        return redirect('/');
    }
}
