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
                            <h2 class="mb-3">Get free ₦200</h2>
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
                        <form method="POST" action="https://checkout.flutterwave.com/v3/hosted/pay">
                            <p>Fill the form below to add funds to your wallet</p>
                            <div class="form-group">
                                <label>Input Amount</label>
                                <div class="input-group">

                                    <input type="number" name="amount" class="form-control">
                                </div>
                            </div>

                            <input type="hidden" name="public_key"
                                value="FLWPUBK_TEST-252c57dacbb153862b1a4865fe33c9f6-X" />
                            <input type="hidden" name="customer[email]" value="<?php echo $t_users['email'] ?>" />
                            <input type="hidden" name="customer[phone_number]" value="<?php echo $t_users['tel'] ?>" />
                            <input type="hidden" name="customizations[title]" value="Savearns" />
                            <input type="hidden" name="customer[name]" value="<?php echo $t_users['fname'] ?>" />
                            <input type="hidden" name="tx_ref" value="<?php echo md5(rand(0, 999)); ?>" />
                            <input type="hidden" name="currency" value="NGN" />
                            <input type="hidden" name="redirect_url"
                                value="http://localhost/freelance/savearns-dashboard/home/./fundwallet" />
                            <input type="hidden" name="customizations[logo]"
                                value="https://savearns.com/assets/1.png" />
                            <div class="form-group mb-0">
                                <button type="submit" class="form-control btn-primary" placeholder="Password"
                                    name="password">Fund
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
if(isset($_SESSION['paymsg'])) {

    $msg = $_SESSION['paymsg'];

    if($msg == "Your Wallet has been funded successfully") {
   
    echo "<script>
        iziToast.success({
          title: 'Success!',
          message: 'Your Wallet has been funded successfully',
          position: 'topCenter'
        });</script>";

    unset($_SESSION['paymsg']);
    } else {

        echo "<script>
        iziToast.error({
          title: 'Error!',
          message: 'There was an error processing your payment',
          position: 'topCenter'
        });</script>";

        unset($_SESSION['paymsg']);
    }
}
  
} else {

    redirect(".././logout");

}
?>