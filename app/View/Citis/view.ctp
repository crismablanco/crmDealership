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