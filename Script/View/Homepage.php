<?php
include "../Templates/Header.php";
include "../Templates/Navbar.php";

?>
<!-- <nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
</nav> -->
<div class="container-fluid">

    <h3 class="my-3">Available Now</h3>
    <div class="row">
        <?php
        $SqlTampilanHome = "SELECT KodeBuku, NamaBuku, KodePenulis, KodeKategori, StokBuku, CoverBuku, Synopsis,  REPLACE(FORMAT(HargaBuku, 0), ',', '.') AS HargaBuku FROM buku WHERE StokBuku > 0 ORDER BY RAND();";
        $SqlTampilanHomeRun = mysqli_query($Conn, $SqlTampilanHome);

        $j = "0";
        while ($SqlTampilanHomeRun1 = mysqli_fetch_array($SqlTampilanHomeRun) and $j < 6) {
            $bookId = $SqlTampilanHomeRun1['KodeBuku'];
        ?>

            <div class="col-4">
                <div class="card mb-3" style="max-width: 540px; background-color: #9a906e; border: none;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="../../Image/Collection/<?php echo $SqlTampilanHomeRun1['CoverBuku'] ?>" class="img-fluid rounded-start" style="width:200px; height:200px; object-fit:cover; object-position:center" data-bs-target="#ModalHomePage">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <style>
                                    .scrollable-text {
                                        overflow-x: scroll;
                                        white-space: nowrap;
                                    }

                                    .scrollable-text::-webkit-scrollbar {
                                        display: none;
                                    }

                                    .scrollable-text2 {
                                        overflow-y: scroll;
                                        max-height: 70px;
                                    }
                                </style>

                                <h5 class="card-title mb-3" style="overflow:hidden; max-height:26px"><a class="text-warning" href="" data-bs-toggle="modal" data-bs-target="#ModalHomePage<?php echo $bookId ?>" style="text-decoration: none;"><?php echo $SqlTampilanHomeRun1['NamaBuku'] ?></a></h5>
                                <p class="card-text" style="max-height:70px; overflow: hidden;"><?php echo $SqlTampilanHomeRun1['Synopsis'] ?></p>
                                <div class="row">
                                    <div class="col">
                                        <p class="card-text"><small class="text-body-secondary">Available : <?php echo $SqlTampilanHomeRun1['StokBuku'] ?></small></p>
                                    </div>
                                    <div class="col scrollable-text">
                                        <p class="card-text"><small class="text-body-secondary">Price : IDR <?php echo $SqlTampilanHomeRun1['HargaBuku'] ?> </small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="ModalHomePage<?php echo $bookId ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="ModalLabelHomePage"><?php echo $SqlTampilanHomeRun1['NamaBuku'] ?></h1>
                        </div>
                        <div class="modal-body">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="../../Image/Collection/<?php echo $SqlTampilanHomeRun1['CoverBuku'] ?>" class="img-fluid rounded-start" style="width:200px; height:200px; object-position:cover;object-position:center;" data-bs-target="#ModalHomePage">
                                </div>
                                <div class="col-md-8">
                                    <div class="container">

                                        <h5 class="card-title mb-3 " style="overflow:hidden; max-height:26px"><a class="text-warning" href="" data-bs-toggle="modal" data-bs-target="#ModalHomePage<?php echo $bookId ?>" style="text-decoration: none;"><?php echo $SqlTampilanHomeRun1['NamaBuku'] ?></a></h5>
                                        <p class="card-text scrollable-text2"><?php echo $SqlTampilanHomeRun1['Synopsis'] ?></p>

                                        <div class="row">

                                            <p>
                                                Kategori Buku :
                                                <?php

                                                $UnexplodedKategori = $SqlTampilanHomeRun1['KodeKategori'];
                                                $ExplodedKategori = explode(",", $UnexplodedKategori);

                                                $SemuaKategoribuku = array();
                                                for ($i = 0; $i < count($ExplodedKategori); $i++) {
                                                    $SemuaKategoribuku[] = $ExplodedKategori[$i];
                                                }
                                                foreach ($SemuaKategoribuku as $KategoriSistem) {
                                                    // Check if $KategoriSistem is not empty
                                                    if (!empty($KategoriSistem)) {
                                                        // SQL query to get the book name based on the book id
                                                        $SqlKategori = "SELECT `NamaKategori` FROM `kategoribuku` WHERE `KodeKategori` = '$KategoriSistem'";

                                                        // Execute the query
                                                        $ResultKategori = mysqli_query($Conn, $SqlKategori);

                                                        // Fetch the ResultKategori
                                                        if ($FetchingKategori = mysqli_fetch_assoc($ResultKategori)) {
                                                            $NamaKategoriFiltered = $FetchingKategori['NamaKategori'];
                                                            echo " $NamaKategoriFiltered,";  // This will print the book id and name
                                                        }
                                                    }
                                                }
                                                ?>
                                            </p>
                                        </div>
                                        <div class="row" style="margin-top:-10px">
                                            <div class="col">
                                                <p class="card-text"><small class="text-body-secondary">Stok : <?php echo $SqlTampilanHomeRun1['StokBuku'] ?></small></p>
                                            </div>
                                            <div class="col scrollable-text">
                                                <p class="card-text"><small class="text-body-secondary">Harga : IDR <?php echo $SqlTampilanHomeRun1['HargaBuku'] ?> </small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <a class="text-warning" href="" data-bs-target="#ModalDetail<?php echo $bookId ?>" data-bs-toggle="modal">Detailed</a>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success">Add to shopping cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="ModalDetail<?php echo $bookId ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Description</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?php echo $SqlTampilanHomeRun1['Synopsis']  ?>
                        </div>

                    </div>
                </div>
            </div>
        <?php
            $j++;
        }
        ?>
    </div>

    <center>
        <hr style="width: 80%;">
    </center>
    <p>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Novels</li>
            <li class="breadcrumb-item" aria-current="page"><a class="text-warning" href="#">See More</a></li>
        </ol>
    </nav>
    <div class="row g-0">
        <?php
        $SqlTampilanHome = "SELECT KodeBuku, NamaBuku, KodePenulis, KodeKategori, StokBuku, CoverBuku, Synopsis, REPLACE(FORMAT(HargaBuku, 0), ',', '.') AS HargaBuku FROM buku WHERE FIND_IN_SET('1', kodekategori) > 0;";
        $SqlTampilanHomeRun = mysqli_query($Conn, $SqlTampilanHome);
        while ($SqlTampilanHomeRun1 = mysqli_fetch_array($SqlTampilanHomeRun) and $j < 9) {
            $bookId = $SqlTampilanHomeRun1['KodeBuku'];
        ?>
            <style>

            </style>

            <div class="col-1">
                <img src="../../Image/Collection/<?php echo $SqlTampilanHomeRun1['CoverBuku'] ?>" class="img-fluid" style="width: 100%; height: 100%; aspect-ratio:3/4; object-fit: cover;object-position: center;" data-bs-target="#ModalHomePage">
            </div>


        <?php
        }
        ?>
    </div>
    <hr>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Comic&Artbook</li>
            <li class="breadcrumb-item" aria-current="page"><a class="text-warning" href="#">See More</a></li>
        </ol>
    </nav>
    <div class="row g-0">
        <?php
        $SqlTampilanHome = "SELECT KodeBuku, NamaBuku, KodePenulis, KodeKategori, StokBuku, CoverBuku, Synopsis, REPLACE(FORMAT(HargaBuku, 0), ',', '.') AS HargaBuku FROM buku WHERE CONCAT(',', `kodekategori`, ',') REGEXP ',(2|9),';";
        $SqlTampilanHomeRun = mysqli_query($Conn, $SqlTampilanHome);
        while ($SqlTampilanHomeRun1 = mysqli_fetch_array($SqlTampilanHomeRun) and $j < 9) {
            $bookId = $SqlTampilanHomeRun1['KodeBuku'];
        ?>
            <style>

            </style>

            <div class="col-1">
                <img src="../../Image/Collection/<?php echo $SqlTampilanHomeRun1['CoverBuku'] ?>" class="img-fluid" style="width: 100%; height: 100%; aspect-ratio:3/4; object-fit: cover;object-position: center;" data-bs-target="#ModalHomePage">
            </div>


        <?php
        }
        ?>
    </div>
    <hr>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Other</li>
            <li class="breadcrumb-item" aria-current="page"><a class="text-warning" href="#">See More</a></li>
        </ol>
    </nav>
    <div class="row g-0">
        <?php
        $SqlTampilanHome = "SELECT KodeBuku, NamaBuku, KodePenulis, KodeKategori, StokBuku, CoverBuku, Synopsis, REPLACE(FORMAT(HargaBuku, 0), ',', '.') AS HargaBuku FROM buku WHERE NOT CONCAT(',', `kodekategori`, ',') REGEXP ',(1|2|9),';";
        $SqlTampilanHomeRun = mysqli_query($Conn, $SqlTampilanHome);
        while ($SqlTampilanHomeRun1 = mysqli_fetch_array($SqlTampilanHomeRun) and $j < 9) {
            $bookId = $SqlTampilanHomeRun1['KodeBuku'];
        ?>
            <style>

            </style>

            <div class="col-1">
                <img src="../../Image/Collection/<?php echo $SqlTampilanHomeRun1['CoverBuku'] ?>" class="img-fluid" style="width: 100%; height: 100%; aspect-ratio:3/4; object-fit: cover;object-position: center;" data-bs-target="#ModalHomePage">
            </div>


        <?php
        }
        ?>
    </div>
    <p>Test Session : <?php if (isset($_SESSION['Level'])) echo $_SESSION['Level']; ?></p>


</div>


<?php
include "../Templates/Footer.php";
?>