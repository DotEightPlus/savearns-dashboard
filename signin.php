<?php include("functions/init.php"); 
if(isset($_SESSION['login'])) {

    unset($_SESSION['login']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Savearns | Sign In</title>


    <!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->
    <meta name="description" content="Savearns - Welcome Back">
    <meta name="keywords" content="Savearns | Sign In">
    <meta property="og:title" content="Savearns | Sign In" />
    <meta property="og:image" content="assets/img/1.png" />
    <meta property="og:url" content="https://dashboard.savearns.com/signin" />
    <meta property="og:site_name" content="Savearns | Sign In" />
    <meta property="og:description" content="Savearns - Welcome Back" />
    <meta charset="UTF-8">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="theme-color" content="#34459C">

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/1.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/1.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/1.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/1.png">
    <meta name="msapplication-TileImage" content="assets/img/1.png">


    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <link href="assets/js/bootstrap.min.css" rel="stylesheet" />


    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100">
    <!-- Navbar -->
    <nav
        class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3  navbar-transparent mt-4">
        <div class="container">


        </div>
    </nav>
    <!-- End Navbar -->
    <section class="min-vh-100 mb-8">
        <div class="page-header align-items-start min-vh-50 pt-0 pb-11 m-3 border-radius-lg"
            style="background-image: url('assets/img/1.png');">

        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10">
                <div class="col-xl-8 col-lg-5 col-md-7 mx-auto" id="signup">
                    <div class="card z-index-0">
                        <div class="card-header text-center pt-4">
                            <h2>Welcome Back</h2>
                        </div>

                        <div class="card-body">
                            <form role="form text-left">
                                <div class="row">
                                    <div class="mb-3 col-lg-6">
                                        <label>Username</label>
                                        <input type="text" id="luname" class="form-control" placeholder="Input Username"
                                            onfocus="usr()">
                                    </div>
                                    <div class="mb-3 col-lg-6">
                                        <label>Password</label>
                                        <input type="password" id="lpword" class="form-control"
                                            placeholder="Input your Password" onfocus="prr()">
                                    </div>
                                </div>

                                <div class="text-center">
                                    <p class="text-danger" id="lmsg"></p>
                                    <button type="button" id="lsub" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign
                                        In</button>
                                </div>
                                <h5 class="text-sm mt-3 mb-0 text-center"><a href="./forgot"
                                        class="text-dark font-weight-bolder">Forgot password</a>
                                    &nbsp;|&nbsp;
                                    <a href="./signup" class="text-dark font-weight-bolder">Create a free account</a>
                                </h5>
                            </form>
                        </div>
                    </div>
                </div>



                <div style="display:none" class="col-xl-8 col-lg-5 col-md-7 mx-auto" id="verify">
                    <div class="card z-index-0">
                        <div class="card-header text-center pt-4">
                            <h5>Verify your account</h5>
                            <p>Check your mail for an otp code</p>
                        </div>

                        <div class="card-body">
                            <form role="form text-left">
                                <div class="mb-3">
                                    <label>Input OTP</label>
                                    <input type="number" id="otpper" class="form-control"
                                        placeholder="Input one time password" aria-label="Name"
                                        aria-describedby="otp-addon" onclick="otpr()">

                                    <input type="email" id="otpmail" class="form-control"
                                        value="<?php echo $_SESSION['usemail'] ?>" hidden>
                                </div>


                                <div class="text-center">
                                    <p class="text-danger" id="vmsg"></p>
                                    <p class="text-danger" id="rvmsg"></p>
                                    <button type="button" id="vsub" class="btn bg-gradient-dark w-100 my-4 mb-2">Verify
                                        Account</button>
                                    <p style="cursor: pointer"
                                        class="text-sm mt-3 mb-0 text-center text-dark font-weight-bolder" id="rotp">
                                        Resend OTP</p>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--   Core JS Files   -->
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
    //open verify page by default
    function otpVerify() {
        document.getElementById('verify').style.display = 'block';
    }

    //close signup page
    function signupClose() {
        document.getElementById('signup').style.display = 'none';
    }

    //erase validations
    function usr() {
        document.getElementById("lmsg").innerHTML = '';
    }

    function prr() {
        document.getElementById("lmsg").innerHTML = '';
    }

    function otpr() {
        document.getElementById("vmsg").innerHTML = '';
    }
    </script>
    <script src="ajax.js"></script>
</body>

</html>

</html>