@extends('layouts.admin-master')
@section('childcategory')
    active
@endsection

@section('admin_content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Laundry System</a>
            <span class="breadcrumb-item active">Child Category List</span>
        </nav>
        <div class="sl-pagebody">
            <div class="row row-sm">
                <div class="col-sm-8">
                    <div class="card pd-20 pd-sm-40">
                        <h6 class="card-body-title">All Childcategory List</h6>
                        <div class="table-wrapper">
                            <table id="datatable1" class="table display responsive nowrap">
                                <thead>
                                    <tr>
                                        <th class="wd-20p">Category Name</th>
                                        <th class="wd-30p">Sub Category Name</th>
                                        <th class="wd-30p">ChildCategory Name en</th>
                                        <th class="wd-20p">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($childcategories as $item)
                                        <tr>
                                            <td>{{ $item->category->category_name_en ?? 'no category' }}</td>
                                            <td>{{ $item->subcategory->subcategory_name_en ?? 'no subcategory' }}</td>
                                            <td>{{ $item->childcategory_name_en }}</td>
                                            <td>
                                                <a href="{{ route('childcategory.edit', $item->id) }}"
                                                    class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('childcategory.destroy', $item->id) }}"
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
                            <form action="{{ route('childcategory.store') }}" method="post">
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
                                    <label for="">Select Category</label>
                                    <select class="form-control select2-show-search" name="subcategory_id"
                                        data-placeholder="Choose one (with searchbox)">
                                        <option label="Choose one"></option>

                                    </select>
                                    @error('subcategory_id')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">ChildCategory Name English</label>
                                    <input type="text" name="childcategory_name_en" class="form-control"
                                        value="{{ old('childcategory_name_en') }}" placeholder="Enter ChildCategory Name">
                                    @error('childcategory_name_en')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">ChildCategory Name Bangla</label>
                                    <input type="text" name="childcategory_name_bn" class="form-control"
                                        value="{{ old('childcategory_name_bn') }}" placeholder="Enter ChildCategory Name">
                                    @error('childcategory_name_bn')
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

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/admin/subcategory/ajax') }}/" + category_id,
                        type: 'get',
                        dataType: 'json',
                        success: function(data) {
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name=subcategory_id]')
                                    .append('<option value="' + value.id + '">' + value
                                        .subcategory_name_en +
                                        '</option>')
                            });
                        },
                    });
                } else {
                    alert('fail')
                }
            });
        });
    </script>
@endsection
