
	<section class="product">
		<div class="container">
			<h1>Detail</h1>
			<hr>
			<?php foreach ($produk as $p) { 
				$kategori = $p['kategori'];
				?>
			<div class="produk">
				<div class="row">
					<div class="col-md-6">
						<img class="main-img" src="<?php echo $p['gambar_produk'] ?>">
					</div>
					
					<div class="col-md-6">
						<h1><?php echo $p['nama_produk'] ?></h1>
						<h3><?php echo 'Rp. '.number_format($p['harga_produk'], 2, ',', '.'); ?></h3>
						<br>
						<form method="get" action="<?php echo base_url('marketplace/po/').$p['id_produk'] ?>">

							<p class="col-md-3">
								<span>Jumlah : </span>
								<input value="1" type="text" name="jumlah" onkeypress="return hanyaAngka(event)" placeholder="Jumlah" class="form-control" class="form-control" >
							</p>

							<p class="col-md-3">
								<span>Warna : </span>
								<select name="warna" class="form-control">
									<option>Merah</option>
									<option>Biru</option>
									<option>Hijau</option>
								</select>						
							</p>
						
						<br>
						<p class="col-md-12">
							<h1>Deskripsi Produk : </h1>
							<?php echo $p['deskripsi'] ?>
						</p>
						<input type="submit" style="height: 40px; float: right; padding-top: 10px; "  class="btn btn-primary" value="Beli Sekarang" >
						</form>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
	<section class="produk">
		<div class="container">
			<h3>Produk Terkait</h3>
							<hr>
			<div class="row">
			<?php foreach ($produkTerkait as $t) { ?>
				<div class="col-md-3">
					<div class="box">
						<div class="img">
							<img style="max-height: 170px;" src="<?php echo $t['gambar_produk'] ?>">
						</div>
						<div class="caption">
						<p><span class="glyphicon glyphicon-tags"/> <?php echo $p['kategori'] ?></p>
							<h3><?php echo $t['nama_produk'] ?></h3>
							<p><?php echo 'Rp. '.number_format($p['harga_produk'], 2, ',', '.'); ?></p>
							<a class="btn btn-default" href="<?php echo base_url('marketplace/detail/'.$p['id_produk']); ?>">Detail</a>							
						</div>
					</div>
				</div>
			<?php } ?>
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