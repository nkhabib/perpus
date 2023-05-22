<!DOCTYPE html>

<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" href="<?php echo base_url().'assets/images/apple-touch-icon.png' ?>">
    <link rel="shortcut icon" type="image/ico" href="<?php echo base_url().'assets/images/favicon.ico' ?>" />

    <!-- Plugin-CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/owl.carousel.min.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/icofont.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/cardslider.css' ?>">

    <!-- Main-Stylesheets -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/overright.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/theme.css' ?>">
</head>

<body data-spy="scroll" data-target="#mainmenu" data-offset="50">

    <header class="relative" id="sc1">
        <!-- Header-background-markup -->
        <div class="header-bg relative home-slide">
            <div class="item">
                <img src="<?php echo base_url().'assets/images/slide/slide1.jpg' ?>" alt="library">
            </div>
            <div class="item">
                <img src="<?php echo base_url().'assets/images/slide/slide2.jpg' ?>" alt="library">
            </div>
            <div class="item">
                <img src="<?php echo base_url().'assets/images/slide/slide3.jpg' ?>" alt="library">
            </div>
            <div class="item">
                <img src="<?php echo base_url().'assets/images/slide/slide4.jpg' ?>" alt="library">
            </div>
        </div>
        <!-- Mainmenu-markup-start -->
        <div class="mainmenu-area navbar-fixed-top" data-spy="affix" data-offset-top="10">
            <nav class="navbar">
                <div class="container">
                    <div class="navbar-header">
                        <div class="space-10"></div>
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainmenu">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!--Logo-->
                        <a href="#sc1" class="navbar-left show"><img src="<?php echo base_url().'assets/images/logo.png'?>" alt="library"></a>
                        <div class="space-10"></div>
                    </div>
                    <!--Toggle-button-->

                    <!--Active User-->
                    <div class="nav navbar-right">
                        <div class="active-user navbar-left active">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="<?php echo base_url().'assets/images/active_user.png' ?>" class="img-circle img-thumbnail" alt="library" />
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#"> <span><i class="icofont icofont-user"></i></span> Profile</a>
                                        </li>
                                        <li>
                                            <a href="#"> <span><i class="icofont icofont-notification"></i></span> Notifications</a>
                                        </li>
                                        <li>
                                            <a href="#"> <span><i class="icofont icofont-settings"></i></span> Settings</a>
                                        </li>
                                        <li>
                                            <a href="#"> <span><i class="icofont icofont-read-book"></i></span>My Books</a>
                                        </li>
                                        <li>
                                            <a href="#"> <span><i class="icofont icofont-logout"></i></span> Log Out</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                                        <!--Mainmenu list-->
                    <div class="navbar-right in fade" id="mainmenu">
                        <ul class="nav navbar-nav nav-white text-uppercase">
                            <li class="active">
                                <a href="#sc1">Home</a>
                            </li>
                            <li>
                                <a href="#sc2">Tentang Kami</a>
                            </li>
                            <li>
                                <a href="#sc4">Tim Kami</a>
                            </li>
                            <li>
                                <a href="#sc5">Event</a>
                            </li>
                            <li>
                                <a href="#sc6">Klien</a>
                            </li>
                            <li>
                                <a class="login" href="<?php echo base_url('Pengguna'); ?>">Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="space-100"></div>
        <!-- Mainmenu-markup-end -->