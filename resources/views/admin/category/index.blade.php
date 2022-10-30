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
                <div class="col-sm-8">
                    <div class="card pd-20 pd-sm-40">
                        <h6 class="card-body-title">All Brands List</h6>

                        <div class="table-wrapper">
                            <table id="datatable1" class="table display responsive nowrap">
                                <thead>
                                    <tr>
                                        <th class="wd-20p">Category Icon</th>
                                        <th class="wd-30p">Category Name English</th>
                                        <th class="wd-30p">Category Name Bangla</th>
                                        <th class="wd-20p">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $item)
                                        <tr>
                                            <td><span><i class="{{ $item->category_icon }}"></i></span></td>
                                            <td>{{ $item->category_name_en }}</td>
                                            <td>{{ $item->category_name_bn }}</td>
                                            <td>
                                                <a href="{{ route('category.edit', $item->id) }}"
                                                    class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('category.destroy', $item->id) }}"
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
                        <h6 class="card-header card-body-title m-0">Add New Brand</h6>
                        <div class="card-body">
                            <form action="{{ route('category.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Category Name English</label>
                                    <input type="text" name="category_name_en" class="form-control"
                                        value="{{ old('category_name_en') }}" placeholder="Enter Category Name">
                                    @error('category_name_en')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Category Name Bangla</label>
                                    <input type="text" name="category_name_bn" class="form-control"
                                        value="{{ old('category_name_bn') }}" placeholder="Enter Category Name">
                                    @error('category_name_bn')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Category Icon</label>
                                    <input type="text" name="category_icon" class="form-control"
                                        placeholder="Enter Category Icon">
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
            </div>
            <!-- row -->
        </div>
    </div>
@endsection
