<h1 class="page-header"><?php echo $header;?></h1>
<table class="table table-hover">
	<thead>
		<th>Username</th>
		<th>Role User</th>
		<th>Status Aktif</th>
		<th>Aksi</th>
	</thead>
	<tbody>
		<?php foreach ($user as $key) {
			?>
			<tr>
				<td><a href="<?php echo base_url('pengelola/user/edit/'.$key->user_id);?>"><?php echo $key->user_name?></a></td>
				<td><?php echo ($key->user_role == 1) ? 'Admin' : 'Kontributor';?></td>
				<td><?php echo ($key->user_freeze == 0) ? 'Aktif' : 'Tidak aktif';?></td>
				<td><?php if ($this->session->userdata('id') == $key->user_id) {
					?>
					<a href="<?php echo base_url('pengelola/user/cpw/')?>" class="btn btn-warning">Ubah Password</a>
					<?php
				}else{
					?>
					<a href="<?php echo base_url('pengelola/user/rpw/'.$key->user_id)?>" class="btn btn-danger">Reset Password</a>
					<?php
				}?>
			</td>
		</tr>
		<?php
	}?>
</tbody>
</table>