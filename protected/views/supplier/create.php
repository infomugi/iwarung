<?php
/* @var $this SupplierController */
/* @var $model Supplier */

$this->breadcrumbs=array(
	'Suppliers'=>array('index'),
	'Tambah',
	);

	$this->pageTitle='Tambah Supplier';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>