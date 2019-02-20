<?php include 'index-nadia.php'; ?>
<?php require_once('DatabaseConnection.php'); 
session_start();?>
<title>Academic Result</title>
</head>

<body>
<p align="center">Academic Result</p>
<form id="form1" name="form1" method="POST" action="result1.php">
<table width="102%" border="0">
  <tr>
    <td><div align="center">Student ID: 
      <label for="Student_Id"></label>
      <input type="text" name="Student_Id" id="Student_Id" required placeholder ="Enter Student ID" />
    </div></td>
  </tr>
</table>
<table width="102%" border="0">
  <tr>
    <td><div align="center">
      <input type="submit" name="button" id="button" value="ENTER" /></div></td></tr></table>
 </form>
      <?php
//$studentID = trim(mysql_escape_string($_POST['studentID']));
//$studentID = mysql_real_escape_string(trim($_POST['studentID']));
	   $Student_Id = @$_POST['Student_Id'];
	   //$Student_Id = $_SESSION['Student_Id'];
       $sql = "SELECT * FROM student WHERE Student_Id='$Student_Id' ";
		$result = mysql_query($sql)or die("Error: ".mysql_error($conn));
		error_reporting(E_ALL^E_NOTICE);
while($rowval = mysql_fetch_array($result))
//looping equipment
{
	$Student_Name= $rowval['Student_Name'];
	$Student_Ic_No= $rowval['Student_Ic_No'];
	$Student_Class= $rowval['Student_Class'];
	//$School_Name= $rowval['School_Name'];
	
}
//$studentID = $_POST['studentID'];
		
?>
    </div></td>
  </tr>
</table>
  <table width="100%" border="0">
    <tr>
      <td width="25%"><div align="center">Student Name:</div></td>
      <td width="25%"><label for="Student_Name"></label>
      <input type="text" name="Student_Name" id="Student_Name"  value='<?php echo  $Student_Name; ?>'/>      
      <td width="25%">&nbsp;</td>
      <td width="25%">&nbsp;</td>
    </tr>
   
    <tr>
      <td><div align="center">IC No:</div></td>
      <td><label for="Student_IcNo"></label>
      <input type="text" name="Student_Ic_No" id="Student_Ic_No" value='<?php echo  $Student_Ic_No; ?>'/></td>
      <td><div align="center"></div></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="center">Class:</div></td>
      <td><label for="Student_Class"></label>
      <input type="text" name="Student_Class" id="Student_Class" value='<?php echo  $Student_Class; ?>'/></td>
      <td><div align="center"></div></td>
      <td>&nbsp;</td>
    </tr>
</table></td></td></td></td></td></td></td></td></td></td></td></td></td></form>

<p>

  </tr>
</table>

  <?php 
//$row = mysql_fetch_assoc($result);
//$test = $_GET['test'];
 // $list=mysql_query("SELECT * from exam order by Exam_Category asc");
        //while($list=mysql_fetch_assoc($list))
		
		$sqlExam = "SELECT exam_Id FROM exam ORDER BY exam_Id DESC";
		$resultExam = mysql_query($sqlExam);
		$examRow = mysql_fetch_assoc($resultExam);

?>
</p>
<form id="form7" name="form7" method="POST" action="tryconn.php">
  <p>
    <input type="hidden" name="Student_Id2" value="<?php echo $Student_Id; ?>" >
    <input type="hidden" name="exam_Id" value="<?php echo $examRow["exam_Id"]; ?>"


$_post["marks"];
  >
  </p>
  <p>&nbsp; </p>
  <div align="center">
    <table width="49%" border="0">
      <tr>
        <td><script type="text/javascript">
		  

function result()
{
var Index = document.getElementById("subject").selectedIndex;
  document.getElementById("SubjectId").value = 
    document.getElementById("subject").options[Index].text;
document.getElementById("Subject").value = 
    document.getElementById("subject").options[Index].value;
}

      </script></td>
        <td></td>
        &nbsp; </tr>
      <tr>
        <td><div align="center">Subject:</div></td>
        <td><div align="center">Marks: </div>
        <td><div align="center">Grade:</div></td>
      </tr>
      <tr>
        <td><div align="center">
          <script type="text/javascript">
		  

function result()
{
var Index = document.getElementById("subject").selectedIndex;
  document.getElementById("SubjectId").value = 
    document.getElementById("subject").options[Index].text;
document.getElementById("Subject").value = 
    document.getElementById("subject").options[Index].value;
}

        </script>
          <?php
$sql = "SELECT subject_name,subject_id FROM subject ";
$result = mysql_query($sql) or die(mysql_error());
echo '<select name="Subject" id ="subject">';
while($row = mysql_fetch_array($result))
{
echo "<option value='".$row["subject_name"]."'>".$row["subject_id"]."</option>";
}
//mysql_free_result($result);
echo '</select >';
?>
          <input type="button" value="Select" onClick="result()"/>
          <input name='SubjectId' type="hidden" id="SubjectId" size="10" maxlength="10"/>
          :
          <input id="Subject" name='Subject' type="text"/>
          &nbsp;</div></td>
        <td><label for="marks16"></label>
          <div align="center">
            <input name="marks" type="text" id="marks" size="3" maxlength="3">
          </div></td>
        <td><label for="grade12"></label>
          <div align="center">
            <select name="grade" id="grade12">
              <option>-</option>
              <option>A</option>
              <option>B</option>
              <option>C</option>
              <option>D</option>
              <option>E</option>
            </select>
          </div></td>
      </tr>
      <tr>
        <td width="52%"><div align="center">
          <script type="text/javascript">
		  

function result2()
{
var Index = document.getElementById("subject2").selectedIndex;
  document.getElementById("SubjectId2").value = 
    document.getElementById("subject2").options[Index].text;
document.getElementById("Subject2").value = 
    document.getElementById("subject2").options[Index].value;
}

        </script>
          <?php
$sql = "SELECT subject_name,subject_id FROM subject ";
$result = mysql_query($sql) or die(mysql_error());
echo '<select name="Subject2" id ="subject2">';
while($row = mysql_fetch_array($result))
{
echo "<option value='".$row["subject_name"]."'>".$row["subject_id"]."</option>";
}
//mysql_free_result($result);
echo '</select >';
?>
          <input type="button" value="Select" onClick="result2()"/>
          <input name='SubjectId2' type="hidden" id="SubjectId2" size="10" maxlength="10"/>
          :
          <input id="Subject2" name='Subject2' type="text"/>
        </div></td>
        &nbsp;
        <td width="20%"><label for="marks16"></label>
          <div align="center">
            <input name="marks2" type="text" id="marks16" size="3" maxlength="3">
          </div></td>
        <td width="28%">&nbsp;
          <label for="grade16"></label>
          <div align="center">
            <select name="grade2" id="grade16">
              <option>-</option>
              <option>A</option>
              <option>B</option>
              <option>C</option>
              <option>D</option>
              <option>E</option>
            </select>
          </div></td>
      </tr>
      <tr>
        <td><div align="center">
          <script type="text/javascript">
		  

function result3()
{
var Index = document.getElementById("subject3").selectedIndex;
  document.getElementById("SubjectId3").value = 
    document.getElementById("subject3").options[Index].text;
document.getElementById("Subject3").value = 
    document.getElementById("subject3").options[Index].value;
}

        </script>
          <?php
$sql = "SELECT subject_name,subject_id FROM subject ";
$result = mysql_query($sql) or die(mysql_error());
echo '<select name="Subject3" id ="subject3">';
while($row = mysql_fetch_array($result))
{
echo "<option value='".$row["subject_name"]."'>".$row["subject_id"]."</option>";
}
//mysql_free_result($result);
echo '</select >';
?>
          <input type="button" value="Select" onClick="result3()"/>
          <input name='SubjectId3' type="hidden" id="SubjectId3" size="10" maxlength="10"/>
          :
          <input id="Subject3" name='Subject3' type="text"/>
        </div></td>
        &nbsp;
        <td><label for="marks17"></label>
          <div align="center">
            <input name="marks3" type="text" id="marks17" size="3" maxlength="3">
          </div></td>
        <td>&nbsp;
          <label for="grade17"></label>
          <div align="center">
            <select name="grade3" id="grade17">
              <option>-</option>
              <option>A</option>
              <option>B</option>
              <option>C</option>
              <option>D</option>
              <option>E</option>
            </select>
          </div></td>
      </tr>
      <tr>
        <td><div align="center">
          <script type="text/javascript">
		  

function result4()
{
var Index = document.getElementById("subject4").selectedIndex;
  document.getElementById("SubjectId4").value = 
    document.getElementById("subject4").options[Index].text;
document.getElementById("Subject4").value = 
    document.getElementById("subject4").options[Index].value;
}

        </script>
          <?php
$sql = "SELECT subject_name,subject_id FROM subject ";
$result = mysql_query($sql) or die(mysql_error());
echo '<select name="Subject4" id ="subject4">';
while($row = mysql_fetch_array($result))
{
echo "<option value='".$row["subject_name"]."'>".$row["subject_id"]."</option>";
}
//mysql_free_result($result);
echo '</select >';
?>
          <input type="button" value="Select" onClick="result4()"/>
          <input name='SubjectId4' type="hidden" id="SubjectId4" size="10" maxlength="10"/>
          :
          <input id="Subject4" name='Subject4' type="text"/>
          &nbsp;</div></td>
        <td><label for="marks18"></label>
          <div align="center">
            <input name="marks4" type="text" id="marks18" size="3" maxlength="3">
          </div></td>
        <td>&nbsp;
          <label for="grade18"></label>
          <div align="center">
            <select name="grade4" id="grade18">
              <option>-</option>
              <option>A</option>
              <option>B</option>
              <option>C</option>
              <option>D</option>
              <option>E</option>
            </select>
          </div></td>
      </tr>
      <tr>
        <td><div align="center">
          <script type="text/javascript">
		  

function result5()
{
var Index = document.getElementById("subject5").selectedIndex;
  document.getElementById("SubjectId5").value = 
    document.getElementById("subject5").options[Index].text;
document.getElementById("Subject5").value = 
    document.getElementById("subject5").options[Index].value;
}

        </script>
          <?php
$sql = "SELECT subject_name,subject_id FROM subject ";
$result = mysql_query($sql) or die(mysql_error());
echo '<select name="Subject5" id ="subject5">';
while($row = mysql_fetch_array($result))
{
echo "<option value='".$row["subject_name"]."'>".$row["subject_id"]."</option>";
}
//mysql_free_result($result);
echo '</select >';
?>
          <input type="button" value="Select" onClick="result5()"/>
          <input name='SubjectId5' type="hidden" id="SubjectId5" size="10" maxlength="10"/>
          :
          <input id="Subject5" name='Subject5' type="text"/>
          &nbsp;</div></td>
        <td><label for="marks19"></label>
          <div align="center">
            <input name="marks5" type="text" id="marks19" size="3" maxlength="3">
          </div></td>
        <td>&nbsp;
          <label for="grade19"></label>
          <div align="center">
            <select name="grade5" id="grade19">
              <option>-</option>
              <option>A</option>
              <option>B</option>
              <option>C</option>
              <option>D</option>
              <option>E</option>
            </select>
          </div></td>
      </tr>
      <tr>
        <td><div align="center">
          <script type="text/javascript">
		  

function result6()
{
var Index = document.getElementById("subject6").selectedIndex;
  document.getElementById("SubjectId6").value = 
    document.getElementById("subject6").options[Index].text;
document.getElementById("Subject6").value = 
    document.getElementById("subject6").options[Index].value;
}

        </script>
          <?php
$sql = "SELECT subject_name,subject_id FROM subject ";
$result = mysql_query($sql) or die(mysql_error());
echo '<select name="Subject6" id ="subject6">';
while($row = mysql_fetch_array($result))
{
echo "<option value='".$row["subject_name"]."'>".$row["subject_id"]."</option>";
}
//mysql_free_result($result);
echo '</select >';
?>
          <input type="button" value="Select" onClick="result6()"/>
          <input name='SubjectId6' type="hidden" id="SubjectId6" size="10" maxlength="10"/>
          :
          <input id="Subject6" name='Subject6' type="text"/>
          &nbsp;</div></td>
        <td><label for="marks20"></label>
          <div align="center">
            <input name="marks6" type="text" id="marks20" size="3" maxlength="3">
          </div></td>
        <td>&nbsp;
          <label for="grade20"></label>
          <div align="center">
            <select name="grade6" id="grade20">
              <option>-</option>
              <option>A</option>
              <option>B</option>
              <option>C</option>
              <option>D</option>
              <option>E</option>
            </select>
          </div></td>
      </tr>
      <tr>
        <td><div align="center">
          <script type="text/javascript">
		  

function result7()
{
var Index = document.getElementById("subject7").selectedIndex;
  document.getElementById("SubjectId7").value = 
    document.getElementById("subject7").options[Index].text;
document.getElementById("Subject7").value = 
    document.getElementById("subject7").options[Index].value;
}

        </script>
          <?php
$sql = "SELECT subject_name,subject_id FROM subject ";
$result = mysql_query($sql) or die(mysql_error());
echo '<select name="Subject7" id ="subject7">';
while($row = mysql_fetch_array($result))
{
echo "<option value='".$row["subject_name"]."'>".$row["subject_id"]."</option>";
}
//mysql_free_result($result);
echo '</select >';
?>
          <input type="button" value="Select" onClick="result7()"/>
          <input name='SubjectId7' type="hidden" id="SubjectId7" size="10" maxlength="10"/>
          :
          <input id="Subject7" name='Subject7' type="text"/>
          &nbsp;</div></td>
        <td><label for="marks21"></label>
          <div align="center">
            <input name="marks7" type="text" id="marks21" size="3" maxlength="3">
          </div></td>
        <td>&nbsp;
          <label for="grade21"></label>
          <div align="center">
            <select name="grade7" id="grade21">
              <option>-</option>
              <option>A</option>
              <option>B</option>
              <option>C</option>
              <option>D</option>
              <option>E</option>
            </select>
          </div></td>
      </tr>
      <tr>
        <td><div align="center">
          <script type="text/javascript">
		  

function result8()
{
var Index = document.getElementById("subject8").selectedIndex;
  document.getElementById("SubjectId8").value = 
    document.getElementById("subject8").options[Index].text;
document.getElementById("Subject8").value = 
    document.getElementById("subject8").options[Index].value;
}

        </script>
          <?php
$sql = "SELECT subject_name,subject_id FROM subject ";
$result = mysql_query($sql) or die(mysql_error());
echo '<select name="Subject8" id ="subject8">';
while($row = mysql_fetch_array($result))
{
echo "<option value='".$row["subject_name"]."'>".$row["subject_id"]."</option>";
}
//mysql_free_result($result);
echo '</select >';
?>
          <input type="button" value="Select" onClick="result8()"/>
          <input name='SubjectId8' type="hidden" id="SubjectId8" size="10" maxlength="10"/>
          :
          <input id="Subject8" name='Subject8' type="text"/>
          &nbsp;</div></td>
        <td><label for="marks22"></label>
          <div align="center">
            <input name="marks8" type="text" id="marks22" size="3" maxlength="3">
          </div></td>
        <td>&nbsp;
          <label for="grade22"></label>
          <div align="center">
            <select name="grade8" id="grade22">
              <option>-</option>
              <option>A</option>
              <option>B</option>
              <option>C</option>
              <option>D</option>
              <option>E</option>
            </select>
          </div></td>
      </tr>
      <tr>
        <td><div align="center">
          <script type="text/javascript">
		  

function result9()
{
var Index = document.getElementById("subject9").selectedIndex;
  document.getElementById("SubjectId9").value = 
    document.getElementById("subject9").options[Index].text;
document.getElementById("Subject9").value = 
    document.getElementById("subject9").options[Index].value;
}

        </script>
          <?php
$sql = "SELECT subject_name,subject_id FROM subject ";
$result = mysql_query($sql) or die(mysql_error());
echo '<select name="Subject9" id ="subject9">';
while($row = mysql_fetch_array($result))
{
echo "<option value='".$row["subject_name"]."'>".$row["subject_id"]."</option>";
}
//mysql_free_result($result);
echo '</select >';
?>
          <input type="button" value="Select" onClick="result9()"/>
          <input name='SubjectId9' type="hidden" id="SubjectId9" size="10" maxlength="10"/>
          :
          <input id="Subject9" name='Subject9' type="text"/>
          &nbsp;</div></td>
        <td><label for="marks23"></label>
          <div align="center">
            <input name="marks9" type="text" id="marks23" size="3" maxlength="3">
          </div></td>
        <td>&nbsp;
          <label for="grade23"></label>
          <div align="center">
            <select name="grade9" id="grade23">
              <option>-</option>
              <option>A</option>
              <option>B</option>
              <option>C</option>
              <option>D</option>
              <option>E</option>
            </select>
          </div></td>
      </tr>
      <tr>
        <td><div align="center">
          <script type="text/javascript">
		  

function result10()
{
var Index = document.getElementById("subject10").selectedIndex;
  document.getElementById("SubjectId10").value = 
    document.getElementById("subject10").options[Index].text;
document.getElementById("Subject10").value = 
    document.getElementById("subject10").options[Index].value;
}

        </script>
          <?php
$sql = "SELECT subject_name,subject_id FROM subject ";
$result = mysql_query($sql) or die(mysql_error());
echo '<select name="Subject10" id ="subject10">';
while($row = mysql_fetch_array($result))
{
echo "<option value='".$row["subject_name"]."'>".$row["subject_id"]."</option>";
}
//mysql_free_result($result);
echo '</select >';
?>
          <input type="button" value="Select" onClick="result10()"/>
          <input name='SubjectId10' type="hidden" id="SubjectId10" size="10" maxlength="10"/>
          :
          <input id="Subject10" name='Subject10' type="text"/>
          &nbsp;</div></td>
        <td><label for="marks24"></label>
          <div align="center">
            <input name="marks10" type="text" id="marks24" size="3" maxlength="3">
          </div></td>
        <td>&nbsp;
          <label for="grade24"></label>
          <div align="center">
            <select name="grade10" id="grade24">
              <option>-</option>
              <option>A</option>
              <option>B</option>
              <option>C</option>
              <option>D</option>
              <option>E</option>
            </select>
          </div></td>
      </tr>
      <tr>
        <td><div align="center">
          <script type="text/javascript">
		  

function result11()
{
var Index = document.getElementById("subject11").selectedIndex;
  document.getElementById("SubjectId11").value = 
    document.getElementById("subject11").options[Index].text;
document.getElementById("Subject11").value = 
    document.getElementById("subject11").options[Index].value;
}

        </script>
          <?php
$sql = "SELECT subject_name,subject_id FROM subject ";
$result = mysql_query($sql) or die(mysql_error());
echo '<select name="Subject11" id ="subject11">';
while($row = mysql_fetch_array($result))
{
echo "<option value='".$row["subject_name"]."'>".$row["subject_id"]."</option>";
}
//mysql_free_result($result);
echo '</select >';
?>
          <input type="button" value="Select" onClick="result11()"/>
          <input name='SubjectId11' type="hidden" id="SubjectId11" size="10" maxlength="10"/>
          :
          <input id="Subject11" name='Subject11' type="text"/>
          &nbsp;</div></td>
        <td><label for="marks25"></label>
          <div align="center">
            <input name="marks11" type="text" id="marks25" size="3" maxlength="3">
          </div></td>
        <td><label for="grade25"></label>
          <div align="center">
            <select name="grade11" id="grade25">
              <option>-</option>
              <option>A</option>
              <option>B</option>
              <option>C</option>
              <option>D</option>
              <option>E</option>
            </select>
          </div></td>
      </tr>
      <tr>
        <td><div align="center">
          <script type="text/javascript">
		  

function result12()
{
var Index = document.getElementById("subject12").selectedIndex;
  document.getElementById("SubjectId12").value = 
    document.getElementById("subject12").options[Index].text;
document.getElementById("Subject12").value = 
    document.getElementById("subject12").options[Index].value;
}

        </script>
          <?php
$sql = "SELECT subject_name,subject_id FROM subject ";
$result = mysql_query($sql) or die(mysql_error());
echo '<select name="Subject12" id ="subject12">';
while($row = mysql_fetch_array($result))
{
echo "<option value='".$row["subject_name"]."'>".$row["subject_id"]."</option>";
}
//mysql_free_result($result);
echo '</select >';
?>
          <input type="button" value="Select" onClick="result12()"/>
          <input name='SubjectId12' type="hidden" id="SubjectId12" size="10" maxlength="10"/>
          :
          <input id="Subject12" name='Subject12' type="text"/>
          &nbsp;</div></td>
        <td><label for="marks26"></label>
          <div align="center">
            <input name="marks12" type="text" id="marks26" size="3" maxlength="3">
          </div></td>
        <td><div align="center">
          <select name="grade12" id="grade12">
            <option>-</option>
            <option>A</option>
            <option>B</option>
            <option>C</option>
            <option>D</option>
            <option>E</option>
            </select>
        </div></td>
      </tr>
      <tr>
        <td><div align="center">
          <script type="text/javascript">
		  

function result13()
{
var Index = document.getElementById("subject13").selectedIndex;
  document.getElementById("SubjectId13").value = 
    document.getElementById("subject13").options[Index].text;
document.getElementById("Subject13").value = 
    document.getElementById("subject13").options[Index].value;
}

        </script>
          <?php
$sql = "SELECT subject_name,subject_id FROM subject ";
$result = mysql_query($sql) or die(mysql_error());
echo '<select name="Subject13" id ="subject13">';
while($row = mysql_fetch_array($result))
{
echo "<option value='".$row["subject_name"]."'>".$row["subject_id"]."</option>";
}
//mysql_free_result($result);
echo '</select >';
?>
          <input type="button" value="Select" onClick="result13()"/>
          <input name='SubjectId13' type="hidden" id="SubjectId13" size="10" maxlength="10"/>
          :
          <input id="Subject13" name='Subject13' type="text"/>
          &nbsp;</div></td>
        <td><label for="marks27"></label>
          <div align="center">
            <input name="marks13" type="text" id="marks27" size="3" maxlength="3">
          </div>
        <td><label for="grade26"></label>
          <div align="center">
            <select name="grade13" id="grade26">
              <option>-</option>
              <option>A</option>
              <option>B</option>
              <option>C</option>
              <option>D</option>
              <option>E</option>
            </select>
          </div>
      <tr>
          <td><div align="center">
            <script type="text/javascript">
		  

function result14()
{
var Index = document.getElementById("subject14").selectedIndex;
  document.getElementById("SubjectId14").value = 
    document.getElementById("subject14").options[Index].text;
document.getElementById("Subject14").value = 
    document.getElementById("subject14").options[Index].value;
}

          </script>
            <?php
$sql = "SELECT subject_name,subject_id FROM subject ";
$result = mysql_query($sql) or die(mysql_error());
echo '<select name ="Subject14" id ="subject14">';
while($row = mysql_fetch_array($result))
{
echo "<option value='".$row["subject_name"]."'>".$row["subject_id"]."</option>";
}
//mysql_free_result($result);
echo '</select >';
?>
            <input type="button" value="Select" onClick="result14()"/>
            <input name='SubjectId14' type="hidden" id="SubjectId14" size="10" maxlength="10"/>
            :
            <input id="Subject14" name='Subject14' type="text"/>
            &nbsp;</div></td>
          <td><label for="marks28"></label>
            <div align="center">
              <input name="marks14" type="text" id="marks28" size="3" maxlength="3">
            </div></td>
          <td>&nbsp;
            <label for="grade27"></label>
            <div align="center">
              <select name="grade14" id="grade27">
                <option>-</option>
                <option>A</option>
                <option>B</option>
                <option>C</option>
                <option>D</option>
                <option>E</option>
              </select>
            </div></td>
      </tr>
      <tr>
        <td><div align="center">
          <script type="text/javascript">
		  

function result15()
{
var Index = document.getElementById("subject15").selectedIndex;
  document.getElementById("SubjectId15").value = 
    document.getElementById("subject15").options[Index].text;
document.getElementById("Subject15").value = 
    document.getElementById("subject15").options[Index].value;
}

          </script>
          <?php
$sql = "SELECT subject_name,subject_id FROM subject ";
$result = mysql_query($sql) or die(mysql_error());
echo '<select name = "Subject15" id ="subject15">';
while($row = mysql_fetch_array($result))
{
echo "<option value='".$row["subject_name"]."'>".$row["subject_id"]."</option>";
}
//mysql_free_result($result);
echo '</select >';
?>
          <input type="button" value="Select" onClick="result15()"/>
          <input name='SubjectId15' type="hidden" id="SubjectId15" size="10" maxlength="10"/>
          :
          <input id="Subject15" name='Subject15' type="text"/>
          &nbsp;</div></td>
        <td><label for="marks29"></label>
          <div align="center">
            <input name="marks15" type="text" id="marks29" size="3" maxlength="3">
          </div></td>
        <td>&nbsp;
          <label for="grade28"></label>
          <div align="center">
            <select name="grade15" id="grade28">
              <option>-</option>
              <option>A</option>
              <option>B</option>
              <option>C</option>
              <option>D</option>
              <option>E</option>
            </select>
          </div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </div>
  <p align="center">
    <input type="submit" name="button2" id="button2" value="ENTER">
  </p>
</form>
<p>&nbsp; </p>
<?php mysql_close($conn); ?>
