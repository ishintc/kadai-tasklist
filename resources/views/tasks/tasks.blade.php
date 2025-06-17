<div class="mt-4">

  @if (isset($tasks))
    <a class="btn btn-primary" href="{{ route('commons.create') }}">新規タスクの追加</a>
    <ul class="list-none">
    @foreach ($tasks as $task)
    <li class="flex items-start gap-x-2 mb-4">
      {{-- 投稿の所有者のメールアドレスをもとにGravatarを取得して表示 --}}
      <div class="avatar">
      <div class="w-12 rounded">
      <img src="{{ Gravatar::get($task->user->email) }}" alt="" />
      </div>
      </div>
      <div>
      <div>
      <a class="link link-hover text-info" href="{{ route('users.show', $task->user->id) }}">{{ $task->user->name }}</a>
      <span class="text-muted text-gray-500">タスク名: {{ $task->name }}</span>
      </div>
      <div>
      <p class="mb-0">タスク内容: {!! nl2br(e($task->content)) !!}</p>
      </div>
      <div>
      @if (Auth::id() == $task->user_id)
      <form method="GET" action="{{ route('tasks.edit', $task->id) }}" style="display: inline">
      @csrf
      <button type="submit" class="btn btn-primary btn-sm normal-case">Edit</button>
      </form>

      <form method="POST" action="{{ route('tasks.destroy', $task->id) }}" style="display: inline">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-error btn-sm normal-case"
      onclick="return confirm('Delete id = {{ $task->id }} ?')">Delete</button>
      </form>
      @endif
      </div>
      </div>
    </li>
    @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $tasks->links() }}
  @endif
</div>