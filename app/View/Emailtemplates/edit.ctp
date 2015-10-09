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
