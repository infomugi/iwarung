<?php
/* @var $this DivisiController */
/* @var $model Divisi */

$this->breadcrumbs=array(
	'Divisis'=>array('index'),
	'Kelola',
	);

$this->pageTitle='Kelola Divisi';
?>


<?php echo CHtml::link('<i class="fa fa-plus-square"></i> <span class="hidden-xs">Tambah</span>',
	array('create'),
	array('class' => 'btn btn-success btn-rounded'));
	?>

	<?php echo CHtml::link('<i class="fa fa-list-alt"></i> <span class="hidden-xs">Kelola</span>',
		array('index'),
		array('class' => 'btn btn-success btn-rounded'));
		?>

		<div class="table-responsive">
			<?php $this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'divisi-grid',
				'dataProvider'=>$model->search(),
				'filter'=>$model,
				'itemsCssClass' => 'table table-bordered table-striped dataTable table-hover',
				'columns'=>array(

					array(
						'header'=>'No',
						'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
						'htmlOptions'=>array('width'=>'10px', 
							'style' => 'text-align: center;')),

					'kodeDivisi',
					'namaDivisi',

					array(    
						'name'=>'status',
						'type'=>'raw', 
						'filter'=>false,
						'value'=>'Divisi::model()->status($data->status)',
						'sortable' => TRUE, 
						'htmlOptions'=>array('width'=>'180px')),

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
