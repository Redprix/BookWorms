<nav class="navbar navbar-dark bg-dark navbar-expand-lg bg-body-tertiary sticky sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="../View/Homepage.php">BookWorms</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <!-- <li class="nav-item"><a class="nav-link" href="../View/ModerationForm.php">moderation page</a></li> -->
                <li class="nav-item"><a class="nav-link" href="../View/library.php">Library</a></li>

                <?php
                if (isset($_SESSION['Level']) and $_SESSION['Level'] == 'U') {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../View/Keranjang.php">MyCart</a>
                    </li>
                <?php
                }
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Books
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Newest Release</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">TopRated</a></li>
                    </ul>
                </li>

                <?php
                if (isset($_SESSION['Level']) and $_SESSION['Level'] == 'A') {

                ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            moderation
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../View/ModerationForm.php?AddType=Kategori">Tambah Kategori</a></li>
                            <li><a class="dropdown-item" href="../View/ModerationForm.php?AddType=Penulis">Tambah Penulis</a></li>
                            <li><a class="dropdown-item" href="../View/moderationform.php?AddType=buku">Tambah Buku</a></li>
                            <!-- <li><a class="dropdown-item" href="../View/ModerationForm.php?AddType=Books">Add Books</a></li> -->
                        </ul>
                    </li>
                <?php } ?>

            </ul>
            <?php
            if (empty($_SESSION['Level'])) {

            ?>
                <div class="d-flex">
                    <a type="Button" class="btn btn-outline-primary" href="../View/AccountsForm.php">Login</a>
                </div>
            <?php
            }
            if (!empty($_SESSION['Level'])) {
            ?>
                <div class="d-flex">
                    <a type="Button" class="btn btn-outline-danger" href="../System/Accounts.php?DataType=SignOut">LogOut</a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</nav>