<div class="blog-post-area">
    <h2 class="title text-center">Galeri Foto</h2>
    <div class="row-fluid">
        <?php
        foreach ($photo as $key) {
            $str = $key->gallery_url;
            $str = preg_replace('#^https?://#', '', $str);
            ?>
            <div class="col-md-3">				
                <h3><?php echo $key->gallery_title ?></h3>
                <div class="post-meta">
                    <a class="fancybox" title="<h4><?php echo $key->gallery_title?></h4><?php echo $key->gallery_description?>" href="<?php echo $key->gallery_url;?>" data-fancybox-group="gallery">
                    <div class="imgLiquidFill" style="width:180px ; height: 150px;">
                        <img src="<?php echo $key->gallery_url ?>">
                    </div>
                    </a>
                </div>
            </div>
            <?php }
        ?>
    </div>
    <br>
</div><!--/blog-post-area-->

