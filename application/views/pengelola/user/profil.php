<h1 class="page-header"><?php echo $header;?></h1>
<div class="col-md-4">
	<label>Username</label><br>
	<label>Nama Lengkap</label><br>
	<label>Deskripsi</label><br>
	<label>Role</label>
</div>
<div class="col-md-4">
	<label><?php echo $profil->user_name?></label><br>
	<label><?php echo $profil->user_full_name?></label><br>
	<label><?php echo $profil->user_description?></label><br>
	<label><?php echo ($profil->user_role == 1) ? 'Admin' : 'Pengguna' ;?></label><br>
</div>
<div class="col-md-4">
	<a href="<?php echo site_url('pengelola/user/edit/'.$this->session->userdata('id'))?>" class="btn btn-primary">Edit</a>
	<a href="<?php echo site_url('pengelola/user/cpw/'.$this->session->userdata('id'))?>" class="btn btn-success">Ubah Password</a>
</div>