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
	<br>
	<div class="row">
		<div class="col-md-6">
			<label>Share</label> |
			<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo posting_url($detail)?>" target="_blank">Facebook</a> | 
			<a href="https://twitter.com/share" class="" data-via="">Tweet</a> 
			
		</div>
	</div>
	<br>
</div><!--/blog-post-area-->
<div class="row">
	<div class="col-md-12">
		<?php $this->load->view('template/disqus')?>
	</div>
</div>

