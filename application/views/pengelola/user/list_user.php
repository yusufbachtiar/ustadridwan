<h1 class="page-header"><?php echo $header;?></h1>
<table class="table table-hover">
	<thead>
		<th>Username</th>
		<th>Role User</th>
		<th>Status Aktif</th>
	</thead>
	<tbody>
		<?php foreach ($user as $key) {
			?>
			<tr>
				<td><a href="<?php echo base_url('pengelola/user/edit/'.$key->user_id);?>"><?php echo $key->user_name?></a></td>
				<td><?php echo ($key->user_role == 1) ? 'Admin' : 'Kontributor';?></td>
				<td><?php echo ($key->user_freeze == 0) ? 'Aktif' : 'Tidak aktif';?></td>
			</tr>
			<?php
		}?>
	</tbody>
</table>