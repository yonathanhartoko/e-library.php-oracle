<html>
    <head>
        <title></title>
    </head>
    <body>
        <h1>List Stok Buku</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                </tr>
            </thead>
            <tbody>
            <?php
                include '../config.php';
                $getquery = 'SELECT judul,pengarang FROM BUKU';
                $getstock = oci_parse($conn,$getquery);
                oci_execute($getstock);
                while (($row = oci_fetch_array($getstock, OCI_BOTH)) != false) {
            ?>
                <tr>
                    <td><?php echo $row[0];?></td>
                    <td><?php echo $row[1];?></td>
                </tr>
            <?php
                }

                oci_free_statement($getstock);
                oci_close($conn);
            ?>
            </tbody>
        </table>
        <a href="stockmenu.html">Kembali ke Menu Utama</a>
    </body>
</html>