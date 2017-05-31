<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Tambah',
	);

	$this->pageTitle='Tambah User';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>