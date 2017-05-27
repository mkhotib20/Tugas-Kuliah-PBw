
	<section class="product">
		<div class="container">
			<h1>Produk Terbaru</h1>
			<hr>
			<div class="row">
			<?php foreach ($produk as $p) {?>
				<div class="col-md-3">
					<div class="box">
						<div class="img">
							<img style="max-height: 170px;" src="<?php echo $p['gambar_produk'] ?>">
						</div>
						<div class="caption">
							<ul class="info-produk">
								<li><span class="glyphicon glyphicon-tags"/> <?php echo $p['kategori'] ?></li>
								<li><span class="glyphicon glyphicon-eye-open"/> <?php echo $p['popularitas_produk'] ?></li>
							</ul>
							<h4><?php echo $p['nama_produk'] ?></h4>
							<p><?php echo 'Rp. '.number_format($p['harga_produk'], 2, ',', '.'); ?></p>
							<a class="btn btn-default" href="<?php echo base_url('marketplace/detail/'.$p['id_produk']); ?>">Detail</a>							
						</div>
					</div>
				</div>
			<?php } ?>
			</div>
		<center>
			<nav>
			  <ul class="pagination">
			    <li>
			      <a href="#" aria-label="Previous">
			        <span aria-hidden="true">&laquo;</span>
			      </a>
			    </li>
			    <li class="active"><a href="#">1</a></li>
			    <li><a href="#">2</a></li>
			    <li><a href="#">3</a></li>
			    <li><a href="#">4</a></li>
			    <li><a href="#">5</a></li>
			    <li>
			      <a href="#" aria-label="Next">
			        <span aria-hidden="true">&raquo;</span>
			      </a>
			    </li>
			  </ul>
			</nav>
		</center>
		</div>
	</section>