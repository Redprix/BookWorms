<?php
include "../Templates/Header.php";
include "../Templates/Navbar.php";

function SearchBookInCart($Conn, $row)
{
    $KB = $row['KodeBuku'];
    $KP = $_SESSION['KP'];
    $checkdata = "SELECT EXISTS(SELECT * FROM detailpesanan AS t1 INNER JOIN pesanan AS t2 ON t1.KodePesanan = t2.KodePesanan WHERE t2.StatusPesanan = 'K' AND t2.KodePelanggan = '$KP' AND t1.KodeBuku = $KB) as isExists";
    $resultcheck = mysqli_query($Conn, $checkdata);
    $resultcheck2 = mysqli_fetch_assoc($resultcheck);
    return $resultcheck2['isExists'];
}

?>
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
<div class="container-fluid">
    <h3>Library</h3>
    <h5>All books</h5>
    <br>
    <div class="my-3">
        <?php
        $limit = 8; // Number of records to show per page
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $limit;
        $result = $Conn->query("SELECT KodeBuku, NamaBuku, KodePenulis, KodeKategori, StokBuku, CoverBuku, Synopsis, REPLACE(FORMAT(HargaBuku, 0), ',', '.') AS HargaBuku FROM buku WHERE StokBuku > 0 LIMIT $start, $limit");
        $total_records = $Conn->query("SELECT COUNT(*) FROM Buku")->fetch_row()[0];
        $total_pages = ceil($total_records / $limit);
        ?>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Active</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Dropdown</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
            </li>
        </ul>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Book Cover</th>
                    <th scope="col">Book Name</th>
                    <th scope="col">Book Price</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $o = 1;
                while ($row = $result->fetch_assoc()) {
                    // Display the data
                    $bookId = $row['KodeBuku'];
                ?>
                    <tr>

                        <td style="vertical-align: middle;"><?php echo $o ?></td>
                        <td><a class="text-warning" href="" data-bs-toggle="modal" data-bs-target="#ModalHomePage<?php echo $bookId ?>" href=""><img height="100px" width="70px" style="object-fit: cover; object-position:center;" src="../../Image/Collection/<?php echo $row['CoverBuku'] ?>" alt='Image'></a></td>
                        <td style="vertical-align: middle;">
                            <h5><a class="text-warning" href="" data-bs-toggle="modal" data-bs-target="#ModalHomePage<?php echo $bookId ?>" style="text-decoration: none;" href=""><?php echo $row['NamaBuku']; ?></a></h5>
                            <p>
                                category :
                                <?php

                                $UnexplodedKategori = $row['KodeKategori'];
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
                        </td>
                        <td style="vertical-align: middle;">IDR <?php echo $row['HargaBuku']; ?></td>
                        <?php
                        if (!empty($_SESSION['Level'])) {
                            if (SearchBookInCart($Conn, $row) == 1) {
                        ?>
                                <td style="vertical-align: middle;"><a href="../View/Keranjang.php" class="btn btn-outline-warning">Check Cart</a></td>
                            <?php
                            } elseif (SearchBookInCart($Conn, $row) == 0) {
                            ?>
                                <td style="vertical-align: middle;"><a href="../System/SysKeranjang.php?kodebuku=<?php echo $row['KodeBuku']; ?>&Page=library" class="btn btn-success">Add to cart</a></td>
                            <?php
                            }
                        } else {
                            ?>

                            <td style="vertical-align: middle;"><button disabled href="../System/SysKeranjang.php?kodebuku=<?php echo $row['KodeBuku']; ?>" class="btn btn-success">Add to cart</button><br>
                                <p class="text-danger">login to Access Shopping cart*</p>
                            </td>
                        <?php
                        }
                        ?>

                    </tr>
                    <div class="modal fade" id="ModalHomePage<?php echo $bookId ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="ModalLabelHomePage"><?php echo $row['NamaBuku'] ?></h1>
                                </div>
                                <div class="modal-body">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="../../Image/Collection/<?php echo $row['CoverBuku'] ?>" class="img-fluid rounded-start" style="width:200px; height:200px; object-position:cover;object-position:center;" data-bs-target="#ModalHomePage">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="container">

                                                <h5 class="card-title mb-3 " style="overflow:hidden; max-height:26px"><a class="text-warning" href="" data-bs-toggle="modal" data-bs-target="#ModalHomePage<?php echo $bookId ?>" style="text-decoration: none;"><?php echo $row['NamaBuku'] ?></a></h5>
                                                <p class="card-text scrollable-text2"><?php echo $row['Synopsis'] ?></p>

                                                <div class="row">

                                                    <p>
                                                        category :
                                                        <?php

                                                        $UnexplodedKategori = $row['KodeKategori'];
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
                                                        <p class="card-text"><small class="text-body-secondary">Stok : <?php echo $row['StokBuku'] ?></small></p>
                                                    </div>
                                                    <div class="col scrollable-text">
                                                        <p class="card-text"><small class="text-body-secondary">Harga : IDR <?php echo $row['HargaBuku'] ?> </small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <a class="text-warning" href="" data-bs-target="#ModalDetail<?php echo $bookId ?>" data-bs-toggle="modal">Detailed</a>

                                </div>
                                <div class="modal-footer">
                                    <?php
                                    if (!empty($_SESSION['Level'])) {
                                        if (SearchBookInCart($Conn, $row) == 1) {
                                    ?>
                                            <a href="../View/Keranjang.php" class="btn btn-outline-warning">Check Cart</a>
                                        <?php
                                        } elseif (SearchBookInCart($Conn, $row) == 0) {
                                        ?>
                                            <a href="../System/SysKeranjang.php?kodebuku=<?php echo $row['KodeBuku']; ?>&Page=library" class="btn btn-success">Add to cart</a>
                                        <?php
                                        }
                                    } else {
                                        ?>

                                        <button disabled href="../System/SysKeranjang.php?kodebuku=<?php echo $row['KodeBuku']; ?>" class="btn btn-success">Add to cart<br>
                                            <p class="text-danger">login to Access Shopping cart*</p>

                                        <?php
                                    }
                                        ?>
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
                                    <?php echo $row['Synopsis']  ?>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php
                    $o++;
                }
                ?>
            </tbody>
        </table>
        <?php
        // Define the number of page links to show on either side of the current page
        $count = 5; // Adjust this value to show more or fewer page links

        // Calculate the start and end page numbers
        $startPage = max(1, $page - $count);
        $endPage = min($total_pages, $page + $count);

        // Generate the page links
        for ($i = $startPage; $i <= $endPage; $i++) {
            if ($i == $page) {
                echo "<strong>$i</strong> "; // The current page number is not a link
            } else {
                echo "<a type='button' class='btn' href='?page=$i'>$i</a> ";
            }
        }

        // Optionally, you can add "First", "Last", "Previous", and "Next" links
        if ($startPage > 1) {
            echo "<a type='button' class='btn' href='?page=1'>First</a> ";
            echo "... ";
        }
        if ($page > 1) {
            echo "<a type='button' class='btn' href='?page=" . ($page - 1) . "'>Previous</a> ";
        }
        if ($page < $total_pages) {
            echo "<a type='button' class='btn' href='?page=" . ($page + 1) . "'>Next</a> ";
        }
        if ($endPage < $total_pages) {
            echo "... ";
            echo "<a type='button' class='btn' href='?page=$total_pages'>Last</a>";
        }
        ?>

    </div>
</div>


<?php
include "../Templates/Footer.php";
?>