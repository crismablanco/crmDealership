<div class="states view">
<h2><?php echo __('State'); ?></h2>


	<table class="table">
		<tr>
			<td><?php echo __('Id'); ?></td>
			<td><?php echo h($state['State']['id']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Name'); ?></td>
			<td><?php echo h($state['State']['name']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Short Name'); ?></td>
			<td><?php echo h($state['State']['shortname']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Country'); ?></td>
			<td><?php echo $this->Html->link($state['Countri']['name'], array('controller' => 'countris', 'action' => 'view', $state['Countri']['id'])); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Created'); ?></td>
			<td><?php echo h($state['State']['created']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Modified'); ?></td>
			<td><?php echo h($state['State']['modified']); ?></td>
		</tr>
	</table>


</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit State'), array('action' => 'edit', $state['State']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete State'), array('action' => 'delete', $state['State']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $state['State']['name']))); ?> </li>
		<li><?php echo $this->Html->link(__('List States'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New State'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countris', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countris', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cities'), array('controller' => 'citis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New City'), array('controller' => 'citis', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Cities'); ?></h3>
	<?php if (!empty($state['Citi'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('State Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Zip'); ?></th>
		<th><?php echo __('Longitud'); ?></th>
		<th><?php echo __('Latitud'); ?></th>
		<th class="actions text-center"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($state['Citi'] as $citi): ?>
		<tr>
			<td><?php echo $citi['id']; ?></td>
			<td><?php echo $citi['state_id']; ?></td>
			<td><?php echo $citi['name']; ?></td>
			<td><?php echo $citi['zip']; ?></td>
			<td><?php echo $citi['longitud']; ?></td>
			<td><?php echo $citi['latitud']; ?></td>
			<td class="actions text-center">
				<?php echo $this->Html->link(__('View'), array('controller' => 'citis', 'action' => 'view', $citi['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New City'), array('controller' => 'citis', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
