<div class="customers form">
<?php echo $this->Form->create('Customer', array(
    'inputDefaults' => array(
        'label' => false,
        'div' => true
    ))); ?>
	<fieldset>
		<legend><?php echo __('Edit Customer'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo '<strong>Status customer</strong><br>'.$this->Form->input('statuscustomer_id');
		echo '<strong>Lead Source</strong><br>'.$this->Form->input('leadsource_id');
		echo '<strong>Financing Source</strong><br>'.$this->Form->input('financingsource_id');
		echo '<strong>User Sales</strong><br>'.$this->Form->input('user_id');
		echo '<strong>First Name</strong><br>'.$this->Form->input('first_name');
		echo '<strong>Last Name</strong><br>'.$this->Form->input('last_name');
		echo '<strong>email</strong><br>'.$this->Form->input('email');
		echo '<strong>Address</strong><br>'.$this->Form->input('address');
		echo '<strong>City</strong><br>'.$this->Form->input('citi_id');
		echo '<strong>Phone</strong><br>'.$this->Form->input('phone');
		echo '<strong>Birth</strong><br>'.$this->Form->input('birth');
		echo '<strong>Notes</strong><br>'.$this->Form->input('notes');
		echo '<strong>Date Sold</strong><br>'.$this->Form->input('datesold');
		echo '<strong>Car Desired Make</strong><br>'.$this->Form->input('cardesiredmake');
		echo '<strong>Car Desired Model</strong><br>'.$this->Form->input('cardesiredmodel');
		echo '<strong>Car Desired Year</strong><br>'.$this->Form->input('cardesiredyear');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>