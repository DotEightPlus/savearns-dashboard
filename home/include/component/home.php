<!--Greet new customer -->
<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Welcome Back, <?php echo ucwords($t_users['usname']) ?>! <i class="text-primary fa fa-check-circle"></i>
            </h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a>Last seen:
                        <?php echo date('l, F d, Y', strtotime($t_users['lastseen'])); ?></a></div>
            </div>
        </div>
        <div class="section-body">

            <h2 class="section-title">Wallet Balance:
                <b>NGN<?php echo number_format($t_users['wallet'] + $t_ref_earn) ?></b>
                <div class="row  mt-3">
                    <button data-toggle="modal" data-target="#payModal" class="btn btn-primary section-lead">Fund Wallet
                    </button>
                    <button data-toggle="modal" data-target="#transferModal" class="btn btn-primary section-lead">Send
                        Funds </button>
                </div>
            </h2>





            <div class="row mt-5">

                <div class="col-lg-6 col-md-6 col-sm-12">
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


                <div class="col-lg-6 col-md-6 col-sm-12">
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

                <div class="col-lg-6 col-md-6 col-sm-12">
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

                <div class="col-lg-6 col-md-6 col-sm-12">
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



            </div>

        </div>

</div>
</section>
</div>