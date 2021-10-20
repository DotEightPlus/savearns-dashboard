<?php 
include("../functions/init.php");

if(isset($_SESSION['login'])) {
user_details();

   
?>



<!DOCTYPE html>
<html lang="en">

<?php 
include("include/head.php"); 

?>

<body class="layout-2">
    <div id="app">
        <div class="main-wrapper">

            <?php 
            include("include/navcust.php"); 
            include("include/newcust.php");
             ?>

            <!--Greet new customer -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Hello <?php echo strtoupper($t_users['usname']) ?></h1>
                        <!---<div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                            <div class="breadcrumb-item"><a href="#">Layout</a></div>
                            <div class="breadcrumb-item">Transprent Sidebar</div>
                        </div>-->
                    </div>

                    <div class="section-body">
                        <h2 class="section-title">Activate Account</h2>
                        <p class="section-lead">Activate your account to continue </p>

                        <div class="row">
                            <div class="col-12 col-sm-12 col-lg-12">

                                <div class="card">

                                    <div class="card-body">
                                        <?php
                                       
                                        $email = $t_users['email'];
                                        $tranref = md5(rand(0, 999));

                                        $customer_email = $email;
                                        $amount = "200";  
                                        $currency = "NGN";
                                        $txref = $tranref; // ensure you generate unique references per transaction.
                                        $PBFPubKey = "FLWPUBK-aec1e883ede5d055024d042a034f18c9-X"; //get your public key from the dashboard.
                                        $redirect_url = "./pay?txref=$txref";

                                        // Flutterwave RAVE Payment API
                                        $curl = curl_init();

                                        curl_setopt_array($curl, array(
                                        CURLOPT_URL => "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay",
                                        CURLOPT_RETURNTRANSFER => true,
                                        CURLOPT_CUSTOMREQUEST => "POST",
                                        CURLOPT_POSTFIELDS => json_encode([
                                            'amount'=>$amount,
                                            'customer_email'=>$customer_email,
                                            'currency'=>$currency,
                                            'txref'=>$txref,
                                            'PBFPubKey'=>$PBFPubKey,
                                            'redirect_url'=>$redirect_url,
                                        ]),
                                        CURLOPT_HTTPHEADER => [
                                            "content-type: application/json",
                                            "cache-control: no-cache"
                                        ],
                                        ));

                                        $response = curl_exec($curl);
                                        $err = curl_error($curl);

                                        if($err){
                                        // there was an error contacting the rave API
                                        die('Curl returned error: ' . $err);
                                        }

                                        $transaction = json_decode($response);

                                        if(!$transaction->data && !$transaction->data->link){
                                        // there was an error from the API
                                        print_r('API returned error: ' . $transaction->message);
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