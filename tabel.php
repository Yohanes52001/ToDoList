<!-- Table-->
<table class="table table-hover">
    <!--thead atau baris judul-->
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Kegiatan</th>
            <th scope="col">Awal</th>
            <th scope="col">Akhir</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <!--tbody berisi isi tabel sesuai dengan judul atau head-->
    <tbody>
        <!-- Kode PHP untuk menampilkan semua isi dari tabel urut
        berdasarkan status dan tanggal awal-->
        <?php
        $result = mysqli_query(
            $mysqli,"SELECT * FROM ToDoList ORDER BY status,tgl_awal"
            );
        $no = 1;
        while ($data = mysqli_fetch_array($result)) {
        ?>
            <tr>
                <th scope="row"><?php echo $no++ ?></th>
                <td><?php echo $data['isi'] ?></td>
                <td><?php echo $data['tgl_awal'] ?></td>
                <td><?php echo $data['tgl_akhir'] ?></td>
                <td>
                    <?php
                    if ($data['status'] == '1') {
                    ?>
                        <a class="btn btn-success rounded-pill px-3" type="button" 
                        href="index.php?id=<?php echo $data['id'] ?>&aksi=ubah_status&status=0">
                        Sudah
                        </a>
                    <?php
                    } else {
                    ?>
                        <a class="btn btn-warning rounded-pill px-3" type="button" 
                        href="index.php?id=<?php echo $data['id'] ?>&aksi=ubah_status&status=1">
                        Belum</a>
                    <?php
                    }
                    ?>
                </td>
                <td>
                    <a class="btn btn-info rounded-pill px-3" 
                    href="index.php?id=<?php echo $data['id'] ?>">Ubah
                    </a>
                    <a class="btn btn-danger rounded-pill px-3" 
                    href="index.php?id=<?php echo $data['id'] ?>&aksi=hapus">Hapus
                    </a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>