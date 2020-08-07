<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath."/../lib/Database.php");
include_once ($filepath."/../classes/Student.php");
$db=new Database();
$pd=new Student();
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/uikit.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>Crud</title>
</head>
<body>

<nav class=" navbar navbar-expand-md navbar-dark" uk-sticky="top: 150; animation: uk-animation-slide-top; bottom: #sticky-on-scroll-up">
    <div class="container">
        <a class="navbar-brand" href="index.php">Crud</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#mybtn"><span class="navbar-toggler-icon"></span></button>
        <div id="mybtn" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item "><a href="index.php" class="nav-link">Student List</a></li>
                <li class="nav-item "><a href="addNewStudent.php" class="nav-link">Add New Student</a></li>
                <li class="nav-item "><a href="trash_index.php" class="nav-link">Got To Trash</a></li>
            </ul>
        </div>
    </div>
</nav>
