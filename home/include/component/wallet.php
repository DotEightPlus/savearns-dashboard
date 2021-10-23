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
                                            <img class="d-block w-100" src="assets/img/7.jpg" alt="First slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="assets/img/8.jpg" alt="Second slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="assets/img/9.jpg" alt="Third slide">
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <p id="txt" hidden><?php  echo md5(rand(0, 9999)); ?></p>
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
<script src="https://checkout.flutterwave.com/v3.js"></script>
<script>
function makePayment() {

    var txt = document.getElementById('txt').innerHTML;
    var emai = document.getElementById('email').innerHTML;
    var tel = document.getElementById('tel').innerHTML;
    var fname = document.getElementById('fname').innerHTML;

    //alert(txt);


    FlutterwaveCheckout({
        public_key: "FLWPUBK-aec1e883ede5d055024d042a034f18c9-X",
        tx_ref: txt,
        amount: 200,
        currency: "NGN",
        country: "NG",
        payment_options: " ",
        method: "POST",
        redirect_url: // specified redirect URL
            "./pay",
        customer: {
            email: emai,
            phone_number: tel,
            name: fname,
        },
        callback: function(data) {

            // specified callback function
            console.log(data);
        },
        customizations: {
            title: "Savearns",
            description: "Account Activation",
            logo: "https://savearns.com/assets/1.png",
        },
    });
}
</script>