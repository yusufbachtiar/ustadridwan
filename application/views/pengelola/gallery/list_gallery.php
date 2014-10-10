<h1 class="page-header"><?php echo $header;?></h1>
<ul class="nav nav-tabs" role="tablist">
	<li class="active"><a href="#semua" role="tab" data-toggle="tab">Semua</a></li>
	<li><a href="#foto" role="tab" data-toggle="tab">Foto</a></li>
	<li><a href="#video" role="tab" data-toggle="tab">Video</a></li>
</ul>
<div class="col-md-12">
	<div class="tab-content">
		<div class="tab-pane active" id="semua">
			<table class="table table-hover">
				<thead>
					<th>Judul</th>
					<th>Jenis</th>
				</thead>
				<tbody>
					<?php foreach ($gallery as $key) {
						?>
						<tr>
							<td><a href="<?php echo site_url('pengelola/gallery/edit/'.$key->gallery_id)?>"><?php echo $key->gallery_title?></a> </td>
							<td><?php echo $key->gallery_type?></td>
						</tr>
						<?php
					}?>
				</tbody>
			</table>
		</div>
		<div class="tab-pane" id="foto">
			<table class="table table-hover">
				<thead>
					<th>Judul</th>
					<th>Jenis</th>
				</thead>
				<tbody>
					<?php foreach ($foto as $key) {
						?>
						<tr>
							<td><a href="<?php echo site_url('pengelola/gallery/edit/'.$key->gallery_id)?>"><?php echo $key->gallery_title?></a> </td>
							<td><?php echo $key->gallery_type?></td>
						</tr>
						<?php
					}?>
				</tbody>
			</table>
		</div>
		<div class="tab-pane" id="video">
			<table class="table table-hover">
				<thead>
					<th>Judul</th>
					<th>Jenis</th>
				</thead>
				<tbody>
					<?php foreach ($video as $key) {
						?>
						<tr>
							<td><a href="<?php echo site_url('pengelola/gallery/edit/'.$key->gallery_id)?>"><?php echo $key->gallery_title?></a> </td>
							<td><?php echo $key->gallery_type?></td>
						</tr>
						<?php
					}?>
				</tbody>
			</table>
		</div>
	</div>
	<?php
	echo $this->pagination->create_links();
	?>
</div>