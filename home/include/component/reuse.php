<div class="section-header">
    <h1>Welcome Back, <?php echo ucwords($t_users['usname']) ?>!
    </h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a>Last seen:
                <?php echo date('l, F d, Y', strtotime($t_users['lastseen'])); ?></a></div>
    </div>
</div>


<h2 class="section-title">Wallet Balance:
    <b>NGN<?php echo number_format($t_users['wallet'] + $t_ref_earn) ?></b>
    <div class="row  mt-3">
        <button data-toggle="modal" data-target="#payModal" class="btn btn-primary section-lead">Fund Wallet
        </button>
        <button data-toggle="modal" data-target="#transferModal" class="btn btn-primary section-lead">Send
            Funds </button>
    </div>
</h2>


<h4 style="cursor: pointer" class="lead mt-3 mb-3 text-primary" data-toggle="modal" data-target="#payModal"><b>FUND
        WALLET BALANCE</b>
</h4>


<div class="card card-statistic-2">
    <div class="card-wrap">
    <div class="card-header">
        <h4 class="lead mb-2">FLEX WALLET
        </h4>

    </div>
    <div class="card-body">
        ₦ <?php echo number_format($t_users['wallet'] + $t_ref_earn) ?>
    </div>
    <div class="card-header">
        <h4 style="cursor: pointer" class="lead mt-3 mb-4 text-primary" data-toggle="modal"
            data-target="#payModal"><b>WITHDRAW FUNDS</b>
        </h4>
    </div>
    </div>
</div>

