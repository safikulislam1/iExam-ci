<?php
$user_name = $this->session->userdata('name');
$user_id = $this->session->userdata('id');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iExam</title>
    <link rel="stylesheet" href="<?php echo base_url('asset/style.css') ?>">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<style>
    .side {
        width: 220px;
        background-color: #343a40;
        top: 0;
        left: 0;
        position: fixed;
        height: 100%;
        z-index: 1;
    }

    .side .logo {
        text-align: center;
        padding: 15px 18px;
        border-bottom: 1px solid #4b545c;
    }

    .side .logo a {
        text-decoration: none;
        color: #c2c7d0;
    }

    .side nav {
        padding: 10px;
    }

    .side nav ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .side nav ul li a {
        text-decoration: none;
        margin-top: 3px;
        padding: 10px 20px;
        display: block;
        color: #c2c7d0;
    }

    .side nav ul li:not(.active):hover {
        background-color: rgba(0, 0, 0, .2);
        color: #fff;
    }

    .side nav ul .active {
        background-color: #007bff;
        color: #fff;
        border-radius: 5px;
    }

    .side nav ul li ul {
        background-color: rgba(0, 0, 0, .2);
        display: none;
    }

    .side nav ul li ul li a {
        border-bottom: none;
    }


    .icon {
        margin-left: 80px;
        transition: 1s all ease;
    }

    .icon-menu {
        margin-right: 8px;
    }

    .rotate {
        transform: rotate(-90deg);
    }

    .wrapper {
        margin-left: 220px;

    }

    .wrapper header {
        height: 55px;
        box-sizing: border-box;
        background-color: #1aa3ff;
        padding: 5px;
        box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.2);
    }

    .left {
        padding-top: 7px;
    }

    .right {
        text-align: right;
        padding-top: 7px;
    }

    .right a {
        color: white;
    }

    .user-info {
        /* width: 150px; */
        height: auto;
        border: 2px solid red;
        position: absolute;
        right: 10px;
        top: 43px;
        border: 0;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, .175);
        z-index: 99999;
        background-color: #eee;
        border-radius: 5px;
        display: none;
    }

    .user-info ul {
        list-style: none;
        padding: 0px;

    }

    .user-info ul li a {
        color: #212529;
        text-decoration: none;
        padding: 10px 35px;
        display: block;
    }

    .user-info ul li a:hover {
        background-color: rgba(0, 0, 0, .2)
    }

    /* span {
        color: white;
    } */
</style>

<body>