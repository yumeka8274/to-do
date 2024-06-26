@extends('layout.app')

@section('content')

        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto flex flex-wrap">
                
                <div class="p-4 md:w-1/2 h-1/2 " >
                

                
                <img class="lg:h-1000 md:h-100 w-full object-cover object-center" src="{{ Storage::url($post->image_at)}}" alt="blog">
            </div>
            
            <div class="flex flex-col flex-wrap lg:py-6 -mb-10 lg:w-1/2 lg:pl-12 lg:text-left text-center">
                <div class="flex flex-col mb-10 lg:items-start items-center">
                </div>
                <div class="flex-grow">
                    <h2 class="tracking-widest text-2lg title-lg font-2xl text-gray-400 mb-1">TITLE</h2>
                    <h1 class="title-font text-2xl font-2xl text-gray-900 mb-3">{{ $post->title }}</h1>
                    
                        <div class="flex flex-col">
                            <h2 class="tracking-widest text-lg title-font font-lg text-gray-400 mb-1">本文</h2>
                            <p class="body-font text-3xl
                            font-2xl text-gray-900 mb-3">{{ $post->body }}</p>
                        </div>
                    <div class="absolute bottom-4 right-8 mb-20 mr-24"> <!-- mr-2に変更、mb-0に変更 -->
                        <form action="{{ route('posts.destroy',$post->id) }}" method='post'>
                            @csrf
                            @method('delete')
                            <button class="flex ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-800 rounded ml-8 mb-5" onclick='return confirm("ページを本当に削除しますか？");'>削除する</button>
                        </form>
                        
                        <a href="{{ route('posts.edit', ['id' => $post->id]) }}">
                    <button class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded ml-8">編集する</button>
                </a>
                    </div>
                </div>
                </div>
                </div>
            
            
                
                



                

                
                
            </div>
            </div>
        </section>
        
        
        
        
        
        
        
        
@endsection

