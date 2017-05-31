<?php
/* @var $this KategoriController */
/* @var $data Kategori */
?>

<div class="col-xs-6">
	<!-- Default box -->
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">

				<?php echo CHtml::link(CHtml::encode($data->nama), array('view', 'id'=>$data->idKategori)); ?>
				<br />

				
			</div>
			<div class="box-body">

				<?php $this->widget('zii.widgets.CDetailView', array(
					'data'=>$data,
					'htmlOptions'=>array("class"=>"table"),
					'attributes'=>array(
						'nama',
						array(    
							'name'=>'status',
							'type'=>'raw', 
							'value'=>Kategori::model()->status($data->status),
							),
						),
						)); ?>

						

					</div><!-- /.box-body -->
				</div><!-- /.box -->
			</div>
