            
<h2 class="title text-center">Posting</h2>
<?php foreach ($posting12 as $key) { ?>
<div class="col-sm-4">
    <div class="product-image-wrapper">
        <div class="single-products">
            <div class="productinfo text-center">
                <h4><?php echo character_limiter($key->posting_title, 20)?></h4>
                <p><?php echo character_limiter($key->posting_content, 50)?></p>
                <a href="<?php echo posting_url($key)?>" class="btn btn-default add-to-cart">Selengkapnya</a>
            </div>
        </div>
        <div class="choose">
            <ul class="nav nav-pills nav-justified">
                <li><a href="#"><i class="fa fa-plus-square"></i>Facebook</a></li>
                <li><a href="#"><i class="fa fa-plus-square"></i>Twitter</a></li>
            </ul>
        </div>
    </div>
</div>
<?php } ?>