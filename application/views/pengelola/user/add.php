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
		<div class="col-md-12">
			<label>Username</label><br>
			<?php if (isset($user)) {
				?>
				<input type="hidden" name="id" value="<?php echo $user->user_id?>">
				<?php
			}?>
			<input type="text" name="username" value="<?php echo $username?>" class="form-control" <?php echo $readonly?>><br>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<label>Nama Lengkap</label><br>
			<input type="text" name="full_name" value="<?php echo $fullname?>" class="form-control"><br>
		</div>
	</div>
	<?php if (!isset($user)) {
		?>
		<div class="row">
			<div class="col-md-12">
				<label>Password</label><br>
				<input type="password" name="password" class="form-control"><br>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<label>Ulangi Password</label><br>
				<input type="password" name="passconf" class="form-control"><br>
			</div>
		</div>
		<?php
	}?>
	<?php if($this->session->userdata('role') == 1){ ?>
	<div class="row">
		<div class="col-md-12">
			<label>Role</label><br>
			<select name="role" class="form-control">
				<option value="1">Admin</option>
				<option value="2" <?php echo (isset($user) AND $user->user_role == 2) ? 'selected' : null ;?>>Pengguna</option>
			</select><br>
		</div>
	</div>
	<?php } ?>
	<div class="row">
		<div class="col-md-12">
			<label>Deskripsi</label><br>
			<textarea class='mceEditor' name="description" rows="10"><?php echo $desc?></textarea>
		</div>
	</div>
</div>
<div class="col-md-4">
	<label>Aksi</label><br>
	<input type="submit" value="Simpan" class="btn btn-primary">
</div>

<?php echo form_close()?>