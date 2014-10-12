<div class="blog-post-area">
	<h2 class="title text-center"><?php echo $header?></h2>
	<h2>Kajian Hari Ini</h2>
	<?php foreach ($event_now as $key) {
			?>
			<div class="single-blog-post">
				<h3><?php echo $key->event_title?></h3>
				<div class="post-meta">
					<ul>
						<li><i class="fa fa-calendar"></i>Tanggal Mulai : <?php echo pretty_date($key->event_date_start)?></li>
						<li><i class="fa fa-calendar"></i>Tanggal Selesai : <?php echo pretty_date($key->event_date_end)?></li>
					</ul><br><br>
					<?php echo $key->event_description?>
				</div>
				<?php //echo $detail->posting_content?>
			</div>
			
			<?php
	}
	?>
	<hr>
	<h2>Kajian yang akan datang</h2>
	<?php foreach ($event_coming as $key) {
		if ($key->event_date_start > date('Y-m-d') OR $key->event_date_end > date('Y-m-d')) {
			?>
			<div class="single-blog-post">
				<h3><?php echo $key->event_title?></h3>
				<div class="post-meta">
					<ul>
						<li><i class="fa fa-calendar"></i>Tanggal Mulai : <?php echo pretty_date($key->event_date_start)?></li>
						<li><i class="fa fa-calendar"></i>Tanggal Selesai : <?php echo pretty_date($key->event_date_end)?></li>
					</ul><br><br>
					<?php echo $key->event_description?>
				</div>
				<?php //echo $detail->posting_content?>
			</div>
			<hr>
			<?php
		}
	}?>
	<?php
	?>
</div><!--/blog-post-area-->
<?php echo $this->pagination->create_links()?>
