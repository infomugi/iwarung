<?php
/* @var $this DivisiController */
/* @var $model Divisi */

$this->breadcrumbs=array(
	'Divisis'=>array('index'),
	'Tambah',
	);

$this->pageTitle='Tambah Divisi';
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>