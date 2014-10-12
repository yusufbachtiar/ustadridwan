<div class="brands_products hidden-sm hidden-xs"><!--brands_products-->
    <h2>Info Kajian</h2>
    <div class="brands-name">
        <div class="text-right">
            <a href="<?php echo base_url('event')?>" class="btn btn-primary btn-xs">Indeks</a>
        </div>
        <ul class="nav nav-pills nav-stacked">
            <li><a href="<?php echo base_url('event')?>"><strong>Kajian Hari Ini</strong></a></li>
            <?php foreach ($event as $key) {
                if ($key->event_date_start >= date('Y-m-d') AND $key->event_date_end <= date('Y-m-d') ) {
                    ?>
                    <li><a href="<?php echo base_url('event')?>"><?php echo $key->event_title?></a></li>
                    <?php
                }
            }
            ?>
        </ul>

        <ul class="nav nav-pills nav-stacked">
            <li><a href="<?php echo base_url('event')?>"><strong>Kajian Akan Datang</strong></a></li>
            <?php
            foreach ($event as $label) {
                if ($label->event_date_start > date('Y-m-d') OR $label->event_date_end > date('Y-m-d')) {
                    ?>
                    <li><a href="<?php echo base_url('event')?>"><?php echo $label->event_title?></a></li>
                    <?php
                }
            }
            ?>
        </ul>
    </div>
</div><!--/brands_products-->