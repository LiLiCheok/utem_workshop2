<?php include 'index-nadia.php'; ?>
<?php 
session_start();
//echo $_SESSION["HT_Id"];
//print_r($_SESSION);
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Record Management</title>
</head>

<body>
<p align="center">Student Information</p>
<form action="recordconnection.php" method="post">
<div align="center"></div>
<table width="101%" height="252" border="0">
<tr>
  <td><div align="justify">
    <table width="101%" height="252" border="0">
      <tr>
        <td><table width="101%" height="252" border="0">
          <tr>
            <td><table width="101%" height="252" border="0">
              <tr>
                <td width="66%"><div align="center">
                  <table width="80%" height="252" border="0">
                    <tr>
                      <td width="50%"><div align="center">Student Name:</div></td>
                      <td width="50%"><label for="Student_Name"></label>
                        <div align="left">
                          <input type="text" name="Student_Name" id="Student_Name" required placeholder="Enter Student Name" />
                          </div></td>
                    </tr>
                    <tr>
                      <td><div align="center">IC No:</div></td>
                      <td><label for="Student_Ic_No"></label>
                        <div align="left">
                          <input type="text" name="Student_Ic_No" id="Student_Ic_No" required placeholder="Enter Student's IC Number" />
                        </div></td>
                      </tr>
                    <tr>
                      <td><div align="center">Parent's Name:</div></td>
                      <td><label for="parentName"></label>
                        <div align="left">
                          <input type="text" name="parent_name" id="parent_name" required placeholder="Enter Parent's Name" />
                        </div></td>
                      </tr>
                    <tr>
                      <td><div align="center">Parent's IC No. :</div></td>
                      <td><label for="parentNo"></label>
                        <div align="left">
                          <label for="parent_id"></label>
                          <input type="text" name="parent_id" id="parent_id" required placeholder="Enter Parent's IC No" />
                        </div></td>
                      </tr>
                    <tr>
                      <td><div align="center">Parent's Contact No.:</div></td>
                      <td><label for="schooltype"></label>
                        <div align="left">
                          <input type="text" name="parent_contactNo" id="parent_contactNo" required="required" placeholder="Enter Parent's Phone No" />
                        </div></td>
                      </tr>
                    <tr>
                      <td><div align="center">Class:</div></td>
                      <td><div align="left">
                        <input type="text" name="Student_Class" id="Student_Class" required="required" placeholder="Enter Student's Class" />
                        </div></td>
                    </tr>
                    <tr>
                      <td><div align="center"></div></td>
                      <td><div align="left"></div></td>
                    </tr>
                    </table>
                  </div></td>
                </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
    </table>
  </div></td>
</tr>
</table>
<p align="center">
  <input type="submit" name="save" id="save" value="SAVE" />
  </form>
</p>
</body>
</html>