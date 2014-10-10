<?php $this->load->view('pengelola/template/tinymce_init')?>
<h1 class="page-header"><?php echo $header;?> Gallery</h1>
<?php
if (isset($gallery)) {
	$id = $gallery->gallery_id;
	$title = $gallery->gallery_title;
	$description = $gallery->gallery_description;
	$image = $gallery->gallery_image;
	$publish = $gallery->gallery_is_publish;
	$type = $gallery->gallery_type;
}else{
	$title = set_value('title');
	$description = set_value('description');
	$image = set_value('image');
	$publish = set_value('publish');
	$type = set_value('type');
}
echo form_open(current_url());
echo validation_errors();
?>
<div class="col-md-8">
	<div class="row">
		<div class="col-md-12">
			<label>Judul</label><br>
			<?php if (isset($gallery)) {
				?>
				<input type="hidden" name="id" value="<?php echo $id?>"><br>
				<?php	
			}
			?>
			<input type="text" name="title" value="<?php echo $title?>" class="form-control"><br>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<label>Image / Video URL</label><br>
			<input type="text" name="image" value="<?php echo $image?>" class="form-control"><br>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<label>Deskripsi</label><br>
			<textarea class="mcEditor" name="description" rows="10"><?php echo $description?></textarea>
		</div>
	</div>
</div>
<div class="col-md-4">
	<label>Jenis Gallery</label><br>
	<select name="type" class="form-control">
		<option value="foto">Foto</option>
		<?php 
		if ($gallery->gallery_type == 'video') {
			$selected = 'selected';
		}
		else{
			$selected = null;
		}
		?>
		<option value="video" <?php echo $selected?>>Video</option>
	</select>
	<hr>
	<label>Publikasi</label><br>
	<label class="radio inline">
		<input type="radio" name="publish" value="0" <?php echo ($publish == 0)? 'checked' : '';?>> Draft
	</label>
	<label class="radio inline">
		<input type="radio" name="publish" value="1" <?php echo ($publish == 1)? 'checked' : '';?>> Terbit
	</label>
	<hr>
	<label>Aksi</label><br>
	<input type="submit" value="Simpan" class="btn btn-primary">
	<a href="<?php echo site_url('pengelola/gallery')?>" class="btn btn-success">Batal</a>
	<?php if (isset($gallery)) {
		?>
		<a href="<?php echo site_url('pengelola/gallery/delete/'.$gallery->gallery_id)?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Hapus</a>
		<?php 
	}?>
</div>
<?php echo form_close();?>
