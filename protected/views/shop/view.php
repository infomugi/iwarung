<?php
/* @var $this ShopController */
/* @var $model Shop */

$this->breadcrumbs=array(
	'Warung'=>array('index'),
	$model->name,
	);

$this->pageTitle='Konfigurasi Warung';
?>


<?php echo CHtml::link('Edit Warung', 
	array('update',
		), array('class' => 'btn btn-success', 'title'=>'Edit Warung'));
		?>

		<?php echo CHtml::link('Logo', 
			array('logo',
				), array('class' => 'btn btn-success', 'title'=>'Logo'));
				?>

				<?php echo CHtml::link('Favicon', 
					array('favicon',
						), array('class' => 'btn btn-success', 'title'=>'Favicon'));
						?>

						<?php echo CHtml::link('Seo', 
							array('seo',
								), array('class' => 'btn btn-success', 'title'=>'Seo'));
								?>

								<?php echo CHtml::link('Social Media', 
									array('socialmedia',
										), array('class' => 'btn btn-success', 'title'=>'Social Media'));
										?>			

										<HR>

											<h4><i class="fa fa-archive"/></i> Nama Warung</h4>
											<?php $this->widget('zii.widgets.CDetailView', array(
												'data'=>$model,
												'htmlOptions'=>array("class"=>"table"),
												'attributes'=>array(
													'name',
													'address',
													'phone',
													'email',
													),
													)); ?>

													<h4><i class="fa fa-globe"/></i> SEO</h4>
													<?php $this->widget('zii.widgets.CDetailView', array(
														'data'=>$model,
														'htmlOptions'=>array("class"=>"table"),
														'attributes'=>array(
															'description',
															'keywords',
															),
															)); ?>

															<h4><i class="fa fa-facebook"/></i> Media Sosial</h4>
															<?php $this->widget('zii.widgets.CDetailView', array(
																'data'=>$model,
																'htmlOptions'=>array("class"=>"table"),
																'attributes'=>array(
																	'facebook',
																	'instagram',
																	'twitter',
																	),
																	)); ?>	

																<!-- 	<h4><i class="fa fa-image"/></i> Logo & Favicon</h4>
																	<?php $this->widget('zii.widgets.CDetailView', array(
																		'data'=>$model,
																		'htmlOptions'=>array("class"=>"table"),
																		'attributes'=>array(
																			'logo',
																			'favicon',
																			),
																			)); ?>		 -->																									

																	<STYLE>
																		th{width:150px;}
																	</STYLE>

