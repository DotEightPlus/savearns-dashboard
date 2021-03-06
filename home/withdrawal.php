<?php 
include("../functions/init.php");

if(isset($_SESSION['login'])) {

    $user = $_SESSION['login'];
   
?>



<!DOCTYPE html>
<html lang="en">

<?php include("include/head.php") ?>

<body class="layout-2">
    <div id="app">
        <div class="main-wrapper">


            <?php
            //get user details
            user_details(); 
            
             include("include/nav.php"); 
             include("include/sidebar.php");

             $sql = "SELECT SUM(`amt`) AS total FROM savings WHERE `usname` = '$user'";
             $res = query($sql);

             if(row_count($res) == null) {

                echo 'You have no savings record yet';
                
             } else {

                $roow = mysqli_fetch_array($res);
             }

             
            ?>
            <!--Greet new customer -->
            <div class="main-content">
                <section class="section">



                    <div class="section-body">


                        <div class="hero-inner mt-5">
                            <h2 class="text-dark">Withdrawal</h2>
                            <p class="lead">Savings automatically get credited into main wallet after maturity</p>
                        </div>

                        <div class="row col-lg-12">
                            <div class="card card-statistic-2 col-lg-5 ml-lg-2">
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4 class="lead mb-2">YOUR WALLET BALANCE</h4>
                                    </div>
                                    <div class="card-body">
                                        ₦ <?php echo number_format($t_users['wallet'] + $t_ref_earn) ?>
                                    </div>
                                    <div class="row mt-4 mb-5 ">
                                        <button data-toggle="modal" data-target="#transferModal"
                                            class="btn btn-primary section-lead">Transfer Funds
                                        </button>

                                        <button data-toggle="modal" data-target="#withdModal"
                                            class="btn btn-primary section-lead">Withdraw Funds
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-statistic-2 col-lg-5 ml-lg-5">
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4 class="lead mb-2">YOUR TOTAL SAVINGS</h4>
                                    </div>
                                    <div class="card-body">
                                        ₦ <?php echo number_format($roow['total']) ?>
                                    </div>
                                    <div class="row mt-4 mb-5 ">
                                        <a href="./plans"><button data-toggle="modal" data-target="#transferModal"
                                                class="btn btn-primary section-lead">Fund Savings Wallet
                                            </button></a>

                                    </div>

                                </div>
                            </div>
                            <?php

                            if(isset($clcsvs)) {

                                echo '

                                <div class="card card-statistic-2 col-lg-4 ml-lg-1">
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4 class="lead mb-2">CLASSIC WALLET</h4>
                                    </div>
                                    <div class="card-body">
                                        ₦ '.number_format($clcsvs['amt']).'
                        </div>
                        <div class="row mt-4 mb-5 ">
                            <button data-toggle="modal" href="#fundclassicModal"
                                class="btn btn-primary section-lead">Fund Classic Savings Wallet
                            </button>
                        </div>
                    </div>
            </div>
            ';

            }

            if(isset($flsvs)) {

            echo '

            <div class="card card-statistic-2 col-lg-3 ml-lg-1">
            <div class="card-wrap">
                <div class="card-header">
                    <h4 class="lead mb-2">FLEX WALLET</h4>
                </div>
                <div class="card-body">
                    ₦ '.number_format($lsrs['amt']).'
                        </div>
                        <div class="row mt-4 mb-5 ">';
                        //when target is reached
                        if(isset($flsvs) && $lsrs['amt'] == $flsvs['amt']) {

                            echo '
                            <button data-toggle="modal" href="#withdModal" class="btn btn-primary bg-dark section-lead">Withdraw Funds
                            </button>
                            ';
                        } else {
                        if(isset($flsvs)) {

                            echo '
                            <button data-toggle="modal" href="#fundflexModal" class="btn btn-primary section-lead">Fund
                                Flex
                                Savings Wallet
                            </button>
                            ';
                        }
                    }
                    echo '
                            
                        </div>
                    </div>
            </div>

            ';
            }


            if(isset($cmsvs)) {

            echo '
            <div class="card card-statistic-2 col-lg-4 ml-lg-1">
            <div class="card-wrap">
                <div class="card-header">
                    <h4 class="lead mb-2">CAMPUS WALLET</h4>
                </div>
                <div class="card-body">
                    ₦ '.number_format($cmsvs['amt']).'
                        </div>
                        <div class="row mt-4 mb-5 ">
                            <button data-toggle="modal" href="#fundclassicModal"
                                class="btn btn-primary section-lead">Fund
                                Campus Savings Wallet
                            </button>
                        </div>
                    </div>
            </div>

            ';
            }

            ?>


                        </div>




                    </div>

            </div>
            </section>
        </div>
    </div>
    </div>


    <?php
 include("include/footer.php");
 include("include/component/modal.php"); ?>




    <!-- General JS Scripts -->
    <script src="assets/modules/jquery.min.js"></script>
    <script src="assets/modules/popper.js"></script>
    <script src="assets/modules/tooltip.js"></script>
    <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="assets/modules/moment.min.js"></script>
    <script src="assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="assets/modules/sticky-kit.js"></script>

    <!-- JS Libraies -->
    <script src="assets/modules/izitoast/js/iziToast.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="assets/js/page/modules-toastr.js"></script>

    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="ajax.js"></script>
    <script>
    // Set the date we're counting down to
    var countDownDate = new Date("<?php echo $campdura ?>").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        document.getElementById("demo").innerHTML = days + "days " + hours + "hrs " +
            minutes + "min " + seconds + "sec ";

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "Withdraw funds";
        }
    }, 1000);
    </script>
</body>

</html>
<?php
}
?>