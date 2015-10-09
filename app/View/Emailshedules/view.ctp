<div class="emailshedules view">
<h2><?php echo __('Emailshedule'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($emailshedule['Emailshedule']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($emailshedule['Emailshedule']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Emailfrom'); ?></dt>
		<dd>
			<?php echo h($emailshedule['Emailshedule']['emailfrom']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Emailto'); ?></dt>
		<dd>
			<?php echo h($emailshedule['Emailshedule']['emailto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Emailcco'); ?></dt>
		<dd>
			<?php echo h($emailshedule['Emailshedule']['emailcco']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Emailtemplate'); ?></dt>
		<dd>
			<?php echo $this->Html->link($emailshedule['Emailtemplate']['id'], array('controller' => 'emailtemplates', 'action' => 'view', $emailshedule['Emailtemplate']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo h($emailshedule['Emailshedule']['state']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($emailshedule['Emailshedule']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($emailshedule['Emailshedule']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Emailshedule'), array('action' => 'edit', $emailshedule['Emailshedule']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Emailshedule'), array('action' => 'delete', $emailshedule['Emailshedule']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $emailshedule['Emailshedule']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Emailshedules'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Emailshedule'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Emailtemplates'), array('controller' => 'emailtemplates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Emailtemplate'), array('controller' => 'emailtemplates', 'action' => 'add')); ?> </li>
	</ul>
</div>
