<div class="customers view">
<h2><?php echo __('Customer'); ?></h2>

	<table class="table">
		<tr>
			<td><?php echo __('Id'); ?></td>
			<td><?php echo h($customer['Customer']['id']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('First Name'); ?></td>
			<td><?php echo h($customer['Customer']['first_name']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Last Name'); ?></td>
			<td><?php echo h($customer['Customer']['last_name']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Status'); ?></td>
			<td><?php echo $this->Html->link($customer['Statuscustomer']['name'], array('controller' => 'statuscustomers', 'action' => 'view', $customer['Statuscustomer']['id'])); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Lead Source'); ?></td>
			<td><?php echo $this->Html->link($customer['Leadsource']['name'], array('controller' => 'leadsources', 'action' => 'view', $customer['Leadsource']['id'])); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Financing Source'); ?></td>
			<td><?php echo $this->Html->link($customer['Financingsource']['name'], array('controller' => 'financingsources', 'action' => 'view', $customer['Financingsource']['id'])); ?></td>
		</tr>
		<tr>
			<td><?php echo __('User'); ?></td>
			<td><?php echo $this->Html->link($customer['User']['id'], array('controller' => 'users', 'action' => 'view', $customer['User']['id'])); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Email'); ?></td>
			<td><?php echo h($customer['Customer']['email']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Address'); ?></td>
			<td><?php echo h($customer['Customer']['address']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('City'); ?></td>
			<td><?php echo $this->Html->link($customer['Citi']['name'], array('controller' => 'citis', 'action' => 'view', $customer['Citi']['id'])); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Phone'); ?></td>
			<td><?php echo h($customer['Customer']['phone']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Birth'); ?></td>
			<td><?php echo h($customer['Customer']['birth']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Notes'); ?></td>
			<td><?php echo h($customer['Customer']['notes']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Date Sold'); ?></td>
			<td><?php echo h($customer['Customer']['datesold']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Car Desired Make'); ?></td>
			<td><?php echo h($customer['Customer']['cardesiredmake']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Car Desired Model'); ?></td>
			<td><?php echo h($customer['Customer']['cardesiredmodel']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Car Desired Year'); ?></td>
			<td><?php echo h($customer['Customer']['cardesiredyear']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Created'); ?></td>
			<td><?php echo h($customer['Customer']['created']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Modified'); ?></td>
			<td><?php echo h($customer['Customer']['modified']); ?></td>
		</tr>
	</table>

</div>