<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sistem Rekomendasi Buku Bacaan Siswa </title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="<?= base_url('assets/dashboard/'); ?>assets\images\logo_buku.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/dashboard/'); ?>bower_components\bootstrap\css\bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/dashboard/'); ?>assets\icon\themify-icons\themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/dashboard/'); ?>assets\icon\icofont\css\icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/dashboard/'); ?>assets\css\style.css">
</head>

<body class="fix-menu">
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->

    <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <form action="<?= base_url('auth') ?>" method="post" class="md-float-material form-material">
                        <div class="text-center">
                            <img src="<?= base_url('assets/dashboard/'); ?>assets\images\logobuku.png" alt="logobuku.png">
                        </div>
                        <div class="auth-box card">
                            <?= $this->session->flashdata('message'); ?>
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center">Sign In</h3>
                                    </div>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="text" class="form-control" name="email" id="email" required="" placeholder="Your Email Address">
                                    <span class="form-bar"></span>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="password" class="form-control" name="password" id="password" required="" placeholder="Password">
                                    <span class="form-bar"></span>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Sign in</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- end of form -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>

    <!-- Required Jquery -->
    <script type="text/javascript" src="<?= base_url('assets/dashboard/'); ?>bower_components\jquery\js\jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/dashboard/'); ?>bower_components\jquery-ui\js\jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/dashboard/'); ?>bower_components\popper.js\js\popper.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/dashboard/'); ?>bower_components\bootstrap\js\bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="<?= base_url('assets/dashboard/'); ?>bower_components\jquery-slimscroll\js\jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="<?= base_url('assets/dashboard/'); ?>bower_components\modernizr\js\modernizr.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/dashboard/'); ?>bower_components\modernizr\js\css-scrollbars.js"></script>
    <!-- i18next.min.js -->
    <script type="text/javascript" src="<?= base_url('assets/dashboard/'); ?>bower_components\i18next\js\i18next.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/dashboard/'); ?>bower_components\i18next-xhr-backend\js\i18nextXHRBackend.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/dashboard/'); ?>bower_components\i18next-browser-languagedetector\js\i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/dashboard/'); ?>bower_components\jquery-i18next\js\jquery-i18next.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/dashboard/'); ?>assets\js\common-pages.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
</body>

</html>