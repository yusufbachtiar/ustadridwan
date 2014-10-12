<div class="left-sidebar">
    <h2>Kategori</h2>
    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
        <?php 
        foreach ($category as $key) {
            ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#<?php echo $key->post_cat_id?>">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            <?php echo $key->post_cat_name?>
                        </a>
                    </h4>
                </div>
                <div id="<?php echo $key->post_cat_id?>" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            <?php 
                            $no = 1;
                            foreach ($posting as $value) {
                                if ($value->posting_category == $key->post_cat_id AND $no <= 5) {
                                    ?>
                                    <li><i class="fa fa-angle-double-right"></i><a href="<?php echo posting_url($value)?>"> <?php echo $value->posting_title?></a></li>
                                    <?php
                                }
                                ?>
                                <?php
                                $no++;
                            }?>
                        </ul>
                    </div>
                </div>
            </div>
            <?php  
        }?>
    </div><!--/category-products-->

    <?php $this->load->view('template/posting_counter');?>


</div>
