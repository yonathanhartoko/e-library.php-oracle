<!doctype html>
<html>
    <head>
        <title>Konfirmasi Penghapusan Stock Buku</title>
    </head>
    <body>
        <h1>Stock Buku telah berhasil dihapus</h1>
        <br/>
        <?php
        include '../config.php';
        $stockid = $_POST["stockid"];
        $getquery = "SELECT judul,pengarang FROM BUKU WHERE id=$stockid";
        $getstock = oci_parse($conn,$getquery);
        oci_execute($getstock);
        while (($row = oci_fetch_array($getstock, OCI_BOTH)) != false) {
            echo "Nama Staff: $row[0]<br/>";
            echo "Pengarang: $row[1]<br/>";
        }
        $delquery = "DELETE FROM BUKU WHERE id=$stockid";
        $delstock = oci_parse($conn,$delquery);
        oci_execute($delstock);
        oci_free_statement($delstock);
        oci_close($conn);
        ?>
        <br/>
        <a href="stockmenu.html">Kembali ke Menu Stock Buku</a>
    </body>
</html>