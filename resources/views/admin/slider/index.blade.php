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
                <div class="col-sm-8">
                    <div class="card pd-20 pd-sm-40">
                        <h6 class="card-body-title">All Sliders List</h6>

                        <div class="table-wrapper">
                            <table id="datatable1" class="table display responsive nowrap">
                                <thead>
                                    <tr>
                                        <th class="wd-20p">Image</th>
                                        <th class="wd-20p">Title</th>
                                        <th class="wd-20p">Desctiption</th>
                                        <th class="wd-20p">Active</th>
                                        <th class="wd-20p">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sliders as $item)
                                        <tr>
                                            <td>
                                                <img src="{{ asset($item->image) }}" alt="" width="50px"
                                                    height="50px">
                                            </td>
                                            <td>
                                                @if ($item->title == null)
                                                    <span class="badge badge-pill badge-success">no title found</span>
                                                @else
                                                    {{ $item->title }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->description == null)
                                                    <span class="badge badge-pill badge-success">no description found</span>
                                                @else
                                                    {{ $item->description }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->status == 1)
                                                    <span class="badge badge-pill badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-pill badge-danger">Incctive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('slider.edit', $item->id) }}"
                                                    class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('slider.destroy', $item->id) }}"
                                                    onclick="return confirm('Are You sure to Delete?')"
                                                    class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>

                                                @if ($item->status == 1)
                                                    <a href="{{ route('slider.inactive', $item->id) }}"
                                                        class="btn btn-sm btn-danger" title="inactive"><i
                                                            class="fa fa-arrow-down"></i></a>
                                                @else
                                                    <a href="{{ route('slider.active', $item->id) }}"
                                                        class="btn btn-sm btn-info" title="active"><i
                                                            class="fa fa-arrow-up"></i></a>
                                                @endif
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
                        <h6 class="card-header card-body-title m-0">Add New Slider</h6>
                        <div class="card-body">
                            <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Brand Name English</label>
                                    <input type="text" name="title" class="form-control" value="{{ old('title') }}"
                                        placeholder="Slider Title">

                                </div>
                                <div class="form-group">
                                    <label for="">Brand Name Bangla</label>
                                    <input type="text" name="description" class="form-control"
                                        value="{{ old('description') }}" placeholder="Slider Description">
                                </div>
                                <div class="form-group">
                                    <label for="">Slider Image</label>
                                    <input type="file" name="image" class="form-control">
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
