@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="Contents m-10">
                    <div class="Header p-2">
                        <div class="d-flex Profile">
                            <img src="images/logo.png" style="width: 5%" class="rounded-circle" alt="">
                            <div class="fw-bolder p-2">
                                username20007
                            </div>
                            </div>
                    </div>
                      <div style="max-width: 100%" class="container">
                        <div class="postContent">
                            <div class="post-content d-flex justify-content-center m-10">
                            <img src="images/Login-bg.png" class="img-thumbnail img" alt="...">
                          </div>
                          <div class="postFooter p-2">
                            <div class="d-flex justify-content-between">
                                <p class="fs-5">
                                    This is Caption Field
                                </p>
                                <div class="reaction d-flex justify-content-between">
                                    <i id="like" onclick="likeBtn()" style="color: #b51a00" class="fa-regular fa-heart fa-2xl"></i>
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
    {{-- <script src="../../js/home.js"></script> --}}
    <script>
        function likeBtn() {
            let heart = document.getElementById("like");
            heart.classList.toggle("fa-solid");
}

    </script>
</div>
@endsection
