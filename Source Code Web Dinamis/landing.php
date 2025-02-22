<?php

    include "koneksi.php";

?>
<h2>MENAMPILKAN DATA DARI DATABASE DENGAN TABEL</h2>
<table border="1">
    <tr>
        <td>NIS</td>
        <td>Nama</td>
        <td>jenis Kelamin</td>
        <td>Alamat</td>
    </tr>
    <?php

        $tampil = mysqli_query($mysqli, "select * from siswa");
        // $no = 1;
        while($hasil = mysqli_fetch_array($tampil)){
    ?>
    <tr>
        <td><?php echo $hasil['nis']; ?></td>
        <td><?php echo $hasil['nama']; ?></td>
        <td><?php echo $hasil['jeniskelamin']; ?></td>
        <td><?php echo $hasil['alamat']; ?></td>
        <td>
            <a href="edit_data.php?nis=<?php echo $hasil['nis']; ?>">edit</a>
            <a href="delete_data.php?nis=<?php echo $hasil['nis']; ?>">hapus</a>
        </td>
    </tr>
    <?php
        }
    ?>
</table>
