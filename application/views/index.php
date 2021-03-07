<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iExam</title>
    <link rel="stylesheet" href="<?php echo base_url('asset/style.css') ?>">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="header">
        <div class="inner-header">
            <div class="nav fix-nav">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-4">
                            <div class="logo">
                                <h3><a href="#">iExam</a></h3>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-8">
                            <nav>
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#service">Service</a></li>
                                    <li><a href="#about">About</a></li>
                                    <li><a href="#portfolio">Blog</a></li>
                                    <li><a href="#contact">Contact</a></li>
                                </ul>
                                <div class="collapse-menu">
                                    <span><i class="fa fa-bars fa-2x" aria-hidden="true"></i></span>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-me">
                <h1>Application form has Started</h1>
                <a href="<?php echo base_url('index.php/login') ?>">Apply Now</a>
            </div>
        </div>
    </div>
</body>
</html>