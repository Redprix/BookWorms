<?php
include "../Templates/Header.php";
$AddType = "";
if (isset($_GET['AddType']))
    $AddType = $_GET["AddType"];
?>
<link rel="stylesheet" href="../External_Source/Css/HoverEffect.css">

<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100" style="position: sticky; top: 0;">
                <a href="HomePage.php" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">HomePage</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start w-100" id="menu">
                    <li class="nav-item clickable-block w-100">
                        <a href="ModerationForm.php" class="nav-link align-middle px-0 w-100">
                            <div class="block-content HoverEffect w-100">
                                <span class="ms-1 d-none d-sm-inline">Home</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item clickable-block w-100">
                        <a href="ModerationForm.php?AddType=Buku" class="nav-link align-middle px-0 w-100">
                            <div class="block-content HoverEffect w-100">
                                <span class="ms-1 d-none d-sm-inline">Books</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item clickable-block w-100">
                        <a href="ModerationForm.php?AddType=Kategori" class="nav-link align-middle px-0 w-100">
                            <div class="block-content HoverEffect w-100">
                                <span class="ms-1 d-none d-sm-inline">Category</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item clickable-block w-100">
                        <a href="ModerationForm.php?AddType=Penulis" class="nav-link align-middle px-0 w-100">
                            <div class="block-content HoverEffect w-100">
                                <span class="ms-1 d-none d-sm-inline">Author</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item clickable-block w-100">
                        <a href="ModerationForm.php?AddType=pelanggan" class="nav-link align-middle px-0 w-100">
                            <div class="block-content HoverEffect w-100">
                                <span class="ms-1 d-none d-sm-inline">User</span>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item clickable-block w-100">
                        <a href="ModerationForm.php?AddType=Purchase" class="nav-link align-middle px-0 w-100">
                            <div class="block-content HoverEffect w-100">
                                <span class="ms-1 d-none d-sm-inline">Purchases</span>
                            </div>
                        </a>
                    </li>


                </ul>
            </div>
        </div>
        <div class="col py-3">

            <div class="container my-5">
                <?php
                if ($AddType == "Kategori") {
                ?>
                    <div class="card w-100">
                        <div class="container">
                            <form class="my-3" action="../System/Moderation.php?input=Kategori" method="post">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">Category name</label>
                                            <input type="Text" class="form-control" name="NamaKategori" required>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </form>
                        </div>
                    </div>
                    <div class="mt-4">
                        <center>
                            <a class="text-success" data-bs-toggle="collapse" href="#collapsedatabuku">
                                --Category Data Entry--
                            </a>
                        </center>
                        <div class="collapse" id="collapsedatabuku">
                            <?php
                            $SqlSelectBuku = "SELECT * FROM Kategoribuku;";
                            $RunSelectBuku = mysqli_query($Conn, $SqlSelectBuku);
                            ?>
                            <table class="table table-secondary data" id="data">
                                <thead class="table-success">
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Available Category</th>
                                        <th scope="col">-</th>
                                        <th scope="col">-</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($RunSelectBuku1 = mysqli_fetch_array($RunSelectBuku)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $RunSelectBuku1['NamaKategori'] ?></td>
                                            <td><a type="button" class="btn btn-warning w-100" data-bs-toggle="modal" data-bs-target="#ModalActionUpdate<?php echo $KodeBuku ?>">Edit</a></td>
                                            <td><a type="button" class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#ModalActionDelete<?php echo $KodeBuku ?>">Delete</a></td>
                                        </tr>
                                    <?php
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                <?php
                } elseif ($AddType == "Penulis") {
                ?>
                    <div class="card w-100">
                        <div class="container">
                            <form class="my-3" action="../System/Moderation.php?input=Penulis" method="post">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">Author Name</label>
                                            <input type="Text" class="form-control" name="NamaPenulis" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">Author Contact (Preferably Gmail)</label>
                                            <input type="Email" class="form-control" name="EmailPenulis" required>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </form>
                        </div>
                    </div>
                    <div class="mt-4">
                        <center>
                            <a class="text-success" data-bs-toggle="collapse" href="#collapsedatabuku">
                                --Author Data Entry--
                            </a>
                        </center>
                        <div class="collapse" id="collapsedatabuku">
                            <?php
                            $SqlSelectBuku = "SELECT * FROM Penulis;";
                            $RunSelectBuku = mysqli_query($Conn, $SqlSelectBuku);
                            ?>
                            <table class="table table-secondary data" id="data">
                                <thead class="table-success">
                                    <tr>

                                        <th scope="col">No.</th>
                                        <th scope="col">Author Name</th>
                                        <th scope="col">Author Email</th>
                                        <th scope="col">-</th>
                                        <th scope="col">-</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($RunSelectBuku1 = mysqli_fetch_array($RunSelectBuku)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $RunSelectBuku1['NamaPenulis'] ?></td>
                                            <td><?php echo $RunSelectBuku1['EmailPenulis'] ?></td>
                                            <td><a type="button" class="btn btn-warning w-100" data-bs-toggle="modal" data-bs-target="#ModalActionUpdate<?php echo $KodeBuku ?>">Edit</a></td>
                                            <td><a type="button" class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#ModalActionDelete<?php echo $KodeBuku ?>">Delete</a></td>
                                        </tr>
                                    <?php
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php
                } elseif ($AddType == "Buku") {
                ?>
                    <div class="card w-100">
                        <div class="container">
                            <form class="my-3" action="../System/Moderation.php?input=Buku" enctype="multipart/form-data" method="post">
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label class="form-label">Book name</label>
                                                    <input type="Text" class="form-control" name="NamaBuku" required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label class="form-label">Author</label>
                                                    <select name="KodePenulis" id="" class="form-control">
                                                        <?php
                                                        $GetPenulis = "SELECT * FROM Penulis";
                                                        $GetPenulisRun = mysqli_query($Conn, $GetPenulis);
                                                        while ($GetPenulisRun1 = mysqli_fetch_array($GetPenulisRun)) {
                                                        ?>
                                                            <option value="<?php echo $GetPenulisRun1['KodePenulis'] ?>"><?php echo $GetPenulisRun1['NamaPenulis']; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <div class="form-text">Masukkan Penulis Baru <a href="ModerationForm.php?AddType=Author">Disini</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="">Book Prive</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">Rp.</span>
                                                    <input type="Number" class="form-control" name="HargaBuku" aria-label="Amount (to the nearest dollar)">
                                                    <!-- <span class="input-group-text">.00</span> -->
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label for="">Stock</label>
                                                <input type="Number" class="form-control" name="StokBuku">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="" class="form-label">Sinopsis/ Detail</label>
                                                <textarea name="UnfilteredSynopsis" class="form-control" id="" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="">Cover image</label>
                                                <input type="file" name="CoverBuku" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <br>
                                        <div class="card">
                                            <div class="container my-1">
                                                <label class="form-label">Category</label>
                                                <div id="dynamicInput" class="container">
                                                    <div class="inputField row">
                                                        <select name="KodeKategori1" class="my-1 w-100 col">
                                                            <?php include "../System/BukuModerationFormLink.php"; ?>
                                                        </select>
                                                        <button type="button" class="col-2 remove btn btn-sm btn-danger my-1">x</button>
                                                    </div>
                                                </div>
                                                <button style="border: 0;" type="button" class="w-100 my-1 btn btn-success" id="addInput">Add Categories</button>
                                                <input type="hidden" id="inputCount" name="inputCount" value="1">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary mt-3 w-100">Submit</button>
                            </form>
                        </div>
                    </div>
            </div>
            <div class="mt-4">
                <center>
                    <a class="text-success" data-bs-toggle="collapse" href="#collapsedatabuku">
                        --Recent Book Data Entry--
                    </a>
                </center>
                <div class="collapse" id="collapsedatabuku">
                    <?php
                    $SqlSelectBuku = "SELECT KodeBuku, KodeKategori, NamaBuku, StokBuku, NamaPenulis, DateAdded, REPLACE(FORMAT(HargaBuku, 0), ',', '.') AS HargaBuku FROM buku INNER JOIN penulis ON buku.KodePenulis = penulis.KodePenulis ORDER BY DateAdded ASC;";
                    $RunSelectBuku = mysqli_query($Conn, $SqlSelectBuku);
                    ?>
                    <table class="table table-secondary data" id="data">
                        <thead class="table-success">
                            <tr>

                                <th scope="col">No</th>
                                <th scope="col">Date Added</th>
                                <th scope="col">Book Name</th>
                                <th scope="col">Author Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Available Stock</th>
                                <th scope="col">Price</th>
                                <th scope="col">-</th>
                                <th scope="col">-</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            while ($RunSelectBuku1 = mysqli_fetch_array($RunSelectBuku)) {
                                $KodeBuku = $RunSelectBuku1['KodeBuku'];
                                $kodekategoris = explode(',', $RunSelectBuku1['KodeKategori']);
                                $kategoriNames = [];

                                foreach ($kodekategoris as $kodekategori) {
                                    $SqlGetKategoriName = "SELECT NamaKategori FROM kategoribuku WHERE kodekategori = '$kodekategori'";
                                    $SqlGetKategoriName2 = mysqli_query($Conn, $SqlGetKategoriName);
                                    $EndKategori = mysqli_fetch_assoc($SqlGetKategoriName2);
                                    $kategoriNames[] = $EndKategori['NamaKategori'];
                                }
                                $kategoriNamesString = implode(', ', $kategoriNames);
                            ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $RunSelectBuku1['DateAdded'] ?></td>
                                    <td><?php echo $RunSelectBuku1['NamaBuku'] ?></td>
                                    <td><?php echo $RunSelectBuku1['NamaPenulis'] ?></td>
                                    <td><?php echo $kategoriNamesString ?></td>
                                    <td><?php echo $RunSelectBuku1['StokBuku'] ?></td>
                                    <td>Rp<?php echo $RunSelectBuku1['HargaBuku'] ?></td>
                                    <td><a type="button" class="btn btn-warning w-100" data-bs-toggle="modal" data-bs-target="#ModalActionUpdate<?php echo $KodeBuku ?>">Edit</a></td>
                                    <td><a type="button" class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#ModalActionDelete<?php echo $KodeBuku ?>">Del</a></td>
                                </tr>
                            <?php
                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php
                } elseif ($AddType == "Purchase") {
        ?>

        <?php
                } else {
        ?>
            <div class="container-fluid">
                <h3 class="mb-3">Moderation page</h3>
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <?php
                            $sqlnumberbooks = "SELECT * FROM Buku;";
                            $sqlnumberbooks2 = mysqli_query($Conn, $sqlnumberbooks);
                            $sqlnumberbooks3 = mysqli_num_rows($sqlnumberbooks2);
                            ?>
                            <div class="col">
                                <div class="card" style="color:white; background:transparent; Border:None; -webkit-backdrop-filter: blur(5px); backdrop-filter: blur(5px); text-align:center; background: rgb(0,123,175); background: linear-gradient(222deg, rgba(0,123,175,1) 0%, rgba(0,137,255,1) 24%, rgba(203,248,255,1) 100%);">
                                    <h3 class="card-title mt-1">Books</h3>
                                    <center>
                                        <hr width="30%" style="margin-top: -5px;">
                                    </center>
                                    <div class="card-body">
                                        <h4><?php echo $sqlnumberbooks3 ?></h4>
                                    </div>
                                    <div class="card-footer text-muted bg-dark">
                                        <a href="ModerationForm.php?AddType=Books" style="text-decoration:none;display: block;">Add Book</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $sqlnumberauthor = "SELECT * FROM penulis";
                            $sqlnumberauthor2 = mysqli_query($Conn, $sqlnumberauthor);
                            $sqlnumberauthor3 = mysqli_num_rows($sqlnumberauthor2);
                            ?>
                            <div class="col">
                                <div class="card" style="color:white; background:transparent; Border:None; -webkit-backdrop-filter: blur(5px); backdrop-filter: blur(5px); text-align:center; background: rgb(0,123,175); background: linear-gradient(222deg, rgba(0,123,175,1) 0%, rgba(0,137,255,1) 24%, rgba(203,248,255,1) 100%);">
                                    <h3 class="card-title mt-1">Author</h3>
                                    <center>
                                        <hr width="30%" style="margin-top: -5px;">
                                    </center>
                                    <div class="card-body">
                                        <h4><?php echo $sqlnumberauthor3 ?></h4>
                                    </div>
                                    <div class="card-footer text-muted bg-dark">
                                        <a href="ModerationForm.php?AddType=Author" style="text-decoration:none;display: block;">Add Author</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <?php
                            $sqlnumberkategori = "SELECT * FROM kategoribuku";
                            $sqlnumberkategori2 = mysqli_query($Conn, $sqlnumberkategori);
                            $sqlnumberkategori3 = mysqli_num_rows($sqlnumberkategori2);
                            ?>
                            <div class="col">
                                <div class="card" style="color:white; background:transparent; Border:None; -webkit-backdrop-filter: blur(5px); backdrop-filter: blur(5px); text-align:center; background: rgb(0,123,175); background: linear-gradient(222deg, rgba(0,123,175,1) 0%, rgba(0,137,255,1) 24%, rgba(203,248,255,1) 100%);">
                                    <h3 class="card-title mt-1">Book Category</h3>
                                    <center>
                                        <hr width="30%" style="margin-top: -5px;">
                                    </center>
                                    <div class="card-body">
                                        <h4><?php echo $sqlnumberkategori3 ?></h4>
                                    </div>
                                    <div class="card-footer text-muted bg-dark">
                                        <a href=" ModerationForm.php?AddType=Kategori" style="text-decoration:none;display: block; ">Add Category</a>
                                    </div>
                                </div>
                            </div>

                            <?php
                            $sqlnumberuser = "SELECT * FROM pelanggan";
                            $sqlnumberuser2 = mysqli_query($Conn, $sqlnumberuser);
                            $sqlnumberuser3 = mysqli_num_rows($sqlnumberuser2);
                            ?>
                            <div class="col">
                                <div class="card" style="color:white; background:transparent; Border:None; -webkit-backdrop-filter: blur(5px); backdrop-filter: blur(5px); text-align:center; background: rgb(0,123,175); background: linear-gradient(222deg, rgba(0,123,175,1) 0%, rgba(0,137,255,1) 24%, rgba(203,248,255,1) 100%);">
                                    <h3 class="card-title mt-1">User</h3>
                                    <center>
                                        <hr width="30%" style="margin-top: -5px;">
                                    </center>
                                    <div class="card-body">
                                        <h4><?php echo $sqlnumberuser3 ?> </h4>
                                    </div>
                                    <div class="card-footer text-muted bg-dark">
                                        <a style="text-decoration:none; display: block;">Privilages are on development</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col ">
                                <div class="card bg-success" style="border: none;">
                                    <div class="m-2">
                                        <h3 class="text-center card-title mt-1">Book Purchases</h3>
                                        <center>
                                            <hr width="30%" style="margin-top: -5px;">
                                        </center>
                                        <div class="row">
                                            <div class="col-8">

                                                <p class="card-text">The number of all purchases</p>
                                            </div>
                                            <div class="col">
                                                :
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-8">
                                                <p class="card-text">The number of unconfirmed purchases</p>
                                            </div>
                                            <div class="col">
                                                :
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-8">
                                                <p class="card-text">The number of Confirmed purchases</p>
                                            </div>
                                            <div class="col">
                                                :
                                            </div>
                                        </div>


                                    </div>

                                    <div class="card-footer text-muted bg-dark">
                                        <a href="ModerationForm.php?" style="text-decoration:none;display: block; color:green">Check Data</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>
<?php
                }
?>
</div>

</div>
</div>
</div>

<?php
include "../Templates/Footer.php";
?>