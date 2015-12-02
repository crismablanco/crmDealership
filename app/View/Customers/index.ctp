<?php
//debug($customers);
 ?>
<div class="customers index">
	<h2>

		<?php echo $this->Html->link(__('Add'), array('action' => 'add'), array('class'=>'btn btn-md btn-success')); ?>&nbsp;&nbsp;
		<?php echo __('Customers'); ?>
	</h2>
	<table class="table" cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('statuscustomer_id', __('Status')); ?></th>
			<th><?php echo $this->Paginator->sort('first_name'); ?></th>
			<th><?php echo $this->Paginator->sort('last_name'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('phone'); ?></th>
			<th class="text-center"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($customers as $customer): ?>
		<?php
      //va a mostrar los clientes propios del dealership a que pertenezca el usuario logueado.
      // Si el user es ADMIN, muestra todos los clientes sin importar a qué usuario estén asociados. Tampoco importa el dealership
			if ((($current_user['role']!='admin') && ($customer['User']['dealership_id']==$current_user['dealership_id'])) || ($current_user['role']=='admin')) {
		 ?>
	<tr>
		<td><?php echo h($customer['Customer']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($customer['Statuscustomer']['name'], array('controller' => 'statuscustomers', 'action' => 'view', $customer['Statuscustomer']['id'])); ?>
		</td>
		<td><?php echo h($customer['Customer']['first_name']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['last_name']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['email']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['phone']); ?>&nbsp;</td>
		<td class="text-center">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $customer['Customer']['id']), array('class'=>'btn btn-xs btn-success')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $customer['Customer']['id']), array('class'=>'btn btn-xs btn-primary')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $customer['Customer']['id']), array('class'=>'btn btn-xs btn-danger'), __('Are you sure you want to delete # %s?', $customer['Customer']['id'])); ?>
		</td>
	</tr>
	<?php } ?>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
