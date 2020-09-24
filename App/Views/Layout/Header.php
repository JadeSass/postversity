<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title><?php echo APP_NAME; ?></title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand text-primary" href="<?php echo URL; ?>"><?php echo APP_NAME; ?></a>
        <button class="navbar-toggler text-white bg-dark" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    </div>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav ml-auto">
        <?php if (isset($_SESSION['user_id'])) : ?>
            <li class="nav-item">
                <a class="nav-link text-primary" href="#">Welcome <?php echo $_SESSION['user_name']; ?></a>
            </li>
            <li class="nav-item">
                <a href="<?php echo URL; ?>/posts/add" class="text-primary nav-link">Add Post</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-primary" href="<?php echo URL; ?>/auth/logout">Log Out</a>
            </li>
        <?php else : ?>
            <li class="nav-item">
                <a class="nav-link text-primary" href="<?php echo URL; ?>/auth/register">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-primary" href="<?php echo URL; ?>/auth/login">Login</a>
            </li>
        <?php endif ?>
        </ul>
    </div>
</nav>