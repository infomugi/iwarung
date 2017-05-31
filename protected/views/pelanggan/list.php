<?php
/* @var $this AnggotaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Anggotas',
	);

$this->pageTitle='Daftar Kas Anggota';


$this->widget('EExcelWriter', array(
	'dataProvider' => $dataProvider,
	'title'        => 'EExcelWriter',
	'stream'       => FALSE,
	'fileName'     => 'Report Kas Anggota.xls',
	'columns'      => array(

		'namaLengkap',
		array('name'=>'debit','value'=>'Yii::app()->numberFormatter->formatCurrency($data->debit,"Rp. ")'),
		array('name'=>'kredit','value'=>'Yii::app()->numberFormatter->formatCurrency($data->kredit,"Rp. ")'),

		),
	));
?>
<a href="./Report Kas Anggota.xls" class="btn btn-success" title="Report Excel">Download Laporan</a>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'Anggota-grid',
	'dataProvider'=>$dataProvider,
	'itemsCssClass' => 'table table-bordered table-striped dataTable table-hover',
	'columns'=>array(

		array(
			'header'=>'No',
			'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
			'htmlOptions'=>array('width'=>'10px', 
				'style' => 'text-align: center;')),

		'namaLengkap',
		array('name'=>'debit','value'=>'Yii::app()->numberFormatter->formatCurrency($data->debit,"Rp. ")'),
		array('name'=>'kredit','value'=>'Yii::app()->numberFormatter->formatCurrency($data->kredit,"Rp. ")'),


		array(
			'header'=>'Action',
			'template'=>'{view}',
			'class'=>'CButtonColumn',
			'htmlOptions'=>array('width'=>'100px', 
				'style' => 'text-align: center;'),
			),
		),
		)); ?>