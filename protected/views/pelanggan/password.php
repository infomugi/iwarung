<?php
/* @var $this AnggotaController */
/* @var $model Anggota */

$this->breadcrumbs=array(
	'Anggotas'=>array('index'),
	$model->idAnggota=>array('view','id'=>$model->idAnggota),
	'Password',
	);

	$this->pageTitle='Edit Password';
	?>

	<?php echo $this->renderPartial('_form_password', array('model'=>$model)); ?>