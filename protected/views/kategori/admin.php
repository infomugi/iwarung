<?php
/* @var $this KategoriController */
/* @var $model Kategori */

$this->breadcrumbs=array(
	'Kategoris'=>array('index'),
	'Kelola',
	);

$this->pageTitle='Kelola Kategori';
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
				'id'=>'kategori-grid',
				'dataProvider'=>$model->search(),
				'filter'=>$model,
				'itemsCssClass' => 'table table-bordered table-striped dataTable table-hover',
				'columns'=>array(

					array(
						'header'=>'No',
						'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
						'htmlOptions'=>array('width'=>'10px', 
							'style' => 'text-align: center;')),

					'nama',

					array(    
						'name'=>'status',
						'type'=>'raw', 
						'value'=>'Kategori::model()->status($data->status)',
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

