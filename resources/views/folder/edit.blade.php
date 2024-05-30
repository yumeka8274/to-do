@extends('layout.app')

@section('content')

<div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12 ">
    <form  action="{{ route('folder.update', $folder->id) }}" method="POST"  enctype="multipart/form-data">
        @csrf
        @method('post')
    <div class="relative py-3 sm:max-w-xl sm:mx-auto w-full">
        <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
        <div class="max-w-md mx-auto">
            <div class="flex items-center space-x-5">
            
            <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
                <h2 class="leading-relaxed">フォルダ編集</h2>
                
            </div>
            </div>
            <div class="divide-y divide-gray-200">
            <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                

                <div class="flex flex-col">
                <label class="leading-loose">お名前</label>
                <div  class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Event title">{{ $user->name }}</div>
                </div>

                <div class="flex flex-col">
                <label class="leading-loose">タイトル</label>
                <input type="title" id="title" name="title" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" >
                </div>

                

                <div class="flex flex-col">
                <label class="leading-loose">画像のアップロード</label>
                <input type="file" name="image" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Event title">
                </div>



            
            </div>
            <div class="pt-4 flex items-center space-x-4">

            <button class="bg-blue-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none" type="button" onClick="history.back()">戻る</button>

                </button>

                <button class="bg-green-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">更新する</button>
                
            </div>
            </div>
        </div>
        </div>
    </div>
    </form>
    </div>


@endsection