<div class="statuscustomers form">
<?php echo $this->Form->create('Statuscustomer'); ?>
	<fieldset>
		<legend><?php echo __('Edit Status for Customer'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('issold');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Statuscustomer.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Statuscustomer.name')))); ?></li>
		<li><?php echo $this->Html->link(__('List Status'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
	</ul>
</div>
