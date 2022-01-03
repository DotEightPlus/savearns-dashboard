<!--Greet new customer -->
<div class="main-content">
    <section class="section">




        <div class="section-body">

            <div class="hero-inner mt-5">
                <h2 class="text-dark">Home</h2>
                <p class="lead">Welcome Back, <?php echo ucwords($t_users['usname']) ?></p>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 pl-0">
                    <div class="card card-statistic-2">
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4 class="lead mb-2">YOUR WALLET BALANCE</h4>
                            </div>
                            <div class="card-body">
                                ₦ <?php echo number_format($t_users['wallet'] + $t_ref_earn) ?>
                            </div>
                            <div class="card-header">
                                <h4 style="cursor: pointer" class="lead mt-3 mb-4 text-primary" data-toggle="modal"
                                    data-target="#payModal"><b>FUND YOUR WALLET</b>
                                </h4>
                            </div>
                        </div>
                    </div>


                    <div class="card card-statistic-2">
                        <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
                            </ol>

                            <div class="carousel-inner bg-primary">
                                <?php

//check if flex plan is activated
if($t_users['flex'] == 0 || $t_users['flex'] == '')  {

    echo '
    <div class="carousel-item active">
    <div class="card card-statistic-2">
        <div class="card-wrap">
        <a href="./plans"><img src="assets/img/fl1.jpg" class="img-fluid"></a>
                        </div>
                    </div>
                </div>';
                } else {

                    echo '

                    <div class="carousel-item active">
    <div class="card card-statistic-2">
        <div class="card-wrap">
            <div class="card-header">
                <h4 class="lead mb-2">FLEX WALLET
                </h4>

            </div>
            <div class="card-body">
                ₦ 
                            </div>
                            <div class="card-header">
                                <h4 style="cursor: pointer" class="lead mt-3 mb-4 text-primary" data-toggle="modal"
                                    data-target="#payModal"><b>WITHDRAW FUNDS</b>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                    
                    
                    ';
                }


                if($t_users['classic'] == 0 || $t_users['classic'] == '')  {

                    echo '
                    <div class="carousel-item">
                    <div class="card card-statistic-2">
                        <div class="card-wrap">
                        <a href="./plans"><img src="assets/img/cl1.jpg" class="img-fluid"></a>
                                        </div>
                                    </div>
                                </div>';
                                } else {
                
                                    echo '
                
                                    <div class="carousel-item active">
                    <div class="card card-statistic-2">
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4 class="lead mb-2">FLEX WALLET
                                </h4>
                
                            </div>
                            <div class="card-body">
                                ₦ 
                                            </div>
                                            <div class="card-header">
                                                <h4 style="cursor: pointer" class="lead mt-3 mb-4 text-primary" data-toggle="modal"
                                                    data-target="#payModal"><b>WITHDRAW FUNDS</b>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    
                                    
                                    ';
                                }
                
                                if($t_users['campus'] == 0 || $t_users['campus'] == '')  {

                                    echo '
                                    <div class="carousel-item">
                                    <div class="card card-statistic-2">
                                        <div class="card-wrap">
                                        <a href="./plans"><img src="assets/img/cp1.jpg" class="img-fluid"></a>
                                                        </div>
                                                    </div>
                                                </div>';
                                                } else {
                                
                                                    echo '
                                
                                                    <div class="carousel-item active">
                                    <div class="card card-statistic-2">
                                        <div class="card-wrap">
                                            <div class="card-header">
                                                <h4 class="lead mb-2">FLEX WALLET
                                                </h4>
                                
                                            </div>
                                            <div class="card-body">
                                                ₦ 
                                                            </div>
                                                            <div class="card-header">
                                                                <h4 style="cursor: pointer" class="lead mt-3 mb-4 text-primary" data-toggle="modal"
                                                                    data-target="#payModal"><b>WITHDRAW FUNDS</b>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                    
                                                    
                                                    ';
                                                }

                ?>



                            </div>

                            <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>


                </div>

                <div class="col-lg-8 col-md-8 col-sm-12 pl-0">
                    <div class="pricing">

                        <div class="pricing-title">
                            Transaction History
                        </div>
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
                                                $trsql = "SELECT * FROM t_his WHERE `username` = '$data' ORDER BY `id` desc LIMIT 10";
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
                        <div class="pricing-cta">
                            <a href="./transactionhistory">View All History <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>


            </div>



            <!-- <div class="row mt-5">

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <a data-toggle="modal" href="#classicModal">
                                <div id=" carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="assets/img/cl1.jpg" alt="First slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="assets/img/cl2.jpg" alt="Second slide">
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <a data-toggle="modal" href="#flexModal">
                                <div id=" carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="assets/img/fl1.jpg" alt="First slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="assets/img/fl2.jpg" alt="Second slide">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <a data-toggle="modal" href="#campusModal">
                                <div id=" carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="assets/img/cp1.jpg" alt="First slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="assets/img/cp2.jpg" alt="Second slide">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>



            </div> --->

        </div>

</div>
</section>
</div>