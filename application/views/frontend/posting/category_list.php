<div class="blog-post-area">
	<h2 class="title text-center"><?php echo $header?></h2>
	<?php foreach ($detail as $key) {
		?>
		<div class="single-blog-post">
			<h3><?php echo $key->posting_title?></h3>
			<div class="post-meta">
				<ul>
					<li><i class="fa fa-calendar"></i><?php echo pretty_date($key->posting_date)?></li>
				</ul><br><br>
				<?php //echo $key->event_description?>
			</div>
			<?php //echo $detail->posting_content?>
		</div>

		<?php
	}
	?>
</div><!--/blog-post-area-->
<?php echo $this->pagination->create_links()?>
