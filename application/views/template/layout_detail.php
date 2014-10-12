<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/top_navigation')?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->	
					<?php echo (isset($main)) ? $this->load->view($main) : null ;?>
				</div><!--features_items-->

				<?php //$this->load->view('template/event')?>
				<?php //$this->load->view('template/random_post')?>

			</div>
			<div class="col-sm-3">
				<?php $this->load->view('template/category')?>
			</div>
		</div>
	</div>
</section>
<?php $this->load->view('template/footer'); ?>
