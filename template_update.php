<?php

// var_dump($_POST['updatetemplate']);
if ($_POST['updatetemplate']) {
    $ekstensi_diperbolehkan    = array('docx', 'doc');
    $nama = $_FILES['lampiran_template']['name'];
    $x = explode('.', $nama);
    $ekstensi = strtolower(end($x));
    $ukuran    = $_FILES['lampiran_template']['size'];
    $file_tmp = $_FILES['lampiran_template']['tmp_name'];

    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        unlink('file_template/template.docx');
        move_uploaded_file($file_tmp, 'file_template/template.docx');
        // echo 'FILE BERHASIL DI UPLOAD';
        echo '<script>
            window.location.replace("http://localhost/pegadaian/index.php?page=template&stt=berhasil");
            </script>';
    } else {
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
    }
}
