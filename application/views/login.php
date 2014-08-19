<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login to Admin Panel</title>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/main.css">
</head>

<body>
<form id="form1" name="form1" method="post" action="<?php echo base_url(); ?>index.php/auth/login">
  <table width="355" border="0" align="center" cellpadding="0" cellspacing="0" class="myclass" style="border:1px solid #a9c6c9">
    <tr>
      <td colspan="3">Please Login</td>
    </tr>
    <tr>
      <td width="60">&nbsp;</td>
      <td>&nbsp;</td>
      <td width="144">&nbsp;</td>
    </tr>
    <tr>
      <td>User name</td>
      <td width="1">&nbsp;</td>
      <td><input placeholder="user name" type="text" name="txtUsername" id="txtUsername" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td>&nbsp;</td>
      <td><input placeholder="password" type="password" name="txtPassword" id="txtPassword" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" align="center">
	  <?php if($this->session->flashdata('msg')){ echo $this->session->flashdata('msg');} ?></td>
    </tr>
  </table>
</form>
</body>
</html>