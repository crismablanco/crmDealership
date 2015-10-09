<div class="dealerships view">
<h2><?php echo __('Dealership'); ?></h2>
	
	<table class="table">
		<tr>
			<td><?php echo __('Id'); ?></td>
			<td><?php echo h($dealership['Dealership']['id']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Name'); ?></td>
			<td><?php echo h($dealership['Dealership']['name']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Email'); ?></td>
			<td><?php echo h($dealership['Dealership']['email']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Website'); ?></td>
			<td><?php echo h($dealership['Dealership']['website']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Address'); ?></td>
			<td><?php echo h($dealership['Dealership']['address']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('City'); ?></td>
			<td><?php echo $this->Html->link($dealership['Citi']['name'], array('controller' => 'citis', 'action' => 'view', $dealership['Citi']['id'])); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Phone'); ?></td>
			<td><?php echo h($dealership['Dealership']['phone']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Fax'); ?></td>
			<td><?php echo h($dealership['Dealership']['fax']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Notes'); ?></td>
			<td><?php echo h($dealership['Dealership']['notes']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Created'); ?></td>
			<td><?php echo h($dealership['Dealership']['created']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Modified'); ?></td>
			<td><?php echo h($dealership['Dealership']['modified']); ?></td>
		</tr>
	</table>

</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Dealership'), array('action' => 'edit', $dealership['Dealership']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Dealership'), array('action' => 'delete', $dealership['Dealership']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $dealership['Dealership']['name']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Dealerships'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dealership'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add',$dealership['Dealership']['id'])); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($dealership['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Role'); ?></th>
		<th class="text-center"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($dealership['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><?php echo $user['role']; ?></td>
			<td class="text-center">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
