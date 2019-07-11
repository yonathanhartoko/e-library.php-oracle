<!doctype html>
<html>
    <head>
        <title>Hapus Stok Buku</title>
    </head>
    <body>
        <h1>Menu Hapus Stok Buku</h1>
        <br/>
        <form action="confrst.php" method="POST">
            <table>
                <tr>
                    <td>Nama Buku</td>
                    <td>:</td>
                    <td>
                        <select name='stockid'>
                            <?php
                            include '../config.php';
                            $getquery = 'SELECT id,judul,pengarang FROM BUKU';
                            $getstock = oci_parse($conn,$getquery);
                            oci_execute($getstock);
                            while (($row = oci_fetch_array($getstock, OCI_BOTH)) != false) {
                            ?>
                            <option value="<?php echo $row[0];?>"><?php echo $row[1];?> oleh <?php echo $row[2];?></option>
                            <?php
                            }
                            oci_free_statement($getstock);
                            oci_close($conn);
                            ?>
                        </select>
                    </td>
                </tr>
            </table>
            <input type="submit" value="Lanjut"/>
        </form>
        <a href="stockmenu.html">Kembali ke Menu Staff</a>
    </body>
</html>