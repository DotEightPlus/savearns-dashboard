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

                 if($t_users['transaction pin'] == '' || $t_users['transaction pin'] == 0) {
                
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
                        <h2 class="section-title">Welcome to Savearns</h2>
                        <p class="section-lead">Kindly fill the
                            above
                            details to continue</p>

                        <div class="row">
                            <div class="col-12 col-sm-12 col-lg-12">
                                <div class="card">

                                    <div class="card-body">
                                        <ul class="nav nav-pills" id="myTab3" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab3" data-toggle="tab"
                                                    href="#profile" role="tab" aria-controls="home"
                                                    aria-selected="true">Profile</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#account"
                                                    role="tab" aria-controls="profile" aria-selected="false">Account</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#security"
                                                    role="tab" aria-controls="contact"
                                                    aria-selected="false">Security</a>
                                            </li>
                                        </ul>



                                        <div class="tab-content" id="myTabContent2">
                                            <div class="tab-pane fade show active" id="profile" role="tabpanel"
                                                aria-labelledby="home-tab3">
                                                <div class="card">

                                                    <div class="card-body row">
                                                        <div class="form-group col-md-6  col-lg-6 col-sm-12">
                                                            <label>Full Name</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="fas fa-user"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="text"
                                                                    value="<?php echo $t_users['fname'] ?>"
                                                                    class="form-control" disabled>
                                                            </div>

                                                        </div>
                                                        <div class="form-group col-md-6 col-lg-6 col-sm-12">
                                                            <label>Telephone</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="fas fa-phone"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="text" value="<?php echo $t_users['tel'] ?>"
                                                                    class="form-control" disabled>
                                                            </div>

                                                        </div>
                                                        <div class="form-group col-md-6 col-lg-6 col-sm-12">
                                                            <label>Email </label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="fas fa-envelope"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="email" class="form-control phone-number">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6 col-lg-6 col-sm-12">
                                                            <label>Select Gender</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="fas fa-users"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="password" class="form-control pwstrength"
                                                                    data-indicator="pwindicator">
                                                            </div>
                                                            <div id="pwindicator" class="pwindicator">
                                                                <div class="bar"></div>
                                                                <div class="label"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6 col-lg-6 col-sm-12">
                                                            <label>Institution Name</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="fas fa-graduation-cap"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="text" class="form-control currency">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6 col-lg-6 col-sm-12">
                                                            <label>Department</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-6 col-lg-6 col-sm-12">
                                                            <label>Level</label>
                                                            <input type="text" class="form-control invoice-input">
                                                        </div>
                                                        <div class="form-group col-md-6 col-lg-6 col-sm-12">
                                                            <label>Matric Number</label>
                                                            <input type="text" class="form-control">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>




                                            <div class="tab-pane fade" id="account" role="tabpanel"
                                                aria-labelledby="profile-tab3">
                                                <div class="card">

                                                    <div class="card-body row">
                                                        <div class="form-group col-md-6  col-lg-6 col-sm-12">
                                                            <label>Bank Name</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="fas fa-credit-card"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="text" class="form-control">
                                                            </div>

                                                        </div>
                                                        <div class="form-group col-md-6 col-lg-6 col-sm-12">
                                                            <label>Account Number</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="fas fa-key"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="number" class="form-control">
                                                            </div>

                                                        </div>
                                                        <div class="form-group col-md-12 col-lg-12 col-sm-12">
                                                            <label>Account Name </label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="fas fa-user"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="text" class="form-control phone-number"
                                                                    disabled>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>






                                            <div class="tab-pane fade" id="security" role="tabpanel"
                                                aria-labelledby="contact-tab3">


                                                <div class="card">

                                                    <div class="card-body row">
                                                        <div class="form-group col-md-6  col-lg-6 col-sm-12">
                                                            <label>Create Transaction PIN</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="fas fa-lock"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="text" class="form-control">
                                                            </div>

                                                        </div>
                                                        <div class="form-group col-md-6 col-lg-6 col-sm-12">
                                                            <label>Confirm PIN</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="fas fa-lock"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="number" class="form-control">
                                                            </div>

                                                        </div>


                                                    </div>
                                                </div>


                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--<div class="card">
                            <div class="card-header">
                                <h4>Example Card</h4>
                            </div>
                            <div class="card-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                            <div class="card-footer bg-whitesmoke">
                                This is card footer
                            </div>
                        </div>-->
                    </div>
                </section>
            </div>



            <?php 
            
            include("include/footer.php");
                } else {

                    
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
</body>

</html>


<?php

  
} else {

    redirect(".././logout");

}
?>