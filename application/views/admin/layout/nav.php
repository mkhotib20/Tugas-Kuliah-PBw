<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Halaman dashboard untuk eHijab">
    <meta name="author" content="eHijab">
    <title>eHijab Admin Area</title>
    <link href="<?php echo base_url('assets/admin/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/admin/vendor/bootstrap/css/bootstrap.min.css') ?>vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/admin/dist/css/sb-admin-2.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/admin/vendor/morrisjs/morris.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/admin/vendor/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/admin/css/style.css') ?>" rel="stylesheet" type="text/css">

</head>

<body>

<div id="wrapper">
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('admin') ?>">eHijab Admin Area</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a  class="dropdown-toggle user" data-toggle="dropdown" href="#">
                        <i  class="fa fa-user fa-fw "></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul style="width: auto;" class="dropdown-menu dropdown-messages">
                        <li><a href="<?php echo base_url('admin/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo base_url('admin') ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/produk') ?>"><i class="fa fa-table fa-fw"></i> Products</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/tambah') ?>"><i class="fa fa-edit fa-fw"></i> Input Product</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/order') ?>"><i class="fa fa-edit fa-fw"></i> Order</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>