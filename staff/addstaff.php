<!doctype html>
<html>
    <head>
        <title>Konfirmasi penambahan staff</title>
    </head>
    <body>
        <h1>Saff telah berhasil ditambahkan</h1>
        <br/>
        <?php
        include '../config.php';
        $staffname = $_POST["staffname"];
        $phoneno = $_POST["phoneno"];
        $passwd = $_POST["passwd"];
        echo "Nama Staff: $staffname<br/>";
        echo "NO HP: $phoneno<br/>";
        $addquery = 'INSERT INTO PETUGAS(NAMA,NO_HP,PASSWORD) '.
        'VALUES(:staffname, :phoneno, :passwd)';
        $compile = oci_parse($conn,$addquery);
        oci_bind_by_name($compile, ':staffname', $staffname);
        oci_bind_by_name($compile, ':phoneno', $phoneno);
        oci_bind_by_name($compile, ':passwd', $passwd);
        oci_execute($compile);
        ?>
        <br/>
        <br/>
        <a href="menustaff.html">Kembali ke Menu Staff</a>
    </body>
</html>