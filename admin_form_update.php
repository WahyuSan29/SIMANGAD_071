<?php include 'check_login.php'; ?>

<!DOCTYPE html>
<html>

<head>
  <title>Edit Data</title>
  <link rel="stylesheet" type="text/css" href="../style/style.css?v=1" />

  <script type="text/javascript">
    function getConfirmation() {
      var retVal = confirm("Anda yakin dengan data yang anda ubah?");
      if (retVal == true) {
        return true;
      } else {
        return false;
      }
    }
  </script>

</head>

<body>

  <h2 align="center">Ubah Data</h2>

  <?php
  include("config.php");

  if (isset($_GET['updateadmin'])) {

    $id = $_GET['updateadmin'];

    $result = $dbConn->prepare("SELECT * FROM admin where id_admin=:id");
    $result->execute(array(':id' => $id));
    $row = $result->fetch(PDO::FETCH_ASSOC);

    if ($row) {
    } else {
      echo "DATA TIDAK DI TEMUKAN";
    }
  }
  ?>

  </table>

  <input type="hidden" name="in_KdSup" value="<?php echo $row['id_admin']; ?>">
  <form name="edit" action="proses_update.php?id=<?php echo $row['id_admin']; ?>" method="post">
    <table cellpadding="3" cellspacing="0" align="center">

      <tr hidden>
        <td>ID User</td>
        <td>:</td>
        <td><input type="text" readonly name="in_KdAdmin" value="<?php echo $row['id_admin']; ?>" class="form-control"></td>
      </tr>

      <tr>
        <td>Nama</td>
        <td>:</td>
        <td><input type="text" name="in_NamaAdmin" value="<?php echo $row['nama_admin']; ?>" class="form-control"></td>
      </tr>

      <tr>
        <td>Username</td>
        <td>:</td>
        <td><input type="text" name="in_Username" value="<?php echo $row['username']; ?>" class="form-control"></td>
      </tr>

      <tr>
        <td>Password</td>
        <td>:</td>
        <td><input type="password" name="in_Password" value="<?php echo $row['pass']; ?>" class="form-control"></td>
      </tr>

      <tr>
        <td></td>
        <td></td>
        <td>
          <button type="submit" name="btn_user_update" class="btn btn-info">Submit</button>
        </td>
      </tr>
    </table>
  </form>
  <br>
  <br>




</body>

</html>