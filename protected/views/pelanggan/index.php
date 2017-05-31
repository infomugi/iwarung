<?php
/* @var $this AnggotaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Anggotas',
	);

$this->pageTitle='Daftar Anggota';
?>

<?php echo CHtml::link('Tambah Anggota',
	array('create'),
	array('class' => 'btn btn-success btn-flat'));
	?>
	<?php echo CHtml::link('Kelola Anggota',
		array('admin'),
		array('class' => 'btn btn-success btn-flat'));
		?>

		<HR>

			<?php $this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProvider,
				'itemView'=>'_view',
				)); ?>
