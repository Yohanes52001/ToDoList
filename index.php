<?php
    include_once("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width",
        initial-scale="1.0">

        <!--Bootstrap Offline-->
        <link rel="stylesheet" href="assets/css/bootstrap.css">

        <!--Bootstrap Online-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous"> 

        <title>To Do List</title>
    </head>
    <body>
        <div class="container">
           <h1>
                To Do List
                <small class="text-muted">
                    Catatan Coding
                </small>
           </h1> 
           <hr>
           <!--Form Input Data-->

<form class="form row" method="POST" action="" name="myForm" onsubmit="return(validate());">
    <!-- Kode php untuk menghubungkan form dengan database -->
    <?php
    $isi = '';
    $tgl_awal = '';
    $tgl_akhir = '';
    if (isset($_GET['id'])) {
        $ambil = mysqli_query($mysqli, 
        "SELECT * FROM ToDoList 
        WHERE id='" . $_GET['id'] . "'");
        while ($row = mysqli_fetch_array($ambil)) {
            $isi = $row['isi'];
            $tgl_awal = $row['tgl_awal'];
            $tgl_akhir = $row['tgl_akhir'];
        }
    ?>
        <input type="hidden" name="id" value="<?php echo
        $_GET['id'] ?>">
    <?php
    }
    ?>
    <div class="col">
        <label for="inputIsi" class="form-label fw-bold">
            Kegiatan
        </label>
        <input type="text" class="form-control" name="isi" id="inputIsi" placeholder="Kegiatan" value="<?php echo $isi ?>">
    </div>
    <div class="col">
        <label for="inputTanggalAwal" class="form-label fw-bold">
            Tanggal Awal
        </label>
        <input type="date" class="form-control" name="tgl_awal" id="inputTanggalAwal" placeholder="Tanggal Awal" value="<?php echo $tgl_awal ?>">
    </div>
    <div class="col mb-2">
        <label for="inputTanggalAkhir" class="form-label fw-bold">
        Tanggal Akhir
        </label>
        <input type="date" class="form-control" name="tgl_akhir" id="inputTanggalAkhir" placeholder="Tanggal Akhir" value="<?php echo $tgl_akhir ?>">
    </div>
    <div class="col">
        <button type="submit" class="btn btn-primary rounded-pill px-3" name="simpan">Simpan</button>
    </div>
</form>
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
        </div>
    </body>
</html>