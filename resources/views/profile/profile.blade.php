@extends('layouts.app')
@section('content')
<div class="container p-0">
    <div class="row" style="background: rgba(255, 255, 255, 0.25);
    border-radius: 16px;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(4px);
    -webkit-backdrop-filter: blur(4px);
    border: 5px solid rgba(255, 255, 255, 0.3);"
    >
        <div class="col-3 p-5">
            <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-100">
        </div>
        <div class="col-9 p-5">
            <div class="d-flex justify-content-between align-items-baseline mb-3">
                <div class="d-flex align-items-center">
                    <div class="h4 m-0">{{$user->name}}</div>
                    @cannot('update', $user->profile)
                        @if(!$follows)
                            <a class="btn btn-primary mx-3" href="/{{$user->id}}/follow">Follow</a>
                        @else
                            <a class="btn btn-primary mx-3" href="/{{$user->id}}/unfollow">Unfollow</a>
                        @endif
                    @endcannot
                </div>
                @can('update', $user->profile)
                    <a class="btn btn-primary m-0" href="/post/create">Add New Post</a>
                @endcan
            </div>

            @can('update', $user->profile)
                <a href="/profile/edit">Edit Profile</a>
            @endcan



            <div class="d-flex">
                <div class="pe-5"><strong>{{$postCount}}</strong> posts</div>
                <div class="pe-5"><strong>{{$followersCount}}</strong> followers</div>
                <div class="pe-5"><strong>{{$followingCount}}</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->description }}</div>
        </div>

    <div class="row pt-5">

        @foreach($posts as $post)
            <div class="grid card d-flex justify-content-center align-items-center col-4 mx-3">
                <a href="/post/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-100 g-col-4">
                </a>
            </div>
        @endforeach
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

