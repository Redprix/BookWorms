<?php
include "../Templates/Header.php";
$input = $_GET['input'];

if ($input == 'Kategori') {
    $NamaKategori = $_POST['NamaKategori'];

    $SqlKategori = "INSERT INTO `kategoribuku` (`KodeKategori`, `NamaKategori`) VALUES (NULL, '$NamaKategori')";
    $SqlKategoriRun = mysqli_query($Conn, $SqlKategori);
    header("Location:../View/moderationform.php?AddType=Kategori");
} elseif ($input == 'Penulis') {
    $NamaPenulis = $_POST['NamaPenulis'];
    $EmailPenulis = $_POST['EmailPenulis'];

    $SqlPenulis = "INSERT INTO `penulis`(`KodePenulis`, `NamaPenulis`, `EmailPenulis` ) VALUES (NULL,'$NamaPenulis','$EmailPenulis')";
    $sqlPenulisRun = mysqli_query($Conn, $SqlPenulis);
    header("Location:../View/moderationform.php?AddType=Penulis");
} elseif ($input == 'Buku') {
    $DateAdded = date('Y-m-d');
    $inputCount = $_POST['inputCount'];
    $NamaBuku = $_POST['NamaBuku'];
    $KodePenulis = $_POST['KodePenulis'];
    $HargaBuku = $_POST['HargaBuku'];
    $StokBuku = $_POST['StokBuku'];
    // $KategoriBuku1 = $_POST['KodeKategori1'];
    // $KategoriBuku2 = $_POST['KodeKategori2'];
    // $KategoriBuku3 = $_POST['KodeKategori3'];
    // $KategoriBuku4 = $_POST['KodeKategori4'];
    // $KategoriBuku5 = $_POST['KodeKategori5'];
    // $KategoriBuku6 = $_POST['KodeKategori6'];

    // $KategoriAll = array($KategoriBuku1, $KategoriBuku2, $KategoriBuku3, $KategoriBuku4, $KategoriBuku5, $KategoriBuku6);
    // $ImplodedKategori = implode(", ", $KategoriAll);

    for ($i = 1; $i <= $inputCount; $i++) {
        // Check if the current input has been submitted
        if (isset($_POST['KodeKategori' . $i])) {
            // Get the value of the current input
            echo $value = $_POST['KodeKategori' . $i];
            // Add the value to the data array
            $data[]  = $value;
        }
    }

    // exit();
    // Implode the data array into a single string using a delimiter
    $ImplodedKategori = implode(',', $data);

    $UnfilteredSynopsis = $_POST['UnfilteredSynopsis'];
    $FilteredSynopsis = str_replace("'", "", $UnfilteredSynopsis);

    $target_dir = "../../Image/Collection/";

    // Check if directory exists
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true);
    }
    // $target_dir = "Image/";
    $target_file = $target_dir . basename($_FILES["CoverBuku"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    // if ($_FILES["CoverBuku"]["size"] > 900000) {
    //     echo "Sorry, your file is too large.";
    //     $uploadOk = 0;
    // }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {

        $new_name = uniqid() . '.' . $imageFileType;
        $new_target_file    = $target_dir . $new_name;

        move_uploaded_file($_FILES["CoverBuku"]["tmp_name"], $new_target_file);

        $SqlForUpload = "INSERT INTO `buku` (`KodeBuku`, `NamaBuku`, `KodePenulis`, `KodeKategori`, `HargaBuku`, `StokBuku`, `CoverBuku`, `Synopsis`, `DateAdded`) VALUES (NULL, '$NamaBuku', '$KodePenulis', '$ImplodedKategori', '$HargaBuku', '$StokBuku', '$new_name', '$FilteredSynopsis', '$DateAdded');";

        $SqlForUploadRun = mysqli_query($Conn, $SqlForUpload);
        if ($SqlForUploadRun) {
            header("Location:../View/moderationform.php?AddType=Buku");
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}




include "../Templates/Footer.php";
