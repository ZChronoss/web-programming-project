@extends('layouts.app')

@section('content')
{{-- @foreach ($posts as $post) --}}

<div class="container d-block p-2 ">
    <div class="post-container">
        <div class="row justify-content-center">
            <div class="col-8">
                @foreach ($posts as $post)
                    <div class="card mb-4">
                        <div class="Header p-2">
                            <div class="d-flex Profile align-middl">
                                <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle profile-img" alt="">
                                <div class="fw-bolder p-2">
                                    <a style="text-decoration: none; color: #000;" href="#">
                                        {{ $post->user->name }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="post-Content col-12">
                                    <div class="photo d-flex justify-content-center">
                                        <img src="/storage/{{ $post->image }}" class="img-fluid img w-100" alt="...">
                                    </div>
                                    <div class="postFooter p-2 mt-3 mb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="fs-5 m-0">
                                                {{ $post->caption }}
                                            </p>
                                            <div class="d-flex justify-content-evenly align-items-center details">
                                            @if (auth()->check())
                                                @php
                                                    $userLiked = auth()->user()->likes->contains($post->id);
                                                @endphp

                                                <a href="/{{ $post->id }}/like">
                                                    @if ($userLiked)
                                                        <i id="like" onclick="likeBtn(this)" style="color: #b51a00;" class="fa-solid fa-heart fa-2xl p-2"></i>
                                                    @else
                                                        <i id="like" onclick="likeBtn(this)" style="color: #b51a00;" class="fa-regular fa-heart fa-2xl p-2"></i>
                                                    @endif
                                                </a>
                                            @endif
                                                <i id="comment" onclick="toggleCommentForm(this, {{ $post->id }})" class="fa-regular fa-comment fa-2xl p-2"></i>
                                                <i class="fa-regular fa-share fa-2xl p-2" style="color: #ecb900;"></i>
                                                <div class="comment-container">
                                                </div>
                                            </div>
                                        </div>
                                        <form action="/comment/{{ $post->id }}" method="POST" id="commentForm{{ $post->id }}" style="display: none;">
                                            @csrf
                                            <label for="comment" class="form-label">Comment this post</label>
                                            <div class="mb-3 d-flex">
                                                <input type="text" class="form-control" name="comment">
                                                <button type="submit" class="btn btn-primary ms-2">Comment</button>
                                            </div>

                                        </form>

                                        @foreach ($post->comments as $comment)
                                        <div class="user-comment d-flex p-2 col-12">
                                            <img src="images/logo.png" class="rounded-circle profile-img"
                                                alt="">
                                            <div class="p-2">
                                                <a style="text-decoration: none; color: #000;" href="#">
                                                    {{ $comment->user->name }}
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
                @endforeach
            </div>
            <div class="col-4">
                <div class="card p-2 ">
                    <div class="header fs-5 mb-2 fw-bold px-2">
                        Suggestions For You
                    </div>
                    {{-- <span class="border-black border-top"></span> --}}
                    @forelse ($userList as $user)
                        <div class="row my-2">
                            <div class="col-6 d-flex align-items-center px-4">
                                    <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle profile-img" alt="">
                                    <div class="px-2">{{ $user->name }}</div>
                            </div>
                            <div class="col-6 d-flex justify-content-end align-items-center">
                                <a class="btn btn-primary" href="/{{$user->id}}/follow">Follow</a>
                            </div>
                        </div>
                        @if (!$loop->last)
                            <span class="border-black border-bottom border-opacity-25"></span>
                            {{-- Fake --}}
                        @endif
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
