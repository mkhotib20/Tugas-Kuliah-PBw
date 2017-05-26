<?php foreach ($read as $r) { 
	$username = $r['id_user'];
	
}?>
	<section class="product">
		<div class="container">
			<div class="col-md-4">
			<?php echo $this->session->flashdata('msgSc') ?>
				<?php echo form_open('marketplace/gantiPass') ?>
					<p><input autofocus="" type="password" placeholder="password lama" class="form-control" name="passLama"></p>
					<p><input type="password" placeholder="password baru" class="form-control" name="passBaru"></p>
					<p><input type="password" placeholder="konfirmasi password baru" class="form-control" name="confPassBaru"></p>
					<p><input type="submit" value="Perbarui password" class="btn btn-primary "></p>
				</form>
			</div>
		</div>
	</section>
