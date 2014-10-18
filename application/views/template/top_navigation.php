<header id="header"><!--header-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="<?php echo base_url()?>" class="<?php echo nav_active('')?>">Home</a></li>
                            <li class="dropdown"><a href="#">Landasan Agama<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="<?php echo base_url('posting/1/Alquran.html')?>" class="">Alquran</a></li>
                                    <li><a href="product-details.html">Product Details</a></li> 
                                    <li><a href="checkout.html">Checkout</a></li> 
                                    <li><a href="cart.html">Cart</a></li> 
                                    <li><a href="login.html">Login</a></li> 
                                </ul>
                            </li> 
                            <li class="dropdown"><a href="#">Galeri<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="<?php echo base_url('gallery/photo')?>">Foto</a></li>
                                    <li><a href="<?php echo base_url('gallery/video')?>">Video</a></li>
                                </ul>
                            </li> 
                            <li><a href="404.html">404</a></li>
                            <li><a href="<?php echo base_url('profile')?>">Tentang Saya</a></li>
                            <li><a href="<?php echo site_url('surat') ?>">Mengajukan Pertanyaan</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <!--div class="search_box pull-right">
                        <input type="text" placeholder="Search"/>
                    </div-->
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->