<div class="citis form">
<?php echo $this->Form->create('Citi'); ?>
	<fieldset>
		<legend><?php echo __('Edit City'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('state_id');
		echo $this->Form->input('name');
		echo $this->Form->input('zip');
		echo $this->Form->input('longitud');
		echo $this->Form->input('latitud');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>