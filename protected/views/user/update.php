<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->idUser=>array('view','id'=>$model->idUser),
	'Update',
	);

	$this->pageTitle='Edit User';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>