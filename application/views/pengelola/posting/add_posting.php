<h1 class="page-header"><?php echo $header;?> Posting</h1>
<?php
$this->load->view('pengelola/template/tinymce_init');
if (isset($posting)) {
	$title = $posting->posting_title;
	$content = $posting->posting_content;
	$publish = $posting->posting_is_publish;
	$image = $posting->posting_image;
}else{
	$title = set_value('title');
	$content = set_value('content');
	$image = set_value('image');
	$publish = null;
}
?>
<?php 
echo form_open(current_url());
echo validation_errors();
?>
<div class="col-md-8">
	<div class="row">
		<div class="col-md-12">
			<label>Judul</label><br>
			<?php if (isset($posting)) {
				?>
				<input type="hidden" name="id" value="<?php echo $posting->posting_id?>">
				<?php
			} ?>
			<input type="text" name="title" value="<?php echo $title ?>" class="form-control"><br>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<label>Image URL</label><br>
			<input type="text" name="image" value="<?php echo $image ?>" class="form-control"><br>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<label>Konten</label><br>
			<textarea name="content" class="mcEditor" rows="10"><?php echo $content?></textarea>
		</div>
	</div>

</div>
<div class="col-md-4">
	<div class="row">
		<div class="col-md-12">
			<label>Publikasi</label><br>
			<label class="radio inline">
				<input type="radio" name="publish" value="0" <?php echo ($publish == 0)? 'checked' : '';?>> Draft
			</label>
			<?php
			if ($this->session->userdata('role') == 1) {
				?>
				<label class="radio inline">
					<input type="radio" name="publish" value="1" <?php echo ($publish == 1)? 'checked' : '';?>> Terbit
				</label>
				<?php
			}
			?>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12">
			<label>Kategori</label><br>
			<select name="category" class="form-control">
				<?php foreach ($category as $key) {
					$selected = ($posting->posting_category == $key->post_cat_id) ? 'selected' : null ;
					?>
					<option value="<?php echo $key->post_cat_id?>" <?php echo $selected?>><?php echo $key->post_cat_name?></option>
					<?php
				} ?>
			</select>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12">
			<label>Aksi</label><br>
			<input type="submit" value="Simpan" class="btn btn-primary">
			<a href="<?php echo site_url('pengelola/posting')?>" class="btn btn-success">Batal</a>
			<?php if (isset($posting)) {
				?>
				<a href="<?php echo site_url('pengelola/posting/delete/'.$posting->posting_id)?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Hapus</a>
				<?php 
			}?>

		</div>
	</div>
	<div class="row">
		<div class="col-md-12"></div>
	</div>
</div>
<?php echo form_close()?>