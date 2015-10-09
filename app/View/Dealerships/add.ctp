<div class="dealerships form">
<?php echo $this->Form->create('Dealership'); ?>
	<fieldset>
		<legend><?php echo __('Add Dealership'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('address');
		echo $this->Form->input('citi_id');
		echo $this->Form->input('phone');
		echo $this->Form->input('fax');
		echo $this->Form->input('website');
		echo $this->Form->input('email');
		echo $this->Form->input('notes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>