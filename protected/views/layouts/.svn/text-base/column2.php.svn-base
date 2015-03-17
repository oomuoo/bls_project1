<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span-19">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<div class="span-5 last">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Operations',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
	</div><!-- sidebar -->
	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
	'links' => array(
		'businesses' => array('business/index'),
		'Ikea' => array('business/view', 'id' => '123'),
		'Update',
	),
	'homeLink' => false,
	'separator' => '',
	'tagName' => 'ul',
	'inactiveLinkTemplate' => '<li><span>{label}</span></li>',
	'activeLinkTemplate' => '<li><a href="{url}">{label}</a> <span class="divider">/</span></li>',
	'htmlOptions' => array('class' => 'breadcrumb'),
));?>
</div>
<?php $this->endContent(); ?>