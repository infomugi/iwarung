<?php
/* @var $this KategoriController */
/* @var $model Kategori */

$this->breadcrumbs=array(
	'Kategoris'=>array('index'),
	'Tambah',
	);

$this->pageTitle='Tambah Kategori';
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>