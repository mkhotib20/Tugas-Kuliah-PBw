
	<section class="product">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<br>
					<h4>Sudah punya akun? Masuk disini</h4>
					<div class="login-box">
						<p style="color: red;"><?php echo $this->session->flashdata('pesan');?></p>
						<?php echo form_open('marketplace/cek_login/'.$kode); ?>
							<p><input type="text" class="form-control" placeholder="username" name="username"></p>
							<p><input type="password" class="form-control" placeholder="password" name="password"></p>
							<p><input type="submit" value="Masuk" class="btn btn-default btn-login" name=""></p>
						</form>
					</div>
				</div>
				<div class="col-md-8">
					<br>
					<h4>Belum punya akun? Daftar disini</h4>
					<div class="login-box">
						<form>
							<p><input type="text" class="form-control" placeholder="Nama Lengkap" name="email"></p>
							<p><input type="username" class="form-control" placeholder="Username" name="email"></p>
							<p><input type="email" class="form-control" placeholder="Email" name="email"></p>
							<p><input type="password" class="form-control" placeholder="Password" name="password"></p>
							<p><input type="password" class="form-control" placeholder="Konfirmasi password" name="password"></p>
							<p><input type="submit" value="Daftar" class="btn btn-default btn-login" name=""></p>
						</form>
						<br>
					</div>
				</div>
			</div>
		</div>
	</section>
