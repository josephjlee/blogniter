<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title><?php  ?></title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- My Custom CSS -->
    <link rel="stylesheet" href="<?php echo site_url() . 'assets/css/style.css'; ?>">
</head>

<body>

    <div class="navbar navbar-dark bg-primary d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 border-bottom box-shadow">
        <h5 class="navbar-brand mr-md-auto font-weight-normal">Blogniter</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-light nav-link nav-item" href="<?= base_url(); ?>">Home</a>
        </nav>
        <a class="btn btn-outline-light mr-2" href="<?= base_url('auth') ?>">Login</a>
        <a class="btn btn-light" href="<?= base_url('auth/register') ?>">Register</a>
    </div> 