<!doctype html>
<html>
    <head>
        <title>Hapus Staff</title>
    </head>
    <body>
        <h1>Menu Hapus Staff</h1>
        <br/>
        <form action="confrs.php" method="POST">
            <table>
                <tr>
                    <td>Nama Staff</td>
                    <td>:</td>
                    <td>
                        <select name='staffid'>
                            <?php
                            include '../config.php';
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
        <a href="menustaff.html">Kembali ke Menu Staff</a>
    </body>
</html>