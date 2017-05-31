<?php
/* @var $this DetailpermintaanController */
/* @var $model Detailpermintaan */

$this->breadcrumbs=array(
	'Detailpermintaans'=>array('index'),
	'Kelola',
	);

	$this->pageTitle='Kelola Detailpermintaan';
	?>

	<section class="col-xs-12">

		<?php echo CHtml::link('Tambah Detailpermintaan',
 array('create'),
 array('class' => 'btn btn-primary btn-flat'));
 ?>
		<?php echo CHtml::link('Daftar Detailpermintaan',
 array('index'),
 array('class' => 'btn btn-primary btn-flat'));
 ?>

		<HR>

			<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'detailpermintaan-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'itemsCssClass' => 'table table-striped dataTable table-hover',
			'columns'=>array(

			array(
			'header'=>'No',
			'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
			'htmlOptions'=>array('width'=>'10px', 
			'style' => 'text-align: center;')),

					'id',
		'barang_id',
		'supplier_id',
		'jumlah',
		'group_id',
			array(
			'header'=>'Action',
			'class'=>'CButtonColumn',
			'htmlOptions'=>array('width'=>'100px', 
			'style' => 'text-align: center;'),
			),
			),
			)); ?>
			
		</section>