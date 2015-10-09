<div class="sales form">
<?php echo $this->Form->create('Sale'); ?>
	<fieldset>
		<legend><?php echo __('Add Sale'); ?></legend>
	<?php
		echo $this->Form->input('customer_id');
		echo $this->Form->input('saledate');
		echo $this->Form->input('user_id');
		echo $this->Form->input('carmake');
		echo $this->Form->input('carmodel');
		echo $this->Form->input('caryear');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>

</div>
