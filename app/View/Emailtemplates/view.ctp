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