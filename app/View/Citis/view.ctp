<div class="citis view">
<h2><?php echo __('City'); ?></h2>
	<table class="table">
		<tr>
			<td><?php echo __('Id'); ?></td>
			<td><?php echo h($citi['Citi']['id']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('State'); ?></td>
			<td><?php echo $this->Html->link($citi['State']['name'], array('controller' => 'states', 'action' => 'view', $citi['State']['id'])); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Name'); ?></td>
			<td><?php echo h($citi['Citi']['name']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Zip'); ?></td>
			<td><?php echo h($citi['Citi']['zip']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Longitud'); ?></td>
			<td><?php echo h($citi['Citi']['longitud']); ?></td>

		</tr>
		<tr>
			<td><?php echo __('Latitud'); ?></td>
			<td><?php echo h($citi['Citi']['latitud']); ?></td>
		</tr>
	</table>

</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit City'), array('action' => 'edit', $citi['Citi']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete City'), array('action' => 'delete', $citi['Citi']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $citi['Citi']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Cities'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New City'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
	</ul>
</div>
