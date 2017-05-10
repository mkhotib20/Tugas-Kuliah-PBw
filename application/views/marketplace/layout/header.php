<!DOCTYPE html>
<html>
<head>
	<title>eHijab | <?php echo $page; ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Tempat untuk mendapatkan kerudung berkualitas dan bergaya sesuai syar'i.">
    <meta name="author" content="Muhammad Khotib | Mohamad David">
    <link href="<?php echo base_url('assets/marketplace/css/normalize.css'); ?>" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/marketplace/img/favicon.png'); ?>"/>
    <link href="<?php echo base_url('assets/marketplace/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/marketplace/css/style.css') ?>" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top ">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
	        		<span class="icon-bar"></span>
			        <span class="icon-bar"></span>
	        		<span class="icon-bar"></span>
	        	</button>
        		<a class="navbar-brand" href="<?php echo base_url(); ?>">eHijab</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<form class="navbar-form navbar-left" role="search">
					<div class="input-group src">
			            <input style="border: none; height: 32px" type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
			            <div class="input-group-btn">
			                <button style="border: none;" class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
			            </div>
			        </div>
				</form>
				<ul class="nav navbar-nav navbar-right" id="nav-top">
					<li <?php if ($page=='home') {echo 'class="active"';} ?> ><a href="<?php echo base_url(); ?>">Home</a></li>
					<li class=" <?php if ($page=='product') {echo 'active';} ?> dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Produk <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url('marketplace/product/pasminah'); ?>">Pasminah</a></li>
							<li><a href="<?php echo base_url('marketplace/product/kotak'); ?>">Kotak</a></li>
						</ul>
					</li>
					<li <?php if ($page=='mengenai kami') {echo 'active';} ?>><a href="#">Mengenai Kami</a></li>
					<li <?php if ($page=='login') {echo 'active';} ?>><a href="#">Login</a></li>
				</ul>
			</div>
		</div>
	</nav>