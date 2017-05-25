
	<section class="product">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<br>
					<h4>Sudah punya akun? Masuk disini</h4>
					<div class="login-box">
						<p style="color: red;"><?php echo $this->session->flashdata('pesan');?></p>
						<?php echo form_open('marketplace/cek_login/'.$kode.'/'.$warna.'/'.$jumlah); ?>
							<p><input type="text" autofocus="" class="form-control" placeholder="username" name="username"></p>
							<p><input type="password" class="form-control" placeholder="password" name="password"></p>
							<p><input type="submit" value="Masuk" class="btn btn-default btn-login" name=""></p>
						</form>
					</div>
				</div>
				<div class="col-md-8">
					<br>
					<h4>Belum punya akun? Daftar disini</h4>
					<div class="login-box">
						<form method="post" action="<?php echo base_url('marketplace/daftar') ?>">
							<p><input type="text" class="form-control" placeholder="Nama Lengkap" name="nama"></p>
							<p style="color: red"><?php echo $this->session->flashdata('username_auth') ?></p>
							<p><input type="username" class="form-control" placeholder="Username" name="username"></p>
							<p><input type="email" class="form-control" placeholder="Email" name="email"></p>
							<p style="color: red"><?php echo $this->session->flashdata('error_daftar') ?></p>
							<p style="color: red"><?php echo $this->session->flashdata('ukuran_pass') ?></p>
							<p style="color: rgb(100,100,100); font-size: 12px; font-style: italic;">Password harus lebih dari 10 karakter</p>
							<p><input type="password" class="form-control" placeholder="Password" name="password"></p>
							<p><input type="password" class="form-control" placeholder="Konfirmasi password" name="confpassword"></p>
							<p><input type="submit" value="Daftar" class="btn btn-default btn-login" name=""></p>
						</form>
						<br>
					</div>
				</div>
			</div>
		</div>
	</section>
