@extends('layout.app')


@section('content')

<div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12 ">
  <form  action="{{ route('posts.store') }}" method="POST"  enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="flag" value="0">

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

            
            
            <div class="flex flex-col mb-4">
              <label class="leading-loose">フォルダ名</label>
              <select name="folder_id" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                  @foreach($folders as $folder)
                      <option value="{{ $folder->id }}">{{ $folder->title }}</option>
                  @endforeach
              </select>
            </div>

            <div class="flex flex-col">
              <label class="leading-loose">名前</label>
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

           



            <div class="flex items-center space-x-4">
              
              <div class="flex flex-col">
                <label class="leading-loose">期限日</label>
                <div class="relative focus-within:text-gray-600 text-gray-400">
                  <input type="text" id="deadline"  name="deadline" class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="30/05/2024">
                  <div class="absolute left-3 top-2 cursor-pointer" id="calendar-icon">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                  </div>
                </div>
              </div>
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


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Initialize Flatpickr
    const deadlineInput = document.getElementById('deadline');
    const calendarIcon = document.getElementById('calendar-icon');

    const fp = flatpickr(deadlineInput, {
      enableTime: true,
      dateFormat: "Y-m-d H:i",
    });

    // When the calendar icon is clicked, show the calendar
    calendarIcon.addEventListener('click', function() {
      fp.open();
    });
  });
</script>

@endsection