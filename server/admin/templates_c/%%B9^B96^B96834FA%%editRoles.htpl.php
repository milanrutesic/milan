<?php /* Smarty version 2.6.26, created on 2012-10-01 16:16:13
         compiled from editRoles.htpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_checkboxes', 'editRoles.htpl', 18, false),)), $this); ?>
<table width='100%' cellpadding='5' cellspacing='0' border='0'>
	<tr>
		<td width='50'>
			<a href='?action=users'><img src='images/icons/adminIcons/back.png' border='0' title='Back' alt='Back' align='absmiddle'>Back</a>
		</td>
		<td width='400'>
			<div class='<?php echo $this->_tpl_vars['messageClass']; ?>
'><?php echo $this->_tpl_vars['message']; ?>
</div>
		</td>
	</tr>
	<tr>
		<td></td>
		<td>
			Roles of <?php echo $this->_tpl_vars['nameOfUser']; ?>
<br><br>
			<form action='?action=editRoles' method='POST'>
				<input type='hidden' name='saveRoles' value='1'>
				<input type='hidden' name='userId' value='<?php echo $this->_tpl_vars['userId']; ?>
'>
				<input type='hidden' name='nameOfUser' value='<?php echo $this->_tpl_vars['nameOfUser']; ?>
'>
				<?php echo smarty_function_html_checkboxes(array('name' => 'userRoles','options' => $this->_tpl_vars['rolesAndIds'],'selected' => $this->_tpl_vars['selectedRoles'],'separator' => '<br />'), $this);?>

				<br>
				<input type='submit' style='width: 100px;' value='Save'>
			</form>
		</td>
	</tr>
</table>