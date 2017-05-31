<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->idUser=>array('view','id'=>$model->idUser),
	'Password',
	);

	$this->pageTitle='Edit Password';
	?>

	<?php echo $this->renderPartial('_form_password', array('model'=>$model)); ?>