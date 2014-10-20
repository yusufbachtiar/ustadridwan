<div class="blog-post-area">
    <h2 class="title text-center"><?php echo $header ?></h2>
    <div class="single-blog-post">
        <?php if ($this->session->flashdata('success')) {
            ?>
            <div class="alert alert-success"><?php echo $this->session->flashdata('success')?></div>
            <?php
        }?>
        <div class="post-meta">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo site_url('surat/form'); ?>"><i class="fa fa-envelope"></i> Anda ingin mengajukan pertanyaan?</a>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-12">
                        <?php foreach ($surat as $row) : ?>
                        <div class="row">
                            <div class="col-md-12">
                                <b>Dari :</b> <?php echo $row->question_name; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <b>Pertanyaan :</b> <?php echo $row->question_content; ?>
                            </div>
                        </div>
                        <hr>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

</div><!--/blog-post-area-->
<?php echo $this->pagination->create_links() ?>
