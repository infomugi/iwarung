<?php
/* @var $this DetailpermintaanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Detailpermintaans',
	);

	$this->pageTitle='Daftar Detailpermintaan';
	?>

	<section class="col-xs-12">

		<?php echo CHtml::link('Tambah Detailpermintaan',
 array('create'),
 array('class' => 'btn btn-success btn-flat'));
 ?>
		<?php echo CHtml::link('Kelola Detailpermintaan',
 array('admin'),
 array('class' => 'btn btn-success btn-flat'));
 ?>

		<HR>

			<?php $this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view',
			)); ?>

		</section>