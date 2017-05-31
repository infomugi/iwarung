<?php
/* @var $this PenjualanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Penjualans',
	);

$this->pageTitle='Daftar Penjualan';
?>

<section class="col-xs-12">

	<?php echo CHtml::link('Tambah Penjualan',
		array('create'),
		array('class' => 'btn btn-success btn-flat'));
		?>
		<?php echo CHtml::link('Kelola Penjualan',
			array('admin'),
			array('class' => 'btn btn-success btn-flat'));
			?>

			<HR>

				<?php $this->widget('zii.widgets.CListView', array(
					'dataProvider'=>$dataProvider,
					'itemView'=>'_view',
					)); ?>

				</section>