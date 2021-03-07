<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iExam</title>
    <!-- <link rel="stylesheet" href="<?php echo base_url('asset/style.css') ?>"> -->
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style>
    .mt-5 {
        margin-top: 100px !important
    }

    .logo h3 a {
        color: black;
        padding-top: 30px;
        text-decoration: none;
        display: block;
    }
</style>

<body>
    <div class="header">
        <div class="inner-header">
            <div class="nav fix-nav">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-4">
                            <div class="logo">
                                <h3><a href="<?php echo base_url('index.php') ?>">iExam</a></h3>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">

        <div class="row">
            <div class="col-md-4 offset-md-4 mt-5">
                <div class="card">
                    <div class="card-header text-center">Registration Form</div>
                    <div class="card-body">
                        <?php if ($this->session->flashdata('error')) { ?>
                            <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
                        <?php } ?>
                        <?php if ($this->session->flashdata('success')) { ?>
                            <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
                        <?php } ?>

                        <?= form_open('login/registration') ?>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputEmail">Full Name</label>
                                <input type="text" class="form-control" name="fname" value="<?= set_value('fname'); ?>" placeholder="Enter full name">
                                <span class="text text-danger"><?= form_error('fname') ?></span>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputEmail">Email</label>
                                <input type="text" class="form-control" name="email" value="<?= set_value('email'); ?>" placeholder="Enter email">
                                <span class="text text-danger"><?= form_error('email') ?></span>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputAddress2">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter password" autocomplete="off">
                                <span class="text text-danger"><?= form_error('password') ?></span>
                            </div>

                        </div>
                        <input type="submit" class="btn btn-primary form-control" value="Signup">
                        </form>
                        <div class="row">

                            <div class=" col-md-6">
                                <a href="<?= base_url('index.php/login/forgot') ?>">Forgot Password</a>
                            </div>
                            <div class=" col-md-6 text-right">
                                <a href="<?= base_url('index.php/login') ?>">Login</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
