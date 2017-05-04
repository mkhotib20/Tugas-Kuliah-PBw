
	<section class="product">
		<div class="container">
			<h1>Detail</h1>
			<hr>
			<div class="produk">
				<div class="row">
					<div class="col-md-6">
						<img class="main-img" src="<?php echo base_url('assets/marketplace/img/slide-1.jpg') ?>">

						<div class="row">
							<div class="col-md-2">
								<img class="sub-img" src="<?php echo base_url('assets/marketplace/img/slide-1.jpg') ?>">
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<h1>Kerudung Nama</h1>
						<h3>Rp. 190.000,-</h3>
						<br>
						<form>

							<p class="col-md-3">
								<span>Jumlah : </span>
								<input value="1" onkeypress="return hanyaAngka(event)" placeholder="Jumlah" class="form-control" class="form-control" >
							</p>

							<p class="col-md-3">
								<span>Warna : </span>
								<select class="form-control">
									<option>Merah</option>
									<option>Biru</option>
									<option>Hijau</option>
								</select>						
							</p>
						</form>
						<br>
						<p class="col-md-12">
							<h1>Deskripsi Produk : </h1>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</p>
						<button style="height: 50px; margin-left: 400px;" class="btn btn-primary .btn-outline">Beli Sekarang</button>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="produk">
		<div class="container">
			<h3>Produk Terkait</h3>
							<hr>
			<div class="row">
				<div class="col-md-3">
					<div class="box">
						<div class="img">
							<img src="<?php echo base_url('assets/marketplace/img/slide-1.jpg"') ?>">
						</div>
						<div class="caption">
							<h3>Kerudung</h3>
							<p>Rp. 100.000,-</p>
							<a class="btn btn-default" href="<?php echo base_url('detail-product'); ?>">Detail</a>							
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="box">
						<div class="img">
							<img src="<?php echo base_url('assets/marketplace/img/slide-1.jpg"') ?>">
						</div>
						<div class="caption">
							<h3>Kerudung</h3>
							<p>Rp. 100.000,-</p>
							<a class="btn btn-default" href="<?php echo base_url('detail-product'); ?>">Detail</a>							
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="box">
						<div class="img">
							<img src="<?php echo base_url('assets/marketplace/img/slide-1.jpg"') ?>">
						</div>
						<div class="caption">
							<h3>Kerudung</h3>
							<p>Rp. 100.000,-</p>
							<a class="btn btn-default" href="<?php echo base_url('detail-product'); ?>">Detail</a>							
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="box">
						<div class="img">
							<img src="<?php echo base_url('assets/marketplace/img/slide-1.jpg"') ?>">
						</div>
						<div class="caption">
							<h3>Kerudung</h3>
							<p>Rp. 100.000,-</p>
							<a class="btn btn-default" href="<?php echo base_url('detail-product'); ?>">Detail</a>							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script>
		function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
	</script>