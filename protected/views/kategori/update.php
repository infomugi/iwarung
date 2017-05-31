<?php
/* @var $this KategoriController */
/* @var $model Kategori */

$this->breadcrumbs=array(
	'Kategoris'=>array('index'),
	$model->idKategori=>array('view','id'=>$model->idKategori),
	'Update',
	);

	$this->pageTitle='Edit Kategori';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>