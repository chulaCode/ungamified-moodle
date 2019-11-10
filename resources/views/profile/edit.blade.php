@extends('layouts.app')

@section('content')
<div class="container">
 <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="post">
              @csrf
               @method('PATCH')

        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h1>Edit Profile</h1>
                </div>
                <div class="form-group row">
                    <label for="Username" class="col-md-4 col-form-label">Profile name</label>
                    <!--old pre fills what ever is in that field -->
                    <input id="username"
                           type="text"
                           class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                           name="username"
                           value="{{ old('username')  ?? $user->username }}"
                           autocomplete="username" autofocus>

                    @if ($errors->has('username'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                    <div class="row">
                    <label for="image" class="col-md-4 col-form-label ">Profile Image</label>

                    <input type="file" class="form-control-file ml-3" id="image" name="image">

                    @if ($errors->has('image'))
                        <strong>{{ $errors->first('image') }}</strong>
                    @endif
                </div>
                </div>
                <div class="row pt-4">
                    <button class="btn btn-primary">Save Profile</button>
                </div>

            </div>
        </div>
    </form>
</div>

@endsection
