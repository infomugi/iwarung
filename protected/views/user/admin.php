<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Kelola',
	);

$this->pageTitle='Kelola User';
?>


<?php echo CHtml::link('<i class="fa fa-plus-square"></i> <span class="hidden-xs">Tambah</span>',
	array('create'),
	array('class' => 'btn btn-success btn-rounded'));
	?>

	<?php echo CHtml::link('<i class="fa fa-list-alt"></i> <span class="hidden-xs">Kelola</span>',
		array('admin'),
		array('class' => 'btn btn-success btn-rounded'));
		?>

		<?php echo CHtml::link('<i class="fa fa-tags"></i> <span class="hidden-xs">Divisi</span>',
			array('divisi/admin'),
			array('class' => 'btn btn-success btn-rounded'));
			?>

			<div class="table-responsive">
				<?php $this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'user-grid',
					'dataProvider'=>$model->search(),
					'filter'=>$model,
					'itemsCssClass' => 'table table-bordered table-striped dataTable table-hover',
					'columns'=>array(

						array(
							'header'=>'No',
							'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
							'htmlOptions'=>array('width'=>'10px', 
								'style' => 'text-align: center;')),

						'namaLengkap',
							// 'email',
						'telephone',

						array(    
							'name'=>'idDivisi',
							'type'=>'raw', 
							'value'=>'$data->idDivisi == 0 ? "Pengguna" : $data->division->namaDivisi',
							),	

						array(    
							'name'=>'level',
							'type'=>'raw', 
							'value'=>'User::model()->level($data->level)',
							),

						array(    
							'name'=>'status',
							'type'=>'raw', 
							'value'=>'User::model()->status($data->status)',
							),	

						array(
							'header'=>'Action',
							'template'=>'{view}{update}',
							'class'=>'CButtonColumn',
							'htmlOptions'=>array('width'=>'100px', 
								'style' => 'text-align: center;'),
							),
						
						),
						)); ?>
					</div>

