<?= $this->extend('auth/templates/index'); ?>
<?= $this->section('content'); ?>
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4"><?= lang('Auth.register') ?></h3>
                            </div>
                            <div class="card-body">
                                <?= view('Myth\Auth\Views\_message_block') ?>
                                <form class="user" action="<?= url_to('register') ?>" method="post">
                                    <?= csrf_field() ?>
                                    <div class="form-floating mb-3">
                                        <input class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" id="inputEmail" type="email" value="<?= old('email') ?>" />
                                        <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                                        <label for="inputEmail"><?= lang('Auth.email') ?></label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" id="inputUsername" type="text" value="<?= old('username') ?>" />
                                        <label for="inputUsername"><?= lang('Auth.username') ?></label>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" id="inputPassword" type="password" name="password" autocomplete="off" />
                                                <label for="inputPassword"><?= lang('Auth.password') ?></label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" id="inputPasswordConfirm" name="pass_confirm" type="password" autocomplete="off" />
                                                <label for="inputPasswordConfirm"><?= lang('Auth.repeatPassword') ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 mb-0">
                                        <div class="d-grid"><button type="submit" class="btn btn-success btn-block"><?= lang('Auth.register') ?></button></div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center py-3">
                                <div class="small"><a class="text-success" href="<?= url_to('login') ?>"><?= lang('Auth.alreadyRegistered') ?><?= lang('Auth.signIn') ?></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<?= $this->endSection(); ?>