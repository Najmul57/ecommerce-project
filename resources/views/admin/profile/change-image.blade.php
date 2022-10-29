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
                            <form action="{{ route('admin.image.update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_image" value="{{ Auth::user()->image }}">
                                <div class="form-group">
                                    <label for="">Change Profile</label>
                                    <input type="file" name="image" class="form-control">
                                    @error('email')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Updated Profile</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
