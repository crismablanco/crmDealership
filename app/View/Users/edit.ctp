<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('dealership_id');
		echo $this->Form->input('fullname');
		echo $this->Form->input('username');
		//echo $this->Form->input('password');
		echo $this->Form->input('email');

		$roles = array('admin' => 'Administrator', 'sale' => 'Sales', 'finance' => 'Finance Manager', 'saleman'=>'Sales Manager');
		echo $this->Form->input(
		    'role',
		    array('options' => $roles)
		);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>