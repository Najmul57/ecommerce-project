@extends('layouts.admin-master')
@section('categories')
    active
@endsection
@section('add-category')
    active
@endsection

@section('admin_content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Laundry System</a>
            <span class="breadcrumb-item active">Category List</span>
        </nav>

        <div class="sl-pagebody">
            <div class="row row-sm">
                <div class="card p-3">
                    <h6 class="card-header card-body-title m-0">Add New Category</h6>
                    <div class="card-body">
                        <form action="{{ route('category.update') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $category->id }}">

                            <div class="form-group">
                                <label for="">Category Name English</label>
                                <input type="text" name="category_name_en" class="form-control"
                                    value="{{ $category->category_name_en }}">
                                @error('category_name_en')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Category Name Bangla</label>
                                <input type="text" name="category_name_bn" class="form-control"
                                    value="{{ $category->category_name_bn }}">
                                @error('category_name_bn')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Category Icon</label>
                                <input type="text" name="category_icon" class="form-control"
                                    value="{{ $category->category_icon }}">
                                @error('category_icon')
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
