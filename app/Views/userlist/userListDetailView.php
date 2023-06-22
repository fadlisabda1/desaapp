<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 text-center">User Detail</h1>
    <div class="row justify-content-center">
        <div class="col-auto">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?= base_url('/gambar/myprofile/' . $user->user_image); ?>" class="img-fluid rounded-start" alt="<?= $user->username ?>">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h4><?= $user->username ?></h4>
                                </li>
                                <?php if ($user->fullname) : ?>
                                    <li class="list-group-item"><?= $user->fullname; ?></li>
                                <?php endif; ?>
                                <li class="list-group-item"><?= $user->email ?></li>
                                <li class="list-group-item"><span class="badge bg-<?= ($user->name == 'admin' ? 'success' : 'warning') ?>"><?= $user->name ?></span></li>
                                <li class="list-group-item"><small><a href="<?= base_url('admin') ?>
                                " class="badge bg-warning text-decoration-none"><i class=" fas fa-backward"></i></a></small></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>