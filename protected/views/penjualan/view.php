<?php
/* @var $this PenjualanController */
/* @var $model Penjualan */

$this->breadcrumbs=array(
	'Penjualan'=>array('create'),
	$model->id,
	);

$this->pageTitle='Transaksi Penjualan #'.$model->id;	
?>
<div class="col-md-6">
	<?php $this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'htmlOptions'=>array("class"=>"table"),
		'attributes'=>array(

			'tanggal_jual',
			array('name'=>'user_id','value'=>$model->User->namaLengkap),
			array('label'=>'Status','value'=>Penjualan::model()->status($model->status)),

			),
			)); ?>

		</div>
		<div class="col-md-6">

			<?php $this->widget('zii.widgets.CDetailView', array(
				'data'=>$model,
				'htmlOptions'=>array("class"=>"table"),
				'attributes'=>array(

					array('name'=>'total_jual','value'=>Yii::app()->numberFormatter->formatCurrency($model->total_jual,"Rp. ")),
					array('label'=>'Pelanggan','value'=>$model->Pelanggan->namaLengkap),
					array('label'=>'Alamat Pelanggan','value'=>$model->Pelanggan->alamat),

					),
					)); ?>



				</div>

				<div class="col-md-12">
					<div class="table-responsive">

						<?php $this->widget('zii.widgets.grid.CGridView', array(
							'id'=>'detailPenjualan-grid',
							'dataProvider'=>$dataProvider,
							'itemsCssClass' => 'table table-striped dataTable table-hover',
							'columns'=>array(

								array('name'=>'barang_id','value'=>'$data->Barang->nama'),
								array('header'=>'Satuan','value'=>'Barang::model()->satuan($data->Barang->satuan)'),
								array('header'=>'Harga','value'=>'Yii::app()->numberFormatter->formatCurrency($data->Barang->harga,"Rp. ")'),
								array('header'=>'Stok','value'=>'$data->Barang->stock'),
								array(
									'class'=>'ext.gridcolumns.TotalColumn',
									'header'=>'QTY',
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
									'id'=>'data',
									'output'=>'Yii::app()->numberFormatter->formatCurrency($value,"Rp. ")',
									'type'=>'raw',
									'footer'=>true,
									),

								),
								)); ?>
							</div>

							<?php echo CHtml::link('<i class="fa fa-plus-square"></i> <span class="hidden-xs">Tambah</span>',
								array('create'),
								array('class' => 'btn btn-success btn-rounded','title'=>'Tambah Kategori'));
								?>
								<?php echo CHtml::link('<i class="fa fa-list-alt"></i> <span class="hidden-xs">Daftar</span>',
									array('index'),
									array('class' => 'btn btn-success btn-rounded', 'title'=>'Daftar Kategori'));
									?>
									<?php echo CHtml::link('<i class="fa fa-server"></i> <span class="hidden-xs">Kelola</span>',
										array('admin'),
										array('class' => 'btn btn-success btn-rounded','title'=>'Kelola Kategori'));
										?>

										<?php echo CHtml::link('<i class="fa fa-print"></i> <span class="hidden-xs">Cetak Faktur</span>', 
											array('print', 'token'=>$model->token,
												), array('class' => 'btn btn-success pull-right btn-rounded btn-outline', 'title'=>'Cetak Penjualan'));
												?>

											</div>

											<STYLE>
												th{width:150px;}
											</STYLE>

