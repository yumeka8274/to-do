@extends('layout.app')

@section('content')
<div class="mt-10 mb-4">
  <h1 class="text-xl font-semibold">未完了タスク一覧</h1>
</div>

  {{-- <ul class="bg-white rounded-lg shadow divide-y divide-gray-200  mx-auto"> --}}
    <div class="relative overflow-x-auto">
      <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                  <th scope="col" class="px-6 py-3">
                      タスク名
                  </th>
                  <th scope="col" class="px-6 py-3">
                      カテゴリ
                  </th>
                  <th scope="col" class="px-6 py-3">
                      期限日
                  </th>
                  <th scope="col" class="px-6 py-3">
                      作成日
                  </th>
              </tr>
          </thead>

          <tbody>
            @foreach($posts as $post)
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                     {{ $post->title }}
                  </th>
                  <td class="px-6 py-4">
                      {{ $post->folder_name }}
                  </td>
                  <td class="px-6 py-4">
                      {{ $post->deadline }}
                  </td>
                  <td class="px-6 py-4">
                      {{ $post->created_at }}
                  </td>
              </tr>
            @endforeach
              
          </tbody>
      </table>
  </div>


@endsection