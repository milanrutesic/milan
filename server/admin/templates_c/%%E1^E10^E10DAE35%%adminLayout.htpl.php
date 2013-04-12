<?php /* Smarty version 2.6.26, created on 2012-10-01 07:50:26
         compiled from adminLayout.htpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="css/admin.css" />
<script>
<?php if ('' != $this->_tpl_vars['menuIndex']): ?>
	<?php echo '
	var menuIndex = '; ?>
<?php echo $this->_tpl_vars['menuIndex']; ?>
<?php echo '; 
	'; ?>

<?php else: ?>
	<?php echo '
	var menuIndex = 0; 
	'; ?>

<?php endif; ?>
</script>
<script type="text/javascript" src="../library/jQuery/jquery-ui-1.7.2.custom/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="../library/js/adminAccordionMenu.js"></script>
<title>Administration Area</title>
</head>
<body>
	<table height='750' width='100%' cellpadding='1' cellspacing='10' border='0'>
		<tr>
			<td valign='top'  class='mainTableData'>
				<?php echo $this->_tpl_vars['menuContent']; ?>

			</td>
			<td valign='top' width='100%'  class='mainTableData'>
				<?php if ('' != $this->_tpl_vars['templatePage'] && '' == $this->_tpl_vars['phpExecute']): ?>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['templatePage']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				<?php else: ?>
					<iframe src='<?php echo $this->_tpl_vars['phpExecute']; ?>
' style="overflow-y: auto;overflow-x: hidden; border-width: 0px; border-style: none; padding: 0px; margin: 0px;" width="100%" height="100%" frameborder="0"></iframe>					
				<?php endif; ?>
			</td>
		</tr>
	</table>
</body>
</html>