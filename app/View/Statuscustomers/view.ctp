<div class="statuscustomers view">
<h2><?php echo __('Status Customer'); ?></h2>
	



	<table class="table">
		<tr>
			<td><?php echo __('Id'); ?></td>
			<td><?php echo h($statuscustomer['Statuscustomer']['id']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Name'); ?></td>
			<td><?php echo h($statuscustomer['Statuscustomer']['name']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Is Sold'); ?></td>
			<td>
				<?php 
					if ($statuscustomer['Statuscustomer']['issold']==1) {
					echo 'Yes';
					}else{
						echo 'No';
					}
				?>
			</td>
		</tr>
	</table>


</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Status'), array('action' => 'edit', $statuscustomer['Statuscustomer']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Status'), array('action' => 'delete', $statuscustomer['Statuscustomer']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $statuscustomer['Statuscustomer']['name']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Status'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Customers'); ?></h3>
	<?php if (!empty($statuscustomer['Customer'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th class="text-center"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($statuscustomer['Customer'] as $customer): ?>
		<tr>
			<td><?php echo $customer['id']; ?></td>
			<td><?php echo $customer['first_name']; ?></td>
			<td><?php echo $customer['last_name']; ?></td>
			<td class="actions text-center">
				<?php echo $this->Html->link(__('View'), array('controller' => 'customers', 'action' => 'view', $customer['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Customer'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
