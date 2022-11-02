@extends('layouts.admin-master')
@section('products')
    active
@endsection

@section('admin_content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Laundry System</a>
            <span class="breadcrumb-item active">Update Product</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card p-3">
                <h6 class="card-header card-body-title m-0">Update Product</h6>
                <div class="card-body">
                    <form action="{{ route('update-product') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <div class="row row-sm">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Select Brand</label>
                                    <select class="form-control select2-show-search" name="brand_id"
                                        data-placeholder="Choose one (with searchbox)">
                                        <option label="Choose one"></option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}"
                                                {{ $brand->id == $product->brand_id ? 'selected' : '' }}>
                                                {{ ucwords($brand->brand_name_en) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Select Category</label>
                                    <select class="form-control select2-show-search" name="category_id"
                                        data-placeholder="Choose one (with searchbox)">
                                        <option label="Choose one"></option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                {{ ucwords($category->category_name_en) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Select SubCategory</label>
                                    <select class="form-control select2-show-search" name="subcategory_id"
                                        data-placeholder="Choose one (with searchbox)">
                                        <option label="Choose one"></option>
                                    </select>
                                    @error('subcategory_id')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Select Child</label>
                                    <select class="form-control select2-show-search" name="childcategory_id"
                                        data-placeholder="Choose one (with searchbox)">
                                        <option label="Choose one"></option>
                                    </select>
                                    @error('childcategory_id')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Product Name English</label>
                                    <input type="text" name="product_name_en" class="form-control"
                                        value="{{ $product->product_name_en }}">
                                    @error('product_name_en')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Product Name Bangla</label>
                                    <input type="text" name="product_name_bn" class="form-control"
                                        value="{{ $product->product_name_bn }}">
                                    @error('product_name_bn')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Product Code</label>
                                    <input type="text" name="product_code" class="form-control"
                                        value="{{ $product->product_code }}">
                                    @error('product_code')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Product Quantity</label>
                                    <input type="text" name="product_qty" class="form-control"
                                        value="{{ $product->product_qty }}">
                                    @error('product_qty')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Product Tags English</label>
                                    <input type="text" name="product_tags_en" class="form-control" data-role="tagsinput"
                                        value="{{ $product->product_tags_en }}">
                                    @error('product_tags_en')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Product Tags Bangla</label>
                                    <input type="text" name="product_tags_bn" class="form-control" data-role="tagsinput"
                                        value="{{ $product->product_tags_bn }}">
                                    @error('product_tags_bn')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Product Size English</label>
                                    <input type="text" name="product_size_en" class="form-control"
                                        data-role="tagsinput" value="{{ $product->product_tags_en }}">
                                    @error('product_size_en')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Product Size Bangla</label>
                                    <input type="text" name="product_size_bn" class="form-control"
                                        data-role="tagsinput" value="{{ $product->product_size_bn }}">
                                    @error('product_size_bn')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Product Color English</label>
                                    <input type="text" name="product_color_en" class="form-control"
                                        data-role="tagsinput" value="{{ $product->product_color_en }}">
                                    @error('product_color_en')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Product Color Bangla</label>
                                    <input type="text" name="product_color_bn" data-role="tagsinput"
                                        data-role="tagsinput" class="form-control"
                                        value="{{ $product->product_color_bn }}">
                                    @error('product_color_bn')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Selling Price</label>
                                    <input type="text" name="selling_price" class="form-control"
                                        value="{{ $product->selling_price }}">
                                    @error('selling_price')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Discount Price</label>
                                    <input type="text" name="discount_price" class="form-control"
                                        value="{{ $product->discount_price }}">
                                    @error('discount_price')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Main Thumbnail</label>
                                    <input type="file" name="product_thumbnail" class="form-control"
                                        value="{{ $product->product_thumbnail }}">
                                    @error('product_thumbnail')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Multiple Image</label>
                                    <input type="file" name="multi_img[]" class="form-control" multiple
                                        id="multiImage">
                                    @error('multi_img')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="row" id="preview_image"></div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Short Description</label>
                                    <textarea name="short_description_en" id="summernote" cols="30" rows="10">{{ $product->short_description_en }}</textarea>
                                    @error('short_description_en')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Short Description</label>
                                    <textarea name="short_description_bn" id="summernote2" cols="30" rows="10">{{ $product->short_description_bn }}</textarea>
                                    @error('short_description_bn')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Long Description</label>
                                    <textarea name="long_description_en" id="summernote3" cols="30" rows="10">{{ $product->short_description_bn }}</textarea>
                                    @error('long_description_en')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Long Description</label>
                                    <textarea name="long_description_bn" id="summernote4" cols="30" rows="10">{{ $product->long_description_bn }}</textarea>
                                    @error('long_description_bn')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="" class="ckbox"> </label>
                                    <input type="checkbox" name="hot_deals" value="1"
                                        {{ $product->hot_deals == 1 ? 'checked' : '' }}>
                                    <span>Hot
                                        Deals</span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="" class="ckbox"> </label>
                                    <input type="checkbox" name="featured" value="1"
                                        {{ $product->featured == 1 ? 'checked' : '' }}> <span>Featured</span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="" class="ckbox"> </label>
                                    <input type="checkbox" name="special_offer" value="1"
                                        {{ $product->special_offer == 1 ? 'checked' : '' }}> <span>Special
                                        Offers</span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="" class="ckbox"> </label>
                                    <input type="checkbox" name="special_deals" value="1"
                                        {{ $product->special_deals == 1 ? 'checked' : '' }}> <span>Special
                                        Deals</span>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- row -->
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
                            $('select[name="childcategory_id"]').html();
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name=subcategory_id]')
                                    .append('<option value="' + value.id + '">' + value
                                        .subcategory_name_en + '</option>')
                            });
                        },
                    });
                } else {
                    alert('fail')
                }
            });
            $('select[name="subcategory_id"]').on('change', function() {
                var subcategory_id = $(this).val();
                if (subcategory_id) {
                    $.ajax({
                        url: "{{ url('/admin/childcategory/ajax') }}/" + subcategory_id,
                        type: 'get',
                        dataType: 'json',
                        success: function(data) {
                            var d = $('select[name="childcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name=childcategory_id]')
                                    .append('<option value="' + value.id + '">' + value
                                        .childcategory_name_en +
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
