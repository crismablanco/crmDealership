<div class="statuscustomers form">
<?php echo $this->Form->create('Statuscustomer'); ?>
	<fieldset>
		<legend><?php echo __('Add Status for Customer'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('issold');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Status'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
	</ul>
</div>
