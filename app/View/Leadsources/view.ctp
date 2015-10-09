<div class="leadsources view">
<h2><?php echo __('Leadsource'); ?></h2>

	<table class="table">
		<tr>
			<td><?php echo __('Id'); ?></td>
			<td><?php echo h($leadsource['Leadsource']['id']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Name'); ?></td>
			<td><?php echo h($leadsource['Leadsource']['name']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Created'); ?></td>
			<td><?php echo h($leadsource['Leadsource']['created']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Modified'); ?></td>
			<td><?php echo h($leadsource['Leadsource']['modified']); ?></td>
		</tr>
	</table>


</div>

<div class="related">
	<h3><?php echo __('Related Customers'); ?></h3>
	<?php if (!empty($leadsource['Customer'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th class="text-center"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($leadsource['Customer'] as $customer): ?>
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

	
</div>
