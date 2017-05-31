<?php
/* @var $this DivisiController */
/* @var $data Divisi */
?>

<div class="col-xs-6">
	<!-- Default box -->
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">

				<?php echo CHtml::link(CHtml::encode($data->namaDivisi), array('view', 'id'=>$data->idDivisi)); ?>
				<br />

				
			</div>
			<div class="box-body">

				<?php $this->widget('zii.widgets.CDetailView', array(
					'data'=>$data,
					'htmlOptions'=>array("class"=>"table"),
					'attributes'=>array(
						'kodeDivisi',
						'namaDivisi',

						array(    
							'name'=>'status',
							'type'=>'raw', 
							'value'=>Divisi::model()->status($data->status),
							),
						
						),
						)); ?>

						

					</div><!-- /.box-body -->
				</div><!-- /.box -->
			</div>

			<STYLE>
				th{width:150px;}
			</STYLE>
