<!doctype html>
<html>
    <head>
        <title>Konfirmasi penambahan member</title>
    </head>
    <body>
        <h1>Member telah berhasil ditambahkan</h1>
        <br/>
        <?php
        include '../config.php';
        $memname = $_POST["memname"];
        $job = $_POST["job"];
        $phoneno = $_POST["phoneno"];
        echo "Nama Member: $memname<br/>";
        echo "Pekerjaan: $job<br/>";
        echo "NO HP: $phoneno<br/>";
        $addquery = 'INSERT INTO ANGGOTA(NAMA,PEKERJAAN,NO_HP) '.
        'VALUES(:memname, :job, :phoneno)';
        $addmem = oci_parse($conn,$addquery);
        oci_bind_by_name($addmem, ':memname', $memname);
        oci_bind_by_name($addmem, ':job', $job);
        oci_bind_by_name($addmem, ':phoneno', $phoneno);
        oci_execute($addmem);
        oci_free_statement($addmem);
        oci_close($conn);
        ?>
        <br/>
        <br/>
        <a href="membermenu.html">Kembali ke Menu Member</a>
    </body>
</html>