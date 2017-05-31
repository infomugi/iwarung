<?php
/* @var $this ShopController */
/* @var $model Shop */

$this->breadcrumbs=array(
	'Shops'=>array('index'),
	'Manage',
	);

$this->pageTitle='Manage Shop';
?>


<?php echo CHtml::link('Add Shop',
	array('create'),
	array('class' => 'btn btn-success'));
	?>
	<?php echo CHtml::link('List Shop',
		array('index'),
		array('class' => 'btn btn-success'));
		?>

		<div class="table-responsive">
			<?php $this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'setting-grid',
				'dataProvider'=>$model->search(),
				'filter'=>$model,
				'itemsCssClass' => 'table-responsive table table-striped table-hover table-vcenter',
				'columns'=>array(

					array(
						'header'=>'No',
						'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
						'htmlOptions'=>array('width'=>'10px', 
							'style' => 'text-align: center;')),

						// 'id_shop',
					'name',
					'description',
						// 'keywords',
						// 'favicon',
						// 'logo',
		/*
		'address',
		'phone',
		'email',
		'facebook',
		'instagram',
		'twitter',
		'status',
		*/
		array(
			'header'=>'Action',
			'class'=>'CButtonColumn',
			'htmlOptions'=>array('width'=>'100px', 
				'style' => 'text-align: center;'),
			),
		),
		)); ?>
	</div>
