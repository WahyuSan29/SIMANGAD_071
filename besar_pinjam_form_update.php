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


  <h3 align="center">Update Besar Pinjaman</h3>


  <?php


  if (isset($_GET['updatetarif'])) {

    $id = $_GET['updatetarif'];

    $result = $dbConn->prepare("SELECT * FROM besar_pinjaman where id_bsr_pinjaman=:id");
    $result->execute(array(':id' => $id));
    $row = $result->fetch(PDO::FETCH_ASSOC);

    if ($row) {
    } else {
      echo "DATA TIDAK DI TEMUKAN";
    }
  }
  ?>


  <form name="edit" action="proses_update.php?id=<?php echo $row['id_bsr_pinjaman']; ?>" method="post">
    <table cellpadding="3" cellspacing="0" align="center">

      <tr>
        <td>Golongan</td>
        <td>:</td>
        <td><input type="text" name="in_golongan" value="<?php echo $row['golongan']; ?>" class="form-control"></td>
      </tr>

      <tr>
        <td>Minimal</td>
        <td>:</td>
        <td><input type="text" name="in_minimal" value="<?php echo $row['minimal']; ?>" class="form-control"></td>
      </tr>

      <tr>
        <td>Maksimal</td>
        <td>:</td>
        <td><input type="text" name="in_maksimal" value="<?php echo $row['maksimal']; ?>" class="form-control"></td>
      </tr>

      <tr>
        <td>Tarif Ujroh</td>
        <td>:</td>
        <td><input type="text" name="in_tarif" value="<?php echo $row['tarif_ujroh']; ?>" class="form-control"></td>
      </tr>


      <tr>
        <td></td>
        <td></td>
        <td>
          <button type="submit" name="btn_tarif_update" class="btn btn-info">Submit</button>
        </td>
      </tr>
    </table>
  </form>


</body>

</html>