<h1 class="page-header"><?php echo $header;?></h1>
<div class="col-md-12">
	<table class="table table-hover">
		<thead>
			<th>Tentang</th>
			<th>Tanggal Masuk</th>
			<th>Publikasi</th>
		</thead>
		<tbody>
			<?php foreach ($question as $key) {
				?>
				<tr>
					<td>
						<a href="<?php echo base_url('pengelola/question/edit/'.$key->question_id)?>"><?php echo $key->question_title;?>
						</a>
					</td>
					<td><?php echo pretty_date($key->question_date);?></td>
					<td><?php echo ($key->question_is_publish == 0) ? 'Draft' : 'Terbit' ;?></td>
				</tr>
				<?php
			}?>
		</tbody>
	</table>
	<?php
	echo $this->pagination->create_links();
	?>
</div>
