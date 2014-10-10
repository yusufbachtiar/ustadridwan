<?php $this->load->view('pengelola/template/tinymce_init')?>
<h1 class="page-header"><?php echo $header;?></h1>
<?php
if (isset($question)) {
	$id = $question->question_id;
	$title = $question->question_title;
	$name = $question->question_name;
	$email = $question->question_email;
	$date = $question->question_date;
	$content = $question->question_content;
	$publish = $question->question_is_publish;
}
echo validation_errors();
echo form_open(current_url());
?>
<div class="col-md-8">
	<div class="row">
		<div class="col-md-12">
			<label>Tentang</label><br>
			<?php if (isset($id)) {	
				?>
				<input type="hidden" name="id" value="<?php echo $id?>">
				<?php } ?>
				<input type="text" name="title" value="<?php echo $title?>" class="form-control" readonly="readonly"><br>
				<label>Penanya</label><br>
				<input type="text" name="name" value="<?php echo $name?>" class="form-control" readonly="readonly"><br>
				<label>Email</label><br>
				<input type="text" name="email" value="<?php echo $email?>" class="form-control" readonly="readonly"><br>
				<label>Tanggal Masuk</label><br>
				<input type="text" name="date" value="<?php echo $date?>" class="form-control" readonly="readonly"><br>
				<label>Isi</label><br>
				<textarea class="mcEditor" rows="10" name="content"><?php echo $content?></textarea>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<label>Publikasi</label><br>
		<?php
		if ($publish == 1) {
			$selected = 'selected';
		}else{
			$selected = null;
		}
		?>
		<select name="publish" class="form-control">
			<option value="0">Draft</option>
			<option value="1" <?php echo $selected?>>Terbit</option>
		</select>
		<hr>
		<label>Aksi</label><br>
		<input type="submit" value="Simpan" class="btn btn-primary">
		<a href="<?php echo site_url('pengelola/question')?>" class="btn btn-success">Batal</a>
		<?php if (isset($question)) {
			?>
			<a href="<?php echo site_url('pengelola/question/delete/'.$question->question_id)?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Hapus</a>
			<?php 
		}?>
		<?php echo form_close()?>
	</div>