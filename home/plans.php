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
                <section class="section">



                    <div class="section-body">

                        <div class="hero-inner">
                            <h2 class="text-dark">Saving Plans</h2>
                            <p class="lead">Enjoy a well developed student-in-mind savings package that meet your
                                everyday needs.
                            </p>
                        </div>


                        <!-- <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 pl-0">
                                <div class="card card-statistic-2">
                                    <div class="card-wrap">
                                        <div class="card-header">
                                            <h4 class="lead mb-2">YOUR CLASSIC SAVINGS</h4>
                                        </div>
                                        <div class="card-body">
                                            ₦ <?php echo number_format($t_users['wallet'] + $t_ref_earn) ?>
                                        </div>
                                        <div class="card-header">
                                            <h4 style="cursor: pointer" class="lead mt-3 mb-4 text-primary"
                                                data-toggle="modal" data-target="#payModal"><b>SAVE NOW</b>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 pl-0">
                                <div class="card card-statistic-2">
                                    <div class="card-wrap">
                                        <div class="card-header">
                                            <h4 class="lead mb-2">YOUR FLEX SAVINGS</h4>
                                        </div>
                                        <div class="card-body">
                                            ₦ <?php echo number_format($t_users['wallet'] + $t_ref_earn) ?>
                                        </div>
                                        <div class="card-header">
                                            <h4 style="cursor: pointer" class="lead mt-3 mb-4 text-primary"
                                                data-toggle="modal" data-target="#payModal"><b>SAVE NOW</b>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 pl-0">
                                <div class="card card-statistic-2">
                                    <div class="card-wrap">
                                        <div class="card-header">
                                            <h4 class="lead mb-2">YOUR CAMPUS SAVINGS</h4>
                                        </div>
                                        <div class="card-body">
                                            ₦ <?php echo number_format($t_users['wallet'] + $t_ref_earn) ?>
                                        </div>
                                        <div class="card-header">
                                            <h4 style="cursor: pointer" class="lead mt-3 mb-4 text-primary"
                                                data-toggle="modal" data-target="#payModal"><b>SAVE NOW</b>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --->

                        <div class="row mt-5">
                            <div class="col-12 col-md-4 col-lg-4 pl-0">
                                <div class="pricing">
                                    <div class="pricing-title">
                                        Classic Plan
                                    </div>
                                    <div class="pricing-padding">
                                        <div class="pricing-price">
                                            <div>NGN2,000</div>
                                            <div>2 months and above</div>
                                        </div>
                                        <div class="pricing-details">
                                            <div class="pricing-item">
                                                <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                <div class="pricing-item-label">2 Month Saving Plan</div>
                                            </div>
                                            <div class="pricing-item">
                                                <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                <div class="pricing-item-label">3 Month Saving Plan</div>
                                            </div>
                                            <div class="pricing-item">
                                                <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                <div class="pricing-item-label">6 Month Saving Plan</div>
                                            </div>
                                            <div class="pricing-item">
                                                <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                <div class="pricing-item-label">Custom Saving Plan</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pricing-cta">
                                        <a data-toggle="modal" href="#classicModal">Choose Plan <i
                                                class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4 pl-0">
                                <div class="pricing pricing-highlight">
                                    <div class="pricing-title">
                                        FLEX PLAN
                                    </div>
                                    <div class="pricing-padding">
                                        <div class="pricing-price">
                                            <div>NGN5,000</div>
                                            <div>flexible</div>
                                        </div>
                                        <div class="pricing-details">
                                            <div class="pricing-item">
                                                <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                <div class="pricing-item-label">Target Savings</div>
                                            </div>
                                            <div class="pricing-item">
                                                <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                <div class="pricing-item-label">Save as you go</div>
                                            </div>
                                            <div class="pricing-item">
                                                <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                <div class="pricing-item-label">Unlock on target</div>
                                            </div>
                                            <div class="pricing-item">
                                                <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                <div class="pricing-item-label">30 days Minimum savings duration</div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="pricing-cta">
                                        <a data-toggle="modal" href="#flexModal">Choose Plan <i
                                                class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4 pl-0">
                                <div class="pricing">
                                    <div class="pricing-title">
                                        Campus Plan
                                    </div>
                                    <div class="pricing-padding">
                                        <div class="pricing-price">
                                            <div>NGN200</div>
                                            <div>per day</div>
                                        </div>
                                        <div class="pricing-details">
                                            <div class="pricing-item">
                                                <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                <div class="pricing-item-label">Exam Saver</div>
                                            </div>
                                            <div class="pricing-item">
                                                <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                <div class="pricing-item-label">Save for odd academdic times</div>
                                            </div>
                                            <div class="pricing-item">
                                                <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                <div class="pricing-item-label">Unlocked at the end of semester</div>
                                            </div>
                                            <div class="pricing-item">
                                                <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                <div class="pricing-item-label">Save as you wish</div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="pricing-cta">
                                        <a data-toggle="modal" href="#campusModal">Choose Plan <i
                                                class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
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
</body>

</html>


<?php

  
} else {

    redirect(".././logout");

}
?>