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

                            <form action="{{ route('update.image') }}" method="post" enctype="multipart/form-data">
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
