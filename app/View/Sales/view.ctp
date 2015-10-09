<div class="sales view">
<h2><?php echo __('Sale'); ?></h2>



	<table class="table">
		<tr>
			<td><?php echo __('Id'); ?></td>
			<td><?php echo h($sale['Sale']['id']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Customer'); ?></td>
			<td><?php echo $this->Html->link($sale['Customer']['name'], array('controller' => 'customers', 'action' => 'view', $sale['Customer']['id'])); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Sale date'); ?></td>
			<td><?php echo h($sale['Sale']['saledate']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('User'); ?></td>
			<td><?php echo $this->Html->link($sale['User']['username'], array('controller' => 'users', 'action' => 'view', $sale['User']['id'])); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Car make'); ?></td>
			<td><?php echo h($sale['Sale']['carmake']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Car model'); ?></td>
			<td><?php echo h($sale['Sale']['carmodel']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Car year'); ?></td>
			<td><?php echo h($sale['Sale']['caryear']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Created'); ?></td>
			<td><?php echo h($sale['Sale']['created']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Modified'); ?></td>
			<td><?php echo h($sale['Sale']['modified']); ?></td>
		</tr>
	</table>

</div>