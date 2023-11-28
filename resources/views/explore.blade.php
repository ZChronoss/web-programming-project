@extends('layouts.app')

@section('content')
    <div class="container d-block p-2 ">
        <div class="post-container">
            <div class="row justify-content-center">
                <div class="col-sm-8 col-12">
                    <div class="card">
                        <div class="Contents ">
                            <div class="Header p-2">
                                <div class="d-flex Profile align-middle">
                                    <img src="images/logo.png" class="rounded-circle profile-img" alt="">
                                    <div class="fw-bolder p-2">
                                        <a style="text-decoration: none; color: #000;" href="#">
                                            username20007
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div style="max-width: 100%" class="container">
                                <div class="row">
                                    <div class="post-Content col-12">
                                        <div class="photo d-flex justify-content-center">
                                            <img src="images/Login-bg.png" class="img-fluid img w-100" alt="...">
                                        </div>
                                        <div class="postFooter p-2 mt-3">
                                            <div class="d-flex justify-content-between">
                                                <p class="fs-5">
                                                    This is Caption Field
                                                </p>
                                                <div class="d-flex justify-content-evenly details">
                                                    <i id="like" onclick="likeBtn()" style="color: #b51a00"
                                                        class="fa-regular fa-heart fa-2xl p-2"></i>
                                                    <i class="fa-regular fa-comment fa-2xl p-2"></i>
                                                    <i id="comment" onclick="toggleCommentForm()"
                                                        class="fa-regular fa-comment fa-2xl p-2"></i>
                                                    <i class="fa-solid fa-share fa-2xl p-2" style="color: #ecb900;"></i>
                                                    <div class="comment-container">
                                                    </div>
                                                </div>
                                            </div>
                                            <form action="comment" method="POST" id="commentForm" style="display: none;">
                                                @csrf
                                                <label for="exampleInputEmail1" class="form-label">Comment this post</label>
                                                <div class="mb-3 d-flex">

                                                    <input type="email" class="form-control">
                                                    <button type="submit" class="btn btn-primary ms-2">Comment</button>
                                                </div>

                                            </form>
                                            <div class="user-comment d-flex p-2 col-12">
                                                <img src="images/logo.png" class="rounded-circle profile-img"
                                                    alt="">
                                                <div class="p-2">
                                                    <a style="text-decoration: none; color: #000;" href="#">
                                                        username20007
                                                    </a>
                                                    <div class="comment-list">
                                                        Wow keren amat kucingnya
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card p-2 ">
                        <div class="header fs-5 mb-2 fw-bold px-2">
                            Suggestions For You
                            {{-- <span class="border-black border-top"></span> --}}
                            @foreach ($userList as $user)
                                <div class="row my-2">
                                    <div class="col-6 d-flex align-items-center px-4">
                                        <img src="images/logo.png" class="rounded-circle profile-img" alt="">
                                        <div class="px-2">{{ $user->name }}</div>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end align-items-center">
                                        <form action="/user/follow/{{ $user->id }}" method="POST">
                                            @csrf
                                            <a class="btn btn-primary" href="">Follow</a>
                                        </form>
                                    </div>
                                </div>
                                @if (!$loop->last)
                                    <span class="border-black border-bottom border-opacity-25"></span>
                                    {{-- Fake --}}
                                @endif
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <script src="../../js/home.js"></script> --}}
        <script>
            function likeBtn() {
                let heart = document.getElementById("like");
                heart.classList.toggle("fa-solid");
            }

            function toggleCommentForm() {
                let commentForm = document.getElementById("commentForm");
                commentForm.style.display = commentForm.style.display === "none" ? "block" : "none";
            }
        </script>
    </div>
@endsection
