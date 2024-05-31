@extends('layout.home')

@section('content')

<section class="text-gray-600 body-font">
  <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
    <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Toリスト管理アプリ
        
      </h1>
      <p class="mb-8 leading-relaxed">こちらのアプリでは、to-doタスクを
        フォルダ分けすることができ、趣味、プライベート、仕事ごとの<to>を管理することができます。また、google-calenderとの接続でアプリからtodoタスクを管理することができます</to>
        <do></do>
      </p>
      <div class="flex justify-center">
        @if (Route::has('login'))
        
            @auth
                <a href="{{ route('posts.mypage') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"><button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">始める</button></a>
            @else
                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"> <button class="ml-4 inline-flex text-white bg-indigo-500  border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">ログインする</button></a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"><button class="ml-4 inline-flex text-white bg-indigo-500  border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">会員登録する</button></a>
                @endif
            @endauth
      
        @endif
   
      </div>
    </div>

    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
      <img class="object-cover object-center rounded" alt="hero" src="{{ Storage::url('images/home-img.png') }}">
    </div>

  </div>
</section>


@endsection