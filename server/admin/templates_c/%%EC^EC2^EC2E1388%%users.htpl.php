<?php /* Smarty version 2.6.26, created on 2012-10-01 07:55:20
         compiled from users.htpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'users.htpl', 9, false),)), $this); ?>
<table width='100%' cellpadding='5' cellspacing='0'>
	<tr>
		<td>#</td>
		<td>Name</td>
		<td>Email</td>
		<td><a href='?action=addNewUser'><img src='images/icons/adminIcons/add.png' border='0' align='absmiddle'>Add New User</a></td>
	</tr>
<?php unset($this->_sections['listOfUsers']);
$this->_sections['listOfUsers']['name'] = 'listOfUsers';
$this->_sections['listOfUsers']['loop'] = is_array($_loop=$this->_tpl_vars['users']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['listOfUsers']['show'] = true;
$this->_sections['listOfUsers']['max'] = $this->_sections['listOfUsers']['loop'];
$this->_sections['listOfUsers']['step'] = 1;
$this->_sections['listOfUsers']['start'] = $this->_sections['listOfUsers']['step'] > 0 ? 0 : $this->_sections['listOfUsers']['loop']-1;
if ($this->_sections['listOfUsers']['show']) {
    $this->_sections['listOfUsers']['total'] = $this->_sections['listOfUsers']['loop'];
    if ($this->_sections['listOfUsers']['total'] == 0)
        $this->_sections['listOfUsers']['show'] = false;
} else
    $this->_sections['listOfUsers']['total'] = 0;
if ($this->_sections['listOfUsers']['show']):

            for ($this->_sections['listOfUsers']['index'] = $this->_sections['listOfUsers']['start'], $this->_sections['listOfUsers']['iteration'] = 1;
                 $this->_sections['listOfUsers']['iteration'] <= $this->_sections['listOfUsers']['total'];
                 $this->_sections['listOfUsers']['index'] += $this->_sections['listOfUsers']['step'], $this->_sections['listOfUsers']['iteration']++):
$this->_sections['listOfUsers']['rownum'] = $this->_sections['listOfUsers']['iteration'];
$this->_sections['listOfUsers']['index_prev'] = $this->_sections['listOfUsers']['index'] - $this->_sections['listOfUsers']['step'];
$this->_sections['listOfUsers']['index_next'] = $this->_sections['listOfUsers']['index'] + $this->_sections['listOfUsers']['step'];
$this->_sections['listOfUsers']['first']      = ($this->_sections['listOfUsers']['iteration'] == 1);
$this->_sections['listOfUsers']['last']       = ($this->_sections['listOfUsers']['iteration'] == $this->_sections['listOfUsers']['total']);
?>
	<tr bgcolor="<?php echo smarty_function_cycle(array('values' => "#ccc,#eee"), $this);?>
">
		<td valign='top'><?php echo $this->_tpl_vars['users'][$this->_sections['listOfUsers']['index']]['user_id']; ?>
</td>
		<td valign='top'><?php echo $this->_tpl_vars['users'][$this->_sections['listOfUsers']['index']]['name']; ?>
</td>
		<td valign='top'><?php echo $this->_tpl_vars['users'][$this->_sections['listOfUsers']['index']]['username']; ?>
</td>
		<td>
			<a href='?action=editRoles&userId=<?php echo $this->_tpl_vars['users'][$this->_sections['listOfUsers']['index']]['user_id']; ?>
&nameOfUser=<?php echo $this->_tpl_vars['users'][$this->_sections['listOfUsers']['index']]['name']; ?>
'><img src='images/icons/adminIcons/roles.png' border='0' title='User Roles' alt='User Roles' align='absmiddle'></a>
			<a href='?action=editUser&userId=<?php echo $this->_tpl_vars['users'][$this->_sections['listOfUsers']['index']]['user_id']; ?>
'><img src='images/icons/adminIcons/edit.png' border='0' title='Edit User' alt='Edit User' align='absmiddle'></a>
			<a href='?action=deleteUser&userId=<?php echo $this->_tpl_vars['users'][$this->_sections['listOfUsers']['index']]['user_id']; ?>
&userEmail=<?php echo $this->_tpl_vars['users'][$this->_sections['listOfUsers']['index']]['username']; ?>
'><img src='images/icons/adminIcons/remove.png' border='0' title='Remove User' alt='Remove User' align='absmiddle'></a>
		</td>
	</tr>
<?php endfor; endif; ?>
</table>