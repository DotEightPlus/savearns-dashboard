<?php 
include("../functions/init.php");

if(isset($_SESSION['login'])) {


    if(isset($_GET['id'])) {

    $data = $_SESSION['login'];
    $idr  = $_GET['id'];
    

    //update ticket to read
    $ssl = "UPDATE msgs SET `status` = 'read' WHERE `ticket` = '$idr'";
    $rsl = query($ssl);
    
} else {

    redirect("./");
}


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

             $sql = "SELECT * FROM msgs WHERE `ticket` = '$idr'";
            $rss = query($sql);
            
            if(row_count($rss) == '') {

                echo "No Messages Yet";
                
            } else {
            $row = mysqli_fetch_array($rss);
            }
            ?>

            <!--Greet new customer -->
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Tickets</h1>
                        <!--<div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                            <div class="breadcrumb-item">Tickets</div>
                        </div>-->
                    </div>

                    <div class="section-body">
                        <h2 class="section-title">New Ticket</h2>
                        <p class="section-lead">
                            You have an unread notification
                        </p>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Tickets</h4>
                                    </div>
                                    <div class="card-body">

                                        <div class="tickets">

                                            <div style="width: 100%" class="ticket-content">
                                                <div class="ticket-header">
                                                    <div class="ticket-sender-picture img-shadow">
                                                        <img src="../assets/img/1.png" alt="image">
                                                    </div>
                                                    <div class="ticket-detail">
                                                        <div class="ticket-title">
                                                            <h4><?php echo $row['sbj'] ?></h4>
                                                        </div>
                                                        <div class="ticket-info">
                                                            <div class="font-weight-600">Team Savearns</div>
                                                            <div class="bullet"></div>
                                                            <div class="text-primary font-weight-600">
                                                                <?php echo date('l, F d, Y - h:i:sa', strtotime($row['date'])); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ticket-description">
                                                    <p class="col-12">
                                                        <?php echo $row['msg']; ?>
                                                    </p>



                                                    <div class="ticket-divider"></div>


                                                </div>
                                            </div>
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