<h1 class="page-header"><?php echo $header;?></h1>
<ul class="nav nav-tabs" role="tablist">
	<li class="active"><a href="#home" role="tab" data-toggle="tab">Semua</a></li>
	<li><a href="#sekali" role="tab" data-toggle="tab">Sekali</a></li>
	<li><a href="#pekan" role="tab" data-toggle="tab">Pekanan</a></li>
	<li><a href="#bulan" role="tab" data-toggle="tab">Bulanan</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
	<div class="tab-pane active" id="home">
		<table class="table table-striped">
			<thead>
				<th>Acara</th>
				<th>Tanggal Mulai</th>
				<th>Tanggal Selesai</th>
				<th>Lokasi</th>
			</thead>
			<tbody>
				<?php foreach ($semua as $key) {
					?>
					<tr>
						<td><a href="<?php echo site_url('pengelola/event/edit/'.$key->event_id)?>"><?php echo $key->event_title?></a></td>
						<td><?php echo pretty_date($key->event_date_start)?></a></td>
						<td><?php echo pretty_date($key->event_date_end)?></td>
						<td><?php echo $key->event_location?></td>
					</tr>
					<?php
				}?>
			</tbody>
		</table>
	</div>
	<div class="tab-pane" id="sekali">
		<table class="table table-striped">
			<thead>
				<th>Acara</th>
				<th>Tanggal Mulai</th>
				<th>Tanggal Selesai</th>
				<th>Lokasi</th>
			</thead>
			<tbody>
				<?php foreach ($sekali as $key) {
					?>
					<tr>
						<td><a href="<?php echo site_url('pengelola/event/edit/'.$key->event_id)?>"><?php echo $key->event_title?></a></td>
						<td><?php echo pretty_date($key->event_date_start)?></a></td>
						<td><?php echo pretty_date($key->event_date_end)?></td>
						<td><?php echo $key->event_location?></td>
					</tr>
					<?php
				}?>
			</tbody>
		</table>
	</div>
	<div class="tab-pane" id="pekan">
		<table class="table table-striped">
			<thead>
				<th>Acara</th>
				<th>Tanggal Mulai</th>
				<th>Tanggal Selesai</th>
				<th>Lokasi</th>
			</thead>
			<tbody>
				<?php foreach ($pekanan as $key) {
					?>
					<tr>
						<td><a href="<?php echo site_url('pengelola/event/edit/'.$key->event_id)?>"><?php echo $key->event_title?></a></td>
						<td><?php echo pretty_date($key->event_date_start)?></a></td>
						<td><?php echo pretty_date($key->event_date_end)?></td>
						<td><?php echo $key->event_location?></td>
					</tr>
					<?php
				}?>
			</tbody>
		</table>
	</div>
	<div class="tab-pane" id="bulan">
		<table class="table table-striped">
			<thead>
				<th>Acara</th>
				<th>Tanggal Mulai</th>
				<th>Tanggal Selesai</th>
				<th>Lokasi</th>
			</thead>
			<tbody>
				<?php foreach ($bulanan as $key) {
					?>
					<tr>
						<td><a href="<?php echo site_url('pengelola/event/edit/'.$key->event_id)?>"><?php echo $key->event_title?></a></td>
						<td><?php echo pretty_date($key->event_date_start)?></a></td>
						<td><?php echo pretty_date($key->event_date_end)?></td>
						<td><?php echo $key->event_location?></td>
					</tr>
					<?php
				}?>
			</tbody>
		</table>
	</div>
	<?php
	echo $this->pagination->create_links();
	?>
</div>