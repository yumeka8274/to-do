@extends('layouts.app')

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
                    <h2 class="tracking-widest text-lg title-lg font-lg text-gray-400 mb-1">TITLE</h2>
                    <h1 class="title-font text-5xl font-2xl text-gray-900 mb-3">{{ $post->title }}</h1>
                    
                        <div class="flex flex-col">
                            <h2 class="tracking-widest text-lg title-font font-lg text-gray-400 mb-1">本文</h2>
                            <p class="body-font text-3xl
                            font-2xl text-gray-900 mb-3">{{ $post->body }}</p>
                        </div>
                    <div class="absolute bottom-8 right-16 mb-20 mr-24"> <!-- mr-2に変更、mb-0に変更 -->
                        <form action="{{ route('posts.destroy',$post->id) }}" method='post'>
                            @csrf
                            @method('delete')
                            <input type='submit' value='削除' class="btn btn-danger" onclick='return confirm("ページを本当に削除しますか？");'>
                        </form>
                    </div>
                </div>
                </div>
                </div>
                
                </div>
            </div>
            </div>
        </section>
        
        
        
        
        
        
        
        









@endsection

