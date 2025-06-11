@extends('layouts.app')

@section('content')

    <div class="prose ml-4">
        <h2>番号 {{ $task->id }} のタスク詳細ページ</h2>
    </div>

    <table class="table w-full my-4">
        <tr>
            <th>id</th>
            <td>{{ $task->id }}</td>
        </tr>
        <tr>
            <th>タスク名</th>
            <td>{{ $task->name }}</td>
        </tr>
        <tr>
            <th>タスク内容</th>
            <td>{{ $task->content }}</td>
        </tr>
        <tr>
            <th>タスク状態</th>
            <td>{{ $task->status }}</td>
        </tr>
    </table>

<a class="btn btn-outline" href="{{ route('commons.edit', $task->id) }}">このメッセージを編集</a>


@endsection