<div class="blog-post-area">
	<h2 class="title text-center">Foto Galeri</h2>
	<div class="row-fluid">
		<?php 
		foreach ($video as $key) {
			$str = $key->gallery_url;
			$str = preg_replace('#^https?://#', '', $str);
			?>
			<div class="col-md-4">				
				<h3><?php echo $key->gallery_title?></h3>
				<div class="post-meta">
					<div class="embed-responsive embed-responsive-4by3">
						<iframe class="embed-responsive-item" src="//www.youtube.com/embed/Mqw35H_x2s4" width="100%" frameborder="0" allowfullscreen></iframe>
					</div>
				</div>
			</div>
			<?php
		}?>
	</div>
	<br>
</div><!--/blog-post-area-->

