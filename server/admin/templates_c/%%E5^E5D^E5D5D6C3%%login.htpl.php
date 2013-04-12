<?php /* Smarty version 2.6.26, created on 2012-10-01 07:50:18
         compiled from login.htpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="css/admin.css" />
<script type="text/javascript" src="../library/jQuery/jquery-ui-1.7.2.custom/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="../library/jQuery/jquery.validate.pack.js"></script>
<script type="text/javascript" src="../library/js/adminLoginFormValidation.js"></script>
<title>Administration Area</title>
</head>
<body>
	<table width='100%' height='500' cellpading='0' cellspacing='0' border='0'>
		<tr>
			<td width='100%' valign='middle' align='center'>
				<form action='index.php' method='POST' id="loginForm">
					<input type='hidden' name='action' value='login'>
					<div class='loginFormContainer'>
						<table width='400' cellpadding='5' cellspacing='0' border='0'>
							<tr>
								<td valign='middle' align='center'>&nbsp;</td>
								<td valign='middle' align='center' class='loginErrorServerMessage'><?php echo $this->_tpl_vars['message']; ?>
</td>
							</tr>
							<tr>
								<td valign='middle' align='right' class='label'>Email</td>
								<td valign='middle' align='left'><input type='text' name='email' value='<?php echo $this->_tpl_vars['email']; ?>
' class="required"></td>
							</tr>
							<tr>
								<td valign='middle' align='right' class='label'>Password</td>
								<td valign='middle' align='left'><input type='password' name='password' value='' class="required"></td>
							</tr>
							<tr>
								<td valign='middle' align='right'>&nbsp;</td>
								<td valign='middle' align='right'><input class='submit' type='submit' value='Login'></td>
							</tr>
						</table>
					</div>
				</form>
			</td>
		</tr>
	</table>
</body>
</html>