<!doctype html>
<html>
    <head>
        <title>Konfirmasi pengembalian buku</title>
    </head>
    <body>
        <h1>Transaksi Sukses</h1>
        <br/>
        <?php
        include '../config.php';
        $trid = $_POST["trid"];
        $status = '0';
        $getquery = 'SELECT id_member,id_petugas,id_buku,jumlah FROM PEMINJAMAN WHERE id=$trid';
        $gettr = oci_parse($conn,$getquery);
        oci_execute($gettr);
        while (($row = oci_fetch_array($getmem, OCI_BOTH)) != false) {
            $memid = $row[0];
            $staffid = $row[1];
            $bookid = $row[2];
            $sumbook = $row[3];
        }
        $getquery2 = 'SELECT nama FROM ANGGOTA WHERE id=$memid';
        $getmem = oci_parse($conn,$getquery2);
        oci_execute($getmem);
        while (($row = oci_fetch_array($getmem, OCI_BOTH)) != false) {
            echo "Nama Member: $row[0]<br/>";
        }
        $getquery3 = 'SELECT judul,pengarang FROM BUKU WHERE id=$bookid';
        $getbook = oci_parse($conn,$getquery3);
        oci_execute($getbook);
        while (($row = oci_fetch_array($getbook, OCI_BOTH)) != false) {
            echo "Nama Buku: $row[0]<br/>";
            echo "Nama Pengarang: $row[1]<br/>";
        }
        $getquery4 = 'SELECT nama FROM STAFF WHERE id=$staffid';
        $getstaff = oci_parse($conn,$getquery4);
        oci_execute($getstaff);
        while (($row = oci_fetch_array($getstaff, OCI_BOTH)) != false) {
            echo "Nama Petugas: $row[0]<br/>";
        }
        echo "Jumlah: $sumbook<br/>";

        $editquery = "UPDATE PEMINJAMAN SET status=$status";
        $editrent = oci_parse($conn,$editquery);
        oci_execute($editrent);
        oci_free_statement($editrent);
        oci_close($conn);
        ?>
        <br/>
        <a href="bookrent.html">Kembali ke Menu Peminjaman</a>
    </body>
</html>