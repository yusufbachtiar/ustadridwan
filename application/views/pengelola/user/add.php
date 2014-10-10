<h1 class="page-header"><?php echo $header;?> User</h1>
<?php $this->load->view('pengelola/template/tinymce_init'); ?>
<?php
if (isset($user)) {
	$username = $user->user_name;
	$fullname = $user->user_full_name;
	$desc = $user->user_description;
	$readonly = 'readonly="readonly"';
}else{
	$username = set_value('username');
	$fullname = set_value('full_name');
	$desc = set_value('description');
	$readonly = '';
}
?>

<?php 
echo form_open(current_url());
echo validation_errors();
?>
<div class="col-md-8">
	<div class="row">
		<div class="col-md-<?php echo (isset($user)) ? '12' : '6' ;?>">
			<label>Username</label><br>
			<?php if (isset($user)) {
				?>
				<input type="hidden" name="id" value="<?php echo $user->user_id?>">
				<?php
			}?>
			<input type="text" name="username" value="<?php echo $username?>" class="form-control" <?php echo $readonly?>><br>
			<label>Nama Lengkap</label><br>
			<input type="text" name="full_name" value="<?php echo $fullname?>" class="form-control"><br>
			<?php if (!isset($user)) {
				?>
			</div>
			<div class="col-md-6">
				<label>Password</label><br>
				<input type="password" name="password" class="form-control"><br>
				<label>Ulangi Password</label><br>
				<input type="password" name="passconf" class="form-control"><br>
				<?php
			}?>
		</div>
	</div>
	<?php if (!isset($user)) {
		?>
		<div class="row">
			<div class="col-md-12">
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
			</div>
		</div>
		<?php
	}?>
	<div class="row">
		<div class="col-md-12">
			<label>Deskripsi</label><br>
			<textarea class='mceEditor' name="description" rows="10"><?php echo $desc?></textarea>
		</div>
	</div>
</div>
<div class="col-md-4">
	<?php if($this->session->userdata('role') == 1){ ?>
	<div class="row">
		<div class="col-md-12">
			<label>Role</label><br>
			<select name="role" class="form-control">
				<option value="1">Admin</option>
				<option value="2" <?php echo (isset($user) AND $user->user_role == 2) ? 'selected' : null ;?>>Kontributor</option>
			</select><br>
		</div>
	</div>
	<hr>
	<?php } ?>
	<label>Aksi</label><br>
	<input type="submit" value="Simpan" class="btn btn-primary">
	<?php if (isset($user)) {
		?>
		<a href="<?php echo base_url('pengelola/user')?>" class="btn btn-success">Batal</a>
		<?php if ($this->session->userdata('id') == $user->user_id) {
			?>
			<a href="<?php echo base_url('pengelola/user/cpw')?>" class="btn btn-warning">Ubah Password</a>
			<?php
		}else{
			?>
			<a href="<?php echo base_url('pengelola/user/rpw/'.$user->user_id)?>" class="btn btn-warning">Reset Password</a>
			<?php
		}?>
		<?php
		if ($user->user_id != $this->session->userdata('id')) {
			?>
			<a href="<?php echo base_url('pengelola/user/delete/'.$user->user_id)?>" onclick="return confirm('Are you sure to delete this item?')" class="btn btn-danger">Hapus</a>
			<?php
		}
	}?>
</div>

<?php echo form_close()?>