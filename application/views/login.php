<!DOCTYPE html>
<html lang="en">
<head>
<title>Login</title>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#7C1B1C">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=PT Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/main.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/4e1eba2436.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-3.3.1.min.js"></script>
    <link rel="icon" href="<?php echo base_url(); ?>images/icon.png" type="image">
</head>
<body>
<?php $error = $this->session->flashdata('error'); ?>
    <section class="login">
        <div class="login-box">
            <div class="heading">Admin Login</div>
            <form action="<?php echo base_url(); ?>main/login_admin" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                    <i class="icon fas fa-user"></i>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" id="username" placeholder="Password">
                    <i class="icon fas fa-lock"></i>
                </div>
                <div class="forgot">Forgot Password?</div>
                <span class="error"><p><?php echo $error; ?></p></span>
                <div class="form-group">
                    <input type="submit" class="btn btn-apply-light" id="save" value="Login">
                </div>
            </form>
        </div>
    </section>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
</body>
</html>