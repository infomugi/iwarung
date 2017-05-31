<?php
/* @var $this KategoriController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Kategoris',
	);

$this->pageTitle='Daftar Kategori';
?>

<?php echo CHtml::link('<i class="fa fa-plus-square"></i> <span class="hidden-xs">Tambah</span>',
	array('create'),
	array('class' => 'btn btn-success btn-rounded'));
	?>

	<?php echo CHtml::link('<i class="fa fa-server"></i> <span class="hidden-xs">Kelola</span>',
		array('admin'),
		array('class' => 'btn btn-success btn-rounded'));
		?>

		<?php $this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view',
			)); ?>

