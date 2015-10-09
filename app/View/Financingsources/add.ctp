<div class="financingsources form">
<?php echo $this->Form->create('Financingsource'); ?>
	<fieldset>
		<legend><?php echo __('Add Financing Source'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Financing sources'), array('action' => 'index')); ?></li>
	</ul>
</div>
