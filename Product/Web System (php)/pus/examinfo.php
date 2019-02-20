<?php include 'index.php'; ?>
<form id="form9" name="form9" method="POST" action="addexam.php">
  <div align="center">
    <table width="71%" border="0">
      <tr>
        <td width="49%"><div align="right">Exam Type:</div></td>
        <td width="51%"><label for="exam_type"></label>
          <div align="left">
            <select name="exam_type" id="exam_type">
              <option>Monthly Test</option>
              <option>Mid Year Exam</option>
              <option>Final Exam</option>
            </select>
          </div></td>
      </tr>
      <tr>
        <td><div align="right">Exam Category:</div></td>
        <td><label for="exam_category"></label>
          <div align="left">
            <select name="exam_category" id="exam_category">
              <option>March Session</option>
              <option>June Session</option>
              <option>August Session</option>
              <option>October Session</option>
              <select name="exam_category" id="exam_category">
            </select>
        </div></td>
      </tr>
      <tr>
        <td><div align="right">Date Of Exam:</div></td>
        <td><label for="exam_date"></label>
          <div align="left">
            <input type="text" name="exam_date" id="exam_date" required placeholder = "yyyy-mm-dd">
        </div></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center">
          <input type="submit" name="button" id="button" value="ENTER">
        </div></td>
      </tr>
  </table>
  </div>
</form>

