<!DOCTYPE html>
<html lang="en">


    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Log In | Asian Institute of Management & Information Technology</title>
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
        <meta name="description" content="">
        <meta property="og:url" content="">
        <meta property="og:type" content="website">
        <meta property="og:title" content="">
        <meta property="og:description" content="">
        <meta property="og:image" content="">
        <meta name="twitter:card" content="">
        <meta name="twitter:site" content="">
        <meta name="twitter:creator" content="">
        <meta name="twitter:title" content="">
        <meta name="twitter:description" content="">
        <meta name="twitter:image" content="">
        <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
        <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="manifest.json">
        <link rel="mask-icon" href="safari-pinned-tab.svg" color="#d9230f">
        <meta name="theme-color" content="#ffffff">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
        <link rel="stylesheet" href="<?php echo base_url("public/admin/"); ?>css/vendor.minf9e3.css?v=1.1">
        <link rel="stylesheet" href="<?php echo base_url("public/admin/"); ?>css/elephant.minf9e3.css?v=1.1">
        <link rel="stylesheet" href="<?php echo base_url("public/admin/"); ?>css/login-2.minf9e3.css?v=1.1">
    </head>
    <body>

        <div class="text-center">
            <center><img class="img-responsive" src="<?php echo base_url("public/images/logoaimi.png"); ?>" alt="AIMIT"></center>
        </div>
       
        <div class="login">


            <?php
            if ($this->session->flashdata('msg')) {
                ?>
                <div class="alert alert-info"><?php echo $this->session->flashdata('msg'); ?></div>                
                <div class="clearfix"></div>
                <?php
            }
            ?>




            <div class="login-body">
                <a class="login-brand" href="#">
                    <img class="img-responsive" src="<?php echo base_url("public/images/aimlogo.png"); ?>" alt="AIMIT">
                </a>

                <div class="login-form">
                    <form action="<?php echo site_url('login/processing'); ?>" method="post">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" class="form-control" type="email" name="email" spellcheck="false" autocomplete="off" data-msg-required="Please enter your email address.">
                            <span style="color:red;"><?php echo form_error('email'); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" class="form-control" type="password" name="password"  data-msg-minlength="Please enter password" data-msg-required="Please enter your password.">
                            <span style="color:red;"><?php echo form_error('password'); ?></span>
                        </div>
                        <div class="form-group">

                            <span aria-hidden="true"> · </span>
                            <a href="<?php echo site_url('login/ResetPassword'); ?>">Forgot password?</a>
                        </div>
                        <!--<button class="btn btn-primary btn-block" name="submit" type="submit">Sign in</button>-->
                        <input class="btn btn-primary btn-block" name="submit" type="submit" value="Sign in">
                    </form>
                </div>
            </div>
            <div class="login-footer">
                <i class="fa fa-arrow-left"></i><a style="color: green" href="<?php echo base_url('college'); ?>">Back to website</a>
            </div>
        </div>
        <script src="<?php echo base_url("public/admin/"); ?>js/vendor.minf9e3.js?v=1.1"></script>
        <script src="<?php echo base_url("public/admin/"); ?>js/elephant.minf9e3.js?v=1.1"></script>

    </body>
</html>