@extends('layouts.app')

@section('content')
{{-- @foreach ($posts as $post) --}}

<div class="container d-block p-2">
    <div class="post-container">
        <div class="row justify-content-center">
            <div class="col-8">
                @forelse ($posts as $post)
                    <div class="card mb-4">
                        <div class="Header p-3">
                            <div class="d-flex Profile align-middl">
                                <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle profile-img" alt="">
                                <div class="fw-bolder p-2">
                                    <a style="text-decoration: none; color: #000;" href="/{{$post->user->id}}/profile">
                                        {{ $post->user->name }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="post-Content col-12 p-0" id="post-{{ $post->id}}">
                                    <div class="photo d-flex justify-content-center">
                                        <img src="/storage/{{ $post->image }}" class="img-fluid">
                                    </div>
                                    <div class="postFooter">
                                        <div class="d-flex justify-content-between align-items-center p-3">
                                            <p class="fs-6 m-0">
                                                {{ $post->caption }}
                                            </p>
                                            <div class="d-flex justify-content-evenly align-items-center details">
                                            @if (auth()->check())
                                                @php
                                                    $userLiked = auth()->user()->likes->contains($post->id);
                                                @endphp

                                                <a href="/{{ $post->id }}/like#post-{{ $post->id }}">
                                                    @if ($userLiked)
                                                        <i id="like" onclick="likeBtn(this)" style="color: #b51a00;" class="fa-solid fa-heart fa-2xl p-2"></i>
                                                    @else
                                                        <i id="like" onclick="likeBtn(this)" style="color: #b51a00;" class="fa-regular fa-heart fa-2xl p-2"></i>
                                                    @endif
                                                </a>
                                                <span class="fw-bold me-2">{{ $post->likes()->count() }}</span>
                                            @endif
                                                <i id="comment" onclick="toggleCommentForm(this, {{ $post->id }})" class="fa-regular fa-comment fa-2xl p-2"></i>
                                                <span class="fw-bold me-2">{{ $post->comments()->count() }}</span>
                                                <i class="fa-regular fa-share fa-2xl p-2" style="color: #ecb900;"></i>
                                                <div class="comment-container">
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="m-0"> <!-- Line -->
                                        <form class="p-3" action="/comment/{{ $post->id }}" method="POST" id="commentForm{{ $post->id }}" style="display: none;">
                                            @csrf
                                            <h6 for="comment" class="form-label">Leave a comment on this post</h6>
                                            <div class="mb-3 d-flex">
                                                <input type="text" class="form-control" name="comment">
                                                <button type="submit" class="btn btn-primary ms-2">Comment</button>
                                            </div>
                                        </form>

                                        @foreach ($post->comments as $comment)
                                        <div class="user-comment d-flex pt-3 px-3 align-items-center">
                                            <img src="images/logo.png" class="rounded-circle profile-img me-2" alt="">
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
                        </div>
                    </div>
                @empty
                    <div class="card align-items-center p-5">
                        <h3 class="m-0">Oops! It seems like there was nothing posted yet..</h3>
                    </div>
                @endforelse
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="header fs-5 fw-bold p-3">
                        Suggestions For You
                    </div>
                    {{-- <span class="border-black border-top"></span> --}}
                    @forelse ($userList as $user)
                        <hr class="m-0"> <!-- Line -->
                        <div class="row p-3">
                            <div class="col-6 d-flex align-items-center py-2">
                                    <img src="{{ $user->profile->profileImage() }}" class="rounded-circle profile-img pe-2" alt="">
                                    <a style="text-decoration: none; color: #000;" href="/{{$user->id}}/profile">
                                        {{ $user->name }}
                                    </a>
                            </div>
                            <div class="col-6 d-flex justify-content-end align-items-center">
                                <a class="btn btn-primary" href="/{{$user->id}}/follow">Follow</a>
                            </div>
                        </div>
                        <!-- @if (!$loop->last)
                            <span class="border-black border-bottom border-opacity-25"></span>
                            {{-- Fake --}}
                        @endif -->
                    @empty
                        No Users Available
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @endforeach --}}
    {{-- <script src="../../js/home.js"></script> --}}
    <script>
        // function likeBtn(likeIcon) {
        //     likeIcon.classList.toggle("fa-solid");
        // }
        // function likeBtn() {
        //     let heart = document.getElementById("like");
        //     heart.classList.toggle("fa-solid");
        // }
        function toggleCommentForm(comment, id) {
            let commentForm = document.getElementById("commentForm"+id);
            commentForm.style.display = commentForm.style.display === "none" ? "block" : "none";
        }
    </script>
    </div>
@endsection
