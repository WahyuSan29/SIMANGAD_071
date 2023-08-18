<?php include 'check_login.php'; ?>

<!DOCTYPE html>
<html>

<head>

  <title>Data</title>

</head>

<body>


  <h2 align="center">Tambah Data</h2>



  <form action="proses_insert.php" method="post">
    <table cellpadding="3" cellspacing="0" align="center">
      <!-- <tr>
        <td>Kd Admin</td>
        <td>:</td>
        <td><input name='in_KdAdmin' id='in_KdAdmin' class='form-control' type='text' ></td>
    </tr> -->
      <tr>
        <td>NIK Pengelola</td>
        <td>:</td>
        <td>
          <input required id="nik" type="number" name="nik" class="form-control" onchange="checkNik()" />
          <div id="nikStatus"></div>
        </td>
      </tr>
      <tr>
        <td>Nama Pengelola</td>
        <td>:</td>
        <td><input name='nama' class='form-control' type='text'></td>
      </tr>
      <tr>
        <td>Alamat Pengelola</td>
        <td>:</td>
        <td><input name='alamat' class='form-control' type='text'></td>
      </tr>

      </tr>
      <tr>
        <td></td>
        <td></td>
        <td>
          <button type="submit" name="btn_pengelola_tambah" class="btn btn-info">Submit</button>
        </td>
      </tr>

    </table>

  </form>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var nikInput = document.getElementById("nik");

      nikInput.addEventListener("change", function() {
        var nik = nikInput.value;

        // Memeriksa panjang NIK
        if (nik.length !== 16) {
          alert("NIK harus memiliki 16 digit Angka!");
          nikInput.value = "";
          return;
        }

        // Membuat objek XMLHttpRequest
        var xhr = new XMLHttpRequest();

        // Menentukan callback ketika permintaan selesai
        xhr.onreadystatechange = function() {
          if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
              // Mendapatkan respon dari server
              var response = xhr.responseText;

              // Mengecek apakah NIK sudah ada
              if (response === "nik_exists") {
                alert("NIK sudah digunakan!");
                nikInput.value = "";
              }
            } else {
              console.log('Terjadi kesalahan');
            }
          }
        };

        // Mengirim permintaan ke server
        xhr.open("GET", "check_nikp.php?nik=" + nik, true);
        xhr.send();
      });
    });
  </script>

</body>

</html>