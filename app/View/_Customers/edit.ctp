<h2>Edit Customer <?php echo $customer["Customer"]["first_name"]." ".$customer["Customer"]["last_name"]; ?>	</h2>
<?php 
echo $this->Html->link('Back to Customers', array('action'=>'index')); 

echo $this->Form->create('Customer');
echo $this->Form->input('first_name');
echo $this->Form->input('last_name');
echo $this->Form->input('email');
echo $this->Form->input('address');
echo $this->Form->input('birth');
echo $this->Form->input('notes');
echo $this->Form->end('Edit Customer');


?>