<div data-simplebar class="sidebar-menu-scroll">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title" data-key="t-menu">Menu</li>

            <li>
                <a href="{{ route('panel.dashboard.index') }}">
                    <i class="icon nav-icon" data-eva="grid-outline"></i>
                    <span class="menu-item" data-key="t-dashboards">Əsas Səhifə</span>
                </a>
            </li>

            <li>
                <a href="{{ route('panel.product_purchases.index') }}">
                    <i class="icon nav-icon" data-eva="shopping-cart-outline"></i>
                    <span class="menu-item" data-key="t-product-purchases">Satınalma</span>
                </a>
            </li>

            <!-- Add Product menu item -->
            <li>
                <a href="{{ route('panel.products.index') }}">
                    <i class="icon nav-icon" data-eva="cube-outline"></i>
                    <span class="menu-item" data-key="t-products">Məhsullar</span>
                </a>
            </li>

            <li>
                <a href="{{ route('panel.user.index') }}">
                    <i class="icon nav-icon" data-eva="person-outline"></i>
                    <span class="menu-item" data-key="t-calendar">İstifadəçilər</span>
                </a>
            </li>

            <li>
                <a href="{{ route('panel.manufacturers.index') }}">
                    <i class="icon nav-icon" data-eva="calendar-outline"></i>
                    <span class="menu-item" data-key="t-calendar">İstehsalçı</span>
                </a>
            </li>

            <li>
                <a href="{{ route('panel.options.edit', 1) }}">
                    <i class="icon nav-icon" data-eva="calendar-outline"></i>
                    <span class="menu-item" data-key="t-calendar">Nizamlama</span>
                </a>
            </li>
            <li>
                <a href="{{ route('panel.social_icon.index') }}">
                    <i class="icon nav-icon" data-eva="share-outline"></i>
                    <span class="menu-item" data-key="t-calendar">Social Icons</span>
                </a>
            </li>

        </ul>
    </div>
    <!-- Sidebar -->

    <div class="p-3 px-4 sidebar-footer">
        <p class="mb-1 main-title"><script>document.write(new Date().getFullYear())</script> &copy; Borex.</p>
        <p class="mb-0">Design & Develop by Themesbrand</p>
    </div>
</div>
