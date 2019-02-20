<?php include 'index-nadia.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Disciplinary Record</title>
</head>
<form action="disciplineconnection.php" method="post">
<body>
<p align="center">Disciplinary Record</p>
<p>&nbsp;</p>
<table width="101%" border="0">
  <tr>
    <td width="50%"><div align="right">Student ID:</div></td>
    <td width="50%"><label for="ID"></label>
      <div align="left">
        <input type="text" name="Student_Id" id="Student_Id" required placeholder="Enter Student ID" />
    </div></td>
  </tr>
  <tr>
    <td><div align="right">Discipline Type:</div></td>
    <td><div align="left">
     <select name="dr_type" id="dr_type">
          <option>Light</option>
          <option>Moderate</option>
          <option>Heavy</option>
        </select></div></td>
  </tr>
  <tr>
    <td><div align="right">Description:</div></td>
    <td><label for="select"></label>
      <div align="left">
        <label for="dr_description"></label>
        <label for="dr_description"></label>
        <input type="text" name="dr_description" id="dr_description" />
      </div></td>
  </tr>
</table>
<table width="101%" border="0">
  <tr>
    <td><div align="center">
      <input type="submit" name="button" id="button" value="ENTER" /> </div></td></tr></table>
      </body></form>
      <p>&nbsp;</p>

</body>
</html>