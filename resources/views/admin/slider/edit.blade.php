@extends('layouts.admin-master')
@section('slider')
    active
@endsection

@section('admin_content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Laundry System</a>
            <span class="breadcrumb-item active">Sliders List</span>
        </nav>

        <div class="sl-pagebody">
            <div class="row row-sm">
                <div class="card p-3">
                    <h6 class="card-header card-body-title m-0">Add New Brand</h6>
                    <div class="card-body">
                        <form action="{{ route('slider.update') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="old_image" value="{{ $slider->image }}">
                            <input type="hidden" name="id" value="{{ $slider->id }}">

                            <div class="form-group">
                                <label for="">Slider Title</label>
                                <input type="text" name="title" class="form-control" value="{{ $slider->title }}"
                                    placeholder="Slider Title">

                            </div>
                            <div class="form-group">
                                <label for="">Slider Description</label>
                                <input type="text" name="description" class="form-control"
                                    value="{{ $slider->description }}" placeholder="Slider Description">
                            </div>
                            <div class="form-group">
                                <label for="">Slider Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Old Image</label> <br>
                                <img src="{{ asset($slider->image) }}" alt="slider" width="100%" height="60px">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- row -->
        </div>
    </div>
@endsection
