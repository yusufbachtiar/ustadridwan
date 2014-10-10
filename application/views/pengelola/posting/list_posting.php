
<h1 class="page-header"><?php echo $header;?> Kategori Posting</h1>
<div class="col-md-12">
	<table class="table table-hover">
		<thead>
			<th>Judul</th>
			<th>Penulis</th>
			<th>Tanggal Penerbitan</th>
			<th>Status Publikasi</th>
		</thead>
		<tbody>
			<?php foreach ($posting as $key) {
				?>
				<tr>
					<td><a href="<?php echo site_url('pengelola/posting/edit/'.$key->posting_id)?>"><?php echo $key->posting_title?></a></td>
					<td><?php echo $key->user_full_name?></td>
					<td><?php echo $key->posting_date?></td>
					<td><?php echo ($key->posting_is_publish == 1) ? 'Terbit' : 'Draft' ;?></td>
				</tr>
				<?php
			}?>
		</tbody>
	</table>
<?php
echo $this->pagination->create_links();
?>
</div>