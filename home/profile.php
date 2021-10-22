<?php 
include("../functions/init.php");

if(isset($_SESSION['login'])) {

   $data = $_SESSION['login'];
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
                            <h1>YOUR PROFILE</h1>
                        </div>


                        <h2 class="section-title">Hi, <?php echo $t_users['usname']?>!</h2>
            <p class="section-lead">
              Welcome to your profile. Below are your registered details.
            </p>
                        
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                  <div class="profile-widget-header">                     
                    <img alt="<?php echo $t_users['usname']?>" src="assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Status</div>
                        <div class="profile-widget-item-value"><i class="fa fa-check-circle"></i></div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Referalls</div>
                        <?php
                    $rss = "SELECT sum(`active`) AS `earn` FROM `users` WHERE `ref` = '$data'";
                    $res = query($rss);
                    $wes = mysqli_fetch_array($res);

                    $a = $wes['earn'];
                    ?>

                        <div class="profile-widget-item-value"><?php echo number_format($a) ?></div>
                      </div>
                      
                    </div>
                  </div>
                  <div class="profile-widget-description">
                    <div class="profile-widget-name"><?php echo $t_users['usname']?> <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> <?php echo $t_users['fname']?></div></div>
                    <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.
                  </div>
                  <div class="card-footer text-center">
                    <div style class="font-weight-bold mb-2" data-toggle="modal" href="#exampleModal">Invite More Friends</div>
                    <a data-media="images/ico.png"
                                href="https://facebook.com/sharer.php?u=https://dashboard.savearns.com/signup?link=<?php echo $data ?>"
                                target="_blank" class="btn btn-social-icon btn-facebook">
                      <i class="fab fa-facebook-f text-dark"></i>
                    </a>
                    <a data-media="images/ico.png"
                                href="https://twitter.com/home?status=https://dashboard.savearns.com/signup?link=<?php echo $data ?>"
                                target="_blank" class="btn btn-social-icon btn-twitter">
                      <i class="fab fa-twitter text-dark"></i>
                    </a>
                    <a data-action="share/whatsapp/share" data-media="images/ico.png"
                                href="https://api.whatsapp.com/send?text=*Yo! I use SAVEARNS to save more while I spend less. It has the best student saving plans! Give it a try using this link *https://dashboard.savearns.com/signup?link=<?php echo $data ?>"
                                target="_blank" class="btn btn-social-icon btn-whatsapp">
                      <i class="fab fa-whatsapp text-dark"></i>
                    </a>
                    
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                  <form method="post" class="needs-validation" novalidate="">
                    <div class="card-header">
                      <h4>Profile Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">                               
                          <div class="form-group col-md-12 col-12">
                            <label>Full Name</label>
                            <input type="text" class="form-control" value="Ujang" required="">
                            <div class="invalid-feedback">
                              Please fill in the first name
                            </div>
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Last Name</label>
                            <input type="text" class="form-control" value="Maman" required="">
                            <div class="invalid-feedback">
                              Please fill in the last name
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-7 col-12">
                            <label>Email</label>
                            <input type="email" class="form-control" value="ujang@maman.com" required="">
                            <div class="invalid-feedback">
                              Please fill in the email
                            </div>
                          </div>
                          <div class="form-group col-md-5 col-12">
                            <label>Phone</label>
                            <input type="tel" class="form-control" value="">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-12">
                            <label>Bio</label>
                            <textarea class="form-control summernote-simple">Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.</textarea>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group mb-0 col-12">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" name="remember" class="custom-control-input" id="newsletter">
                              <label class="custom-control-label" for="newsletter">Subscribe to newsletter</label>
                              <div class="text-muted form-text">
                                You will get new information about products, offers and promotions
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>
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