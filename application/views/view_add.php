<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/main.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add student here</title>
</head>

<body>
<form action="<?php echo base_url(); ?>index.php/student/add" method="post" enctype="multipart/form-data" name="form1" id="form1"> 
  <table class="myclass" style="border:1px solid #a9c6c9" width="600" border="0" align="center">
    <tr>
      <td>&nbsp;</td>
      <td colspan="3">Add student here</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>First Name</td>
      <td>&nbsp;</td>
      <td><input type="text" name="txtFname" id="txtFname" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Last Name</td>
      <td>&nbsp;</td>
      <td><input type="text" name="txtLname" id="txtLname" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Course</td>
      <td>&nbsp;</td>
      <td>
      <?php //print_r($courses);?>
      <select name="cmbCourse" id="cmbCourse">
      <?php foreach($courses as $course){?>
      <option value="<?php echo  $course['course_id'];?>"><?php echo  $course['coursename'];?></option>
      <?php }?>
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Address</td>
      <td>&nbsp;</td>
      <td><input type="text" name="txtAddress" id="txtAddress" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Photo</td>
      <td>&nbsp;</td>
      <td><input type="file" name="fileImage" id="fileImage" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="button" id="button" value="Submit" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="3"><?php if($this->session->flashdata('msg')){ echo $this->session->flashdata('msg');} ?></td>
    </tr>
  </table>
</form>
</body>
</html>