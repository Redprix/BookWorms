<?php
include "../Conn.php";
$GetKategori = "SELECT * FROM kategoribuku";
$GetKategoriRun = mysqli_query($Conn, $GetKategori);
while ($GetKategoriRun1 = mysqli_fetch_array($GetKategoriRun)) {
    echo '<option value="' . $GetKategoriRun1['KodeKategori'] . '">' . $GetKategoriRun1['NamaKategori'] . '</option>';
}
