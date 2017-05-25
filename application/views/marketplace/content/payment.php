<?php 
foreach ($produk as $p ) {
	$barang = $p['nama_produk'];
	$harga = $p['harga_produk'];
	$gambar = $p['gambar_produk'];
	$tagihan = $harga*$jumlah;
}
 ?>

	<section class="product">
		<div class="container">
			<div class="produk">
				<div class="row">
					<div class="col-md-4">
						<div class="rincian">
							<h3>Total Belanja</h3>
							<div class="belanja">
								<br>
								<br>
								<p><?php echo $barang ?></p>
								<p class="right"><?php echo 'Rp. '.number_format($tagihan, 2, ',', '.'); ?></p>
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
						<h3 >Rincian Belanja</h3>
						<br>
						<div class="col-md-4">
							<img style="width: 100%" src="<?php echo $gambar ?>">
						</div>
						<div class="col-md-4">
							<p>Nama Produk : <?php echo $barang ?></p>
							<p>Warna : <?php echo $warna ?></p>
							<p>Jumlah : <?php echo $jumlah ?></p>
							<a class="btn btn-primary" href="<?php echo base_url('marketplace/proses_order/'.$kode.'/'.$tagihan.'/'.$warna.'/'.$jumlah) ?>">Setuju Pesan</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
