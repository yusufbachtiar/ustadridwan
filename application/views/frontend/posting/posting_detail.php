<div class="blog-post-area">
	<h2 class="title text-center">Detail Artikel</h2>
	<div class="single-blog-post">
		<h3><?php echo $detail->posting_title?></h3>
		<div class="post-meta">
			<ul>
				<li><i class="fa fa-user"></i> <?php echo $detail->user_full_name?></li>
				<li><i class="fa fa-clock-o"></i> <?php echo $detail->post_cat_name?></li>
				<li><i class="fa fa-calendar"></i> <?php echo pretty_date($detail->posting_date)?></li>
			</ul>
		</div>
		<?php echo $detail->posting_content?>
	</div>
</div><!--/blog-post-area-->

