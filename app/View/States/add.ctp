<div class="states form">
<?php echo $this->Form->create('State'); ?>
	<fieldset>
		<legend><?php echo __('Add State'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('shortname', array('label'=>'Short Name'));
		echo $this->Form->input('countri_id', array('label'=>'Country'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>