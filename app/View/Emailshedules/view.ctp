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