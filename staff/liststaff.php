<html>
    <head>
        <title></title>
    </head>
    <body>
        <h1>List Staff</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>Nama Staff</th>
                    <th>No HP</th>
                </tr>
            </thead>
            <tbody>
            <?php
                include '../config.php';
                $getquery = 'SELECT nama,no_hp FROM PETUGAS';
                $getstaff = oci_parse($conn,$getquery);
                oci_execute($getstaff);
                while (($row = oci_fetch_array($getstaff, OCI_BOTH)) != false) {
            ?>
                <tr>
                    <td><?php echo $row[0];?></td>
                    <td><?php echo $row[1];?></td>
                </tr>
            <?php
                }

                oci_free_statement($getstaff);
                oci_close($conn);
            ?>
            </tbody>
        </table>
        <a href="menustaff.html">Kembali ke Menu Staff</a>
    </body>
</html>