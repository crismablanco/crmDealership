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

		if ($current_user['role']=='admin') {
			$roles = array('sale' => 'Sales', 'finance' => 'Finance Manager', 'saleman'=>'Sales Manager',  'admin'=>'System Administrator');
		}elseif ($current_user['role']=='salemanager') {
			$roles = array('sale' => 'Sales', 'finance' => 'Finance Manager', 'saleman'=>'Sales Manager');
		}else {
			$roles = array('sale' => 'Sales');
		}
		echo $this->Form->input(
		    'role',
		    array('options' => $roles)
		);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
