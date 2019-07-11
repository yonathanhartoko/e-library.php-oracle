<!doctype html>
<html>
    <head>
        <title>Hapus Stok Buku</title>
    </head>
    <body>
        <h1>Menu Hapus Stok Buku</h1>
        <br/>
        <form action="returnphase2.php" method="POST">
            <table>
                <tr>
                    <td>Nama Peminjam</td>
                    <td>:</td>
                    <td>
                        <select name='stockid'>
                            <?php
                            include '../config.php';
                            $getquery = 'SELECT id,nama FROM ANGGOTA';
                            $getmem = oci_parse($conn,$getquery);
                            oci_execute($getmem);
                            while (($row = oci_fetch_array($getmem, OCI_BOTH)) != false) {
                            ?>
                            <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
                            <?php
                            }
                            oci_free_statement($getmem);
                            oci_close($conn);
                            ?>
                        </select>
                    </td>
                </tr>
            </table>
            <input type="submit" value="Lanjut"/>
        </form>
        <a href="bookrent.html">Kembali ke Menu Peminjaman</a>
    </body>
</html>