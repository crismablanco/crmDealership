<div class="users view">
<h2><?php echo __('User'); ?></h2>



	<table class="table">
		<tr>
			<td><?php echo __('Id'); ?></td>
			<td><?php echo h($user['User']['id']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Dealership'); ?></td>
			<td><?php echo $this->Html->link($user['Dealership']['name'], array('controller' => 'dealerships', 'action' => 'view', $user['Dealership']['id'])); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Full Name'); ?></td>
			<td><?php echo h($user['User']['fullname']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('User Name'); ?></td>
			<td><?php echo h($user['User']['username']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Password'); ?></td>
			<td><?php echo "***********"//h($user['User']['password']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Email'); ?></td>
			<td><?php echo h($user['User']['email']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Role'); ?></td>
			<td><?php echo h($user['User']['role']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Created'); ?></td>
			<td><?php echo h($user['User']['created']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Modified'); ?></td>
			<td><?php echo h($user['User']['modified']); ?></td>
		</tr>
	</table>

</div>

<div class="related">
	<h3><?php echo __('Related Sales'); ?></h3>
	<?php if (!empty($user['Sale'])): ?>
	<table class"table" cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Customer Id'); ?></th>
		<th><?php echo __('Saledate'); ?></th>
		<th><?php echo __('Car make'); ?></th>
		<th><?php echo __('Car model'); ?></th>
		<th><?php echo __('Car year'); ?></th>
		<th class="text-center"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Sale'] as $sale): ?>
		<tr>
			<td><?php echo $sale['id']; ?></td>
			<td><?php echo $sale['customer_id']; ?></td>
			<td><?php echo $sale['saledate']; ?></td>
			<td><?php echo $sale['carmake']; ?></td>
			<td><?php echo $sale['carmodel']; ?></td>
			<td><?php echo $sale['caryear']; ?></td>
			<td class="actions text-center">
				<?php echo $this->Html->link(__('View'), array('controller' => 'sales', 'action' => 'view', $sale['id'])); ?>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
