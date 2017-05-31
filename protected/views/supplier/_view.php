<?php
/* @var $this SupplierController */
/* @var $data Supplier */
?>

<div class="col-xs-6">
	<!-- Default box -->
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">

				<?php echo CHtml::link(CHtml::encode($data->nama), array('view', 'id'=>$data->id)); ?>
				<br />

				
			</div>
			<div class="box-body">

				<?php $this->widget('zii.widgets.CDetailView', array(
					'data'=>$data,
					'htmlOptions'=>array("class"=>"table"),
					'attributes'=>array(
						'nama',
						'alamat',
						'telepon',
						'email',
						),
						)); ?>


					</div><!-- /.box-body -->
				</div><!-- /.box -->
			</div>
