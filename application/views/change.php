<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iExam</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
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
                    <div class="card-header text-center">Forgot Password</div>
                    <div class="card-body">
                        <div class="alert alert-danger error d-none"></div>
                        <div class="alert alert-success success d-none"></div>
                        <?= form_open('login/update_password', array('id' => 'change')) ?>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputEmail">New password</label>
                                <input type="password" class="form-control" name="npassword" value="<?= set_value('npassword'); ?>" placeholder="Enter new password">
                                <span class="text text-danger"><?= form_error('npassword') ?></span>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputEmail">Confirm password</label>
                                <input type="password" class="form-control" name="cpassword" value="<?= set_value('cpassword'); ?>" placeholder="Enter new password">
                                <span class="text text-danger"><?= form_error('cpassword') ?></span>
                            </div>
                        </div>
                        <input type="hidden" name="user_id" value="<?= $id ?>">
                        <span class="text text-danger"><?= form_error('user_id') ?></span>
                        <input type="submit" class="btn btn-primary form-control" value="Change password">
                        </form>
                        <div class="row">
                            <div class=" col-md-12 text-right">
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
<script>
    $(function() {
        $('#change').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: "<?php echo base_url('index.php/login/update_password') ?>",
                method: "POST",
                data: $("form").serialize(),
                success: function(data) {
                    var data = $.parseJSON(data);
                    if (data.status == 'success') {
                        $('.success').removeClass('d-none').text(data.msg);
                    } else if (data.status == 'error') {
                        $('.error').removeClass('d-none').text(data.msg);
                    }
                }
            });
        });
    });
</script>