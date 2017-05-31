<?php
/* @var $this AnggotaController */
/* @var $model Anggota */

$this->breadcrumbs=array(
	'Anggotas'=>array('index'),
	$model->idAnggota=>array('view','id'=>$model->idAnggota),
	'Update',
	);

	$this->pageTitle='Edit Anggota';
	?>

	<?php echo $this->renderPartial('_form_update', array('model'=>$model)); ?>