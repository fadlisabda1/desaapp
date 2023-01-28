<?= $this->extend('auth/templates/index'); ?>
<?= $this->section('content'); ?>
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content" class="mb-5">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4"><?= lang('Auth.resetYourPassword') ?></h3>
                            </div>
                            <div class="card-body">
                                <div class="small mb-3 text-muted"><?= lang('Auth.enterCodeEmailPassword') ?></div>
                                <?= view('Myth\Auth\Views\_message_block') ?>
                                <form action="<?= url_to('reset-password') ?>" method="post">
                                    <?= csrf_field() ?>
                                    <div class="form-floating mb-3">
                                        <input class="form-control <?php if (session('errors.token')) : ?>is-invalid<?php endif ?>" id="inputToken" name="token" type="text" value="<?= old('token', $token ?? '') ?>" />
                                        <div class="invalid-feedback">
                                            <?= session('errors.token') ?>
                                        </div>
                                        <label for="inputToken"><?= lang('Auth.token') ?></label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" id="inputEmail" name="email" type="email" value="<?= old('email') ?>" />
                                        <div class="invalid-feedback">
                                            <?= session('errors.email') ?>
                                        </div>
                                        <label for="inputEmail"><?= lang('Auth.email') ?></label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" id="password" name="password" type="password" />
                                        <div class="invalid-feedback">
                                            <?= session('errors.password') ?>
                                        </div>
                                        <label for="password"><?= lang('Auth.newPassword') ?></label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" id="inputPasswordConfirm" name="pass_confirm" type="password" />
                                        <div class="invalid-feedback">
                                            <?= session('errors.pass_confirm') ?>
                                        </div>
                                        <label for="inputPasswordConfirm"><?= lang('Auth.newPasswordRepeat') ?></label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" id="showPasswordd" type="checkbox" onclick="showPassword()" />
                                        <label class="form-check-label" for="showPasswordd">Show Password</label>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <a class="small text-success" href="<?= url_to('login') ?>"><?= lang('Auth.alreadyRegistered') ?><?= lang('Auth.signIn') ?></a>
                                        <button type="submit" class="btn btn-success"><?= lang('Auth.resetPassword') ?></button>
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
</div>
<?= $this->endSection(); ?>