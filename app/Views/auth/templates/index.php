<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $title; ?></title>
    <link href="<?= base_url('css/style2.css'); ?>" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-success">

    <div id="layoutAuthentication_footer">
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="text-center small">
                    <div class="text-muted">Copyright &copy; Website Desa Tanah Merah <?= date('Y'); ?>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <?= $this->renderSection('content'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url('js/script3.js'); ?>"></script>

</body>

</html>