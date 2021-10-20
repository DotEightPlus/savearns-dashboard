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
            
                //check if user is a new customer 
                 user_details();

                if($t_users['tpin'] == '' && $t_users['wallet'] == '') {
                
                include("include/navcust.php"); 
                include("include/newcust.php");

                //new user page
                include("include/component/newuser.php");
               
                //footer
                include("include/footer.php");
                } else {

                
                //check if user is a new customer and hasn't activate account
                if($t_users['tpin'] != '' && $t_users['wallet'] == '') {

                include("include/navcust.php"); 
                include("include/newcust.php");

                //wallet empty page
                include("include/component/wallet.php");

                //footer
                include("include/footer.php");
                    
                } else {
                    
                    include("include/nav.php"); 
                    include("include/sidebar.php");
                

                    //display welcome page
                    include("include/component/home.php");

                    //footer
                    include("include/footer.php");
                
                
                }

                    
                } 
            ?>
        </div>
    </div>


    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="col-12 col-md-12 col-sm-12">
                        <div class="empty-state" data-height="400">
                            <div class="empty-state-icon">
                                <i class="fas fa-gift"></i>
                            </div>
                            <h2 class="mb-3">Get free ₦250</h2>
                            <p class="lead">
                                You and your friends earn cash reward when they signup and save with your referral link
                                or code.
                            </p>
                            <a href="#" class="btn btn-primary mt-4">Need to see how you've performed? <i
                                    class="fas fa-gift"></i> <i class="fas fa-gift"></i></a>
                            <a href="#" class="mt-4 bb">View Referral Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" tabindex="-1" role="dialog" id="payModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Fund Wallet</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-12 col-md-12 col-sm-12">

                        <?php fundwallet(); ?>
                        <form method="POST">
                            <p>Fill the form below to add funds to your wallet</p>
                            <div class="form-group">
                                <label>Input Amount</label>
                                <div class="input-group">

                                    <input type="number" name="amount" class="form-control">
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" id="fundwallet" class="form-control btn-primary"
                                    placeholder="Password" name="password">Fund
                                    Now </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




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