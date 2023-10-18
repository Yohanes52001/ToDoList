 <?php
if (isset($_POST['simpan'])) {
    if (isset($_POST['id'])) {
        $ubah = mysqli_query($mysqli, "UPDATE ToDoList SET 
                                        isi = '" . $_POST['isi'] . "',
                                        tgl_awal = '" . $_POST['tgl_awal'] . "',
                                        tgl_akhir = '" . $_POST['tgl_akhir'] . "'
                                        WHERE
                                        id = '" . $_POST['id'] . "'");
    } else {
        $tambah = mysqli_query($mysqli, "INSERT INTO ToDoList(isi,tgl_awal,tgl_akhir,status) 
                                        VALUES ( 
                                            '" . $_POST['isi'] . "',
                                            '" . $_POST['tgl_awal'] . "',
                                            '" . $_POST['tgl_akhir'] . "',
                                            '0'
                                            )");
    }

    echo "<script> 
            document.location='index.php';
            </script>";
}

if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'hapus') {
        $hapus = mysqli_query($mysqli, "DELETE FROM ToDoList WHERE id = '" . $_GET['id'] . "'");
    } else if ($_GET['aksi'] == 'ubah_status') {
        $ubah_status = mysqli_query($mysqli, "UPDATE ToDoList SET 
                                        status = '" . $_GET['status'] . "' 
                                        WHERE
                                        id = '" . $_GET['id'] . "'");
    }

    echo "<script> 
            document.location='index.php';
            </script>";
}
?>