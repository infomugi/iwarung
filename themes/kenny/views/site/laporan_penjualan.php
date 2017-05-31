<?php
/* @var $this SiteController */
/* @var $dataProvider CActiveDataProvider */
$this->pageTitle='Laporan Pendapatan - ( Diperbaharui '.date('d M Y h:i').' )';
?>

<h5><i class="glyphicon glyphicon-signal text-success"></i> <b class="text-success">Nominal</b> <span class="text-muted">Pendapatan</span></h5>
<div class="row">

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="panel panel-default bg-green card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-light">Hari Ini - ( <?php echo Penjualan::model()->countToday(); ?> Penjualan )</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="sm-graph-box">
						<div class="row">
							<div class="col-xs-12">
								<div class="counter-wrap text-right txt-light">
									<span class="counter-cap">
										Rp.
									</span>
									<span class="counter"><?php echo Penjualan::model()->summaryToday(); ?></span>
								</div>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="panel panel-default bg-green card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-light">Minggu Ini - ( <?php echo Penjualan::model()->countWeek(); ?> Penjualan )</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="sm-graph-box">
						<div class="row">
							<div class="col-xs-12">
								<div class="counter-wrap text-right txt-light">
									<span class="counter-cap">
										Rp.
									</span>
									<span class="counter"><?php echo Penjualan::model()->summaryWeek(); ?></span>
								</div>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="panel panel-default bg-green card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-light">Bulan Ini - ( <?php echo Penjualan::model()->countMonth(); ?> Penjualan )</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="sm-graph-box">
						<div class="row">
							<div class="col-xs-12">
								<div class="counter-wrap text-right txt-light">
									<span class="counter-cap">
										Rp.
									</span>
									<span class="counter"><?php echo Penjualan::model()->summaryMonth(); ?></span>
								</div>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="panel panel-default bg-green card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-light">Tahun Ini - ( <?php echo Penjualan::model()->countYear(); ?> Penjualan )</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="sm-graph-box">
						<div class="row">
							<div class="col-xs-12">
								<div class="counter-wrap text-right txt-light">
									<span class="counter-cap">
										Rp.
									</span>
									<span class="counter"><?php echo Penjualan::model()->summaryYear(); ?></span>
								</div>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

