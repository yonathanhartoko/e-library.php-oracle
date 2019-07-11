<!doctype html>
<html>
    <head>
        <title>Konfirmasi Penghapusan Staff</title>
    </head>
    <body>
        <h1>Saff telah berhasil dihapus</h1>
        <br/>
        <?php
        include '../config.php';
        $staffid = $_POST["staffid"];
        $getquery = "SELECT nama FROM PETUGAS WHERE id=$staffid";
        $getstaff = oci_parse($conn,$getquery);
        oci_execute($getstaff);
        while (($row = oci_fetch_array($getstaff, OCI_BOTH)) != false) {
            echo "Nama Staff: $row[0]<br/>";
        }
        $delquery = "DELETE FROM PETUGAS WHERE id=$staffid";
        $delstaff = oci_parse($conn,$delquery);
        oci_execute($delstaff);
        oci_free_statement($delstaff);
        oci_close($conn);
        ?>
        <br/>
        <a href="menustaff.html">Kembali ke Menu Staff</a>
    </body>
</html>