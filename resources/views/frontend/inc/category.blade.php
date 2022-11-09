@php
    $categories = App\Models\Category::orderby('category_name_en', 'asc')->get();
@endphp
<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal" role="navigation">
        <ul class="nav">
            @foreach ($categories as $category)
                <li class="dropdown menu-item">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon {{ $category->category_icon }}"
                            aria-hidden="true"></i>{{ ucwords($category->category_name_en) }}</a>
                    <ul class="dropdown-menu mega-menu">
                        <li class="yamm-content">
                            <div class="row">
                                @php
                                    $subcategories = App\Models\Subcategory::where('category_id', $category->id)
                                        ->orderby('subcategory_name_en', 'asc')
                                        ->get();
                                @endphp
                                <div class="col-sm-12 col-md-3">
                                    <ul class="links list-unstyled">
                                        @foreach ($subcategories as $subcategory)
                                            <li><a
                                                    href="{{ route('subcategory.product', $subcategory->id) }}">{{ ucwords($subcategory->subcategory_name_en) }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div><!-- /.row -->
                        </li><!-- /.yamm-content -->
                    </ul><!-- /.dropdown-menu -->
                </li><!-- /.menu-item -->
            @endforeach

        </ul><!-- /.nav -->
    </nav><!-- /.megamenu-horizontal -->
</div><!-- /.side-menu -->
