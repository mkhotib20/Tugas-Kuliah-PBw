<?php 
foreach ($produk as $p ) {
	$barang = $p['nama_produk'];
	$harga = $p['harga_produk'];
	$gambar = $p['gambar_produk'];
}
 ?>
	<section class="product">
		<div class="container">
			<div class="produk">
				<div class="row">
					<div class="col-md-4">
						<div class="rincian">
							<h3>Rincian</h3>
							<div class="belanja">
								<img style="width: 70%" src="<?php echo $gambar ?>">
								<br>
								<br>
								<p><?php echo $barang ?></p>
								<p class="right"><?php echo $harga ?></p>
								<p>Ongkos Kirim</p>
								<p class="right">Rp. 30.000,-</p>
								<hr> +
								<div class="total">
									<p>Total</p>
									<p class="right">Rp. 150.000,-</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-8">
						<h3 style="float: right;">Pilih Metode Pembayaran</h3>
					</div>
				</div>
			</div>
		</div>
	</section>
