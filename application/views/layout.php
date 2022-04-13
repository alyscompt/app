<?php
defined('BASEPATH') or exit('No direct script access allowed');
if ($this->session->userdata('level') == 'Penjaga') {
	$site = "penjaga/";
} else if ($this->session->userdata('level') == 'Admin') {
	$site = "admin/";
} else {
	$site = "welcome/";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Loket <?php echo $instansi->instansi; ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/loket.css'); ?>">
	<link rel="icon" type="icon" href="<?php echo base_url('media/' . $instansi->logo); ?>">

	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js'); ?>"></script>
</head>

<body>
	<header>
		<div class="row">
			<!--<div class="col-md-2 col-sm-4 col-xs-4">
				<div id="logo">
					<img src="<?php echo base_url('media/logo_bwi_2.png'); ?>" class="img" onclick="window.location='<?php echo site_url($site); ?>'">
				</div>
			</div>-->
			<div class="col-md-8">
				<!--<div class="instansi">
					<h1 onclick="window.location='<?php echo site_url($site); ?>'"><?php echo $instansi->instansi; ?></h1>
					<h3 id="alamat" class="hidden-xs"><?php echo $instansi->alamat; ?></h3>
					<h3 class="hidden-xs">No. Telp <?php echo $instansi->telp; ?></h3>
					
				</div>-->
			</div>
		</div>
	</header>
	<nav>
		<div class="row">
			<div class="col-md-12">
				<div class="menu">
					<h3><?php $this->load->view($menu); ?></h3>
				</div>
			</div>
		</div>
	</nav>

	<section>
		<div class="container">
			<?php $this->load->view($content); ?>
		</div>
	</section>


 <div class="modal fade"  id="ajax-modal"  tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

<div id="ajax-modalin"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

	<footer>
		<div class="row">
			<div class="col-md-8">
				<marquee class="footer" onmouseover="stop();" onmouseout="start()">
					<?php
					foreach ($text_jalan as $text) { ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<img src="<?php echo base_url('media/agenda/' . $text->img); ?>" height="20">&nbsp;&nbsp;<?php echo $text->text;
																										} ?>
				</marquee>
			</div>
			<div class="col-md-4">
				<?php
				if (empty($this->session->userdata('level'))) { ?>
				<p style="color:#FFFFFF">	Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ? '</strong>' : '' ?> ||
					Nomer Antrian</p>
				<?php } else { ?>
					<?php }
				?>
			</div>
		</div>
	</footer>

</body>

</html>
