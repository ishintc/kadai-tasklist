@extends('layouts.app')

@section('content')

  <div class="prose ml-4">
    <h2 class="text-lg">タスク一覧</h2>
  </div>

  @if (isset($tasks))
    <table class="table table-zebra w-full my-4">
    <thead>
    <tr>
      <th>番号</th>
      <th>タスク名</th>
      <th>タスク内容</th>
      <th>タスク状態</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($tasks as $task)
    <tr>
      <td><a class="link link-hover text-info" href="tasks/{{ $task->id }}">{{ $task->id }}</a></td>
      <td>{{ $task->name }}</td>
      <td>{{ $task->content }}</td>
      <td>{{ $task->status }}</td>
    </tr>
    @endforeach
    </tbody>
    </table>
  @endif

  {{ $tasks->links() }}
  {{-- メッセージ作成ページへのリンク --}}
  <a class="btn btn-primary" href="{{ route('commons.create') }}">新規タスクの追加</a>
@endsection