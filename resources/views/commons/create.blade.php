@extends('layouts.app')

@section('content')

    <div class="prose ml-4">
        <h2 class="text-lg">タスク新規作成ページ</h2>
    </div>

    <div class="flex justify-center">
        <form method="POST" action="{{ route('commons.store') }}" class="w-1/2">
            @csrf

                <div class="form-control my-4">
                    <label for="content" class="label">
                        <span class="label-text">タスク名:</span>
                    </label>
                    <input type="text" name="name" class="input input-bordered w-full">
                </div>
                <div class="form-control my-4">
                    <label for="content" class="label">
                        <span class="label-text">タスク内容:</span>
                    </label>
                    <input type="text" name="content" class="input input-bordered w-full">
                </div>
                <div class="form-control my-4">
                    <label for="content" class="label">
                        <span class="label-text">タスク状態：</span>
                    </label>
                    <input type="text" name="status" class="input input-bordered w-full">
                </div>

            <button type="submit" class="btn btn-primary btn-outline">確定</button>
        </form>
    </div>

@endsection