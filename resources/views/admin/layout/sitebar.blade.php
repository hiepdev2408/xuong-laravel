<div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('theme/admin/assets/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('theme/admin/assets/images/logo-dark.png') }}" alt="" height="17">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('theme/admin/assets/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('theme/admin/assets/images/logo-light.png') }}" alt="" height="17">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{ route('admin.dashboard') }}"
                                role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                                <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                            </a>
                        </li> <!-- end Dashboard Menu -->


                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarCatalogues" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCatalogues">
                                <i class="ri-layout-3-line"></i> <span data-key="t-layouts">Catalogues</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarCatalogues">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.catalogues.index') }}" class="nav-link" data-key="t-horizontal">List Catalogues</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.catalogues.create') }}" class="nav-link" data-key="t-horizontal">Create Catalogues</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarProducts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProducts">
                                <i class="ri-layout-3-line"></i> <span data-key="t-layouts">Products</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarProducts">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.products.index') }}" class="nav-link" data-key="t-horizontal">List Products</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.products.create') }}" class="nav-link" data-key="t-horizontal">Create Products</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarCategory" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCategory">
                                <i class="ri-layout-3-line"></i> <span data-key="t-layouts">Category</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarCategory">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.categories.index') }}" class="nav-link" data-key="t-horizontal">List Category</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.categories.create') }}" class="nav-link" data-key="t-horizontal">Create Category</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
