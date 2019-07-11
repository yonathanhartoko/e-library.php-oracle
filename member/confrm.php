<!doctype html>
<html>
    <head>
        <title>Konfirmasi Penghapusan Member</title>
    </head>
    <body>
        <h1>Member telah berhasil dihapus</h1>
        <br/>
        <?php
        include '../config.php';
        $memid = $_POST["memid"];
        $getquery = "SELECT nama,pekerjaan,no_hp FROM ANGGOTA WHERE id=$memid";
        $getmem = oci_parse($conn,$getquery);
        oci_execute($getmem);
        while (($row = oci_fetch_array($getmem, OCI_BOTH)) != false) {
            echo "Nama Member: $row[0]<br/>";
            echo "Pekerjaan: $row[1]<br/>";
            echo "No HP: $row[2]<br/>";
        }
        $delquery = "DELETE FROM ANGGOTA WHERE id=$memid";
        $delmem = oci_parse($conn,$delquery);
        oci_execute($delmem);
        oci_free_statement($delmem);
        oci_close($conn);
        ?>
        <br/>
        <a href="membermenu.html">Kembali ke Menu Member</a>
    </body>
</html>