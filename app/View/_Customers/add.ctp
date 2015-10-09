<h2> Add Customer	</h2>
<?php  
echo $this->Form->create('Customer');
echo $this->Form->input('first_name');
echo $this->Form->input('last_name');
echo $this->Form->input('email');
echo $this->Form->input('address');
echo $this->Form->input('birth');
echo $this->Form->input('notes');
echo $this->Form->end('Add Customer');

?>