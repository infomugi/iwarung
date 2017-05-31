<?php
/* @var $this PembelianController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pembelians',
	);

$this->pageTitle='Daftar Pembelian';
?>

<section class="col-xs-12">

	<?php echo CHtml::link('Tambah Pembelian',
		array('create'),
		array('class' => 'btn btn-success btn-flat'));
		?>
		<?php echo CHtml::link('Kelola Pembelian',
			array('admin'),
			array('class' => 'btn btn-success btn-flat'));
			?>

			<HR>

				<?php $this->widget('zii.widgets.CListView', array(
					'dataProvider'=>$dataProvider,
					'itemView'=>'_view',
					)); ?>

				</section>