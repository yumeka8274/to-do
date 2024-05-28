@extends('layout.app')

@section('content')

@foreach($posts as $post)
<div>{{ $post->title }}</div>
<div>{{ $post->body }}</div>
@endforeach



@endsection
