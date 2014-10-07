<div class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
                        <!--li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            </input-group >
                        </li -->
                        <li>
                            <a href="<?php echo base_url('pengelola')?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Posting<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level <?php echo ($this->uri->segment(2) == 'posting') ? 'in' : null ; ?>">
                                <li>
                                    <a href="<?php echo base_url('pengelola/posting');?>">Daftar Posting</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('pengelola/posting/add');?>">Tambah Posting</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('pengelola/posting/category');?>">Kategori Posting</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('pengelola/posting/category/add');?>">Tambah Kategori Posting</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Event<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level <?php echo ($this->uri->segment(2) == 'event') ? 'in' : null ; ?>">
                                <li>
                                    <a href="<?php echo base_url('pengelola/event');?>">Daftar Event</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('pengelola/event/add');?>">Tambah Event</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('pengelola/event/category');?>">Kategori Event</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('pengelola/event/category/add');?>">Tambah Kategori Event</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Profil Ustadz<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level <?php echo ($this->uri->segment(2) == 'profile') ? 'in' : null ; ?>">
                                <li>
                                    <a href="<?php echo base_url('pengelola/profile')?>"> Profil Ustadz</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Gallery<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="panels-wells.html">Panels and Wells</a>
                                </li>
                                <li>
                                    <a href="buttons.html">Buttons</a>
                                </li>
                                <li>
                                    <a href="notifications.html">Notifications</a>
                                </li>
                                <li>
                                    <a href="typography.html">Typography</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grid</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <?php if ($this->session->userdata('role') == 1) {
                            ?>
                            <li>
                                <a href="#"><i class="fa fa-files-o fa-fw"></i> User<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level <?php echo ($this->uri->segment(2) == 'user') ? 'in' : null ; ?>">
                                    <li>
                                        <a href="<?php echo base_url('pengelola/user')?>">Daftar User</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('pengelola/user/add')?>">Tambah User</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <?php
                        }?>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                    </ul>
                    <!-- /#side-menu -->
                </div>
                <!-- /.sidebar-collapse -->
            </div>