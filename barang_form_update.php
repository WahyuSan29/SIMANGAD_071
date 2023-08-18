<?php include 'check_login.php'; ?>

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



<h3 align="center">Update Jenis Barang</h3>

<?php


if (isset($_GET['updatebarang'])) {

  $id = $_GET['updatebarang'];

  $result = $dbConn->prepare("SELECT * FROM jenis_barang where id_jenis=:id");
  $result->execute(array(':id' => $id));
  $row = $result->fetch(PDO::FETCH_ASSOC);

  if ($row) {
  } else {
    echo "DATA TIDAK DI TEMUKAN";
  }
}
?>


<form name="edit" action="proses_update.php?id=<?php echo $row['id_jenis']; ?>" method="post">
  <table cellpadding="3" cellspacing="0" align="center">

    <tr>
      <td>Jenis Barang</td>
      <td>:</td>
      <td><input type="text" name="in_jenis" value="<?php echo $row['jenis_barang']; ?>" class="form-control"></td>
    </tr>

    <tr>
      <td>Persen Taksiran</td>
      <td>:</td>
      <td><input type="text" name="in_persen" value="<?php echo $row['persen_taksiran']; ?>" class="form-control"></td>
    </tr>

    <tr>
      <td></td>
      <td></td>
      <td>
        <button type="submit" name="btn_barang_update" class="btn btn-info">Submit</button>
      </td>
    </tr>
  </table>
</form>