<?php 
include("../functions/init.php");

if(isset($_SESSION['login'])) {

   
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
            ?>
            <!--Greet new customer -->
            <div class="main-content">
                <section class="">


                    <h2 class="section-title mt-5 text-dark">Bills and Utilities</h2>
                    <p class="section-lead">
                        Top-up Airtime, Data and utilities
                    </p>


                    <div class="row" style="cursor: pointer">
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h4 class="text-dark">Airtime</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row mt-4 mb-5">
                                        <a href="./plans"><button data-toggle="modal" data-target="#transferModal"
                                                class="btn btn-primary section-lead">Fund Savings Wallet
                                            </button></a>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="card" data-toggle="modal" href="#classicModal">
                                <img src="assets/img/bill/1.png" class="img-fluid">
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="card">
                                <img src="assets/img/bill/2.png" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="card">
                                <img src="assets/img/bill/3.jpg" class="img-fluid">
                            </div>
                        </div>

                    </div>

                </section>
            </div>
        </div>
    </div>


    <?php include("include/component/modal.php"); ?>



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

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="ajax.js"></script>
</body>

</html>


<?php

  
} else {

    redirect(".././logout");

}
?>