@extends('layouts.admin-master')
@section('categories')
    active show-sub
@endsection
@section('add-category')
    active
@endsection
@section('sub-category')
    active
@endsection

@section('admin_content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Laundry System</a>
            <span class="breadcrumb-item active">Sub Category List</span>
        </nav>

        <div class="sl-pagebody">
            <div class="row row-sm">
                <div class="col-sm-8">
                    <div class="card pd-20 pd-sm-40">
                        <h6 class="card-body-title">All Subcategory List</h6>

                        <div class="table-wrapper">
                            <table id="datatable1" class="table display responsive nowrap">
                                <thead>
                                    <tr>
                                        <th class="wd-20p">Category Name</th>
                                        <th class="wd-30p">Sub Category Name English</th>
                                        <th class="wd-30p">Sub Category Name Bangla</th>
                                        <th class="wd-20p">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subcategories as $item)
                                        <tr>
                                            <td>{{ $item->category->category_name_en ?? 'no category' }}</td>
                                            <td>{{ $item->subcategory_name_en }}</td>
                                            <td>{{ $item->subcategory_name_bn }}</td>
                                            <td>
                                                <a href="{{ route('subcategory.edit', $item->id) }}"
                                                    class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('subcategory.destroy', $item->id) }}"
                                                    onclick="return confirm('Are You sure to Delete?')"
                                                    class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- table-wrapper -->
                    </div>
                </div>
                <div class="col-sm-4  ">
                    <div class="card p-3">
                        <h6 class="card-header card-body-title m-0">Add New Subcategory</h6>
                        <div class="card-body">
                            <form action="{{ route('subcategory.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Select Category</label>
                                    <select class="form-control select2-show-search" name="category_id"
                                        data-placeholder="Choose one (with searchbox)">
                                        <option label="Choose one"></option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ ucwords($category->category_name_en) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">SubCategory Name English</label>
                                    <input type="text" name="subcategory_name_en" class="form-control"
                                        value="{{ old('subcategory_name_en') }}" placeholder="Enter SubCategory Name">
                                    @error('subcategory_name_en')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">SubCategory Name Bangla</label>
                                    <input type="text" name="subcategory_name_bn" class="form-control"
                                        value="{{ old('subcategory_name_bn') }}" placeholder="Enter SubCategory Name">
                                    @error('subcategory_name_bn')
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
            </div>
            <!-- row -->
        </div>
    </div>
@endsection
