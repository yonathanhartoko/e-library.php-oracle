<?php
    include 'config.php';
    $getquery = 'SELECT * FROM ANGGOTA';
    $getval = oci_parse($conn,$getquery);
    oci_execute($getval);
    $numrows = oci_num_rows($getval);
    echo "<h1>$numrows</h1>";
?>