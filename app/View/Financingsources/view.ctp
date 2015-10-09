<div class="financingsources view">
<h2><?php echo __('Financing Source'); ?></h2>
	

	<table class="table">
		<tr>
			<td><?php echo __('Id'); ?></td>
			<td><?php echo h($financingsource['Financingsource']['id']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Name'); ?></td>
			<td><?php echo h($financingsource['Financingsource']['name']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Created'); ?></td>
			<td><?php echo h($financingsource['Financingsource']['created']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Modified'); ?></td>
			<td><?php echo h($financingsource['Financingsource']['modified']); ?></td>
		</tr>
	</table>

</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Financing'), array('action' => 'edit', $financingsource['Financingsource']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Financing'), array('action' => 'delete', $financingsource['Financingsource']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $financingsource['Financingsource']['name']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Financing'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Financing'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Customers'); ?></h3>
	<?php if (!empty($financingsource['Customer'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th class="text-center"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($financingsource['Customer'] as $customer): ?>
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
