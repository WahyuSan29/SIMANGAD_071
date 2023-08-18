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
  if (isset($_GET['updatepengelola'])) {

    $id = $_GET['updatepengelola'];

    $result = $dbConn->prepare("SELECT * FROM pengelola where nik_pengelola=:id");
    $result->execute(array(':id' => $id));
    $row = $result->fetch(PDO::FETCH_ASSOC);

    if ($row) {
    } else {
      echo "DATA TIDAK DI TEMUKAN";
    }
  }
  ?>

  </table>

  <form name="edit" action="proses_update.php?id=<?php echo $row['nik_pengelola']; ?>" method="post">
    <table cellpadding="3" cellspacing="0" align="center">

      <tr>
        <td>NIK</td>
        <td>:</td>
        <td><input type="text" readonly name="nik" value="<?php echo $row['nik_pengelola']; ?>" class="form-control"></td>
      </tr>

      <tr>
        <td>Nama Pengelola</td>
        <td>:</td>
        <td><input type="text" name="nama" value="<?php echo $row['nama']; ?>" class="form-control"></td>
      </tr>

      <tr>
        <td>Alamat Pengelola</td>
        <td>:</td>
        <td><input type="text" name="alamat" value="<?php echo $row['alamat']; ?>" class="form-control"></td>
      </tr>

      <tr>
        <td></td>
        <td></td>
        <td>
          <button type="submit" name="btn_pengelola_update" class="btn btn-info">Submit</button>
        </td>
      </tr>
    </table>
  </form>
  <br>
  <br>




</body>

</html>