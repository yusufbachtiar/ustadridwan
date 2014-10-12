<?php
$CI =& get_instance();
$CI->load->model('Profile_model');
$profil = $CI->Profile_model->get(array('id'=>1));
?>

<footer id="footer"><!--Footer-->

    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="single-widget">
                        <h2>Tentang Ustadz Ahmad Ridwan, Lc.</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <img src="<?php echo base_url()?>/images/<?php echo $profil->profile_image?>" class="img img-rounded img-responsive">
                            </div>
                            <div class="col-md-6">
                                <ul class="nav nav-pills nav-stacked">
                                    <label>Riwayat Pendidikan</label>
                                    <li><?php echo $profil->profile_study?></li>
                                    <label>Alamat</label>
                                    <li><?php echo $profil->profile_address?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="single-widget">
                        <h2>Tentang Pengembang</h2>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>Media Sosial</h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="Your email address" />
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                            <p>Get the most recent updates from <br />our site and be updated your self...</p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <!--p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p-->
                </div>
            </div>
        </div>

    </footer><!--/Footer-->



    <script src="<?php echo base_url('media/frontend/js/jquery.js') ?>"></script>
    <script src="<?php echo base_url('media/frontend/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('media/frontend/js/jquery.scrollUp.min.js') ?>"></script>
    <script src="<?php echo base_url('media/frontend/js/price-range.js') ?>"></script>
    <script src="<?php echo base_url('media/frontend/js/jquery.prettyPhoto.js') ?>"></script>
    <script src="<?php echo base_url('media/frontend/js/main.js') ?>"></script>
</body>
</html>