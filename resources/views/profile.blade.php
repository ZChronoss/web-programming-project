@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
            <img src="images/logo.png" class="rounded-circle img w-75" alt="">
        </div>
        <div class="col my-auto">
            <div class="row">
                {{-- <button>
                    Edit
                </button> --}}
            </div>
            <div class="row">
                <h3 class="p-0 fw-bold">
                    Username
                </h3>
            </div>
            <div class="row">
                <div class="col p-0">Followers 2504</div>
                <div class="col">Following 2202</div>
                <div class="col">Posts 12</div>
            </div>
            <div class="row">Bio</div>
            <div class="row">Url</div>
        </div>
    </div>
</div>
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
@endsection
