	<section class="product">
		<div class="container">
		<br>
		<?php echo $this->session->flashdata('sukses'); ?>
			<center><h1>Akun anda belum diverifikasi, silahkan cek email <?php echo $this->session->userdata('email'); ?> untuk memverifikasi</h1>
			<p>Kirim ulang email klik <a href="<?php echo base_url('marketplace/resend/')?>">disini</a></p>
			</center>
		</div>
	</section>