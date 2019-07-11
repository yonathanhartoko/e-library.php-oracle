<html>
    <head>
        <title></title>
    </head>
    <body>
        <h1>List Stok Buku</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>Nama Peminjam</th>
                    <th>Judul Buku</th>
                    <th>Jumlah</th>
                    <th>Petugas</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            <?php
                include '../config.php';
                $getquery = 'SELECT id_member,id_buku,jumlah_pinjam,id_petugas,status FROM PEMINJAMAN';
                $gettr = oci_parse($conn,$getquery);
                oci_execute($gettr);
                while (($row = oci_fetch_array($gettr, OCI_BOTH)) != false) {
            ?>
                <tr>
                    <td>
                        <?php 
                        $memid = $row[0];
                        $getquery2 = "SELECT nama FROM ANGGOTA WHERE id=$memid";
                        $getmem = oci_parse($conn,$getquery2);
                        oci_execute($getmem);
                        while (($rowa = oci_fetch_array($getmem, OCI_BOTH)) != false) {
                            echo "$rowa[0]";
                        }
                        ?>
                    </td>
                    <td>
                        <?php 
                        $bookid = $row[1];
                        $getquery3 = "SELECT judul FROM BUKU WHERE id=$bookid";
                        $getbook = oci_parse($conn,$getquery3);
                        oci_execute($getbook);
                        while (($rowa = oci_fetch_array($getbook, OCI_BOTH)) != false) {
                            echo "$rowa[0]";
                        }
                        ?>
                    </td>
                    <td>
                        <?php 
                        $jumlah = $row[2];
                        echo "$jumlah";
                        ?>
                    </td>
                    <td>
                        <?php 
                        $staffid = $row[3];
                        $getquery4 = "SELECT nama FROM PETUGAS WHERE id=$staffid";
                        $getstaff = oci_parse($conn,$getquery4);
                        oci_execute($getstaff);
                        while (($rowa = oci_fetch_array($getstaff, OCI_BOTH)) != false) {
                            echo "$rowa[0]";
                        }
                        ?>
                    </td>
                    <td>
                        <?php 
                        $status = $row[4];
                        if ($status==1){
                        ?>
                            ON RENT
                        <?php
                        }
                        else {
                        ?>
                            RETURNED
                        <?php
                        }
                        ?>
                    </td>
                </tr>
            <?php
                }

                oci_free_statement($gettr);
                oci_close($conn);
            ?>
            </tbody>
        </table>
        <a href="bookrent.html">Kembali ke Menu Peminjaman</a>
    </body>
</html>