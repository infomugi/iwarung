<?php
/* @var $this DetailpermintaanController */
/* @var $model Detailpermintaan */

$this->breadcrumbs=array(
	'Detailpermintaans'=>array('index'),
	$model->id,
	);

	$this->pageTitle='Detail Detailpermintaan';
	?>


	<section class="col-xs-12">

		<?php echo CHtml::link('Tambah',
	 array('create'),
 array('class' => 'btn btn-primary btn-flat','title'=>'Tambah Detailpermintaan'));
		 ?>
		<?php echo CHtml::link('List',
	 array('index'),
 array('class' => 'btn btn-primary btn-flat', 'title'=>'Daftar Detailpermintaan'));
		 ?>
		<?php echo CHtml::link('Kelola',
	 array('admin'),
 array('class' => 'btn btn-primary btn-flat','title'=>'Kelola Detailpermintaan'));
		 ?>
		<?php echo CHtml::link('Edit', 
	 array('update', 'id'=>$model->id,
		), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Detailpermintaan'));
 ?>
		<?php echo CHtml::link('Hapus', 
	 array('delete', 'id'=>$model->id,
		),  array('class' => 'btn btn-warning btn-flat', 'title'=>'Hapus Detailpermintaan'));
 ?>

		<HR>

			<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'htmlOptions'=>array("class"=>"table"),
			'attributes'=>array(
						'id',
		'barang_id',
		'supplier_id',
		'jumlah',
		'group_id',
				),
				)); ?>

			</section>

			<STYLE>
				th{width:150px;}
			</STYLE>

