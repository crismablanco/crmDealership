<div class="leadsources index">
	<h2><?php echo $this->Html->link(__('Add'), array('action' => 'add'), array('class'=>'btn btn-md btn-success')); ?>&nbsp;&nbsp;<?php echo __('Lead Sources'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th class="text-center"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($leadsources as $leadsource): ?>
	<tr>
		<td><?php echo h($leadsource['Leadsource']['id']); ?>&nbsp;</td>
		<td><?php echo h($leadsource['Leadsource']['name']); ?>&nbsp;</td>
		<td class="text-center">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $leadsource['Leadsource']['id']), array('class'=>'btn btn-xs btn-success')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $leadsource['Leadsource']['id']), array('class'=>'btn btn-xs btn-primary')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $leadsource['Leadsource']['id']), array('class'=>'btn btn-xs btn-danger'), __('Are you sure you want to delete # %s?', $leadsource['Leadsource']['name'])); ?>
		</td>
	</tr>
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