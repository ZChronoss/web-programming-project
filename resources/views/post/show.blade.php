@extends('layouts.app')
@section('content')
<div class="row pt-5">
    <div class="card d-flex justify-content-center align-items-center col-4 pb-4 mx-3">
        <img src="{{ $post->user->profile->profileImage() }}" alt="">
        <p>{{ $post->user->name }}</p>
        <img src="/storage/{{ $post->image }}" class="w-100">
        <p>{{ $post->caption }}</p>
        @foreach ($post->comments as $comment)
            <img src="{{ $comment->user->profile->profileImage() }}" alt="">
            <p>{{ $comment->user->name }}</p>
            <p>{{ $comment->comment }}</p>
        @endforeach
    </div>
</div>

@endsection
