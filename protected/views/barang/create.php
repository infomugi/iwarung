<?php
/* @var $this BarangController */
/* @var $model Barang */

$this->breadcrumbs=array(
	'Barangs'=>array('index'),
	'Tambah',
	);

$this->pageTitle='Barang Baru';
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>