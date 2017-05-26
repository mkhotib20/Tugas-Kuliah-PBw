	<section class="header">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		  <!-- Indicators -->
		  <ol class="carousel-indicators">
		    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
		  </ol>
		  <div style="z-index: 10; width: 100%; position: absolute;">
		  	<?php echo $this->session->flashdata('success') ?>
		  </div>
		  <!-- Wrapper for slides -->
		  <div class="carousel-inner" role="listbox">
		    <div class="item active">
		      <img src="<?php echo base_url('assets/marketplace/img/slide-1.jpg') ?>" alt="...">
		      <div class="carousel-caption">
		      	<br>
		      	<h3>COBAJA</h3>
		      </div>
		    </div>
		    <div class="item ">
		      <img src="<?php echo base_url('assets/marketplace/img/slide-1.jpg') ?>" alt="...">
		      <div class="carousel-caption">
		      	<br>
		      	<h3>COBAJA</h3>
		      </div>
		    </div>
		    <div class="item ">
		      <img src="<?php echo base_url('assets/marketplace/img/slide-1.jpg') ?>" alt="...">
		      <div class="carousel-caption">
		      	<br>
		      	<h3>COBAJA</h3>
		      </div>
		    </div>
		  </div>

		  <!-- Controls -->
		  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
	</section>
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
							<p><span class="glyphicon glyphicon-tags"/> <?php echo $p['kategori'] ?></p>
							<h3><?php echo $p['nama_produk'] ?></h3>
							<p><?php echo 'Rp. '.number_format($p['harga_produk'], 2, ',', '.'); ?></p>
							<a class="btn btn-default" href="<?php echo base_url('marketplace/detail/'.$p['id_produk']); ?>">Detail</a>							
						</div>
					</div>
				</div>
			<?php } ?>
			</div>
		</div>
	</section>