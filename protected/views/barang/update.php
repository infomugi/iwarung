<?php
/* @var $this BarangController */
/* @var $model Barang */

$this->breadcrumbs=array(
	'Barangs'=>array('index'),
	$model->id_barang=>array('view','id'=>$model->id_barang),
	'Update',
	);

	$this->pageTitle='Edit Barang';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>