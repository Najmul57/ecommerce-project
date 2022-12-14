<div class="sl-logo"><a href="">Laundry System</a></div>
<div class="sl-sideleft">
    <div class="input-group input-group-search">
        <input type="search" name="search" class="form-control" placeholder="Search">
        <span class="input-group-btn">
            <button class="btn"><i class="fa fa-search"></i></button>
        </span>
        <!-- input-group-btn -->
    </div>
    <!-- input-group -->

    <div class="sl-sideleft-menu">
        <a href="{{ route('admin.dashboard') }}" class="sl-menu-link @yield('dashboard')">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                <span class="menu-item-label">Dashboard</span>
            </div>
            <!-- menu-item -->
        </a>
        <a href="{{ route('slider') }}" class="sl-menu-link @yield('slider')">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                <span class="menu-item-label">Slider</span>
            </div>
            <!-- menu-item -->
        </a>
        <a href="{{ route('brand') }}" class="sl-menu-link @yield('brands')">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                <span class="menu-item-label">Brands</span>
            </div>
            <!-- menu-item -->
        </a>
        <!-- sl-menu-link -->
        <a href="#" class="sl-menu-link  @yield('categories')">
            <div class="sl-menu-item">
                <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
                <span class="menu-item-label">Category</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div>
            <!-- menu-item -->
        </a>
        <!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('category') }}" class="nav-link @yield('add-category')">Add Category</a>
            </li>
            <li class="nav-item"><a href="{{ route('sub-category') }}" class="nav-link @yield('sub-category')">Sub
                    Category</a></li>
            <li class="nav-item"><a href="{{ route('childcategory') }}"
                    class="nav-link @yield('childcategory')">Childcategory</a></li>
        </ul>
        <a href="#" class="sl-menu-link  @yield('products')">
            <div class="sl-menu-item">
                <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
                <span class="menu-item-label">Product</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div>
            <!-- menu-item -->
        </a>
        <!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('add-product') }}" class="nav-link @yield('add-product')">Add Product</a>
            </li>
            <li class="nav-item"><a href="{{ route('manage-product') }}" class="nav-link @yield('manage-product')">Manage
                    Product</a></li>
        </ul>
    </div>
    <!-- sl-sideleft-menu -->

    <br>
</div>
