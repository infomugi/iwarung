<?php
/* @var $this ShopController */
/* @var $model Shop */

$this->breadcrumbs=array(
	'Shops'=>array('index'),
	'Add',
	);

	$this->pageTitle='Add Shop';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>