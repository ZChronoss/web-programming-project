@extends('layouts.app')

@section('content')
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Post') }}
                    </div>
                    <div class="card-body mt-25">
                        <form method="POST" enctype="multipart/form-data" action="/post/store">
                            @csrf

                            <div class="row mb-3">
                                <label for="caption" class="col-md-4 col-form-label text-md-end">Caption</label>

                                <div class="col-md-6">
                                    <input id="caption" type="text" class="form-control" name="caption" autofocus>

                                    @error('caption')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image" class="col-md-4 col-form-label text-md-end">Post Image</label>
                                <input type="file" class="form-control-file" id="image" name="image">

                                @error('image')
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn md-3 btn-primary">
                                        Create Post!
                                    </button>
                                    {{-- <span>Don’t have an account?
                                        <a href="">Create Account</a>
                                    </span> --}}
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
