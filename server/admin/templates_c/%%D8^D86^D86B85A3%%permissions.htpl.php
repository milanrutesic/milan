<?php /* Smarty version 2.6.26, created on 2012-03-05 21:42:36
         compiled from permissions.htpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'permissions.htpl', 6, false),array('function', 'html_checkboxes', 'permissions.htpl', 10, false),)), $this); ?>
<div class='<?php echo $this->_tpl_vars['messageClass']; ?>
' style='<?php echo $this->_tpl_vars['style']; ?>
'><?php echo $this->_tpl_vars['message']; ?>
</div>
<form action='?action=permissions' method='POST'>
	<input type='hidden' name='savePermissions' value='1'>
	<table width='100%' cellpadding='10' cellspacing='1'>
		<?php unset($this->_sections['listOfRoles']);
$this->_sections['listOfRoles']['name'] = 'listOfRoles';
$this->_sections['listOfRoles']['loop'] = is_array($_loop=$this->_tpl_vars['roles']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['listOfRoles']['show'] = true;
$this->_sections['listOfRoles']['max'] = $this->_sections['listOfRoles']['loop'];
$this->_sections['listOfRoles']['step'] = 1;
$this->_sections['listOfRoles']['start'] = $this->_sections['listOfRoles']['step'] > 0 ? 0 : $this->_sections['listOfRoles']['loop']-1;
if ($this->_sections['listOfRoles']['show']) {
    $this->_sections['listOfRoles']['total'] = $this->_sections['listOfRoles']['loop'];
    if ($this->_sections['listOfRoles']['total'] == 0)
        $this->_sections['listOfRoles']['show'] = false;
} else
    $this->_sections['listOfRoles']['total'] = 0;
if ($this->_sections['listOfRoles']['show']):

            for ($this->_sections['listOfRoles']['index'] = $this->_sections['listOfRoles']['start'], $this->_sections['listOfRoles']['iteration'] = 1;
                 $this->_sections['listOfRoles']['iteration'] <= $this->_sections['listOfRoles']['total'];
                 $this->_sections['listOfRoles']['index'] += $this->_sections['listOfRoles']['step'], $this->_sections['listOfRoles']['iteration']++):
$this->_sections['listOfRoles']['rownum'] = $this->_sections['listOfRoles']['iteration'];
$this->_sections['listOfRoles']['index_prev'] = $this->_sections['listOfRoles']['index'] - $this->_sections['listOfRoles']['step'];
$this->_sections['listOfRoles']['index_next'] = $this->_sections['listOfRoles']['index'] + $this->_sections['listOfRoles']['step'];
$this->_sections['listOfRoles']['first']      = ($this->_sections['listOfRoles']['iteration'] == 1);
$this->_sections['listOfRoles']['last']       = ($this->_sections['listOfRoles']['iteration'] == $this->_sections['listOfRoles']['total']);
?>
			<tr bgcolor="<?php echo smarty_function_cycle(array('values' => "#ccc,#eee"), $this);?>
">
				<td valign='top'>
					<u><?php echo $this->_tpl_vars['roles'][$this->_sections['listOfRoles']['index']]['name']; ?>
</u><br>
					<?php $this->assign('arrayKey', $this->_tpl_vars['roles'][$this->_sections['listOfRoles']['index']]['id']); ?>
					<?php echo smarty_function_html_checkboxes(array('name' => "resources[".($this->_tpl_vars['arrayKey'])."]",'options' => $this->_tpl_vars['checkboxes'][$this->_tpl_vars['arrayKey']],'selected' => $this->_tpl_vars['selected'][$this->_tpl_vars['arrayKey']],'separator' => '<br />'), $this);?>

				</td>
			</tr>
		<?php endfor; endif; ?>
		<tr>
			<td><input type='submit' style='width: 100px;' value='Save'></td>
		</tr>
	</table>
</form>		