<?php
/* @var $this PenjualanController */
/* @var $model Penjualan */

$this->breadcrumbs=array(
	'Penjualan'=>array('index'),
	'Kelola',
	);

$this->pageTitle='Kelola Penjualan';
?>

<?php echo CHtml::link('<i class="fa fa-plus-square"></i> <span class="hidden-xs">Penjualan Baru</span>',
	array('create'),
	array('class' => 'btn btn-success btn-rounded'));
	?>

	<div class="table-responsive">
		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'Penjualan-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'itemsCssClass' => 'table table-striped dataTable table-hover',
			'columns'=>array(

				array(
					'header'=>'No',
					'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
					'htmlOptions'=>array('width'=>'10px', 
						'style' => 'text-align: center;')),
				'tanggal_jual',
				array('name'=>'user_id','value'=>'$data->User->namaLengkap','filter'=>CHtml::listData(User::model()->findAllByAttributes(array('status'=>1)),'idUser','namaLengkap')),
				array('name'=>'anggota_id','value'=>'$data->Pelanggan->namaLengkap','filter'=>CHtml::listData(Pelanggan::model()->findAllByAttributes(array('status'=>1)),'idAnggota','namaLengkap')),
				// array('header'=>'Alamat','value'=>'$data->Pelanggan->alamat'),
				array('name'=>'total_jual','value'=>'Penjualan::model()->rupiah($data->total_jual)'),
				array(   
					'header'=>'Print',
					'type'=>'raw',
					'value'=>'CHtml::link("Cetak Faktur", array("/penjualan/print/token/$data->token/"))',
					),							
				array(
					'header'=>'Action',
					'template'=>'{view}',
					'class'=>'CButtonColumn',
					'htmlOptions'=>array('width'=>'100px', 
						'style' => 'text-align: center;'),
					),
				),
				)); ?>
				
			</div>