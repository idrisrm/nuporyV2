<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?= base_url('user') ?>" aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard</span></a></li>


                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Kelolah data</span></li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span class="hide-menu">Data Admin</span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="<?= base_url('Admin') ?>" class="sidebar-link"><span class="hide-menu">Data Admin
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="<?= base_url('Admin/tambah') ?>" class="sidebar-link"><span class="hide-menu">Tambah Admin
                                </span></a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="feather" class="feather-icon"></i><span class="hide-menu">Bunga</span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="<?= base_url('Bunga/index') ?>" class="sidebar-link"><span class="hide-menu">Data Bunga
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="<?= base_url('Bunga/tambahbunga') ?>" class="sidebar-link"><span class="hide-menu">Tambah Bunga
                                </span></a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="grid" class="feather-icon"></i><span class="hide-menu">Kategori</span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="<?= base_url('Kategori/index') ?>" class="sidebar-link"><span class="hide-menu">Data Kategori
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="<?= base_url('Kategori/tambah') ?>" class="sidebar-link"><span class="hide-menu">Tambah Kategori
                                </span></a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="edit-3" class="feather-icon"></i><span class="hide-menu">Kritik</span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="<?= base_url('Kritik/index') ?>" class="sidebar-link"><span class="hide-menu">Data Kritik
                                </span></a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span class="hide-menu">Transaksi</span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="<?= base_url('Transaksi/Tagihan') ?>" class="sidebar-link"><span class="hide-menu">Tagihan
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="<?= base_url('Transaksi/Kemas') ?>" class="sidebar-link"><span class="hide-menu">Dikemas
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="<?= base_url('Transaksi/Dikirim') ?>" class="sidebar-link"><span class="hide-menu">Dikirim
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="<?= base_url('Transaksi/Selesai') ?>" class="sidebar-link"><span class="hide-menu">Selesai
                                </span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>