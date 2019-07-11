<!doctype html>
<html>
    <head>
        <title>Hapus Stok Buku</title>
    </head>
    <body>
        <h1>Menu Hapus Stok Buku</h1>
        <br/>
        <form action="confret.php" method="POST">
            <table>
                <tr>
                    <td>Judul Buku</td>
                    <td>:</td>
                    <td>
                        <select name='trid'>
                            <?php
                            include '../config.php';
                            $memid = $_POST["memid"];
                            $getquery = "SELECT id,id_buku FROM PEMINJAMAN WHERE ID_MEMBER=$memid AND STATUS='1'";
                            $gettr = oci_parse($conn,$getquery);
                            oci_execute($gettr);
                            while (($row = oci_fetch_array($gettr, OCI_BOTH)) != false) {
                            ?>
                            <option value="<?php echo $row[0];?>">
                                <?php
                                $bookid = $row[1];
                                $getquery2 = 'SELECT judul,pengarang FROM BOOK WHERE id=$bookid';
                                $getbook = oci_parse($conn,$getquery2);
                                oci_execute($getbook);
                                while (($rowa = oci_fetch_array($getbook, OCI_BOTH)) != false) { 
                                    echo $rowa[0] . "oleh" . $rowa[1];
                                }
                                oci_free_statement($getbook);
                                ?>
                            </option>
                            <?php
                            }
                            oci_free_statement($gettr);
                            oci_close($conn);
                            ?>
                        </select>
                    </td>
                </tr>
            </table>
            <input type="submit" value="Lanjut"/>
        </form>
        <a href="bookrent.html">Kembali ke Menu Peminjaman</a>
    </body>
</html>