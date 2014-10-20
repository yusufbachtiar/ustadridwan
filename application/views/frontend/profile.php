<div class="blog-post-area">
    <h2 class="title text-center"><?php echo $header ?></h2>
    <div class="single-blog-post">
        <div class="post-meta">
            <div class="col-md-12">
                <div class="row-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="<?php echo base_url()?>images/<?php echo $profile->profile_image?>" class="img-responsive img-rounded">
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Nama Lengkap</label>
                                </div>
                                <div class="col-md-4">
                                    <?php echo $profile->profile_full_name ?> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Alamat</label>
                                </div>
                                <div class="col-md-4">
                                    <?php echo strip_tags($profile->profile_address) ?> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Riwayat Pendidikan</label> 
                                </div>
                                <div class="col-md-4">
                                    <?php echo $profile->profile_study ?> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Kegiatan</label> 
                                </div>
                                <div class="col-md-4">
                                    <?php echo $profile->profile_activity ?> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Organisasi</label> 
                                </div>
                                <div class="col-md-4">
                                    <?php echo $profile->profile_organisation ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Deskripsi</label> 
                                </div>
                                <div class="col-md-4">
                                    <?php echo $profile->profile_description ?> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                 <label> Telepon / HP</label>
                             </div>
                             <div class="col-md-4">
                                <?php echo $profile->profile_phone ?> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                             <label> Pin BB</label>
                         </div>
                         <div class="col-md-4">
                            <?php echo $profile->profile_pin ?> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Twitter</label> 
                        </div>
                        <div class="col-md-4">
                           <a href="http://twitter.com/<?php echo $profile->profile_twitter?>" target="_blank"> <?php echo $profile->profile_twitter ?></a> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Facebook </label>
                        </div>
                        <div class="col-md-4">
                            <a href="http://facebook.com/<?php echo $profile->profile_fb?>" target="_blank"><?php echo $profile->profile_fb ?> </a>
                        </div>
                    </div>
                </div>
            </div>

        </div><br>

    </div>
</div>
</div>
</div>