<?php
/* @var $this PenjualanController */
/* @var $model Penjualan */

$this->breadcrumbs=array(
	'Penjualan'=>array('admin'),
	'Tambah',
	);

	$this->pageTitle='Transaksi Penjualan';
	?>

<?php
	echo $this->renderPartial('_form', array('model'=>$model,
                                             'member'=>$member,
                                              'validatedMembers'=>$validatedMembers));
?>