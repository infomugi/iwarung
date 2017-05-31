<?php
$baseUrl = Yii::app()->theme->baseUrl; 
$url = Yii::app()->baseUrl."/"; 
$cs = Yii::app()->getClientScript();
Yii::app()->clientScript->registerCoreScript('jquery');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title><?php echo $this->pageTitle; ?> - <?php echo YII::app()->name; ?></title>
	<link rel="shortcut icon" href="<?php echo $url."/image/shop/".Shop::model()->favicon(); ?>">
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/dist/css/style.css" rel="stylesheet" type="text/css">
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/bower_components/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
</head>
<body>
	<!--Preloader-->
<!-- 	
<div class="preloader-it">
<div class="la-anim-1"></div>
</div> 
-->
<!--/Preloader-->
<div class="wrapper">
	<!-- Top Menu Items -->
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block mr-20 pull-left" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
		<img class="brand-img pull-left img-responsive" src="<?php echo YII::app()->baseUrl."/image/shop/".Shop::model()->logo(); ?>" alt="Logo"/>
		<ul class="nav navbar-right top-nav pull-right">
			<li>
				<a href="javascript:void(0);" data-toggle="collapse" data-target="#site_navbar_search">
					<i class="fa fa-search top-nav-icon"></i>
				</a>
			</li>
			<li class="dropdown" id="quickmenu">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-th top-nav-icon"></i></a>
				<ul class="dropdown-menu app-dropdown" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
					<li>
						<ul class="app-icon-wrap">

							<!-- Hanya Muncul Apabila Level Administrator -->
							<?php if(YII::app()->user->record->level==1): ?>
							
								<li>
									<a href="#" id="today" class="connection-item">
										<i class="pe-7s-mail-open-file txt-success"></i>
										<span class="block">Hari Ini <br><span class="text-success">(F6)</span></span>
									</a>
								</li>
								<li>
									<a href="#" id="week" class="connection-item">
										<i class="pe-7s-date txt-primary"></i>
										<span class="block">Minggu Ini <br><span class="text-primary">(F7)</span></span>
									</a>
								</li>
								<li>
									<a href="#" id="month" class="connection-item">
										<i class="pe-7s-map txt-danger"></i>
										<span class="block">Bulan Ini <br><span class="text-danger">(F8)</span></span>
									</a>
								</li>
								
							<?php endif; ?>

							<li>
								<a href="<?php echo $url;?>penjualan/create" class="connection-item">
									<i class="pe-7s-umbrella txt-info"></i>
									<span class="block">Penjualan <br><span class="text-info">(F9)</span></span>
								</a>
							</li>
							<li>
								<a href="<?php echo $url;?>pembelian/create" class="connection-item">
									<i class="pe-7s-comment txt-warning"></i>
									<span class="block">Pembelian <br><span class="text-warning">(F10)</span></span>
								</a>
							</li>
							<li>
								<a href="<?php echo $url;?>pelanggan/create" class="connection-item">
									<i class="pe-7s-notebook"></i>
									<span class="block">Pelanggan <br><span class="text-muted">(F11)</span></span>
								</a>
							</li>

						</ul>
					</li>
					<li class="divider"></li>
					<li class="text-center"><a href="<?php echo $url;?>site/logout"><i class="ti-power-off"></i> Logout</a></li>
				</ul>
			</li>
			<div class="collapse navbar-search-overlap" id="site_navbar_search">
				<form role="search">
					<div class="form-group mb-0">
						<div class="input-search">
							<div class="input-group">	
								<input type="text" id="overlay_search" name="overlay-search" class="form-control pl-30" placeholder="Search">
								<span class="input-group-addon pr-30">
									<a  href="javascript:void(0)" class="close-input-overlay" data-target="#site_navbar_search" data-toggle="collapse" aria-label="Close" aria-expanded="true"><i class="fa fa-times"></i></a>
								</span> 
							</div>
						</div>
					</div>
				</form>
			</div>
		</nav>
		<!-- /Top Menu Items -->

		<!-- Left Sidebar Menu -->
		<div class="fixed-sidebar-left">
			<ul class="nav navbar-nav side-nav nicescroll-bar">

				<?php if(YII::app()->user->record->level==1){ ?>
					<li>
						<a href="<?php echo $url;?>site/index"><i class="icon-drawar mr-10"></i>Beranda</a>
					</li>
					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#transaksi" class="" aria-expanded="true"><i class="ti-credit-card mr-10"></i>Transaksi <span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
						<ul id="transaksi" class="collapse-level-1 collapse in">
							<li> <a href="<?php echo $url;?>penjualan/admin">Penjualan</a> </li> 
							<li> <a href="<?php echo $url;?>pembelian/admin">Pembelian</a> </li> 
						</ul>
					</li>
					<li>
						<a   href="javascript:void(0);" data-toggle="collapse" data-target="#laporan"><i class="ti-printer mr-10"></i>Laporan <span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
						<ul id="laporan" class="collapse collapse-level-1">
							<li> 
								<a href="<?php echo $url;?>site/pendapatan">Pendapatan</a> 
							</li> 
							<li> 
								<a href="<?php echo $url;?>site/pengeluaran">Pengeluaran</a> 
							</li> 
						</ul>
					</li>		
					<li>
						<a   href="javascript:void(0);" data-toggle="collapse" data-target="#master"><i class="ti-bag mr-10"></i>Kelola <span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
						<ul id="master" class="collapse collapse-level-1">
							<li> <a href="<?php echo $url;?>barang/admin">Barang</a> </li> 
							<li> <a href="<?php echo $url;?>supplier/admin">Supplier</a> </li>
							<li> <a href="<?php echo $url;?>pelanggan/admin">Pelanggan</a> </li> 
							<li> <a href="<?php echo $url;?>user/admin">Petugas</a> </li> 
						</ul>
					</li>		

					<li>
						<a href="<?php echo $url;?>shop/site"><i class="icon-drawar mr-10"></i>Warung</a>
					</li>

					<?php }else{ ?>
						<li>
							<a href="<?php echo $url;?>site/index"><i class="icon-drawar mr-10"></i>Beranda</a>
						</li>
						<li>
							<a href="<?php echo $url;?>pelanggan/admin"><i class="ti-bag mr-10"></i>Pelanggan</a>
						</li>
						<li>
							<a href="<?php echo $url;?>penjualan/admin"><i class="ti-credit-card mr-10"></i>Penjualan</a>
						</li>	
						<li>
							<a href="<?php echo $url;?>pembelian/admin"><i class="ti-credit-card mr-10"></i>Pembelian</a>
						</li>		

						<?php } ?>



					</ul>
				</div>
				<!-- /Left Sidebar Menu -->


				<!-- Main Content -->
				<div class="page-wrapper">
					<div class="container-fluid">
						<!-- Title -->
						<div class="row heading-bg bg-primary">
							<div class="col-lg-7 col-md-8 col-sm-8 col-xs-12">
								<h5 class="txt-light"><?php echo $this->pageTitle; ?></h5>
							</div>

							<!-- Breadcrumb -->
							<div class="col-lg-5 col-sm-4 col-md-4 col-xs-12">
								<?php if(isset($this->breadcrumbs)):?>
									<?php $this->widget('zii.widgets.CBreadcrumbs', array(
										'links'=>$this->breadcrumbs,
										'homeLink'=>CHtml::encode('Dashboard'),
										'htmlOptions'=>array('class'=>'breadcrumb')
										)); ?><!-- breadcrumbs -->
									<?php endif?>   
								</div>
								<!-- /Breadcrumb -->

							</div>
							<!-- /Title -->

							<!-- Row -->
							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-default card-view">
										<!-- 		
										<div class="panel-heading">
											<div class="pull-left">
												<h6 class="panel-title txt-dark"><?php echo $this->pageTitle; ?></h6>
											</div>
											<div class="clearfix"></div>
										</div> -->
										<div class="panel-wrapper collapse in">
											<div class="panel-body">

												<div class="row">
													<div class="col-md-12">
														<div class="form-wrap">
															<?php echo $content; ?>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Row -->
						</div>

						<!-- Footer -->
						<footer class="footer container-fluid pl-30 pr-30">
							<div class="row">
								<div class="col-sm-12 text-center">
									<p><?php echo date('Y'); ?> &copy; <?php echo YII::app()->name; ?></p>
								</div>
							</div>
						</footer>
						<!-- /Footer -->

					</div>
					<!-- /Main Content -->
				</div>
				<!-- /#wrapper -->

				<!-- JavaScript -->
				<script src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
				<script src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/bower_components/bootstrap-validator/dist/validator.min.js"></script>
				<script src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
				<script src="<?php echo Yii::app()->theme->baseUrl; ?>/dist/js/jquery.slimscroll.js"></script>
				<script src="<?php echo Yii::app()->theme->baseUrl; ?>/dist/js/dropdown-bootstrap-extended.js"></script>
				<script src="<?php echo Yii::app()->theme->baseUrl; ?>/dist/js/init.js"></script>
				<script src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>
				<script src="<?php echo Yii::app()->theme->baseUrl; ?>/dist/js/koperasi.js"></script>
				<script type="text/javascript">

					function showHelp(){
						swal({   
							title: "E-Warung 1.0",   
							type: "info", 
							text: "Hubungi +62 8782 4931 504",
							confirmButtonColor: "#3cb878",   
						});
					}

					function summaryToday(){
						swal({   
							title: "Rp. <?php echo Penjualan::model()->summaryToday(); ?>",   
							type: "success", 
							text: "Pendapatan Hari Ini ( Diperbaharui <?php echo date('d M Y h:i'); ?> )",
							confirmButtonColor: "#3cb878",   
						});
					}

					function summaryWeek(){
						swal({   
							title: "Rp. <?php echo Penjualan::model()->summaryWeek(); ?>",   
							type: "success", 
							text: "Pendapatan Minggu Ini ( Diperbaharui <?php echo date('d M Y h:i'); ?> )",
							confirmButtonColor: "#3cb878",   
						});
					}

					function summaryMonth(){
						swal({   
							title: "Rp. <?php echo Penjualan::model()->summaryMonth(); ?>",   
							type: "success", 
							text: "Pendapatan Bulan Ini ( Diperbaharui <?php echo date('d M Y h:i'); ?> )",
							confirmButtonColor: "#3cb878",   
						});
					}

				//Notifikasi Pendapatan dengan Plugin Sweetalert
				$(function() {
					"use strict";
					var SweetAlert = function() {};
					SweetAlert.prototype.init = function() {

						$('#today').on('click',function(e){
							summaryToday();
							return false;
						});

						$('#week').on('click',function(e){
							summaryWeek();
							return false;
						});

						$('#month').on('click',function(e){
							summaryMonth();
							return false;
						});
					},
					$.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert;
					$.SweetAlert.init();
				});

				//Shortcut untuk Menampilkan Notifikasi Pendapatan
				$(document).on('keydown', 'body', function(e){
					var charCode = ( e.which ) ? e.which : event.keyCode;
				if(charCode == 112) //F1
				{
					showHelp();
					return false;
				}

				if(charCode == 117) //F6
				{
					summaryToday();
					return false;
				}
				if(charCode == 118) //F7
				{
					summaryWeek();
					return false;
				}
				if(charCode == 119) //F8
				{
					summaryMonth();
					return false;
				}

				if(charCode == 120) //F9
				{
					window.location.replace("<?php echo $url; ?>pembelian/create");
					return false;
				}	

				if(charCode == 121) //F10
				{
					window.location.replace("<?php echo $url; ?>penjualan/create");
					return false;
				}	

				if(charCode == 122) //F11
				{
					window.location.replace("<?php echo $url; ?>pelanggan/create");
					return false;
				}	

				if(charCode == 123) //F12 
				{
					window.location.replace("<?php echo $url; ?>barang/create");
					return false;
				}						

			});
		</script>

	</body>
	</html>