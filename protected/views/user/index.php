<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Users',
	);

$this->pageTitle='Daftar User';
?>

<?php echo CHtml::link('Tambah User',
	array('create'),
	array('class' => 'btn btn-success btn-flat'));
	?>
	<?php echo CHtml::link('Kelola User',
		array('admin'),
		array('class' => 'btn btn-success btn-flat'));
		?>

		<HR>

			<?php $this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProvider,
				'itemView'=>'_view',
				)); ?>
