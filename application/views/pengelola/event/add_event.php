<?php

$this->load->view('pengelola/template/tinymce_init');
//$this->load->view('pengelola/template/javascript');

if (isset($event)) {
	$judul = $event->event_title;
	$description = $event->event_description;
	$start = $event->event_date_start;
	$end = $event->event_date_end;
	$location = $event->event_location;
	$publish = $event->event_is_publish;
	$category = $event->event_category_id;
}else{
	$judul = set_value('title');
	$description = set_value('description');
	$start = set_value('start');
	$end = set_value('end');
	$location = set_value('location');
	$publish = set_value('publish');
	$category = set_value('category');
}
?>
<?php 
echo form_open(current_url());
echo validation_errors();
?>
<h1 class="page-header"><?php echo $header;?> Event</h1>
<div class="col-md-8">
	<div class="row">
		<div class="col-md-12">
			<label>Judul</label><br>
			<?php if (isset($event)) {
				?>
				<input type="hidden" name="id" value="<?php echo $event->event_id?>">
				<?php
			}?>
			<input type="text" name="title" value="<?php echo $judul?>" class="form-control"><br>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<label>Tanggal Mulai</label><br>
			<input type="text" name="start" id="start" value="<?php echo $start?>" class="form-control"><br>
		</div>
		<div class="col-md-6">
			<label>Tanggal Selesai</label><br>
			<input type="text" name="end" id="end" value="<?php echo $end?>" class="form-control"><br>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<label>Lokasi</label><br>
			<input type="text" name="location" value="<?php echo $location?>" class="form-control"><br>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<label>Deskripsi</label><br>
			<textarea name="description" class="mcEditor" rows="10"><?php echo $description?></textarea>
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
			<label class="radio inline">
				<input type="radio" name="publish" value="1" <?php echo ($publish == 1)? 'checked' : '';?>> Terbit
			</label>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12">
			<label>Kategori</label><br>
			<select name="category" class="form-control">
				<?php foreach ($kategori as $key) {
					$selected = ($event->event_category_id == $key->event_category_id) ? 'selected' : null ;
					?>
					<option value="<?php echo $key->event_category_id?>" <?php echo $selected?>><?php echo $key->event_category_name?></option>
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
			<a href="<?php echo site_url('pengelola/event')?>" class="btn btn-success">Batal</a>
			<?php if (isset($event)) {
				?>
				<a href="<?php echo site_url('pengelola/event/delete/'.$event->event_id)?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Hapus</a>
				<?php 
			}?>

		</div>
	</div>
</div>
<?php echo form_close()?>
<script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {

            	$('#start').datepicker({
            		format: "yyyy-mm-dd",
            		autoclose: true,
            	});  

            });
            // When the document is ready
            $(document).ready(function () {

            	$('#end').datepicker({
            		format: "yyyy-mm-dd",
            		autoclose: true,
            	});  

            });
            </script>