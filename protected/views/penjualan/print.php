<?php
/* @var $this PenjualanController */
/* @var $model Penjualan */

$this->breadcrumbs=array(
	'Penjualans'=>array('index'),
	$model->id,
	);

$this->pageTitle='Faktur Penjualan #'.$model->id;
?>

<!-- Row -->
<div class="row" id="page"  onclick="cetak()">
	<div class="col-md-12">
		<div class="panel panel-default card-view">
			<div class="panel-heading" style="
			height: 80px;
			padding: 20px 20px;
			">
			<div class="pull-left">
				<h6 class="panel-title txt-dark"><b>Faktur Penjualan: #<?php echo $model->id; ?></b> <span class="hidden-xs">- <?php echo YII::app()->name; ?></span></h6>
			</div>
			<div class="pull-right">
				<img class="brand-img pull-left img-responsive" src="<?php echo Yii::app()->theme->baseUrl; ?>/dist/img/logo.png" alt="Logo" style="
				margin: 5px 0px;
				"/>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="panel-wrapper collapse in">
			<div class="panel-body">
				<div class="row">
					<div class="col-xs-6">
						<span class="txt-dark head-font inline-block capitalize-font mb-5">Kepada:</span>
						<address class="mb-15">
							<span class="address-head mb-5">
								<b><?php echo $model->Pelanggan->namaLengkap; ?></b></span> <br>
								<?php echo $model->Pelanggan->alamat; ?> <br>
								<?php echo $model->Pelanggan->email; ?> <br>
								<?php echo $model->Pelanggan->telephone; ?>
							</address>
						</div>
						<div class="col-xs-6 text-right">
							<span class="txt-dark head-font inline-block capitalize-font mb-5">Dari :</span>
							<address class="mb-15">
								<span class="address-head mb-5">
									<b><?php echo Shop::model()->name(); ?></b></span> <br>
									<?php echo Shop::model()->address(); ?> <br>
									<?php echo Shop::model()->phone(); ?> <br>
									<?php echo Shop::model()->email(); ?>
								</address>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 text-right">
								<address>
									<span class="txt-dark head-font capitalize-font mb-5">Tanggal:</span><br>
									<b><?php echo $model->tanggal_jual; ?></b>
								</address>
							</div>
						</div>

						<div class="invoice-bill-table">
							<div class="table-responsive">

								<?php $this->widget('zii.widgets.grid.CGridView', array(
									'id'=>'detailPenjualan-grid',
									'dataProvider'=>$dataProvider,
									'itemsCssClass' => 'table table-hover',
									'columns'=>array(

										array(
											'header'=>'No',
											'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
											'htmlOptions'=>array('width'=>'10px', 
												'style' => 'text-align: center;')),

										// array('header'=>'Kode','value'=>'$data->Barang->kode'),
										array('header'=>'Barang','value'=>'$data->Barang->nama'),
										array('header'=>'Satuan','value'=>'Barang::model()->satuan($data->Barang->satuan)'),
										array('header'=>'Harga','value'=>'$data->Barang->harga'),

										array(
											'class'=>'ext.gridcolumns.TotalColumn',
											'header'=>'Qty',
											'value'=>'$data->jumlah',
											'filter'=>'',
											'output'=>'$value',
											'type'=>'raw',
											'footer'=>true,
											),

										array(
											'class'=>'ext.gridcolumns.TotalColumn',
											'header'=>'Total',
											'value'=>'$data->Barang->harga * $data->jumlah',
											'filter'=>'',
											'output'=>'Yii::app()->numberFormatter->formatCurrency($value,"Rp. ")',
											'type'=>'raw',
											'footer'=>true,
											),

										),
										)); ?>

									</div>

								</div>
								<div class="row">
									<div class="col-xs-8 text-center">
										<br>
										<br>
										<h4 id="transaksi"></h4>
									</div>
									<div class="col-xs-4 text-center">
										<address>
											<span class="txt-dark head-font capitalize-font mb-5">Soreang, <?php echo date('d M Y'); ?></span><br>
											<span class="txt-dark head-font capitalize-font mb-5">Hormat Kami:</span>
											<br>
											<br>
											<br>
											<br>
											<b><?php echo $model->User->namaLengkap; ?></b>
										</address>
									</div>
								</div>
							</div>


						</div>
					</div>
				</div>
			</div>
			<!-- /Row -->

