<?php
include "../templates/header.php";
error_reporting(0);

$AccountForm = "Login";
$GetAccountForm = $_GET["AccountForm"];
if (!empty($GetAccountForm)) {
    $AccountForm = $GetAccountForm;
}

if (empty($_SESSION['Level'])) {

    if ($AccountForm == "Login") {
?>

        <style>
            .gradient-custom-2 {
                /* fallback for old browsers */
                background: #fccb90;

                /* Chrome 10-25, Safari 5.1-6 */
                background: -webkit-linear-gradient(to right, #29594c, #62675b, #7b896a, #bcbaa8);

                /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                background: linear-gradient(to right, #29594c, #62675b, #7b896a, #bcbaa8);
            }

            @media (min-width: 768px) {
                .gradient-form {
                    height: 100vh !important;
                }
            }

            @media (min-width: 769px) {
                .gradient-custom-2 {
                    border-top-right-radius: .3rem;
                    border-bottom-right-radius: .3rem;
                }
            }
        </style>

        <section class="h-100 gradient-form" style="background-color: #eee;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-xl-10">
                        <div class="card rounded-3 text-black">
                            <div class="row g-0">
                                <div class="col-lg-6">
                                    <div class="card-body p-md-4 mx-md-3">

                                        <div class="text-center">
                                            <!-- <img src="../../Image/System/Ehe.png" style="width: 120px;" alt="logo"> -->
                                            <h4 class=" mb-5 mt-2">Welcome to BookWorms</h4>
                                        </div>

                                        <form action="../System/Accounts.php?DataType=Login" method="post">
                                            <p>Please login to your account</p>

                                            <div class="form-outline mb-2">
                                                <input type="email" name="LoginEmail" class="form-control" placeholder="Email address">
                                                <label class="form-label">Username</label>
                                            </div>

                                            <div class="form-outline mb-2">
                                                <input type="password" name="LoginPassword" class="form-control">
                                                <label class="form-label">Password</label>
                                            </div>

                                            <div class="text-center pt-1 mb-5 pb-1">
                                                <button class="btn btn-primary btn-block mb-3 w-100" type="submit">Login</button>
                                                <!-- <a class="text-muted" href="#!">Forgot password?</a> -->
                                            </div>

                                            <div class="d-flex align-items-center justify-content-center pb-4">
                                                <p class="mb-0 me-2">Don't have an account?</p>
                                                <a type="button" href="AccountsForm.php?AccountForm=Register" class="btn btn-outline-warning">Register</a>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                                <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                    <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                        <h4 class="mb-4">The one and only online website StoreBooks</h4>
                                        <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php
    } elseif ($AccountForm == "Register") {
    ?>
        <section class="h-100" style="background-color: #eee;">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-12 col-xl-11">
                        <div class="card text-black" style="border-radius: 25px;">
                            <div class="card-body p-md-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                        <p class="text-center h1 fw-bold mx-1 mx-md-4">Sign up</p>

                                        <form class="mx-1 mx-md-4" action="../System/Accounts.php?DataType=Register" method="post">

                                            <div class="d-flex flex-row align-items-center mb-2">
                                                <!-- <i class="fas fa-envelope fa-lg me-3 fa-fw"></i> -->
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="email" class="form-control" name="RegisterEmail">
                                                    <label class="form-label">Email</label>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-2">
                                                <!-- <i class="fas fa-envelope fa-lg me-3 fa-fw"></i> -->
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="Text" class="form-control" name="CardNumber">
                                                    <label class="form-label">Card Number</label>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <!-- <i class="fas fa-lock fa-lg me-3 fa-fw"></i> -->
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="date" class="form-control" name="ExpiryDate">
                                                    <label class="form-label">Expiry date</label>
                                                </div>
                                                <div class="form-outline flex-fill mb-0 mx-1"></div>
                                                <div class="form-outline flex-fill mb-0 ">
                                                    <input class="form-control" name="CardCvv">
                                                    <label class="form-label">Cvv</label>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-row align-items-center mb-2">
                                                <!-- <i class="fas fa-envelope fa-lg me-3 fa-fw"></i> -->
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="Text" class="form-control" name="Address">
                                                    <label class="form-label">Adresses</label>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <!-- <i class="fas fa-lock fa-lg me-3 fa-fw"></i> -->
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="password" class="form-control" name="RegisterPassword">
                                                    <label class="form-label">Password</label>
                                                </div>
                                                <div class="form-outline flex-fill mb-0 mx-1"></div>
                                                <div class="form-outline flex-fill mb-0 ">
                                                    <input type="password" class="form-control" name="RegisterConfirmPassword">
                                                    <label class="form-label">Konfirmasi password</label>
                                                </div>
                                            </div>

                                            <!-- <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            </div> -->

                                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                <button type="Submit" class="btn btn-primary btn-lg">Register</button>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center pb-4">
                                                <p class="mb-0 me-2">Already have an account?</p>
                                                <a type="button" href="AccountsForm.php" class="btn btn-outline-warning">Sign In</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                        <img src="../../Image/System/draw1.webp" class="img-fluid" alt="Sample image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php
    }
}
?>



<?php
include "../Templates/Footer.php";
?>