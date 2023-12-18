@extends('layouts.app')

@section('content')
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="header fs-5 fw-bold p-3">
                        Edit Profile
                    </div>
                    <hr class="m-0"> <!-- Line -->
                    <div class="card-body p-0">
                        <form method="POST" enctype="multipart/form-data" action="/profile/update">
                            @csrf
                            <div class="row p-3">
                                <label for="description" class="fw-bold mb-3 px-3">Description</label>

                                <div class="col px-3">
                                    <input id="description" type="text" class="form-control" name="description" autofocus value="{{ auth()->user()->profile->description }}">

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row p-3">
                                <label for="image" class="fw-bold px-3 mb-3">Profile Image</label>

                                <input type="file" class="form-control-file px-3 mb-3" id="image" name="image">

                                @error('image')
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>

                            <hr class="m-0"> <!-- Line -->

                            <div class="row p-3">
                                <div class="col px-3 d-flex justify-content-end">
                                    <button type="submit" class="btn md-3 btn-primary">
                                        Update Profile
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
