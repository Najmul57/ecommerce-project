@extends('layouts.admin-master')

@section('admin_content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Laundry System</a>
            <span class="breadcrumb-item active">Profile</span>
        </nav>

        <div class="sl-pagebody">

            <div class="row">
                <div class="col-sm-3">
                    @include('admin.profile.inc.sidebar')
                </div>
                <div class="col-sm-9">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.update.password') }}" method="post">
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
