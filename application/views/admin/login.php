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
                    <div class="card-header text-center">Admin Login</div>
                    <div class="card-body">
                        <?php if ($this->session->flashdata('error')) { ?>
                            <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
                        <?php } ?>
                        <!-- <?php if ($this->session->flashdata('success')) { ?>
				 		<div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
				 		<?php } ?> -->

                        <?= form_open('admin/action') ?>
                        <div class="form-row">
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
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="captcha" placeholder="Type captcha" autocomplete="off">

                            </div>
                            <div class="form-group col-md-6">
                                <?= $captcha['image'] ?>
                            </div>
                            <div class="form-group col-md-12">

                                <span class="text text-danger"><?= form_error('captcha') ?></span>
                            </div>

                        </div>
                        <input type="submit" class="btn btn-primary form-control" value="Login">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-4 offset-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <p>Email : <b>admin@gmail.com</b></p>
                                <p>Password : <b>admin</b></p>
                            </div>
                        </div>
            </div>
        </div>
    </div>
</body>
</html>