<!doctype html>
<html lang="en" id="Home">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap-icons.css">
    <!-- AOS -->
    <link rel="stylesheet" href="css/aos.css" />
    <!-- MY CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
</head>

<body>
    <?= $this->include('layout/navbar'); ?>
    <?= $this->renderSection('content'); ?>
    <script src="js/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- <script src="js/jquery-3.1.1.js"></script> -->
    <!-- <script src="js/jquery.easing.1.3.js"></script> -->
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="js/aos.js"></script>
    <script src="js/gsap.min.js"></script>
    <script src="js/TextPlugin.min.js"></script>
    <script type="text/javascript" src="/js/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="/js/vanilla-tilt.min.js"></script>
    <script type="text/javascript" charset="utf8" src="js/jquery.dataTables.js"></script>
    <script src="js/script.js"></script>
</body>

</html>