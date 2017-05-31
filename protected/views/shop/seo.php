<?php
/* @var $this ShopController */
/* @var $model Shop */

$this->breadcrumbs=array(
	'Shops'=>array('index'),
	$model->name=>array('view','id'=>$model->id_shop),
	'SEO',
	);

	$this->pageTitle='Edit SEO';
	?>

	<?php echo $this->renderPartial('_form_seo', array('model'=>$model)); ?>