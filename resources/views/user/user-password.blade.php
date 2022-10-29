@extends('layouts.frontend-master')

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Login</>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    @include('user.inc.sidebar')
                </div>
                <div class="col-sm-9">

                    <div class="card">
                        <h3 class="text-center">H!..
                            <strong>{{ Auth::user()->name }}</strong>
                        </h3>
                        <div class="card-body">

                            <form action="{{ route('update.password') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Old Password</label>
                                    <input type="password" name="old_password"
                                        class="form-control @error('old_password') is-invalid @enderror">
                                    @error('old_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">New Password</label>
                                    <input type="password" name="new_password"
                                        class="form-control @error('new_password') is-invalid @enderror">
                                    @error('new_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">confirm Password</label>
                                    <input type="password" name="password_confirmation"
                                        class="form-control @error('password_confirmation') is-invalid @enderror">
                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Update Password</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
