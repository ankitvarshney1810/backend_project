<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#21395f">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=PT Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/main.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/4e1eba2436.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/12.1.0/classic/ckeditor.js"></script>
    <link rel="icon" href="<?php echo base_url(); ?>images/icon.png" type="image">
</head>
<body>
    <section class="sidebar" id="sidebar">
        <div class="head">
            <div class="logo">
                <img src="<?php echo base_url(); ?>images/Logo.png" alt="">
                <div class="title">
                    <small>company</small>
                    <strong>Dashboard</strong>
                </div>
            </div>
        </div>
        <div class="body">
            <a href="<?php echo base_url(); ?>main">
                <span class="icon"><i class="fas fa-tachometer-alt"></i></span>
                <span class="name">DASHBOARD</span>
            </a>
            <h6>MAIN MENU</h6>
            <a href="<?php echo base_url(); ?>main/slider">
                <span class="icon"><i class="fas fa-sliders-h"></i></span>
                <span class="name">Sliders</span>
            </a>
            <a href="<?php echo base_url(); ?>main/user">
                <span class="icon"><i class="fas fa-user-alt"></i></span>
                <span class="name">Users</span>
            </a>
            <a href="<?php echo base_url(); ?>main/event">
                <span class="icon"><i class="fas fa-calendar-alt"></i></i></span>
                <span class="name">Events</span>
            </a>
            <a href="<?php echo base_url(); ?>main/product">
                <span class="icon"><i class="fas fa-cubes"></i></span>
                <span class="name">Products</span>
            </a>
            <a href="<?php echo base_url(); ?>main/news">
                <span class="icon"><i class="fas fa-newspaper"></i></span>
                <span class="name">News</span>
            </a>
            <a href="<?php echo base_url(); ?>main/magazine">
                <span class="icon"><i class="fas fa-book-open"></i></span>
                <span class="name">Magazine</span>
            </a>
            <a href="<?php echo base_url(); ?>main/order">
                <span class="icon"><i class="fas fa-gift"></i></span>
                <span class="name">Orders</span>
            </a>
            <a href="<?php echo base_url(); ?>main/subscribe">
                <span class="icon"><i class="fas fa-clipboard-check"></i></span>
                <span class="name">Subscribers</span>
            </a>
            <h6>OTHERS</h6>
            <a href="">
                <span class="icon"><i class="fas fa-cog"></i></span>
                <span class="name">SETTINGS</span>
            </a>
        </div>
    </section>
    <header>
        <div class="head">
            <div class="btnmenu">
                <div class="bars top"></div>
                <div class="bars center"></div>
                <div class="bars bottom"></div>
            </div>
            <div class="title">
                <small>Welcome,</small>
                <strong>Admin</strong>
            </div>
            <a href="<?php echo base_url(); ?>/main/logout" class="signout">SIGN OUT</a>
        </div>
        <!-- <div class="body">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h5>Dashboard</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 top-margin-10">
                        <div class="card">
                            <div class="content">
                                <div class="title">
                                    <small>TOTAL</small>
                                    <strong>Users</strong>
                                </div>
                                <div class="variable">01.59M</div>
                            </div>
                            <div class="view">VIEW ALL</div>
                        </div>
                    </div>
                    <div class="col-md-4 top-margin-10">
                        <div class="card">
                            <div class="content">
                                <div class="title">
                                    <small>TOTAL</small>
                                    <strong>Transaction</strong>
                                </div>
                                <div class="variable">12.52B</div>
                            </div>
                            <div class="view">VIEW ALL</div>
                        </div>
                    </div>
                    <div class="col-md-4 top-margin-10">
                        <div class="card card-dark">
                            <div class="content">
                                <div class="row no-gutters top-margin-10">
                                    <div class="col-8">OFFERS/CASHBACK</div>
                                    <div class="col-4 text-right">0</div>
                                </div>
                                <div class="row no-gutters top-margin-10">
                                    <div class="col-8">REWARDS</div>
                                    <div class="col-4 text-right">0</div>
                                </div>
                                <div class="row no-gutters top-margin-10">
                                    <div class="col-8">REFERRAL CLAIMS</div>
                                    <div class="col-4 text-right">0</div>
                                </div>
                            </div>
                            <div class="view">VIEW ALL</div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </header>