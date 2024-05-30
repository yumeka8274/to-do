@extends('layout.app')

@section('content')
<section class="text-gray-600 body-font overflow-hidden">
  <div class="container px-10 py- mx-auto mt-10">
    <div class="-my-8 d ivide-y-2 divide-gray-100">
    @foreach($posts as $post) 
    {{-- このforeach文はpostsというたくさんのpostをまとめたところから一つのpostを取り出すという意味 --}}
      <div class="py-8 flex flex-wrap md:flex-nowrap relative"> 
        <div class="absolute top-0 left-0 flex space-x-2 p-2"> 
        
        
        </div> 
        <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
          <span class="font-semibold title-font text-gray-700">{{ $post->title }}</span>
          <span class="mt-1 text-gray-600 text-sm">{{ $folder->subtitle }}</span>
        </div>
        <div class="md:flex-grow">
          <h2 class="text-2xl font-medium text-gray-900 title-font mb-2">{{ $post->body }}</h2>
          <p class="leading-relaxed">{{ $folder->body }}</p>
        </div>
        <div class="created-time text-small px-10 py- text-gray-400">{{ $folder->created_at->format('Y年m月d日') }}</div>

        <form action="{{ route('posts.updateFlag', $post->id) }}" method="POST">
          @csrf
          @method('PATCH')
          <label class="inline-flex items-center cursor-pointer">
            <input type="checkbox" name="flag" value="" class="sr-only peer" onchange="updateFlag({{ $post->id }}, this.checked)" {{ $post->flag ? 'checked' : '' }} >
            <div class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
            <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">完了</span>
          </label>
        </form>



        <a href="{{ route('posts.edit', ['id' => $folder->id]) }}">
          <button class="flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">編集</button>
        </a>

        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
          @csrf
          @method('delete')
          <button class="flex text-white bg-red-600 border-0 py-2 px-6 focus:outline-none hover:bg-red-700 rounded" onclick='return confirm("ページを本当に削除しますか？");'>削除</button>
        </form>

      </div>
      @endforeach
    </div>
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
