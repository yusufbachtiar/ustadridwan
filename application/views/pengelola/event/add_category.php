<?php
if (isset($category)) {
	$name = $category->event_category_name;
}else{
	$name = set_value('category');
}
?>
<?php
echo form_open(current_url());
echo validation_errors();
?>
<h1 class="page-header"><?php echo $header;?> Kategori Event</h1>
<div class="col-md-8">
	<div class="row">
		<div class="col-md-12">
			<label>Kategori</label><br>
			<?php
			if (isset($category)) {
				?>
				<input type="hidden" name="id" value="<?php echo $category->event_category_id ?>">
				<?php
			}
			?>
			<input type="text" name="category" value="<?php echo $name?>" class="form-control"><br>
		</div>
	</div>
</div>
<div class="col-md-4">
	<label>Aksi</label><br>
	<input type="submit" value="Simpan" class="btn btn-primary">
	<a href="<?php echo site_url('pengelola/event/category')?>" class="btn btn-success">Batal</a>
	<?php if (isset($category)) {
		?>
		<a href="<?php echo site_url('pengelola/event/category/delete/'.$category->event_category_id)?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Hapus</a>
		<?php 
	}?>
</div>
<?php echo form_close()?>