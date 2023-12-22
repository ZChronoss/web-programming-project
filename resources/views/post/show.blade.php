@extends('layouts.app')
@section('content')
{{-- <div class="row pt-5">
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
</div> --}}

<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" class="w-100" alt="">
        </div>

        <div class="col-4">
            <div class="d-flex align-items-center">
                <div class="pe-3">
                    <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle w-100" style="max-width: 50px;" alt="">
                </div>
                <div>
                    <div class="fw-bold">
                        <a style="text-decoration: none;" href="/{{ $post->user->id }}/profile/">
                            <span class="text-dark">
                                {{ $post->user->name }}
                            </span>
                        </a>
                        <a href="#" class="ps-3" style="text-decoration: none;">{{ __('Follow') }}</a>
                    </div>
                </div>
            </div>

            <hr>
            <p>
                {{ $post->caption }}
            </p>
            <hr>
            @foreach ($post->comments as $comment)
            <div class="user-comment d-flex pb-3 px-3 align-items-center">
                <img src="images/logo.png" class="rounded-circle profile-img me-2">
                <div class="p-2">
                    <a style="text-decoration: none; color: #000;" href="/{{$comment->user->id}}/profile">
                        <b>{{ $comment->user->name }}</b>
                    </a>
                    <div class="comment-list">
                        {{ $comment->comment }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
