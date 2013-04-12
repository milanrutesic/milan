<?php /* Smarty version 2.6.26, created on 2012-10-01 16:05:35
         compiled from translateDB.htpl */ ?>
<?php $_from = $this->_tpl_vars['messages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['message']):
?>
	<?php echo $this->_tpl_vars['message']; ?>
 <br>
<?php endforeach; endif; unset($_from); ?>