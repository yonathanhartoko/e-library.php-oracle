<html>
    <head>
        <title>Daftar Member</title>
    </head>
    <body>
        <h1>List Member</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>Nama Member</th>
                    <th>Pekerjaan</th>
                    <th>No HP</th>
                </tr>
            </thead>
            <tbody>
            <?php
                include '../config.php';
                $getquery = 'SELECT nama,pekerjaan,no_hp FROM ANGGOTA';
                $getmem = oci_parse($conn,$getquery);
                oci_execute($getmem);
                while (($row = oci_fetch_array($getmem, OCI_BOTH)) != false) {
            ?>
                <tr>
                    <td><?php echo $row[0];?></td>
                    <td><?php echo $row[1];?></td>
                    <td><?php echo $row[2];?></td>
                </tr>
            <?php
                }

                oci_free_statement($getmem);
                oci_close($conn);
            ?>
            </tbody>
        </table>
        <a href="membermenu.html">Kembali ke Menu Member</a>
    </body>
</html>