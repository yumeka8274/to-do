@extends('layout.app')

@section('content')

@foreach($posts as $post)

<section class="text-gray-600 body-font overflow-hidden">
    <div class="container px-10 py- mx-auto mt-10">
      <div class="-my-8 divide-y-2 divide-gray-100">
        <div class="py-8 flex flex-wrap md:flex-nowrap">
          <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
            <span class="font-semibold title-font text-gray-700"> </span>
            <span class="mt-1 text-gray-600 text-sm"></span></div>

          <div class="md:flex-grow">
            <h2 class="text-2xl font-medium - text-gray-900 title-font mb-2">{{ $post->title }}</h2>

            <p class="leading-relaxed">{{ $post->body }}</p>
          </div>
          <div class="created-time text-small px-10 py-
          text-gray-400">{{ $post ->created_at->format('Y年m月d日') }}</div>
        </div>
        <div class="py-8 flex flex-wrap md:flex-nowrap">
          <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
          </div>
        </div>
      </div>
    </div>
  </section>
@endforeach



@endsection
