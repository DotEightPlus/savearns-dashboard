<!--Greet new customer -->
<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Welcome Back, <?php echo strtoupper($t_users['usname']) ?>!</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a>Last seen:
                        <?php echo date('l, F d, Y', strtotime($t_users['lastseen'])); ?></a></div>
            </div>
        </div>
        <div class="section-body">



        </div>

</div>
</section>
</div>