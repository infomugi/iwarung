<?php
/* @var $this DivisiController */
/* @var $model Divisi */

$this->breadcrumbs=array(
	'Divisis'=>array('index'),
	$model->idDivisi,
	);

$this->pageTitle='Detail Divisi';
?>


<?php echo CHtml::link('<i class="fa fa-plus-square"></i> <span class="hidden-xs">Tambah</span>',
	array('create'),
	array('class' => 'btn btn-success btn-rounded','title'=>'Tambah Divisi'));
	?>
	<?php echo CHtml::link('<i class="fa fa-list-alt"></i> <span class="hidden-xs">Daftar</span>',
		array('index'),
		array('class' => 'btn btn-success btn-rounded', 'title'=>'Daftar Divisi'));
		?>
		<?php echo CHtml::link('<i class="fa fa-server"></i> <span class="hidden-xs">Kelola</span>',
			array('admin'),
			array('class' => 'btn btn-success btn-rounded','title'=>'Kelola Divisi'));
			?>
			<?php echo CHtml::link('<i class="fa fa-edit"></i> <span class="hidden-xs">Edit</span>', 
				array('update', 'id'=>$model->idDivisi,
					), array('class' => 'btn btn-info btn-rounded', 'title'=>'Edit Divisi'));
					?>
<!-- 					<?php echo CHtml::link('<i class="fa fa-remove"></i> <span class="hidden-xs">Hapus</span>', 
						array('delete', 'id'=>$model->idDivisi,
							),  array('class' => 'btn btn-warning btn-rounded', 'title'=>'Hapus Divisi'));
							?> -->

							<HR>

								<?php $this->widget('zii.widgets.CDetailView', array(
									'data'=>$model,
									'htmlOptions'=>array("class"=>"table"),
									'attributes'=>array(
										'kodeDivisi',
										'namaDivisi',

										array(    
											'name'=>'status',
											'type'=>'raw', 
											'value'=>Divisi::model()->status($model->status),
											),

										),
										)); ?>

									</section>

									<STYLE>
										th{width:150px;}
									</STYLE>

