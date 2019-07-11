<!doctype html>
<html>
    <head>
        <title>Konfirmasi penambahan buku</title>
    </head>
    <body>
        <h1>Buku telah berhasil ditambahkan</h1>
        <br/>
        <?php
        include '../config.php';
        $booktitle = $_POST["booktitle"];
        $bookauthor = $_POST["bookauthor"];
        echo "Nama Buku: $booktitle<br/>";
        echo "Pengarang Buku: $bookauthor<br/>";
        $addquery = 'INSERT INTO BUKU(JUDUL,PENGARANG) '.
        'VALUES(:booktitle, :bookauthor)';
        $addstock = oci_parse($conn,$addquery);
        oci_bind_by_name($addstock, ':booktitle', $booktitle);
        oci_bind_by_name($addstock, ':bookauthor', $bookauthor);
        oci_execute($addstock);
        oci_free_statement($addstock);
        oci_close($conn);
        ?>
        <br/>
        <br/>
        <a href="addstock.html">Kembali ke Menu Tambah Buku</a>
    </body>
</html>