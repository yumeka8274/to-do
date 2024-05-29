<!--フォルダの一覧ページ-->
<!--クリックでフォルダ内のタスク一覧を表示-->


@extends('layout.app')

@section('content')


<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-20">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Todoリスト一覧</h1>
      <a href="{{ route('folders.post') }}">
        <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
          フォルダの新規作成
        </button>
      </a>
      
      
    </div>
    <div class="flex flex-wrap -m-4">

      @foreach($folders as $folder)
      <div class="lg:w-1/3 sm:w-1/2 p-4">
        <div class="absolute bottom-4 right-8 mb-20 mr-24"> <!-- mr-2に変更、mb-0に変更 -->
        </div>

        <a href="{{ route('folder.show', $folder['id'] ) }}">
          <div class="flex relative">
            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center" src="{{ Storage::url($folder->image_at) }}">
            <div class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
              <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">{{ $folder->title }}</h2>
              <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ $folder->title }}</h1>
              <p class="leading-relaxed">Photo booth fam kinfolk cold-pressed sriracha leggings jianbing microdosing tousled waistcoat.</p>
     

              <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white " data-modal-hide="authentication-modal">
              <form action="{{ route('folder.destroy',$folder->id) }}" method='post'>
                @csrf
                @method('delete')
                <input type='submit' value='削除' class="btn btn-danger" onclick='return confirm("フォルダごと削除されますがよろしいですか？");'>
              </form>
              </button>

              <!-- 編集ボタン -->
              <a href="{{ route('posts.edit', ['id' => $folder->id]) }}">
                <button class="flex ml-auto text-white bg-indigo-500 border-0 py-1 px-3 focus:outline-none hover:bg-indigo-600 rounded " style="font-size: 9px; m1-1 mb-1">編集する</button>
              </a>

            </div>
          </div>
        </div>
      </a>

      @endforeach 
      
    </div>
  </div>
</section>


@endsection
