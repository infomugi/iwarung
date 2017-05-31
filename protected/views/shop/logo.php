<?php
/* @var $this ShopController */
/* @var $model Shop */

$this->breadcrumbs=array(
	'Shops'=>array('index'),
	$model->name=>array('view','id'=>$model->id_shop),
	'Edit',
	);

	$this->pageTitle='Edit Logo';
	?>

	<?php echo $this->renderPartial('_form_logo', array('model'=>$model)); ?>