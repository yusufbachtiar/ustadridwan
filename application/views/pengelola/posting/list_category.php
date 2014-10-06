<h1 class="page-header"><?php echo $header;?></h1>
<div class="col-md-12">
	<table class="table table-hover">
		<thead>
			<th>Kategori</th>
		</thead>
		<tbody>
			<?php foreach ($category as $key) {
				?>
				<tr>
					<td><a href="<?php echo site_url('pengelola/posting/category/edit/'.$key->post_cat_id)?>"><?php echo $key->post_cat_name?></a> </td>
				</tr>
				<?php
			}?>
		</tbody>
	</table>
</div>