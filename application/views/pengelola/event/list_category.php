<h1 class="page-header"><?php echo $header;?></h1>
<div class="col-md-12">
	<table class="table table-hover">
		<thead>
			<th>Kategori</th>
		</thead>
		<tbody>
			<?php foreach ($kategori as $key) {
				?>
				<tr>
					<td><a href="<?php echo site_url('pengelola/event/category/edit/'.$key->event_category_id)?>"><?php echo $key->event_category_name?></a> </td>
				</tr>
				<?php
			}?>
		</tbody>
	</table>
</div>