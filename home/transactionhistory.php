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
                                    <div class="card-body p-0">
                                        <table class="table table-responsive-sm">
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
                                                    <td><?php echo date('d/m/Y  - h:i:sa', strtotime($row['datepaid'])); ?>
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