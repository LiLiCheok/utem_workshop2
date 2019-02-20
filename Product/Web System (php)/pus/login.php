<?php include 'index-nadia.php'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Page</title>
</head>

<body>

<p align="center">Login Page</p>
<form name="login form" method="POST" action="login_connection.php" >
<div align="center">
  <table width="70%" height="111" border="0">
    <tr>
      <td width="46%"><div align="center">Teacher ID:</div></td>
      <td width="54%"><label for="HT_Id"></label>
        <div align="left">
          <input type="text" name="HT_Id" id="HT_Id" required placeholder="Enter Teacher ID" />
      </div></td>
    </tr>
    <tr>
      <td><div align="center">Password:</div></td>
      <td><label for="HT_Password"></label>
        <div align="left">
          <input type="password" name="HT_Password" id="HT_Password" required placeholder="Enter Password" />
      </div></td>
    </tr>
  </table>
  <p>
    <input type="submit" name="Login" id="Login" value="Login" />
    </form>
  </p>
<p align="center">&nbsp;</p>
