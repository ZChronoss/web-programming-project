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
    <div class="row" style="background: rgba(255, 255, 255, 0.25);
    border-radius: 16px;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(4px);
    -webkit-backdrop-filter: blur(4px);
    border: 5px solid rgba(255, 255, 255, 0.3);">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" class="w-100" alt="">
            <div class="d-flex justify-content-end align-items-center details py-4">
                <a href="/{{ $post->id }}/like#post-{{ $post->id }}">
                    @if ($userLiked)
                        <i id="like" onclick="likeBtn(this)" style="color: #b51a00;" class="fa-solid fa-heart fa-2xl p-2"></i>
                    @else
                        <i id="like" onclick="likeBtn(this)" style="color: #b51a00;" class="fa-regular fa-heart fa-2xl p-2"></i>
                    @endif
                </a>
                <span class="fw-bold me-2">{{ $post->likes()->count() }}</span>
                <i id="comment" onclick="toggleCommentForm(this, {{ $post->id }})" class="fa-regular fa-comment fa-2xl p-2"></i>
                <span class="fw-bold me-2">{{ $post->comments()->count() }}</span>
                <i class="fa-regular fa-share fa-2xl p-2" style="color: #ecb900;"></i>
                <div class="comment-container">
                </div>
            </div>
        </div>
        <div class="col-4 mt-3">
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
                        @if(!$follows)
                            <a class="btn btn-primary mx-3" href="/{{$post->user->id}}/follow">{{ __('Follow') }}</a>
                        @else
                            <a class="btn btn-primary mx-3" href="/{{$post->user->id}}/unfollow">{{ __('Unfollow') }}</a>
                        @endif
                        <!-- <a href="/{{$post->user->id}}/follow" class="ps-3" style="text-decoration: none;">{{ __('Follow') }}</a> -->
                    </div>
                </div>
                
            </div>
            <hr>
            <p>
                {{ $post->caption }}
            </p>
            <hr>
            <form class="p-3 pt-0" action="/comment/{{ $post->id }}" method="POST" id="commentForm{{ $post->id }}" style="display: none;">
                                            @csrf
                                            <h6 for="comment" class="form-label">{{ __('Leave a comment on this post') }}</h6>
                                            <div class="mb-3 d-flex">
                                                <input type="text" class="form-control" name="comment">
                                                <button type="submit" class="btn btn-primary ms-2">{{ __('Comment') }}</button>
                                            </div>
                                        </form>
            @foreach ($post->comments as $comment)
            <div class="user-comment d-flex pb-3 px-3 align-items-center">
                <img src="{{ $comment->user->profile->profileImage() }}" class="rounded-circle profile-img me-2">
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
<script>
        function toggleCommentForm(comment, id) {
            let commentForm = document.getElementById("commentForm"+id);
            commentForm.style.display = commentForm.style.display === "none" ? "block" : "none";
        }
    </script>
@endsection
