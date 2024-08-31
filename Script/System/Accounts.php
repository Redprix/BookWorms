<?php
include "../Templates/Header.php";
$DataType = $_GET['DataType'];

if ($DataType == "Login") {
    $LoginEmail = $_POST['LoginEmail'];
    $LoginPassword = $_POST['LoginPassword'];

    $LoginSql = "SELECT * FROM pelanggan WHERE EmailPelanggan = '$LoginEmail' AND PasswordPelanggan ='$LoginPassword'";
    $RunLoginSql = mysqli_query($Conn, $LoginSql);

    $AccountIsTrue = mysqli_num_rows($RunLoginSql);

    if ($AccountIsTrue > 0) {

        $Data = mysqli_fetch_array($RunLoginSql);
        $Username = $Data['NamaPelanggan'];
        $Email = $Data['EmailPelanggan'];
        $Level = $Data['Level'];
        $KodePelanggan = $Data['KodePelanggan'];

        $_SESSION['Email'] = $Email;
        $_SESSION['Username'] = $Username;
        $_SESSION['Level'] = $Level;
        $_SESSION['KP'] = $KodePelanggan;

        header("location:../view/HomePage.php");
    }
} elseif ($DataType == "Register") {


    $RegisterEmail = $_POST['RegisterEmail'];
    $RegisterPassword = $_POST['RegisterPassword'];
    $RegisterConfirmPassword = $_POST['RegisterConfirmPassword'];
    $CardNumber = $_POST['CardNumber'];
    $ExpiryDate = $_POST['ExpiryDate'];
    $CardCvv = $_POST['CardCvv'];
    $Address = $_POST['Address'];
    $defaultlevel = 'U';
    if ($RegisterPassword == $RegisterConfirmPassword) {

        $SqlRegister = "INSERT INTO `pelanggan` (`KodePelanggan`, `EmailPelanggan`, `PasswordPelanggan`, `CardNumber`, `CardExp`, `CardCvv`, `AlamatPelanggan`, `Level`) VALUES (NULL, '$RegisterEmail', '$RegisterPassword', '$CardNumber', '$ExpiryDate', '$CardCvv', '$Address', '$defaultlevel');";
        $SqlRegisterRun = mysqli_query($Conn, $SqlRegister);
        header("location:../view/HomePage.php");
    } else {
        header("location:../view/AccountsForm.php?Register");
    }
} elseif ($DataType == "SignOut") {
    session_destroy();
    header("location:../view/HomePage.php");
}
