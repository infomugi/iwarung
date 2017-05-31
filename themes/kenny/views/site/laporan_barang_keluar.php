<?php
/* @var $this SiteController */
/* @var $dataProvider CActiveDataProvider */
$this->pageTitle='Laporan Barang';
?>

<h5><i class="glyphicon glyphicon-signal text-info"></i> <b class="text-info">Barang</b> <span class="text-muted">Keluar</span></h5>
<div class="row">

	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="panel panel-default bg-pink card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-light">Hari Ini <br> ( <?php echo Penjualan::model()->countToday(); ?> Penjualan )</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="sm-graph-box">
						<div class="row">
							<div class="col-xs-12">
								<div class="counter-wrap text-right txt-light">
									<span class="counter"><?php echo Detailpenjualan::model()->summaryToday(); ?></span>
									<span class="counter-cap">
										Pcs
									</span>
								</div>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="panel panel-default bg-pink card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-light">Minggu Ini <br> ( <?php echo Penjualan::model()->countWeek(); ?> Penjualan )</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="sm-graph-box">
						<div class="row">
							<div class="col-xs-12">
								<div class="counter-wrap text-right txt-light">
									<span class="counter"><?php echo Detailpenjualan::model()->summaryWeek(); ?></span>
									<span class="counter-cap">
										Pcs
									</span>
								</div>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="panel panel-default bg-pink card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-light">Bulan Ini <br> ( <?php echo Penjualan::model()->countMonth(); ?> Penjualan )</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="sm-graph-box">
						<div class="row">
							<div class="col-xs-12">
								<div class="counter-wrap text-right txt-light">
									<span class="counter"><?php echo Detailpenjualan::model()->summaryMonth(); ?></span>
									<span class="counter-cap">
										Pcs
									</span>
								</div>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="panel panel-default bg-pink card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-light">Tahun Ini <br> ( <?php echo Penjualan::model()->countYear(); ?> Penjualan )</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="sm-graph-box">
						<div class="row">
							<div class="col-xs-12">
								<div class="counter-wrap text-right txt-light">
									<span class="counter"><?php echo Detailpenjualan::model()->summaryYear(); ?></span>
									<span class="counter-cap">
										Pcs
									</span>
								</div>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

