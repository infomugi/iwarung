<?php
/* @var $this SupplierController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Suppliers',
	);

$this->pageTitle='Daftar Supplier';
?>


<?php echo CHtml::link('<i class="fa fa-plus-square"></i> <span class="hidden-xs">Supplier</span>',
	array('create'),
	array('class' => 'btn btn-success btn-rounded'));
	?>

	<?php echo CHtml::link('<i class="fa fa-server"></i> <span class="hidden-xs">Supplier</span>',
		array('admin'),
		array('class' => 'btn btn-success btn-rounded'));
		?>

		<?php $this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view',
			)); ?>

