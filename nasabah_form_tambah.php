<?php include 'check_login.php'; ?>

<!DOCTYPE html>
<html>

<head>

  <title>Data</title>

</head>

<body>




  <body>
    <h2 align="center">Tambah Data Nasabah</h2>

    <form name="kegiatan" action="proses_insert.php" method="post" enctype="multipart/form-data">
      <table cellpadding="3" cellspacing="0" align="center">
        <tr>
          <td>NIK</td>
          <td>:</td>
          <td>
            <input required id="nik" type="number" name="in_Nik" class="form-control" onchange="checkNik()" />
            <div id="nikStatus"></div>
          </td>
        </tr>
        <tr>
          <td>Nama Nasabah</td>
          <td>:</td>
          <td>
            <input required id="src" type="text" name="in_NamaNas" class="form-control" autocomplete="off" />
          </td>
        </tr>

        <tr>
        <tr>
          <td>Alamat Nasabah</td>
          <td>:</td>
          <td>
            <input required type="text" name="in_AlamatNas" class="form-control" id="kode" />
          </td>
        </tr>

        <tr>
          <td>Tanggal Lahir</td>
          <td>:</td>
          <td>
            <input required type="date" name="in_TglNas" class="form-control" id="tglLahir" />
          </td>
        </tr>

        <tr>
          <td>Jenis Kelamin</td>
          <td>:</td>
          <td><input type="radio" name="jk" value="Laki-laki" checked /><label class="ml-2">Laki-laki</label>
            <input class="ml-3" type="radio" name="jk" value="Perempuan" /><label class="ml-2">Perempuan</label>
          </td>
        </tr>

        <tr>
          <td>Pekerjaan</td>
          <td>:</td>
          <td>
            <input required type="text" name="in_Pekerjaan" class="form-control" />
          </td>
        </tr>

        <tr>
          <td>No HP</td>
          <td>:</td>
          <td>
            <input required type="text" name="in_Nohp" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' />
          </td>
        </tr>

        <tr>
          <td>Nama Keluarga</td>
          <td>:</td>
          <td>
            <input required type="text" name="in_Namakeluarga" class="form-control" />
          </td>
        </tr>
        <tr>
          <td>Alamat Keluarga</td>
          <td>:</td>
          <td>
            <input required type="text" name="in_Alamatkeluarga" class="form-control" />
          </td>
        </tr>
        <tr>
          <td>No HP Keluarga</td>
          <td>:</td>
          <td>
            <input required type="text" name="in_Nokeluarga" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' />
          </td>
        </tr>
        <?php
        date_default_timezone_set('Asia/Jakarta');
        ?>
        <tr hidden>
          <td>Tanggal Register</td>
          <td>:</td>
          <td><input type="text" id="tglreg" class="form-control" name="in_Tglreg" value="<?php echo date('Y-m-d'); ?>" readonly="readonly" required /></td>
        </tr>
        <tr>
          <td>Foto KTP</td>
          <td>:</td>
          <td>
            <input required type="file" name="ktp" />
          </td>
        </tr>

        <tr>
          <td></td>
          <td></td>
          <td>
            <button type="submit" name="btn_nasabah_tambah" class="btn btn-info">Simpan</button>
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
            alert("NIK harus memiliki 16 digit!");
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
          xhr.open("GET", "check_nik.php?nik=" + nik, true);
          xhr.send();
        });
      });
    </script>


  </body>

</html>