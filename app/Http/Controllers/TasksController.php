<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Directory;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $tasks = $user->tasks()->orderBy('id', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'tasks' => $tasks
            ];
        }
        return view('dashboard', $data);
    }

    public function create()
    {
        if (Auth::check()) {
            $tasks = new Task;
            return view('commons.create', ['tasks' => $tasks]);
        }
        return redirect('/');
    }

    public function store(Request $request)
    {
        if (Auth::check()) {
            $request->validate(['name' => 'required|max:255']);
            $request->validate(['content' => 'required|max:255']);
            $request->validate(['status' => 'required|max:10']);

            $user_id = $request->user()->id;
            $request->user()->tasks()->create([
                'name' => $request->name,
                'content' => $request->content,
                'status' => $request->status,
                'user_id' => $user_id
            ]);

            return redirect('/dashboard');
        }
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
        $request->validate(['status' => 'required|max:10']);

        $task = Task::findOrFail($id);
        $task->name = $request->name;
        $task->content = $request->content;
        $task->status = $request->status;
        $task->save();
        return redirect('/');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        if (\Auth::id() === $task->user_id) {
            $task->delete();
            return back()->with('success', 'Delete Successful');
        }
        return back()->with('Delete Failed');
    }

}
