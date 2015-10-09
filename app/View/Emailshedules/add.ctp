<div class="emailshedules form">
<?php echo $this->Form->create('Emailshedule'); ?>
	<fieldset>
		<legend><?php echo __('Add Emailshedule'); ?></legend>
	<?php
		echo $this->Form->input('date');
		echo $this->Form->input('emailfrom');
		echo $this->Form->input('emailto');
		echo $this->Form->input('emailcco');
		echo $this->Form->input('emailtemplate_id');
		echo $this->Form->input('state');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Emailshedules'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Emailtemplates'), array('controller' => 'emailtemplates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Emailtemplate'), array('controller' => 'emailtemplates', 'action' => 'add')); ?> </li>
	</ul>
</div>
