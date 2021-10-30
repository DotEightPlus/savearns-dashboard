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

                        <div class="section-header">
                            <h1>WITHDRAWAL</h1>
                        </div>

                        <h2 class="section-title ml-4">Available Balance:
                            <b>NGN<?php echo number_format($t_users['wallet'] + $t_ref_earn) ?></b>
                            <div class="row  mt-3">
                                <button data-toggle="modal" data-target="#withdModal"
                                    class="btn btn-primary section-lead">Withdraw Funds
                                </button>
                            </div>
                        </h2>


                        <h2 class="section-title ml-4">Total Savings:
                            <b>NGN<?php echo number_format($roow['total']) ?></b>
                            <!---<div class="row  mt-3">
                                <button data-toggle="modal" data-target="#withdModal"
                                    class="btn btn-primary section-lead">Withdraw Funds
                                </button>
                            </div>-->
                        </h2>





                        <div class="row mt-5 ml-1">

                            <?php
                            
                            //savings details
                            $svs = "SELECT * FROM `savings` WHERE `usname` = '$data'";
                            $rvs = query($svs);
                            if(row_count($rvs) == null) {

                                echo '<h2 class="section-title mt-0">You have no savings record yet</b>';
                                
                                
                            } else {
                                
                            while($row = mysqli_fetch_array($rvs)) {
                            
                            ?>

                            <div class="col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4><?php echo $row['plan']  ?></h4>

                                        <a data-collapse="#mycard-collapse" class="pl-5 ml-md-5" href="#"><i
                                                class="fas fa-minus"></i></a>
                                    </div>
                                    <div class="collapse show" id="mycard-collapse">
                                        <div class="card-body text-dark">
                                            Amount Saved : <b>NGN <?php echo number_format($row['amt'])  ?></b><br />
                                            Description : <b><?php echo $row['descrip'] ?></b><br />
                                            Date of Savings :
                                            <b><?php echo date('l, F d, Y', strtotime($row['datepaid'])); ?></b><br />
                                        </div>
                                        <div class="card-footer">
                                            Maturity Date:
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
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