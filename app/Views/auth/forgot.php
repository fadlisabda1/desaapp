<?= $this->extend('auth/templates/index'); ?>
<?= $this->section('content'); ?>
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4"><?= lang('Auth.forgotPassword') ?></h3>
                            </div>
                            <div class="card-body">
                                <div class="small mb-3 text-muted"><?= lang('Auth.enterEmailForInstructions') ?></div>
                                <?= view('Myth\Auth\Views\_message_block') ?>
                                <form action="<?= url_to('forgot') ?>" method="post" class="user">
                                    <?= csrf_field() ?>
                                    <div class="form-floating mb-3">
                                        <input class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" id="inputEmail" name="email" type="email" />
                                        <label for="inputEmail"><?= lang('Auth.email') ?></label>
                                        <div class="invalid-feedback">
                                            <?= session('errors.email') ?>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <a class="small text-success" href="<?= url_to('login') ?>"><?= lang('Auth.alreadyRegistered') ?><?= lang('Auth.signIn') ?></a>
                                        <button type="submit" class="btn btn-success"><?= lang('Auth.sendInstructions') ?></button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center py-3">
                                <div class="small"><a class="text-success" href="<?= route_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="layoutAuthentication_footer">
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2022</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<?= $this->endSection(); ?>