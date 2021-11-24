<!--Greet new customer -->
<div class="main-content">
    <section class="section">




        <div class="section-body">

            <div class="hero-inner">
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
                                    data-target="#payModal"><b>FUND WALLET BALANCE</b>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-md-8 col-sm-8 pl-3">
                    <div class="pricing">
                        <div class="pricing-title">
                            Developer
                        </div>
                        <div class="pricing-padding">
                            <div class="pricing-price">
                                <div>$19</div>
                                <div>per month</div>
                            </div>
                            <div class="pricing-details">
                                <div class="pricing-item">
                                    <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                    <div class="pricing-item-label">1 user agent</div>
                                </div>
                                <div class="pricing-item">
                                    <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                    <div class="pricing-item-label">Core features</div>
                                </div>
                                <div class="pricing-item">
                                    <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                    <div class="pricing-item-label">1GB storage</div>
                                </div>
                                <div class="pricing-item">
                                    <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                    <div class="pricing-item-label">2 Custom domain</div>
                                </div>
                                <div class="pricing-item">
                                    <div class="pricing-item-icon bg-danger text-white"><i class="fas fa-times"></i>
                                    </div>
                                    <div class="pricing-item-label">Live Support</div>
                                </div>
                            </div>
                        </div>
                        <div class="pricing-cta">
                            <a href="#">Subscribe <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>





            <div class="col-12 mb-4">
                <div class="hero bg-primary text-white">
                    <div class="hero-inner">
                        <h2>Welcome Back, Ujang!</h2>
                        <p class="lead">This page is a place to manage posts, categories and more.</p>
                    </div>
                </div>
            </div>


            <div class="row mt-5">
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="pricing">
                        <div class="pricing-title">
                            Developer
                        </div>
                        <div class="pricing-padding">
                            <div class="pricing-price">
                                <div>$19</div>
                                <div>per month</div>
                            </div>
                            <div class="pricing-details">
                                <div class="pricing-item">
                                    <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                    <div class="pricing-item-label">1 user agent</div>
                                </div>
                                <div class="pricing-item">
                                    <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                    <div class="pricing-item-label">Core features</div>
                                </div>
                                <div class="pricing-item">
                                    <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                    <div class="pricing-item-label">1GB storage</div>
                                </div>
                                <div class="pricing-item">
                                    <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                    <div class="pricing-item-label">2 Custom domain</div>
                                </div>
                                <div class="pricing-item">
                                    <div class="pricing-item-icon bg-danger text-white"><i class="fas fa-times"></i>
                                    </div>
                                    <div class="pricing-item-label">Live Support</div>
                                </div>
                            </div>
                        </div>
                        <div class="pricing-cta">
                            <a href="#">Subscribe <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="pricing pricing-highlight">
                        <div class="pricing-title">
                            Small Team
                        </div>
                        <div class="pricing-padding">
                            <div class="pricing-price">
                                <div>$60</div>
                                <div>per month</div>
                            </div>
                            <div class="pricing-details">
                                <div class="pricing-item">
                                    <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                    <div class="pricing-item-label">5 user agent</div>
                                </div>
                                <div class="pricing-item">
                                    <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                    <div class="pricing-item-label">Core features</div>
                                </div>
                                <div class="pricing-item">
                                    <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                    <div class="pricing-item-label">10GB storage</div>
                                </div>
                                <div class="pricing-item">
                                    <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                    <div class="pricing-item-label">10 Custom domain</div>
                                </div>
                                <div class="pricing-item">
                                    <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                    <div class="pricing-item-label">24/7 Support</div>
                                </div>
                            </div>
                        </div>
                        <div class="pricing-cta">
                            <a href="#">Subscribe <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="pricing">
                        <div class="pricing-title">
                            Enterprise
                        </div>
                        <div class="pricing-padding">
                            <div class="pricing-price">
                                <div>$499</div>
                                <div>per month</div>
                            </div>
                            <div class="pricing-details">
                                <div class="pricing-item">
                                    <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                    <div class="pricing-item-label">Unlimited user agent</div>
                                </div>
                                <div class="pricing-item">
                                    <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                    <div class="pricing-item-label">Core features</div>
                                </div>
                                <div class="pricing-item">
                                    <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                    <div class="pricing-item-label">8TB storage</div>
                                </div>
                                <div class="pricing-item">
                                    <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                    <div class="pricing-item-label">Unlimited custom domain</div>
                                </div>
                                <div class="pricing-item">
                                    <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                    <div class="pricing-item-label">Lifetime Support</div>
                                </div>
                            </div>
                        </div>
                        <div class="pricing-cta">
                            <a href="#">Subscribe <i class="fas fa-arrow-right"></i></a>
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