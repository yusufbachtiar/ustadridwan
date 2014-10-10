<h1 class="page-header"><?php echo $header;?></h1>
<div class="col-md-12">
	<center>
		<div class="well">
			<div class="row">
				<div class="col-md-4">
					<label>Posting</label>
					<div class="row">
						<div class="col-md-6">
							<label>Terbit</label><br>
							<?php echo $post_publish?>
						</div>
						<div class="col-md-6">
							<label>Draft</label><br>
							<?php echo $post_draft?>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<center>
						<label>Event</label>
					</center>
					<div class="row">
						<div class="col-md-6"><label>Terbit</label><br>
							<?php echo $event_publish?>
						</div>
						<div class="col-md-6"><label>Terbit</label><br>
							<?php echo $event_draft?>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<center>
						<label>Gallery</label>
					</center>
					<div class="row">
						<div class="col-md-6">
							<label>Terbit</label><br>
							<?php echo $gallery_publish?><br>
							<label>Video</label><br>
							<?php echo $gallery_video?>
						</div>
						<div class="col-md-6">
							<label>Draft</label><br>
							<?php echo $gallery_draft?><br>
							<label>Foto</label><br>
							<?php echo $gallery_foto?>
						</div>
					</div>
				</div>
			</div>
			<br>
			<br>
			<div class="row">
				<div class="col-md-4">
					<center>
						<label>Pertanyaan</label>
					</center>
					<div class="row">
						<div class="col-md-6">
							<label>Terbit</label><br>
							<?php echo $question_publish?>
						</div>
						<div class="col-md-6">
							<label>Draft</label><br>
							<?php echo $question_draft?>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<center>
						<label>User</label>
					</center>
					<div class="row">
						<div class="col-md-6">
							<label>Admin</label><br>
							<?php echo $admin?>
						</div>
						<div class="col-md-6">
							<label>Kontributor</label><br>
							<?php echo $kontributor?>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<center>
						<label>Statistik</label>
					</center>
					<div class="row">
						<div class="col-md-12">
							<?php echo pretty_date(date('Y-m-d'))?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</center>
</div>