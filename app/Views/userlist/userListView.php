<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row justify-content-center">
        <div class="col-auto">
            <div class="table-responsive">
                <table class="table table-hover table-bordered border-dark caption-top">
                    <caption>User List</caption>
                    <thead>
                        <tr>
                            <th scope="col">Ceklis</th>
                            <th scope="col">No</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td><input type="checkbox" name="checkbox_value[]" value="<?= $user->userid; ?>"></td>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $user->username; ?></td>
                                <td><?= $user->email; ?></td>
                                <td><?= $user->name; ?></td>
                                <td>
                                    <a href="<?= base_url('admin/' . $user->userid) ?>" class="btn btn-info">Detail</a>
                                    <button type="button" class="btn btn-danger deleteUserList" data-id="<?= $user->userid; ?>">Delete</button>
                                    <button type="button" class="btn btn-danger deleteAllUserList">Delete All</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>