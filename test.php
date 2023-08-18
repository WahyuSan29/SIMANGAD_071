<!DOCTYPE html>
<html>

<head>

    <title>Hitung</title>

</head>

<body>



    <h2 align="center">Hitung Taksir Gadai</h2>


    <form method="post">
        <table align="center">
            <tr>
                <td>Jenis Barang</td>
                <td>:</td>
                <td><select name="jenis" class="form-control">
                        <?php
                        $query = "select*from jenis_barang";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <option value="<?php echo $row['id_jenis']; ?>"><?php echo $row['jenis_barang']; ?></option>
                        <?php } ?>
                    </select></td>
            </tr>
            <tr>
                <td>Harga Pasaran</td>
                <td>:</td>
                <td><input name='harga' class='form-control' type='text' required></td>
            </tr>
            <tr>
                <td>Jangka Waktu/Bulan</td>
                <td>:</td>
                <td><input name='jangka' class='form-control' type='text' required></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>&nbsp;

                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <button type="submit" name="btn_hitung" class="btn btn-info">Hitung</button>
                </td>
            </tr>

        </table>

    </form>
    <hr>
    <?php
    if (isset($_POST['btn_hitung'])) {
        $jenis = $_POST['jenis'];
        $harga = $_POST['harga'];
        $jangka = $_POST['jangka'];

        $sql = mysqli_query($conn, "select *from jenis_barang where id_jenis='$jenis'");
        $jenis_barang = mysqli_fetch_assoc($sql);
        $sql1 = mysqli_query($conn, "SELECT * FROM besar_pinjaman WHERE minimal<=$harga and maksimal >= $harga");
        if (mysqli_num_rows($sql1) == 1) {
            $besar_pinjaman = mysqli_fetch_assoc($sql1);
            $harga_taksiran = ($harga * $jenis_barang['persen_taksiran']) / 100;
            $biaya_titip = round(($besar_pinjaman['tarif_ujroh'] * $harga_taksiran) / 100, -3);
            $jangka_waktu = ($jangka * 30) / 10;
            $biaya_sewa = round($jangka_waktu * $biaya_titip, -3)
    ?>
            <form method="post" action="proses_insert.php">
                <table align="center">
                    <tr>
                        <td>Harga Taksir Pasaran</td>
                        <td>:</td>
                        <td><?php echo "Rp." . number_format($harga, 0, ".", "."); ?>
                            <input name='jangka' readonly class='form-control' type='hidden' value='<?php echo $jangka; ?>'>
                            <input name='jenis' readonly class='form-control' type='hidden' value='<?php echo $jenis; ?>'>
                            <input name='harga' readonly class='form-control' type='hidden' value='<?php echo $harga; ?>'>
                        </td>
                    </tr>
                    <tr>
                        <td>Harga Taksiran</td>
                        <td>:</td>
                        <td><?php echo $jenis_barang['persen_taksiran'] . "% - Rp." . number_format($harga_taksiran, 0, ".", "."); ?>
                            <input name='harga_taksiran' readonly class='form-control' type='hidden' value='<?php echo $harga_taksiran; ?>'>
                        </td>
                    </tr>
                    <tr>
                        <td>Biaya Titip Per 10 Hari</td>
                        <td>:</td>
                        <td><?php echo $besar_pinjaman['golongan'] . "-" . $besar_pinjaman['tarif_ujroh'] . "% - Rp." . number_format($biaya_titip, 0, ".", "."); ?>
                            <input name='titip' class='form-control' type='hidden' value=<?php echo $biaya_titip; ?>>
                        </td>
                    </tr>
                    <tr>
                        <td>Biaya Sewa</td>
                        <td>:</td>
                        <b>
                            <td><?php echo " Rp." . number_format($biaya_sewa, 0, ".", "."); ?>
                                <input name='sewa' class='form-control' type='hidden' value="<?php echo $biaya_sewa; ?>">

                        </b>
                        </td>
                    </tr>

                    <tr>
                        <td>Barang Berupa</td>
                        <td>:</td>
                        <td><input name='barang' class='form-control' type='text'>
                        </td>
                    </tr>
                    <tr>
                        <td>Merk</td>
                        <td>:</td>
                        <td><input name='merek' class='form-control' type='text'>
                        </td>
                    </tr>
                    <tr>
                        <td>Tahun</td>
                        <td>:</td>
                        <td><input name='tahun' class='form-control' type='text'>
                        </td>
                    </tr>
                    <tr>
                        <td>Warna</td>
                        <td>:</td>
                        <td><input name='warna' class='form-control' type='text'>
                        </td>
                    </tr>
                    <tr>
                        <td>NIK Nasabah</td>
                        <td>:</td>
                        <td><input name='nasabah' class='form-control' id="nasabah" type='text'>
                        </td>
                    </tr>
                    <tr>
                        <td>Nama Nasabah</td>
                        <td>:</td>
                        <td><input type="text" id="nama" class='form-control' name="nama" readonly="readonly" /></td>
                    </tr>
                    <tr>
                        <td>Pengelola</td>
                        <td>:</td>
                        <td><select name="pengelola" class="form-control">
                                <?php
                                $query = "select*from pengelola";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <option value="<?php echo $row['nik_pengelola']; ?>"><?php echo $row['nama'] ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <button type="submit" name="btn_perjanjian" class="btn btn-info">Simpan Data</button>
                        </td>
                    </tr>
                </table>

            </form>
    <?php
        } else {
            header("Refresh:0");
        }
    } ?>
</body>
<link rel="stylesheet" href="js/jquery-ui.css" />
<script src="js/jquery-1.8.3.js"></script>
<script src="js/jquery-ui.js"></script>
<script>
    $(function() {
        $("#nasabah").autocomplete({
            minLength: 1,
            delay: 0,
            source: 'pencarian/nasabah.php',
            select: function(event, ui) {
                $('#nama').val(ui.item.nama);
                $('#nosttb').val(ui.item.no_sttb);
            }
        });
    });
</script>

</html>