<div class="blog-post-area">
	<h2 class="title text-center"><?php echo $header ?></h2>
	<?php echo form_open(current_url());?>
	<div class="row">
		<div class="col-md-9">
		</div>
		<div class="col-md-3">
			<input type="text" name="search" class="form-control" placeholder="Cari">
		</div>
	</div>
	<?php echo form_close();
	?>
	<?php foreach ($posting as $key) {
		?>
		<div class="single-blog-post">
			<h3><a href="<?php echo posting_url($key)?>"><?php echo $key->posting_title?></a> </h3>
			<div class="post-meta">
				<ul>
					<li><i class="fa fa-calendar"></i><?php echo pretty_date($key->posting_date)?></li>
				</ul><br><br>
			</div>
		</div>
		<?php
	}?>
</div>
<?php echo $this->pagination->create_links()?>