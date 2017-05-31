<?php
/* @var $this PembelianController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pembelians',
	);

$this->pageTitle='Daftar Pembelian (Belum di Verifikasi)';
?>

<section class="col-xs-12">

				<?php $this->widget('zii.widgets.CListView', array(
					'dataProvider'=>$dataProvider,
					'itemView'=>'_view',
					)); ?>

				</section>