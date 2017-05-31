<?php foreach ($read as $r) { 
	$username = $r['id_user'];
	$nama = $r['nama_user'];
	$alamat = $r['alamat_user'];
	$gambar = $r['gambar_user'];
	$email = $r['email_user'];
}?>
	<section class="product">
		<div class="container">
		<?php echo $this->session->userdata('success') ?>
			<h1>Perbaharui Profil Anda</h1>
				<?php echo form_open_multipart('marketplace/updateProfile') ?>
					<div class="col-md-6">
						<br>
						<em><p style="color: rgb(100,100,100);">username tidak dapat diubah</p></em>
						<p><input readonly="" value="<?php echo $username ?>" type="text" class="form-control" name="username"></p>
						<p><input value="<?php echo $nama ?>" type="text" class="form-control" name="nama"></p>
						<p><input value="<?php echo $email ?>" type="text" class="form-control" name="email"></p>
						<p><input value="<?php echo $alamat ?>" type="text" placeholder="Alamat" class="form-control" name="alamat"></p>
					</div>
					<div class="col-md-6">
						<img style="height: 200px;" id="preview_gambar" src="<?php echo $gambar ?>" alt="Gambar Anda" />
						<p><input type='file' onchange="readURL(this);"  name="gambar" /></p>
						<p><input type="submit" class="btn btn-primary" value="Update"></p>
					</div>
				</form>
		</div>
	</section>
	<script>
		function readURL(input) { // Mulai membaca inputan gambar
		if (input.files && input.files[0]) {
		var reader = new FileReader(); // Membuat variabel reader untuk API FileReader
		 
		reader.onload = function (e) { // Mulai pembacaan file
		$('#preview_gambar') // Tampilkan gambar yang dibaca ke area id #preview_gambar
		.attr('src', e.target.result)
		.width(150); // Menentukan lebar gambar preview (dalam pixel)
		//.height(200); // Jika ingin menentukan lebar gambar silahkan aktifkan perintah pada baris ini
		};
		 
		reader.readAsDataURL(input.files[0]);
		}
		}
	</script>