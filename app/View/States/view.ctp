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

</div>
