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

</head>

<body>
    <div style="margin-top: 100px;" class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <center><h1>eHijab</h1></center>
                <div class="login-panel panel panel-green">
                    <div class="panel-heading">
                        <h3 class="panel-title">Silahkan Masuk</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo form_open('admin/cek_login'); ?>
                            <fieldset>
                            <p style="color: red;"><?php echo $this->session->flashdata('pesan');?></p>
                                <div class="form-group has-success">
                                    <input class="form-control" placeholder="Username" name="username" type="username" autofocus>
                                </div>
                                <div class="form-group has-success">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <input style="width: 100%" type="submit" value="MASUK" class="btn btn-success btn-outline" name="">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer style="margin-top: 140px; padding: 20px;">
        <p style="float: right;">Copyright &copy; 2017 eHijab</p>
    </footer>
    <script src="<?php echo base_url('assets/admin/vendor/jquery/jquery.min.js') ?> "></script>
    <script src="<?php echo base_url('assets/admin/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/admin/vendor/metisMenu/metisMenu.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/admin/vendor/raphael/raphael.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/admin/vendor/morrisjs/morris.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/admin/data/morris-data.js') ?>"></script>
    <script src="<?php echo base_url('assets/admin/dist/js/sb-admin-2.js') ?>"></script>

</body>

</html>
