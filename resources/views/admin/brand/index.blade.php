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
                <div class="col-sm-8">
                    <div class="card pd-20 pd-sm-40">
                        <h6 class="card-body-title">All Brands List</h6>

                        <div class="table-wrapper">
                            <table id="datatable1" class="table display responsive nowrap">
                                <thead>
                                    <tr>
                                        <th class="wd-15p">Brand Image</th>
                                        <th class="wd-15p">Brand Name English</th>
                                        <th class="wd-15p">Brand Name Bangla</th>
                                        <th class="wd-20p">Active</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($brands as $item)
                                        <tr>
                                            <td>
                                                <img src="{{ asset($item->brand_image) }}" alt="" width="50px"
                                                    height="50px">
                                            </td>
                                            <td>{{ $item->brand_name_en }}</td>
                                            <td>{{ $item->brand_name_bn }}</td>
                                            <td>
                                                <a href="{{ route('brand.edit', $item->id) }}"
                                                    class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('brand.destroy', $item->id) }}"
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
                            <form action="{{ route('brand.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Brand Name English</label>
                                    <input type="text" name="brand_name_en" class="form-control"
                                        value="{{ old('brand_name_en') }}" placeholder="Enter Brand Name">
                                    @error('brand_name_en')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Brand Name Bangla</label>
                                    <input type="text" name="brand_name_bn" class="form-control"
                                        value="{{ old('brand_name_bn') }}" placeholder="Enter Brand Name">
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
            </div>
            <!-- row -->
        </div>
    </div>
@endsection
