<?php
/* @var $this PembelianController */
/* @var $model Pembelian */

$this->breadcrumbs=array(
	'Pembelian'=>array('index'),
	'Kelola',
	);

$this->pageTitle='Kelola Pembelian';
?>

<?php echo CHtml::link('<i class="fa fa-plus-square"></i> <span class="hidden-xs">Pembelian Baru</span>',
	array('create'),
	array('class' => 'btn btn-success btn-rounded'));
	?>
	
	<div class="table-responsive">
		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'Pembelian-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'itemsCssClass' => 'table table-striped dataTable table-hover',
			'columns'=>array(

				array(
					'header'=>'No',
					'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
					'htmlOptions'=>array('width'=>'10px', 
						'style' => 'text-align: center;')),
				'tanggal_masuk',
				array('name'=>'user_id','value'=>'$data->User->namaLengkap','filter'=>CHtml::listData(User::model()->findAllByAttributes(array('status'=>1)),'idUser','namaLengkap')),
				array('name'=>'supplier_id','value'=>'$data->Supplier->nama','filter'=>CHtml::listData(Supplier::model()->findAllByAttributes(array('status'=>1)),'id','nama')),
				array('name'=>'total_beli','value'=>'Pembelian::model()->rupiah($data->total_beli)'),
				// array('header'=>'Alamat','value'=>'$data->Supplier->alamat'),
				array(   
					'header'=>'Faktur',
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
