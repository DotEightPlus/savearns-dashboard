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
            <h2 class="section-title">Registration Almost Complete</h2>
            <p class="section-lead">Activate your account to continue </p>

            <div class="row">
                <div class="col-12 col-sm-12 col-lg-12">

                    <div class="card">

                        <div class="card-body">
                            <a onClick="makePayment()">
                                <div id=" carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="assets/img/1.png" alt="First slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="assets/img/3.jpg" alt="Second slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="assets/img/4.jpg" alt="Third slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="assets/img/5.jpg" alt="Third slide">
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <?php $_SESSION['actref'] =  md5(rand(0, 9999)) ?>
                            <p id="txt" hidden><?php  echo $_SESSION['actref']; ?></p>
                            <p id="email" hidden><?php echo $t_users['email'] ?></p>
                            <p id="tel" hidden><?php echo $t_users['tel'] ?></p>
                            <p id="fname" hidden><?php echo $t_users['fname'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
</section>
</div>