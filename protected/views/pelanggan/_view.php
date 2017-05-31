<?php
/* @var $this AnggotaController */
/* @var $data Anggota */
?>

<div class="col-xs-6">
	<!-- Default box -->
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">

				<?php echo CHtml::link(CHtml::encode($data->namaLengkap), array('view', 'id'=>$data->idAnggota)); ?>
				<br />

				
			</div>
			<div class="box-body">
									<?php $this->widget('zii.widgets.CDetailView', array(
										'data'=>$data,
										'htmlOptions'=>array("class"=>"table table-hover"),
										'attributes'=>array(
											'namaLengkap',
											'telephone',
											),
											)); ?>

			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
