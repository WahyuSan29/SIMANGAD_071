<?php include 'check_login.php'; ?>

<?php

include('koneksi.php');

// Hapus file sebelumnya
// $files = glob('db/backup/*'); // membaca semua nama file di dalam direktori
// foreach($files as $file){ // perulangan berdasarkan jumlah file
//    if(is_file($file))
//        unlink($file); // menghapus file
// }

// BACKUP LAMA
// $file_name = 'Backup-Data-' . date("Y-m-d-H-i-s") . '.zip';

// ini berhasil
// $command = "mysqldump --user=root --databases pegadaian --extended-insert=FALSE --result-file=db\backup\pegadaian_backup.sql";
// system($command);

// masukan file sql ke dalam zip
// $fileToZip = 'db/backup/pegadaian_backup.sql';

// $zip = new ZipArchive;

// $res = $zip->open($file_name, ZipArchive::CREATE);
// if ($res === TRUE) {
//     $zip->addFile($fileToZip, basename('pegadaian_backup.sql'));
//     $zip->close();
// } else {
//     echo 'failed, code:' . $res;
// }

// memindah file
// rename($file_name, 'db/backup/' . $file_name);

// END BACKUP LAMA

// header('Content-type: application/pdf');
// header('Content-Disposition: attachment; filename="' . basename("db/backup/".$file_name) . '"');
// header('Content-Transfer-Encoding: binary');

// header("Content-Type: application/zip");
// header("Content-Transfer-Encoding: Binary");
// header("Content-Length: ".filesize($file_name));
// header("Content-Disposition: attachment; filename=\"". basename("db/backup/".$file_name) ."\"");        

// readfile("db/backup/".$file_name);

$file_name = 'Backup-Data-' . date("Y-m-d-H-i-s") . '.zip';

// Menggunakan perintah mysqldump untuk membuat backup SQL
$command = "mysqldump --user=root --databases pegadaian --extended-insert=FALSE --result-file=db/backup/pegadaian_backup.sql";
system($command);

// Memasukkan file SQL ke dalam zip
$fileToZip = 'db/backup/pegadaian_backup.sql';

$zip = new ZipArchive;
if ($zip->open($file_name, ZipArchive::CREATE) === TRUE) {
    $zip->addFile($fileToZip, basename($fileToZip));
    $zip->close();
    echo '<center>Backup Database Berhasil Dibuat dan Dikompresi Dalam File ZIP </center>';
} else {
    echo '<center>Gagal membuat file zip.</center>';
}

// Memindahkan file zip ke folder backup
$newLocation = 'db/backup/' . $file_name;
if (rename($file_name, $newLocation)) {
    echo '<center><br> Backup Database Berhasil Dipindahkan</center>';
} else {
    echo '<br> Gagal memindahkan file zip.';
}

echo "<br><center>Klik <a href='db/backup/" . $file_name . "'>Disini</a> untuk mendownload Data Backup!</center>";


function Redirect($url, $permanent = false)
{
    if (headers_sent() === false) {
        header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }

    exit();
}

Redirect('index.php', false);
