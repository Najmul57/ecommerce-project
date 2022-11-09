@extends('layouts.admin-master')
@section('manage-product')
    active
@endsection

@section('admin_content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Laundry System</a>
            <span class="breadcrumb-item active">Product List</span>
        </nav>

        <div class="sl-pagebody">
            <div class="row row-sm">
                <div class="col-sm-12">
                    <div class="card pd-20 pd-sm-40">
                        <h6 class="card-body-title">All Product List</h6>
                        <div class="table-wrapper">
                            <table id="datatable1" class="table display responsive nowrap">
                                <thead>
                                    <tr>
                                        <th class="wd-15p">Image</th>
                                        <th class="wd-20p">Product Name English</th>
                                        <th class="wd-15p">Product Price</th>
                                        <th class="wd-10p">Product Quantity</th>
                                        <th class="wd-10p">Product Discount</th>
                                        <th class="wd-10p">Status</th>
                                        <th class="wd-20p">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $item)
                                        <tr>
                                            <td>
                                                <img src="{{ asset($item->product_thumbnail) }}" alt=""
                                                    width="60px" height="60px">
                                            </td>
                                            <td>{{ $item->product_name_en }}</td>
                                            <td>{{ $item->selling_price }}</td>
                                            <td>{{ $item->product_qty }}</td>
                                            <td>
                                                {{-- @if ($item->discount_price == null)
                                                    <span class="badge badge-pill badge-success">no</span> --}}
                                                {{-- @else
                                                    @php
                                                        $amount = $item->selling_price - $item->discount_price;
                                                        $discount = ($amount / $item->selling_price) * 100;
                                                    @endphp
                                                    <span class="badge badge-pill badge-success">{{ round($discount) }}
                                                        %</span>
                                                @endif --}}
                                            </td>
                                            <td>
                                                @if ($item->status == 1)
                                                    <span class="badge badge-pill badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-pill badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('product.edit', $item->id) }}"
                                                    class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('product.edit', $item->id) }}"
                                                    class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('product.destroy', $item->id) }}"
                                                    onclick="return confirm('Are You sure to Delete?')"
                                                    class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                                @if ($item->status == 1)
                                                    <a href="{{ route('product.inactive', $item->id) }}"
                                                        class="btn btn-sm btn-danger"><i class="fa fa-arrow-down"></i></a>
                                                @else
                                                    <a href="{{ route('product.inactive', $item->id) }}"
                                                        class="btn btn-sm btn-info"><i class="fa fa-arrow-up"></i></a>
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
            </div>
            <!-- row -->
        </div>
    </div>
@endsection
