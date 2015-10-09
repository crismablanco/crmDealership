<div class="emailtemplates view">
<h2><?php echo __('Email Template'); ?></h2>


	<table class="table">
		<tr>
			<td><?php echo __('Id'); ?></td>
			<td><?php echo h($emailtemplate['Emailtemplate']['id']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Name'); ?></td>
			<td><?php echo h($emailtemplate['Emailtemplate']['name']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Body'); ?></td>
			<td><?php echo h($emailtemplate['Emailtemplate']['body']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Created'); ?></td>
			<td><?php echo h($emailtemplate['Emailtemplate']['created']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Modified'); ?></td>
			<td><?php echo h($emailtemplate['Emailtemplate']['modified']); ?></td>
		</tr>
	</table>

</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Template'), array('action' => 'edit', $emailtemplate['Emailtemplate']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Template'), array('action' => 'delete', $emailtemplate['Emailtemplate']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $emailtemplate['Emailtemplate']['name']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Templates'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Template'), array('action' => 'add')); ?> </li>
	</ul>
</div>