<!doctype html>
<html>
    <head>
        <title>Konfirmasi peminjaman buku</title>
    </head>
    <body>
        <h1>Transaksi Sukses</h1>
        <br/>
        <?php
        include '../config.php';
        $memid = $_POST["memid"];
        $bookid = $_POST["bookid"];
        $sumbook = $_POST["sumbook"];
        $staffid = $_POST["staffid"];
        $status = '1';
        $getquery = "SELECT nama FROM ANGGOTA WHERE id=$memid";
        $getmem = oci_parse($conn,$getquery);
        oci_execute($getmem);
        while (($row = oci_fetch_array($getmem, OCI_BOTH)) != false) {
            echo "Nama Member: $row[0]<br/>";
        }
        $getquery2 = "SELECT judul,pengarang FROM BUKU WHERE id=$bookid";
        $getbook = oci_parse($conn,$getquery2);
        oci_execute($getbook);
        while (($row = oci_fetch_array($getbook, OCI_BOTH)) != false) {
            echo "Nama Buku: $row[0]<br/>";
            echo "Nama Pengarang: $row[1]<br/>";
        }
        $getquery3 = "SELECT nama FROM PETUGAS WHERE id=$staffid";
        $getstaff = oci_parse($conn,$getquery3);
        oci_execute($getstaff);
        while (($row = oci_fetch_array($getstaff, OCI_BOTH)) != false) {
            echo "Nama Petugas: $row[0]<br/>";
        }
        echo "Jumlah: $sumbook<br/>";

        $addquery = 'INSERT INTO PEMINJAMAN(ID_MEMBER,ID_BUKU,ID_PETUGAS,JUMLAH_PINJAM,STATUS) '.
        'VALUES(:memid, :bookid, :staffid, :sumbook, :status)';
        $addrent = oci_parse($conn,$addquery);
        oci_bind_by_name($addrent, ':memid', $memid);
        oci_bind_by_name($addrent, ':bookid', $bookid);
        oci_bind_by_name($addrent, ':staffid', $staffid);
        oci_bind_by_name($addrent, ':sumbook', $sumbook);
        oci_bind_by_name($addrent, ':status', $status);

        oci_execute($addrent);
        oci_free_statement($addrent);
        oci_close($conn);
        ?>
        <br/>
        <a href="bookrent.html">Kembali ke Menu Peminjaman</a>
    </body>
</html>