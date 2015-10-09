<div class="leadsources form">
<?php echo $this->Form->create('Leadsource'); ?>
	<fieldset>
		<legend><?php echo __('Add Lead Source'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>