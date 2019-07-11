<!doctype html>
<html>
    <head>
        <title>Pinjam buku</title>
    </head>
    <body>
        <h1>Form Pinjam Buku</h1>
        <br/>
        <form action="confrent.php" method="POST">
            <table>
                <tr>
                    <td>Nama Peminjam</td>
                    <td>:</td>
                    <td>
                        <select name='memid'>
                            <?php
                            include '../config.php';
                            $getquery = 'SELECT id,nama FROM ANGGOTA';
                            $getmember = oci_parse($conn,$getquery);
                            oci_execute($getmember);
                            while (($row = oci_fetch_array($getmember, OCI_BOTH)) != false) {
                            ?>
                            <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
                            <?php
                            }
                            oci_free_statement($getmember);
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Buku yang dipinjam</td>
                    <td>:</td>
                    <td>
                        <select name='bookid'>
                        <?php
                            $getquery = 'SELECT id,judul,pengarang FROM BUKU';
                            $getstock = oci_parse($conn,$getquery);
                            oci_execute($getstock);
                            while (($row = oci_fetch_array($getstock, OCI_BOTH)) != false) {
                            ?>
                            <option value="<?php echo $row[0];?>"><?php echo $row[1];?> oleh <?php echo $row[2];?></option>
                            <?php
                            }
                            oci_free_statement($getstock);
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Jumlah Buku</td>
                    <td>:</td>
                    <td><input type='number' name='sumbook' min='1'></td>
                </tr>
                <tr>
                    <td>Staff</td>
                    <td>:</td>
                    <td>
                        <select name='staffid'>
                            <?php
                            $getquery = 'SELECT id,nama FROM PETUGAS';
                            $getstaff = oci_parse($conn,$getquery);
                            oci_execute($getstaff);
                            while (($row = oci_fetch_array($getstaff, OCI_BOTH)) != false) {
                            ?>
                            <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
                            <?php
                            }
                            oci_free_statement($getstaff);
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