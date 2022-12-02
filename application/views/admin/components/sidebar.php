<div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1" id="sidebar">
    <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
            <ul class="navbar-nav">
                <li>
                    <div class="text-muted small fw-bold text-uppercase px-3">
                        CORE
                    </div>
                </li>
                <li>
                    <a href="<?php echo site_url('admin/dashboard'); ?>" class="nav-link px-3 active">
                        <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="my-4">
                    <hr class="dropdown-divider bg-light" />
                </li>
                <li>
                    <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                        Interface
                    </div>
                </li>
                <li>
                    <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#user">
                        <span class="me-2"><i class="bi bi-layout-split"></i></span>
                        <span>User</span>
                        <span class="ms-auto">
                            <span class="right-icon">
                                <i class="bi bi-chevron-down"></i>
                            </span>
                        </span>
                    </a>
                    <div class="collapse" id="user">
                        <ul class="navbar-nav ps-3">
                            <li>
                                <a href="<?php echo site_url('admin/user'); ?>" class="nav-link px-3">
                                    <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                                    <span>User List</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('admin/user/create'); ?>" class="nav-link px-3">
                                    <span class="me-2"><i class="bi bi-plus"></i></span>
                                    <span>Create User</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                </li>
                <li>
                    <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#kategori">
                        <span class="me-2"><i class="bi bi-layout-split"></i></span>
                        <span>Kategori</span>
                        <span class="ms-auto">
                            <span class="right-icon">
                                <i class="bi bi-chevron-down"></i>
                            </span>
                        </span>
                    </a>
                    <div class="collapse" id="kategori">
                        <ul class="navbar-nav ps-3">
                            <li>
                                <a href="<?php echo site_url('admin/category'); ?>" class="nav-link px-3">
                                    <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                                    <span>Category List</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('admin/category/create'); ?>" class="nav-link px-3">
                                    <span class="me-2"><i class="bi bi-plus"></i></span>
                                    <span>Create Kategori</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                
                <li>
                    <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#pelanggan">
                        <span class="me-2"><i class="bi bi-layout-split"></i></span>
                        <span>Pelanggan</span>
                        <span class="ms-auto">
                            <span class="right-icon">
                                <i class="bi bi-chevron-down"></i>
                            </span>
                        </span>
                    </a>
                    <div class="collapse" id="pelanggan">
                        <ul class="navbar-nav ps-3">
                            <li>
                                <a href="<?php echo site_url('admin/pelanggan'); ?>" class="nav-link px-3">
                                    <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                                    <span>Pelanggan List</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('admin/pelanggan/create'); ?>" class="nav-link px-3">
                                    <span class="me-2"><i class="bi bi-plus"></i></span>
                                    <span>Create Pelanggan</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#karyawan">
                        <span class="me-2"><i class="bi bi-layout-split"></i></span>
                        <span>Karyawan</span>
                        <span class="ms-auto">
                            <span class="right-icon">
                                <i class="bi bi-chevron-down"></i>
                            </span>
                        </span>
                    </a>
                    <div class="collapse" id="karyawan">
                        <ul class="navbar-nav ps-3">
                            <li>
                                <a href="<?php echo site_url('admin/karyawan'); ?>" class="nav-link px-3">
                                    <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                                    <span>Karyawan List</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('admin/karyawan/create'); ?>" class="nav-link px-3">
                                    <span class="me-2"><i class="bi bi-plus"></i></span>
                                    <span>Create Karyawan</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#laundry">
                        <span class="me-2"><i class="bi bi-layout-split"></i></span>
                        <span>Laundry</span>
                        <span class="ms-auto">
                            <span class="right-icon">
                                <i class="bi bi-chevron-down"></i>
                            </span>
                        </span>
                    </a>
                    <div class="collapse" id="laundry">
                        <ul class="navbar-nav ps-3">
                            <li>
                                <a href="<?php echo site_url('admin/laundry'); ?>" class="nav-link px-3">
                                    <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                                    <span>Laundry List</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('admin/laundry/create'); ?>" class="nav-link px-3">
                                    <span class="me-2"><i class="bi bi-plus"></i></span>
                                    <span>Create Laundry</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>