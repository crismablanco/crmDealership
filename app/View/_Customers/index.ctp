<div class="col-md-6">
	<h1>Customers</h1>
	<table class="table">
		<tr>
			<th>#</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Details</th>
		</tr>

		<?php foreach ($customers as $customer) { ?>
			<tr>
				<td><?php echo $customer['Customer']['id']; ?></td>
				<td><?php echo $customer['Customer']['first_name']; ?></td>
				<td><?php echo $customer['Customer']['last_name']; ?></td>
				<td>
					<button type="button" class="btn btn-info btn-xs">
					<?php 
					echo $this->Html->link('View',array('controller'=>'customers','action'=>'view', $customer['Customer']['id']));
					 ?>
					</button>
					<button type="button" class="btn btn-success btn-xs">
					<?php 
					echo $this->Html->link('Edit',array('controller'=>'customers','action'=>'edit', $customer['Customer']['id']));
					 ?>
					</button>
					<button type="button" class="btn btn-danger btn-xs">
					<?php 
					echo $this->Form->postLink('Delete',array('controller'=>'customers','action'=>'delete', $customer['Customer']['id']), array('confirm'=>'Delete customer '.$customer['Customer']['last_name'].' '.$customer['Customer']['first_name'].'?'));
					 ?>
					</button>
				</td>
			</tr>
		<?php } ?>
	</table>
</div>

