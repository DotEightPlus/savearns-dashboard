<!--Greet new customer -->
<div class="main-content">
    <section class="section">


        <div class="section-body">


            <div class="row">
                <div class="col-12 mt-5 mb-4">
                    <div class="hero bg-primary text-white">
                        <div class="hero-inner">
                            <h2>Welcome Back, <?php echo strtoupper($t_users['usname']) ?>!</h2>
                            <p class="lead">Your last seen was
                                <?php echo date('l, F d, Y', strtotime($t_users['lastseen'])); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
</section>
</div>