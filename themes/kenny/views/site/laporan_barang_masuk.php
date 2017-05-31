<?php
/* @var $this SiteController */
/* @var $dataProvider CActiveDataProvider */
$this->pageTitle='Laporan Barang Masuk';
?>

<h5><i class="glyphicon glyphicon-signal text-warning"></i> <b class="text-warning">Barang</b> <span class="text-muted">Masuk</span></h5>
<div class="row">

	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="panel panel-default bg-yellow card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-light">Hari Ini <br> ( <?php echo Pembelian::model()->countToday(); ?> Pembelian )</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="sm-graph-box">
						<div class="row">
							<div class="col-xs-12">
								<div class="counter-wrap text-right txt-light">
									<span class="counter"><?php echo Detailpembelian::model()->summaryToday(); ?></span>
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
		<div class="panel panel-default bg-yellow card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-light">Minggu Ini <br> ( <?php echo Pembelian::model()->countWeek(); ?> Pembelian )</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="sm-graph-box">
						<div class="row">
							<div class="col-xs-12">
								<div class="counter-wrap text-right txt-light">
									<span class="counter"><?php echo Detailpembelian::model()->summaryWeek(); ?></span>
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
		<div class="panel panel-default bg-yellow card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-light">Bulan Ini <br> ( <?php echo Pembelian::model()->countMonth(); ?> Pembelian )</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="sm-graph-box">
						<div class="row">
							<div class="col-xs-12">
								<div class="counter-wrap text-right txt-light">
									<span class="counter"><?php echo Detailpembelian::model()->summaryMonth(); ?></span>
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
		<div class="panel panel-default bg-yellow card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-light">Tahun Ini <br> ( <?php echo Pembelian::model()->countYear(); ?> Pembelian )</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="sm-graph-box">
						<div class="row">
							<div class="col-xs-12">
								<div class="counter-wrap text-right txt-light">
									<span class="counter"><?php echo Detailpembelian::model()->summaryYear(); ?></span>
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

