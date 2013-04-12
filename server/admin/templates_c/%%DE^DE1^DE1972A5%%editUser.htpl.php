<?php /* Smarty version 2.6.26, created on 2012-10-01 16:16:24
         compiled from editUser.htpl */ ?>
<script type="text/javascript" src="../library/jQuery/jquery.validate.pack.js"></script>
<script type="text/javascript" src="../library/js/adminEditUserValidation.js"></script>

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
</table>
<form action='?action=editUser' method='POST' id='editUserForm'>
	<input type='hidden' name='editUser' value='1'>
	<input type='hidden' name='userId' value='<?php echo $this->_tpl_vars['userId']; ?>
'>
	<table cellpadding='10' cellspacing='0'>
		<tr>
			<td align='right'>Name</td>
			<td><input type='text' name='name' class='required' value='<?php echo $this->_tpl_vars['name']; ?>
'></td>
		</tr>
		<tr>
			<td align='right'>Email</td>
			<td><input type='text' name='email'  value='<?php echo $this->_tpl_vars['email']; ?>
' disabled></td>
		</tr>
		<tr>
			<td align='right'>New Password</td>
			<td><input type='password' id='password' name='password'></td>
		</tr>
		<tr>
			<td align='right'>Confirm New Password</td>
			<td><input type='password' name='confirmPassword' equalto="#password"></td>
		</tr>
		<tr>
			<td></td>
			<td align='left'><input style='width: 100px;' type='submit' value='Save'></td>
		</tr>
	</table>
</form>