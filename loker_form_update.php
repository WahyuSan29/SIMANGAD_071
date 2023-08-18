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



<h3 align="center">Update Kode Loker</h3>

<?php


if (isset($_GET['updateloker'])) {

  $id = $_GET['updateloker'];

  $result = $dbConn->prepare("SELECT * FROM loker where id_loker=:id");
  $result->execute(array(':id' => $id));
  $row = $result->fetch(PDO::FETCH_ASSOC);

  if ($row) {
  } else {
    echo "DATA TIDAK DI TEMUKAN";
  }
}
?>


<form name="updtloker" action="proses_update.php?id=<?php echo $row['id_loker']; ?>" method="post">
  <table cellpadding="3" cellspacing="0" align="center">

    <tr>
      <td>Kode Loker</td>
      <td>:</td>
      <td><input type="text" name="in_kdloker" value="<?php echo $row['kd_loker']; ?>" class="form-control"></td>
    </tr>

    <tr>
      <td></td>
      <td></td>
      <td>
        <button type="submit" name="btn_loker_update" class="btn btn-info">Submit</button>
      </td>
    </tr>
  </table>
</form>