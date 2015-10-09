<div class="emailtemplates form">
<?php echo $this->Form->create('Emailtemplate'); ?>
	<fieldset>
		<legend><?php echo __('Edit Email Template'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('body');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Emailtemplate.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Emailtemplate.name')))); ?></li>
		<li><?php echo $this->Html->link(__('List Templates'), array('action' => 'index')); ?></li>
	</ul>
</div>
