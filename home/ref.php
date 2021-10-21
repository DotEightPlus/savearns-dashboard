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
                            <h1>YOUR REFERALS</h1>
                        </div>

                        <div class="row mt-5">

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <table class="table table-responsive-sm">
                                            <thead>
                                                <tr>
                                                    <th scope="col">SN</th>
                                                    <th scope="col">User</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Date Registered</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $data = $_SESSION['login'];
                                                $trsql = "SELECT * FROM users WHERE `ref` = '$data' ORDER BY `email` asc";
                                                $tes  = query($trsql);
                                                if(row_count($tes) == '') {

                                                    echo "No transaction yet";
                                                } else {

                                                    while($row = mysqli_fetch_array($tes)) {
                                                
                                                
                                                ?>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td><?php echo $row['usname']; ?></td>
                                                    <?php 
                                                    if($row['tpin'] == '') {

                                                        echo '<td>Unverified</td>';
                                                    } else {

                                                       echo '<td>Verified  <i class="text-primary fa fa-check-circle"></i></td>';
                                                    }
                                                    ?>
                                                    <td><?php echo date('d/m/Y  - h:i:sa', strtotime($row['datereg'])); ?>
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