<?php
/* @var $this DetailpermintaanController */
/* @var $model Detailpermintaan */

$this->breadcrumbs=array(
	'Detailpermintaans'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
	);

	$this->pageTitle='Edit Detailpermintaan';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>