<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <?php if (in_groups('admin')) : ?>
                        <div class="sb-sidenav-menu-heading">User Management</div>
                        <a class="nav-link" href="<?= base_url('admin'); ?>">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></div>
                            User List
                        </a>
                    <?php endif; ?>
                    <div class="sb-sidenav-menu-heading">Profile</div>
                    <a class="nav-link" href="<?= base_url('profil'); ?>">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-tree-city"></i></div>
                        Profile Desa
                    </a>
                    <a class="nav-link" href="<?= base_url('user'); ?>">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                        My Profile
                    </a>
                    <?php if ($title == 'My Profile') : ?>
                        <a role="link" aria-disabled="true" name="edit" class="nav-link btn editUser" data-id="' . <?= user()->id ?> . '">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user-pen"></i></div>Edit Profile
                        </a>
                    <?php endif; ?>
                    <div class="sb-sidenav-menu-heading">Administrasi Desa</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-pen"></i></div>
                        Administrasi Umum
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="/">Peraturan Desa</a>
                            <a class="nav-link" href="/inventarisKekayaanDesaController/index">Inventaris dan Kekayaan Desa</a>
                        </nav>
                    </div>
                    <div class="sb-sidenav-menu-heading">Pelayanan Desa</div>
                    <a class="nav-link" href="/layananUmumController/index">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-pen"></i></div>
                        Layanan Umum
                    </a>
                    <div class="sb-sidenav-menu-heading">Perpajakan Desa</div>
                    <a class="nav-link" href="/penerimaanPbbController/index">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-pen"></i></div>
                        Penerimaaan Harian Pajak Bumi Dan Bangunan
                    </a>
                    <a class="nav-link" href="<?= base_url('logout'); ?>">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-right-from-bracket"></i></div>
                        Logout
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <?php if (in_groups('admin')) : ?>
                    <?= 'admin'; ?>
                <?php else : ?>
                    <?= 'user'; ?>
                <?php endif; ?>
            </div>
        </nav>
    </div>
</div>