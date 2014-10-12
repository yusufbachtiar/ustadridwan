<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">Artikel Disarankan</h2>

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">	
                <?php 
                $no = 0;
                foreach ($random_post as $key) {
                    if ($no % 3 == 0) {
                        echo '</div><div class="item">';
                    }
                    ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <h4><?php echo character_limiter($key->posting_title, 20)?></h4>
                                    <p><?php echo character_limiter($key->posting_content, 50)?></p>
                                    <a href="<?php echo posting_url($key)?>" class="btn btn-default add-to-cart">Selengkapnya</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php
                    $no++;
                }
                ?>
            </div>
        </div>
        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>			
    </div>
                </div><!--/recommended_items-->