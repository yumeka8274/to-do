@extends('layout.app')

@section('content')


    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -m-4 bg-white-900">
                
                <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{ Storage::url($post->image_at)}}" alt="blog">
            <div class="p-6">

            <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">CATEGORY</h2>

            <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ $post->title }}</h1>
            
            <p class="leading-relaxed">{{ $post->body }}</p>
            
            <div class="flex">
                


                <a href="{{ route('posts.mypage') }}">
                    <button class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">一覧に戻る</button>
                </a>
                



                <a href="{{ route('posts.edit', ['id' => $post->id]) }}">
                    <button class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded ml-8">編集する</button>
                </a>
                
            </div>
            </div>

    </div>
    </div>
 </section>









@endsection

