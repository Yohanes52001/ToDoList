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