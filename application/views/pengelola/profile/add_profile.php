<?php $this->load->view('pengelola/template/tinymce_init'); ?>
<h1 class="page-header"><?php echo $header;?> Profil</h1>
<?php
if (isset($profile)) {
	$name = $profile->profile_full_name;
	$address = $profile->profile_address;
	$study = $profile->profile_study;
	$activity = $profile->profile_activity;
	$description = $profile->profile_description;
	$organisation = $profile->profile_organisation;
	$image = $profile->profile_image;
	$phone = $profile->profile_phone;
	$pin = $profile->profile_pin;
	$fb = $profile->profile_fb;
	$twitter = $profile->profile_twitter;
	echo validation_errors();
	echo form_open_multipart(current_url());
}
?>
<div class="col-md-8">
	<div class="row">
		<div class="col-md-12">
			<label>Nama Lengkap</label><br>
			<input type="text" name="name" value="<?php echo $name?>" class="form-control"><br>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<label>Alamat</label><br>
			<textarea name="address" class="mcEditor"><?php echo $address?></textarea><br>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<label>Riwayat Pendidikan</label><br>
			<textarea name="study" class="mcEditor"><?php echo $study?></textarea><br>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<label>Aktivitas</label><br>
			<textarea name="activity" class="mcEditor"><?php echo $activity?></textarea><br>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<label>Organisasi</label><br>
			<textarea name="organisation" class="mcEditor"><?php echo $organisation?></textarea><br>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<label>Deskripsi Lain</label><br>
			<textarea name="description" class="mcEditor"><?php echo $description?></textarea><br>
		</div>
	</div>
	
</div>
<div class="col-md-4">
	<div class="row">
		<div class="col-md-12">
			<label>Telepon</label><br>
			<input type="text" name="phone" class="form-control" value="<?php echo $phone?>"><br>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<label>Pin BB</label><br>
			<input type="text" name="pin" class="form-control" value="<?php echo $pin?>"><br>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<label>Facebook</label><br>
			<input type="text" name="fb" class="form-control" value="<?php echo $fb?>"><br>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<label>Twitter</label><br>
			<input type="text" name="twitter" class="form-control" value="<?php echo $twitter?>"><br>
		</div>
	</div>
	<hr>
	<label>Aksi</label><br>
	<input type="submit" value="Simpan" class="btn btn-primary">
	<a href="<?php echo site_url('pengelola/profile')?>" class="btn btn-success">Batal</a>
	<hr>
	<label>Photo</label><br>
	<input type="file" name="photo"><br>
	<div class="row">
		<?php if (isset($image)) {
			?>
			<div class="col-md-12">
				<img class="img img-rounded" width="200px" src="<?php echo base_url()?>images/<?php echo $image ?>">
			</div>
			<?php
		}?>
	</div>
</div>
<?php echo form_close();?>