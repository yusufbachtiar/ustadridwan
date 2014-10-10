<h1 class="page-header"><?php echo $header;?> User</h1>
<?php echo form_open(current_url());
echo validation_errors();
?>
<div class="col-md-8">
	<?php if ($this->uri->segment(3) == 'cpw') {
		?>
		<div class="row">
			<div class="col-md-12">
				<label>Password Lama</label><br>
				<input type="password" name="old_pass" class="form-control"><br>
			</div>
		</div>
		<?php
	}else{
		?>
		<input type="hidden" name="id" value="<?php echo $id?>">
		<?php
	}?>
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
	<a href="<?php echo base_url('pengelola/user');?>" class="btn btn-success">Batal</a>
</div>
<?php echo form_close()?>