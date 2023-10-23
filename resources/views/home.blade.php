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
                      <div class="post-content d-flex justify-content-center m-10">
                        <img src="images/Login-bg.png" class="img-thumbnail" alt="...">
                      </div>
                      <div class="postFooter p-2">
                        <div class="d-flex"></div>
                        <p class="fs-5">
                            This is Caption Field
                        </p>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
