@extends('layouts.app')
@section('content')
<div class="container">


    <div class="row mx-1 justify" style="background: rgba(255, 255, 255, 0.11);
    border-radius: 16px;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(4px);
    -webkit-backdrop-filter: blur(4px);
    border: 1px solid rgba(255, 255, 255, 0.3);" >
        <div class="col-3 p-5">
            <img src="images/logo.png" class="rounded-circle w-100">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3">
                    <div class="h4">Username</div>
                </div>
            </div>



            <div class="d-flex">
                <div class="pe-5"><strong>12</strong> posts</div>
                <div class="pe-5"><strong>222</strong> followers</div>
                <div class="pe-5"><strong>44444</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">Lorem Ipsum</div>
            <div>Bio Lorem</div>
            <div><a href="#">URL</a></div>
        </div>
    </div>

    <div class="row pt-5">
        @foreach ($FakeNum as $fake)
        <div class="col-4 pb-4">
            <a href=" ">
                <img src="images/login-bg.png" class="w-100">
            </a>
        </div>
        @endforeach

        {{-- @foreach($user->posts as $post)

        @endforeach --}}
    </div>
</div>
@endsection

{{-- <div class="container">
    <div class="row">
        <div class="col-3">
            <img src="images/logo.png" class="rounded-circle img w-75" alt="">
        </div>
        <div class="col my-auto">
            <div class="row">
            </div>
            <div class="row">
                <h3 class="p-0 fw-bold">
                    Username
                </h3>
                <button  class="btn btn-primary mw-4">
                    Edit
                </button>
            </div>
            <div class="row">
                <div class="col p-0">Followers 2504</div>
                <div class="col">Following 2202</div>
                <div class="col">Posts 12</div>
            </div>
            <div class="row pt-4">Bio</div>
            <div class="row">Url</div>


        </div>
    </div>
</div> --}}
{{-- <div class="card d-flex mx-5 ">
    <div class="p-4 justify-content-center">
        <img src="images/logo.png" class="rounded-circle img" alt="">
        <h5>
            Username
        </h5>
        <h5>
            UserId
        </h5>
        <h5>
            Bio
        </h5>
    </div>

</div> --}}

