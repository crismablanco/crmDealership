<div class="financingsources form">
<?php echo $this->Form->create('Financingsource'); ?>
	<fieldset>
		<legend><?php echo __('Edit Financing Source'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>