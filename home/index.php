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
                if($t_users['tpin'] != '' && $t_users['wallet'] == '' && !isset($_SESSION['actref'])) {

                include("include/navcust.php"); 
                include("include/newcust.php");

                //wallet empty page
                include("include/component/wallet.php");

                //footer
                include("include/footer.php");
                    
                } else {
                    
                
                //new customer paid activation fee
                if(isset($_SESSION['actref']) == isset($_GET['tx_ref']) && isset($_GET['status']) == "successful") {

                    include("include/navcust.php"); 
                    include("include/newcust.php");

                    //footer
                    include("include/footer.php");
                }
                
                }

                    
                } 
            ?>
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