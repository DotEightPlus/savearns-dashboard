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

                        <div class="section-header">
                            <h1>TRANSACTION HISTORY</h1>
                        </div>

                        <div class="row mt-5">

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Ref</th>
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $data = $_SESSION['login'];
                                                $trsql = "SELECT * FROM t_his WHERE `username` = '$data' ORDER BY `id` desc";
                                                $tes  = query($trsql);
                                                if(row_count($tes) == '') {

                                                    echo "No transaction yet";
                                                } else {

                                                    while($row = mysqli_fetch_array($tes)) {
                                                
                                                
                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo $row['t_ref']; ?></th>
                                                    <td>NGN<?php echo number_format($row['amt']); ?></td>
                                                    <td><?php echo ucwords($row['status']); ?></td>
                                                    <td><?php echo date('l, F d, Y  - h:i:sa', strtotime($row['datepaid'])); ?>
                                                    </td>
                                                </tr>
                                                <?php 
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
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