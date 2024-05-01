@extends('portal.master')

@section('title', 'Change Password')

@section('content')

    <h1 class="text-center">Change Password</h1>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    {{--                    <div class="card-header text-center">Login to Admin/User Panel</div>--}}

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif


                        <form action="{{route('auth.update.password')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="current_password">Current Password</label>
                                <input type="password"
                                       class="form-control @error('current_password') is-invalid @enderror"
                                       id="current_password" name="current_password">
                                @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                       id="password" name="password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                       name="password_confirmation">
                            </div>

                            <div style="text-align: center;">
                                <button type="submit" class="btn btn-primary">Change Password</button>
                                <button type="reset" class="btn btn-dark">Clear</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
