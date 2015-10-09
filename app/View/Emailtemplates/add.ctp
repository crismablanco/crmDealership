<div class="emailtemplates form">
<?php echo $this->Form->create('Emailtemplate'); ?>
	<fieldset>
		<legend><?php echo __('Add Email Template'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('body');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>