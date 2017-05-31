<?php
/* @var $this SiteController */
/* @var $dataProvider CActiveDataProvider */
$this->pageTitle='Laporan Pembelian';
?>
<h5><i class="glyphicon glyphicon-signal text-primary"></i> <b class="text-primary">Nominal</b> <span class="text-muted">Pengeluaran</span></h5>
<div class="row">

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="panel panel-default bg-blue card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-light">Hari Ini - ( <?php echo Pembelian::model()->countToday(); ?> Pembelian )</h6>
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
									<span class="counter"><?php echo Pembelian::model()->buyToday(); ?></span>
								</div>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="panel panel-default bg-blue card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-light">Minggu Ini - ( <?php echo Pembelian::model()->countWeek(); ?> Pembelian )</h6>
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
									<span class="counter"><?php echo Pembelian::model()->buyWeek(); ?></span>
								</div>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="panel panel-default bg-blue card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-light">Bulan Ini - ( <?php echo Pembelian::model()->countMonth(); ?> Pembelian )</h6>
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
									<span class="counter"><?php echo Pembelian::model()->buyMonth(); ?></span>
								</div>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="panel panel-default bg-blue card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-light">Tahun Ini  - ( <?php echo Pembelian::model()->countYear(); ?> Pembelian )</h6></h6>
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
									<span class="counter"><?php echo Pembelian::model()->buyYear(); ?></span>
								</div>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

