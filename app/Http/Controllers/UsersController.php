<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        // ユーザー一覧をidの降順で取得
        $users = User::orderBy('id', 'desc')->paginate(10);

        // ユーザー一覧ビューでそれを表示
        return view('users.index', [
            'users' => $users
        ]);
    }

    public function show(string $id)
    {
        $nowUserID = Auth::user()->id;
        // idの値でユーザーを検索して取得
        $user = User::findOrFail($id);
        if ($nowUserID == $user->id) {
            $user->loadRelationshipCounts();

            $tasks = $user->tasks()->orderBy('id', 'desc')->paginate(10);
            // ユーザー詳細ビューでそれを表示
            return view('users.show', [
                'user' => $user,
                'tasks' => $tasks
            ]);
        }else return redirect()->route('dashboard')->with('error', 'You do not have permission to view this user.');
    }
}