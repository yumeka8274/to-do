@extends('layout.app')

@section('content')

<section class="mt-500">

  <div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
  
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    タスク名
                </th>
                <th scope="col" class="px-6 py-3">
                    詳細
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
                  <div class="flex">
                    {{ $post->title }}
  
                    <form action="{{ route('posts.updateFlag', $post->id) }}" method="POST">
                     @csrf
                     @method('PATCH')
                     <label class="inline-flex items-center cursor-pointer">
                       <input type="checkbox" name="flag" value="" class="sr-only peer" onchange="updateFlag({{ $post->id }}, this.checked)" {{ $post->flag ? 'checked' : '' }} >
                       <div class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 ml-5"></div>
                       <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">完了</span>
                     </label>
                   </form>
  
                   <a href="{{ route('posts.edit', ['id' => $folder->id]) }}">
                    <button class="flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded ml-5">編集</button>
                  </a>
  
                  <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="flex text-white bg-red-600 border-0 py-2 px-6 focus:outline-none hover:bg-red-700 rounded ml-5" onclick='return confirm("ページを本当に削除しますか？");'>削除</button>
                  </form>
  
  
  
                  </div>
                 
                </th>
                <td class="px-6 py-4">
                 {{ $post->body }}
  
  
                    
                </td>
                <td class="px-6 py-4">
                    {{ $post->deadline }}
                </td>
                <td class="px-6 py-4">
                    {{ $post->created_at->format('Y年m月d日') }}
                </td>
            </tr>
          @endforeach
            
        </tbody>
    </table>
  </div>

</section>






{{-- <style>
  .relative {
    position: relative; 
  }
  
  .absolute {
    position: absolute; 
    top: 10px; 
    left: 10px;
  }
  
  .flex {
    display: flex;
  }
  
  .space-x-2 > * + * {
    margin-left: 0.5rem; 
  }
</style> --}}

<script>
    function updateFlag(postId, checked) {
        fetch(`/posts/${postId}/flag`, {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ flag: checked })
        })
        .then(response => {
            if (response.ok) {
                console.log('Flag updated successfully.');
            } else {
                console.error('Failed to update flag.');
            }
        })
        .catch(error => {
            console.error('An error occurred:', error);
        });
    }
</script>


@endsection
