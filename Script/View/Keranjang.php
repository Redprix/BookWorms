<?php
include "../Templates/Header.php";
include "../Templates/Navbar.php";

$KodePelanggan = $_SESSION['KP'];
$SqlGetCart = "SELECT * FROM pesanan INNER JOIN pelanggan ON pesanan.kodepelanggan = pelanggan.kodepelanggan INNER JOIN detailpesanan ON pesanan.kodepesanan = detailpesanan.kodepesanan INNER JOIN buku ON detailpesanan.KodeBuku = buku.KodeBuku where pesanan.KodePelanggan = '$KodePelanggan' AND StatusPesanan = 'K' OR StatusPesanan = 'P';";
$sqlGetCart2 = mysqli_query($Conn, $SqlGetCart);
$sqlGetCart3 = mysqli_fetch_array($sqlGetCart2);
$sqlgetcartrow = mysqli_num_rows($sqlGetCart2);



?>

<section class="h-100 h-custom" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div class="card">
                    <div class="card-body p-4">

                        <form action="../System/SysKeranjang.php?sys=toprocess&kpesanan=<?php echo $sqlGetCart3['KodePesanan'] ?>" method="POST">
                            <div class="row">

                                <div class="col-lg-7">
                                    <h5 class="mb-3"><a href="Homepage.php" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                                    <hr>

                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div>
                                            <p class="mb-1">Shopping cart</p>
                                            <p class="mb-0">You have <?php echo $sqlgetcartrow; ?> items in your cart</p>
                                        </div>
                                    </div>
                                    <?php
                                    $SqlGetCart = "SELECT * FROM pesanan INNER JOIN pelanggan ON pesanan.kodepelanggan = pelanggan.kodepelanggan INNER JOIN detailpesanan ON pesanan.kodepesanan = detailpesanan.kodepesanan INNER JOIN buku ON detailpesanan.KodeBuku = buku.KodeBuku where pesanan.KodePelanggan = '$KodePelanggan' AND StatusPesanan = 'K' OR StatusPesanan = 'P';";
                                    $sqlGetCart2 = mysqli_query($Conn, $SqlGetCart);
                                    $i = 0;
                                    $kodeBukuArray = [];
                                    while ($sqlGetCart3 = mysqli_fetch_array($sqlGetCart2)) {
                                        $kodeBukuArray[] = $sqlGetCart3['KodeBuku']; ?>
                                        <div class="card mb-3 mb-lg-2">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex flex-row align-items-center">
                                                        <div class="ms-3">
                                                            <h5><?php echo $sqlGetCart3['NamaBuku'] ?></h5>
                                                            <p class="small mb-0">Current available stock : <?php echo $sqlGetCart3['StokBuku'] ?></p>
                                                            <h6>Price : IDR <?php echo $sqlGetCart3['HargaBuku'] ?> / 1x</h6>
                                                        </div>
                                                    </div>

                                                    <?php if ($sqlGetCart3['StatusPesanan'] != 'K') {
                                                    ?>
                                                        <div class="d-flex flex-row align-items-center">
                                                            <div style="width: 70px;">
                                                                <input disabled style="border-radius: 10px 0px 0px 10px;" class="form-control fw-normal mb-0" type="number" value="<?php echo $sqlGetCart3['JumlahBuku'] ?>">
                                                            </div>
                                                        </div>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <div class="d-flex flex-row align-items-center">
                                                            <div style="width: 70px;">
                                                                <input style="border-radius: 10px 0px 0px 10px;" disabled class="form-control fw-normal mb-0" type="number" name="berapa<?php echo $i ?>" value="<?php echo $sqlGetCart3['JumlahBuku'] ?>">
                                                                <input type="hidden" name="harga<?php echo $i ?>" value="<?php echo $sqlGetCart3['HargaBuku'] ?>">

                                                            </div>
                                                            <div style="width: 70px;">
                                                                <a style="border-radius: 0px 10px 10px 0px;" href="../System/SysKeranjang.php?sys=delkrj&id=<?php echo $sqlGetCart3['KodeBuku'] ?>&pesanan=<?php echo $sqlGetCart3['KodePesanan'] ?>" class="btn btn-outline-danger">X</a>
                                                            </div>
                                                        </div>
                                                    <?php
                                                        // echo '<input type="hidden" name="totalItems" value="' . $i . '">';
                                                        $i++;
                                                    }
                                                    ?>
                                                </div>

                                            </div>
                                        </div>
                                    <?php

                                    }
                                    $_SESSION['arrayData'] = $kodeBukuArray;

                                    $SqlGetCart = "SELECT * FROM pesanan INNER JOIN pelanggan ON pesanan.kodepelanggan = pelanggan.kodepelanggan INNER JOIN detailpesanan ON pesanan.kodepesanan = detailpesanan.kodepesanan INNER JOIN buku ON detailpesanan.KodeBuku = buku.KodeBuku where pesanan.KodePelanggan = '$KodePelanggan' AND StatusPesanan = 'K' OR StatusPesanan = 'P';";
                                    $sqlGetCart2 = mysqli_query($Conn, $SqlGetCart);
                                    $sqlGetCart3 = mysqli_fetch_array($sqlGetCart2);
                                    ?>
                                </div>
                                <?php
                                if ($sqlGetCart3['StatusPesanan'] == 'K') {

                                ?>
                                    <div class="col-lg-5">

                                        <div class="card bg-success text-white rounded-3">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-center mb-4">
                                                    <h5 class="mb-0">Confirmation</h5>
                                                </div>

                                                <div class="form-outline form-white mb-4">
                                                    <input name="a" disabled type="text" id="typeName" class="form-control form-control-lg" siez="17" placeholder="Cardholder's Name" value="<?php echo $sqlGetCart3['EmailPelanggan'] ?>" />
                                                    <label class="form-label" for="typeName">Receiver's Email</label>
                                                </div>

                                                <div class="form-outline form-white mb-4">
                                                    <input name="b" required type="number" id="typeText" class="form-control form-control-lg" siez="17" placeholder="1234 5678 9012 3457" minlength="19" maxlength="19" value="<?php echo $sqlGetCart3['CardNumber'] ?>" />
                                                    <label class="form-label" for="typeText">Card Number</label>
                                                </div>

                                                <div class="row mb-4">
                                                    <div class="col-md-6">
                                                        <div class="form-outline form-white">
                                                            <input name="c" required type="date" id="typeExp" class="form-control form-control-lg" placeholder="MM/YYYY" value=<?php echo $sqlGetCart3['CardExp'] ?> size="7" id="exp" minlength="7" maxlength="7" />
                                                            <label class="form-label" for="typeExp">Expiration</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-outline form-white">
                                                            <input name="d" required type="number" id="typeText" class="form-control form-control-lg" placeholder="&#9679;&#9679;&#9679;" value=<?php echo $sqlGetCart3['CardCvv'] ?> size="1" minlength="3" maxlength="3" />
                                                            <label class="form-label" for="typeText">Cvv</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php
                                                $SqlGetCart = "SELECT * FROM pesanan INNER JOIN pelanggan ON pesanan.kodepelanggan = pelanggan.kodepelanggan INNER JOIN detailpesanan ON pesanan.kodepesanan = detailpesanan.kodepesanan INNER JOIN buku ON detailpesanan.KodeBuku = buku.KodeBuku where pesanan.KodePelanggan = '$KodePelanggan' AND StatusPesanan = 'K' OR StatusPesanan = 'P';";
                                                $sqlGetCart2 = mysqli_query($Conn, $SqlGetCart);

                                                $sqlGetCart3 = mysqli_fetch_array($sqlGetCart2);

                                                $Sqlprice = "SELECT 'HargaBuku' FROM pesanan INNER JOIN pelanggan ON pesanan.kodepelanggan = pelanggan.kodepelanggan INNER JOIN detailpesanan ON pesanan.kodepesanan = detailpesanan.kodepesanan INNER JOIN buku ON detailpesanan.KodeBuku = buku.KodeBuku where pesanan.KodePelanggan = '$KodePelanggan' AND StatusPesanan = 'K' OR StatusPesanan = 'P';";
                                                $sqlprice2 = mysqli_query($Conn, $SqlGetCart);
                                                // var_dump($sqlprice3)
                                                $summary = 0;

                                                while ($row = mysqli_fetch_assoc($sqlprice2)) {
                                                    $summary += $row['HargaBuku'];
                                                }
                                                $formatted_summary = number_format($summary, 0, '.');




                                                ?>
                                                <hr class="my-4">

                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-2">Discount%</p>
                                                    <p class="mb-2">None</p>
                                                </div>

                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-2">Shipping</p>
                                                    <p class="mb-2">Free</p>
                                                </div>

                                                <div class="d-flex justify-content-between mb-4">
                                                    <p class="mb-2">Total</p>
                                                    <p class="mb-2">IDR <?php echo $formatted_summary; ?></p>
                                                    <input type="hidden" name="hargakhir" value="<?php echo $summary ?>">
                                                </div>
                                                <?php

                                                ?>
                                                <button type="submit" class="btn btn-warning btn-lg">
                                                    <div class="d-flex justify-content-between">
                                                        <span><i class="fa-solid fa-check"></i> Confirm data & items</span>
                                                    </div>
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                <?php
                                } else {
                                ?>

                                    <div class="col-lg-5">

                                        <div class="card bg-success text-white rounded-3">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-center mb-4">
                                                    <h5 class="mb-0">Confirmation</h5>
                                                </div>

                                                <div class="form-outline form-white mb-4">
                                                    <input disabled type="text" id="typeName" class="form-control form-control-lg" siez="17" placeholder="Cardholder's Name" value="<?php echo $sqlGetCart3['EmailPelanggan'] ?>" />
                                                    <label class="form-label" for="typeName">Receiver's Email</label>
                                                </div>

                                                <div class="form-outline form-white mb-4">
                                                    <input disabled type="text" id="typeText" class="form-control form-control-lg" siez="17" placeholder="1234 5678 9012 3457" value="<?php echo $sqlGetCart3['CardNumber'] ?>" minlength="19" maxlength="19" />
                                                    <label class="form-label" for="typeText">Card Number</label>
                                                </div>

                                                <div class="row mb-4">
                                                    <div class="col-md-6">
                                                        <div class="form-outline form-white">
                                                            <input disabled type="date" id="typeExp" class="form-control form-control-lg" placeholder="MM/YYYY" size="7" id="exp" value="<?php echo $sqlGetCart3['CardExp'] ?>" minlength="7" maxlength="7" />
                                                            <label class="form-label" for="typeExp">Expiration</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-outline form-white">
                                                            <input disabled type="number" id="typeText" class="form-control form-control-lg" placeholder="&#9679;&#9679;&#9679;" value="<?php echo $sqlGetCart3['CardCvv'] ?>" size="1" minlength="3" maxlength="3" />
                                                            <label class="form-label" for="typeText">Cvv</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php
                                                $sqlGetCart3 = mysqli_fetch_array($sqlGetCart2);
                                                if ($sqlGetCart3['StatusPesanan'] != 'K') {


                                                ?>
                                                    <hr class="my-4">

                                                    <div class="d-flex justify-content-between">
                                                        <p class="mb-2">Discount%</p>
                                                        <p class="mb-2">None</p>
                                                    </div>

                                                    <div class="d-flex justify-content-between">
                                                        <p class="mb-2">Shipping</p>
                                                        <p class="mb-2">Free</p>
                                                    </div>

                                                    <div class="d-flex justify-content-between mb-4">
                                                        <p class="mb-2">Total</p>
                                                        <p class="mb-2">$4818.00</p>

                                                    </div>
                                                <?php
                                                }

                                                ?>

                                                <button type="submit" disabled class="btn btn-warning btn-lg">
                                                    <div class="d-flex justify-content-between">
                                                        <span>waiting for Confirmation</span>
                                                    </div>
                                                </button>

                                            </div>
                                        </div>
                                    </div>

                                <?php
                                }
                                ?>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include "../Templates/Footer.php";

?>