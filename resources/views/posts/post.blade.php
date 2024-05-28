@extends('layout.app')

@section('content')

{{-- <section class="text-gray-600 body-font">
  <form  action="{{ route('posts.store') }}" method="POST">
    @csrf
  <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
    
    <div class="lg:w-2/6 md:w-1/2 bg-gray-100 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0">
      <h2 class="text-gray-900 text-lg font-medium title-font mb-5">todo 作成</h2>


      <div class="relative mb-4">
        <label for="full-name" class="leading-7 text-sm text-gray-600">Full Name</label>
        <input type="text" id="full-name" name="full-name" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" value="{{ $user->name }}">
      </div>


      <div class="relative mb-4">
        <label for="title" class="leading-7 text-sm text-gray-600">タイトル</label>
        <input type="title" id="title" name="title" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>



      <div class="relative mb-4">
        <label for="body" class="leading-7 text-sm text-gray-600">本文</label>
        <input type="body" id="body" name="body" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>Ω



      <button class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Button</button>
      <p class="text-xs text-gray-500 mt-3">Literally you probably haven't heard of them jean shorts.</p>
    </div>
  </div>
</form>
</section> --}}


<!-- component -->
<!--
  UI Design Prototype
  Link : https://dribbble.com/shots/10452538-React-UI-Components
-->
<div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12 ">
  <form  action="{{ route('posts.store') }}" method="POST"  enctype="multipart/form-data">
    @csrf

  <div class="relative py-3 sm:max-w-xl sm:mx-auto w-full">
    <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
      <div class="max-w-md mx-auto">
        <div class="flex items-center space-x-5">
          
          <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
            <h2 class="leading-relaxed">To do 作成</h2>
            
          </div>
        </div>

        @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
            <li class="text-red-600">{{$error}}</li>
            @endforeach
          </ul>
        </div>
        @endif
      

        <div class="divide-y divide-gray-200">
          <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">

            

            <div class="flex flex-col">
              <label class="leading-loose">お名前</label>
              <div  class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Event title">{{ $user->name }}</div>
            </div>

            <div class="flex flex-col">
              <label class="leading-loose">タイトル</label>
              <input type="title" id="title" name="title" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" value="{{ old('title') }}">
            </div>

            <div class="flex flex-col">
              <label class="leading-loose">本文</label>
              <input type="body" id="body" name="body" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600 h-300" value="{{ old('body') }}">
            </div>

            <div class="flex flex-col">
              <label class="leading-loose">画像のアップロード</label>
              <input type="file" name="image" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Event title">
            </div>



            <div class="flex items-center space-x-4">
              
              <div class="flex flex-col">
                <label class="leading-loose">期限日</label>
                <div class="relative focus-within:text-gray-600 text-gray-400">
                  <input type="text" class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="26/02/2020">
                  <div class="absolute left-3 top-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                  </div>
                </div>
              </div>
            </div>
            <div class="flex flex-col">
              <label class="leading-loose">Event Description</label>
              <input type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" >
            </div>
          </div>
          <div class="pt-4 flex items-center space-x-4">

              <button class="flex justify-center items-center w-full text-gray-900 px-4 py-3 rounded-md focus:outline-none">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> 
              </button>

              <button class="bg-blue-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">作成する</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
</div>


@endsection