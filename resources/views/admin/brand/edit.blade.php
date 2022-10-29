@extends('layouts.admin-master')
@section('brands')
    active
@endsection

@section('admin_content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Laundry System</a>
            <span class="breadcrumb-item active">Brand List</span>
        </nav>

        <div class="sl-pagebody">
            <div class="row row-sm">
                <div class="card p-3">
                    <h6 class="card-header card-body-title m-0">Add New Brand</h6>
                    <div class="card-body">
                        <form action="{{ route('brand.update') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="old_image" value="{{ $brand->brand_image }}">
                            <input type="hidden" name="id" value="{{ $brand->id }}">

                            <div class="form-group">
                                <label for="">Brand Name English</label>
                                <input type="text" name="brand_name_en" class="form-control"
                                    value="{{ $brand->brand_name_en }}">
                                @error('brand_name_en')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Brand Name Bangla</label>
                                <input type="text" name="brand_name_bn" class="form-control"
                                    value="{{ $brand->brand_name_bn }}">
                                @error('brand_name_bn')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Brand Image</label>
                                <input type="file" name="brand_image" class="form-control">
                                @error('brand_image')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- row -->
        </div>
    </div>
@endsection
