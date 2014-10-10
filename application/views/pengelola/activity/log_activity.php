<h1 class="page-header"><?php echo $header;?></h1>
<div class="col-md-12">
	<table class="table table-hover">
		<thead>
			<th>Tanggal</th>
			<th>Pengguna</th>
			<th>Aktivitas</th>
		</thead>
		<tbody>
			<?php foreach ($activity as $key) {
				?>
				<tr>
					<td><?php echo pretty_date($key->activity_date);?></td>
					<td><?php echo $key->user_name?></td>
					<td><?php echo $key->activity_what?></td>
				</tr>
				<?php
			}?>
		</tbody>
	</table>
	<?php
	echo $this->pagination->create_links();
	?>
</div>