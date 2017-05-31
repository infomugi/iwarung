<?php
/* @var $this PembelianController */
/* @var $model Pembelian */

$this->breadcrumbs=array(
	'Pembelian'=>array('admin'),
	'Tambah',
	);

$this->pageTitle='Transaksi Pembelian';
?>

<?php
echo $this->renderPartial('_form', array('model'=>$model,
	'member'=>$member,
	'validatedMembers'=>$validatedMembers));
	?>