<?php
/* @var $this DivisiController */
/* @var $model Divisi */

$this->breadcrumbs=array(
	'Divisis'=>array('index'),
	$model->idDivisi=>array('view','id'=>$model->idDivisi),
	'Update',
	);

	$this->pageTitle='Edit Divisi';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>