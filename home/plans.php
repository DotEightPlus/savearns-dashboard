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

                        <div class="hero-inner mt-5">
                            <h2 class="text-dark">Saving Plans</h2>
                            <p class="lead">Enjoy a well developed student-in-mind savings package that meet your
                                everyday needs.
                            </p>
                        </div>



                        <div class="row mt-5">
                            <div class="col-12 col-md-4 col-lg-4 pl-0">
                                <div class="pricing">
                                    <div class="pricing-title">
                                        Classic Plan
                                    </div>
                                    <div class="pricing-padding">
                                        <div class="pricing-price">

                                            <?php
                                            if(isset($clcsvs)) {

                                                echo '

                                                <div>₦'.number_format($clcsvs['amt']).'</div>
                                                <div class="text-danger" id="demo"></div>
                                                
                                                ';
                                            } else {

                                                echo '
                                                
                                                <div>₦2,000</div>
                                                <div>2 months and above</div>
                                                
                                                ';
                                            }
                                        ?>

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
                                    <?php
                                        if(isset($clcsvs)) {

                                            echo '
                                            <div class="pricing-cta">
                                            <a class="bg-primary text-white" data-toggle="modal" href="#fundclassicModal">Fund Classic Wallet <i
                                                    class="fas fa-arrow-right"></i></a>
                                        </div>
                                            ';
                                        } else {

                                            echo '
                                            <div class="pricing-cta">
                                            <a data-toggle="modal" href="#classicModal">Choose Plan <i
                                                    class="fas fa-arrow-right"></i></a>
                                        </div>
                                            ';
                                        }

                                    ?>

                                </div>
                            </div>



                            <div class="col-12 col-md-4 col-lg-4 pl-0">
                                <div class="pricing">
                                    <div class="pricing-title">
                                        FLEX PLAN
                                    </div>
                                    <div class="pricing-padding">
                                        <div class="pricing-price">
                                            <?php
                                            if(isset($flsvs)) {
                                                echo '
                                                <div>₦'.number_format($lsrs['amt']).'</div>
                                                <div class="text-dark">Target: &nbsp;₦'.number_format($flsvs['amt']).'</div>
                                                ';
                                            } else {
                                                
                                                echo '
                                                <div>NGN5,000</div>
                                                <div>flexible</div>
                                                ';
                                            }
                                            ?>

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

                                    <?php
                                    //when target is reached
                                    if(isset($flsvs) && $lsrs['amt'] == $flsvs['amt']) {

                                        echo '
                                        <div class="pricing-cta">
                                        <a class="bg-dark text-white" data-toggle="modal" href="#withdModal">Withdraw funds<i
                                                class="fas fa-arrow-right"></i></a>
                                            </div>
                                        ';
                                    } else {
                                    if(isset($flsvs)) {

                                        echo '
                                        <div class="pricing-cta">
                                        <a class="bg-primary text-white" data-toggle="modal" href="#fundflexModal">Fund Flex Wallet <i
                                                class="fas fa-arrow-right"></i></a>
                                    </div>
                                        ';
                                    } else {

                                        echo '
                                        <div class="pricing-cta">
                                        <a data-toggle="modal" href="#flexModal">Choose Plan <i
                                                class="fas fa-arrow-right"></i></a>
                                    </div>
                                        ';
                                    } 
                                }
                                    ?>

                                </div>
                            </div>


                            <div class="col-12 col-md-4 col-lg-4 pl-0">
                                <div class="pricing">
                                    <div class="pricing-title">
                                        Campus Plan
                                    </div>
                                    <div class="pricing-padding">
                                        <div class="pricing-price">
                                            <?php
                                            if(isset($cmsvs)) {
                                            
                                                echo '
                                                <div>₦'.$cmsvs['amt'].'</div>
                                                <div>1 Week Before Exams</div>
                                                ';
                                                
                                            } else {
                                                
                                                echo '
                                                <div>NGN200</div>
                                                <div>per day</div>
                                                ';
                                                
                                            }
                                            ?>

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
                                        <?php
                                        if(isset($cmsvs)) {
                                            
                                            echo '
                                            <a class="bg-primary text-white" data-toggle="modal" href="#fundcampusModal"> Fund Campus Wallet<i
                                            class="fas fa-arrow-right"></i></a>
                                            ';
                                        } else {

                                            echo '
                                            <a data-toggle="modal" href="#campusModal">Choose Plan <i
                                                class="fas fa-arrow-right"></i></a>
                                            ';
                                        }
                                        ?>

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

//campus plan notification
if(isset($_SESSION['campusplan'])) {

    $msg = $_SESSION['campusplan'];

    if($msg == "Success") {
   
    echo "<script>
        iziToast.success({
          title: 'Success!',
          message: 'Campus Plan Activated Successfully',
          position: 'topCenter'
        });</script>";

    unset($_SESSION['campusplan']);
    } else {

        echo "<script>
        iziToast.error({
          title: 'Error!',
          message: 'There was an error processing your savings',
          position: 'topCenter'
        });</script>";

        unset($_SESSION['campusplan']);
    }
}

if(isset($_SESSION['flexplan'])) {

    $msg = $_SESSION['flexplan'];

    if($msg == "Success") {
   
    echo "<script>
        iziToast.success({
          title: 'Success!',
          message: 'Flex Plan Activated Successfully',
          position: 'topCenter'
        });</script>";

    unset($_SESSION['flexplan']);
    } else {

        echo "<script>
        iziToast.error({
          title: 'Error!',
          message: 'There was an error processing your savings',
          position: 'topCenter'
        });</script>";

        unset($_SESSION['flexplan']);
    }
}

if(isset($_SESSION['classicplan'])) {

    $msg = $_SESSION['classicplan'];

    if($msg == "Success") {
   
    echo "<script>
        iziToast.success({
          title: 'Success!',
          message: 'Classic Plan Activated Successfully',
          position: 'topCenter'
        });</script>";

    unset($_SESSION['classicplan']);
    } else {

        echo "<script>
        iziToast.error({
          title: 'Error!',
          message: 'There was an error processing your savings',
          position: 'topCenter'
        });</script>";

        unset($_SESSION['classicplan']);
    }
}


} else {

    redirect(".././logout");

}
?>