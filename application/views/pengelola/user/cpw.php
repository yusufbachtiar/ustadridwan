<?php echo form_open(current_url());
echo validation_errors();
?>
<div class="col-md-8">
	<div class="row">
		<div class="col-md-12">
			<label>Password Lama</label><br>
			<input type="password" name="old_pass" class="form-control"><br>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<label>Password Baru</label><br>
			<input type="password" name="new_pass" class="form-control"><br>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<label>Konformasi Password Baru</label><br>
			<input type="password" name="new_pass_conf" class="form-control"><br>
		</div>
	</div>
</div>
<div class="col-md-4">
	<label>Aksi</label><br>
	<input type="submit" value="Save" class="btn btn-primary">
</div>
<?php echo form_close()?>