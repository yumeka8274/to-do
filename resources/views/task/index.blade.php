@extends('layout.app')

@section('content')
<div class="mt-10 mb-4">
  <h1 class="text-xl font-semibold">未完了タスク一覧</h1>
</div>
<div class="w-full">
  <ul class="bg-white rounded-lg shadow divide-y divide-gray-200  mx-auto">
   @if ($posts !== '')
    @foreach ($posts as $post)
    <li class="px-6 py-4 ">
        <div class="flex justify-between">
            <span class="font-semibold text-lg">{{ $post->title }}</span>
            <span class="font-semibold text-lg">{{ $post->folder_name }}</span>
            <span class="text-gray-500 text-xs">{{ $post->created_at }}</span>
        </div>
        <p class="text-gray-700">{{ $post->body }}</p>
    </li>
    @endforeach
  </ul>
  @else
   <h2>未完了のタスクはありません</h2>
  @endif
</div>


@endsection