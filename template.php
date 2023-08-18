<?php include 'check_login.php'; ?>

<!DOCTYPE html>
<html>

<head>

  <title>Data</title>
</head>

<body>

  <h2 align="center">Template Perjanjian</h2>
  <form name="template" action="template_update.php" method="post" enctype="multipart/form-data">
    <table cellpadding="3" cellspacing="0" align="center">
      <tr>
        <td colspan="3" align="center">
          <a href="file_template/template.docx" class="btn btn-info btn-xs">Download Template</a>
          <br>
          <?php
          if (@$_GET['stt'] <> '') {
            echo '<h3><span class="badge badge-success">Template berhasil diupload.</span></h3>';
          }
          ?>

        </td>
      <tr>
    </table>
    <table align="center">

      <tr>
        <td align="center" colspan="3">
          <hr>
          <h2 align="center">File Template</h2>
          <input class="form-control" align="center" id="lampiran_template" type="file" name="lampiran_template" required /><br>
          <button type="submit" name="updatetemplate" value="updatetemplate" class="btn btn-info">Update Template</button>
        </td>
      </tr>

      <td></td>
      <td></td>


    </table>
  </form>
</body>

</html>