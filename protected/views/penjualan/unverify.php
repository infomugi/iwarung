<?php
/* @var $this PenjualanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Penjualans',
	);

$this->pageTitle='Daftar Penjualan (Belum di Verifikasi)';
?>

<section class="col-xs-12">

				<?php $this->widget('zii.widgets.CListView', array(
					'dataProvider'=>$dataProvider,
					'itemView'=>'_view',
					)); ?>

				</section>