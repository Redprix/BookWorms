<?php
include "../Templates/Header.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function SearchKeranjang($Pelanggan, $Conn)
{
    $checkdata = "SELECT EXISTS(SELECT * FROM Pesanan WHERE KodePelanggan = '$Pelanggan' and StatusPesanan != 'S') as isExists";
    $resultcheck = mysqli_query($Conn, $checkdata);
    $resultcheck2 = mysqli_fetch_assoc($resultcheck);
    return $resultcheck2['isExists'];
}

if (isset($_GET['sys']) and $_GET['sys'] == 'delkrj') {
    echo $sys = $_GET['sys'] . "<br>";
    echo "kode buku =" . $bookid = $_GET['id'] . "<br>";
    echo "kode keranjang =" . $kodekeranjang = $_GET['pesanan'] . "<br>";
    echo $sql = "DELETE t1 FROM detailpesanan AS t1 INNER JOIN pesanan AS t2 ON t1.KodePesanan = t2.KodePesanan WHERE t2.StatusPesanan = 'K' AND t1.KodePesanan = '$kodekeranjang' AND t1.KodeBuku = '$bookid';";
    $sqlrundel = mysqli_query($Conn, $sql);
    header("location:../view/keranjang.php");
} elseif (isset($_GET['sys']) and $_GET['sys'] == 'toprocess') {
    // echo $sys = $_GET['sys'] . "<br>";
    echo $kp = $_GET['kpesanan'] . "<br>";
    echo $ha = $_POST['hargakhir'] . "<br>";
    $status = 'P';
    $currentDate = date('Y-m-d');

    // var_dump($_POST);
    // $totalItems = $_POST['totalItems'];
    // $totalPrice = 0;

    // for ($j = 0; $j < $totalItems; $j++) {
    //     $bp = floatval($_POST['berapa' . $j]);
    //     $hg = floatval($_POST['harga' . $j]);
    //     $totalPrice += $bp * $hg;
    // }

    // echo "Total Price: " . $totalPrice;

    // $stocksys = $_POST['Stocksys'];

    if (isset($_SESSION['arrayData'])) {
        $receivedArray = $_SESSION['arrayData']; // Access the received array
        // print_r($receivedArray);
        $ArrayBuku = $receivedArray;
        unset($_SESSION['arrayData']); // Unset the session variable if needed
    }


    $sql = "UPDATE `pesanan` SET `StatusPesanan` = '$status', `HargaPesanan` = '$ha', `TanggalPesanan` = '$currentDate' WHERE `pesanan`.`KodePesanan` = '$kp';";
    mysqli_query($Conn, $sql);
    foreach ($ArrayBuku as $KodeBuku) {
        $arrayquery = "UPDATE `buku` SET `StokBuku` = `StokBuku` - 1 WHERE `KodeBuku` = $KodeBuku";
        if ($Conn->query($arrayquery) === TRUE) {
            echo "Record with KodeBuku = $kodeBuku updated successfully<br>";
        } else {
            echo "Error updating record with KodeBuku = $kodeBuku: " . $Conn->error . "<br>";
        }
    }



    header("location:../view/keranjang.php");

    // echo "<br>";
    // echo $b = $_POST['b'] . "<br>";
    // echo $c = $_POST['c'] . "<br>";
    // echo $d = $_POST['d'] . "<br>";
} else {



    $kodebuku = $_GET['kodebuku'];
    $Pelanggan = $_SESSION['KP'];
    $Page = $_GET['Page'];

    $resultcheck = SearchKeranjang($Pelanggan, $Conn);
    // echo $resultcheck;

    if ($resultcheck == '1') {
        $sqlpesananmasuk = "SELECT * FROM pesanan WHERE KodePelanggan = '$Pelanggan' AND StatusPesanan = 'k'";
        $sqlpesananmasuk2 = mysqli_query($Conn, $sqlpesananmasuk);
        $sqlpesananmasuk3 = mysqli_fetch_array($sqlpesananmasuk2);
        $kodePesanan = $sqlpesananmasuk3['KodePesanan'];
        $kodePelanggan = $sqlpesananmasuk3['KodePelanggan'];
        $sqlkeranjangmasuk = "INSERT INTO `detailpesanan` (`KodeDetailPesanan`, `KodePesanan`, `KodeBuku`, `JumlahBuku`) VALUES (NULL, '$kodePesanan', '$kodebuku', '1');";

        mysqli_query($Conn, $sqlkeranjangmasuk);
        if ($Page == 'library') {
            header("location:../view/library.php");
        } elseif ($Page == 'Homepage') {
            header("location:../view/Homepage.php");
        }
    } elseif ($resultcheck == '0') {
        $sqlcreatekeranjang = "INSERT INTO `pesanan` (`KodePesanan`, `KodePelanggan`, `TanggalPesanan`, `StatusPesanan`, `HargaPesanan`) VALUES (NULL, '$Pelanggan', NULL, 'K', NULL);";
        $sqlcreatekeranjang2 = mysqli_query($Conn, $sqlcreatekeranjang);
        $sqlpesananmasuk = "SELECT * FROM pesanan WHERE KodePelanggan = '$Pelanggan' AND StatusPesanan = 'k'";
        $sqlpesananmasuk2 = mysqli_query($Conn, $sqlpesananmasuk);
        $sqlpesananmasuk3 = mysqli_fetch_array($sqlpesananmasuk2);
        $kodePesanan = $sqlpesananmasuk3['KodePesanan'];
        $kodePelanggan = $sqlpesananmasuk3['KodePelanggan'];
        $sqlkeranjangmasuk = "INSERT INTO `detailpesanan` (`KodeDetailPesanan`, `KodePesanan`, `KodeBuku`, `JumlahBuku`) VALUES (NULL, '$kodePesanan', '$kodebuku', '1');";
        $sqlkeranjangmasuk2 = mysqli_query($Conn, $sqlkeranjangmasuk);
        if ($Page == 'library') {
            header("location:../view/library.php");
        } elseif ($Page == 'Homepage') {
            header("location:../view/Homepage.php");
        }
    }
}
?>














<?php
include "../Templates/footer.php";
?>