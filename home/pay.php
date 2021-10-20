<?php 
include("../functions/init.php");
if(isset($_GET['status']) && isset($_GET['tx_ref']) && isset($_GET['transaction_id'])) {

    if($_GET['status'] == "successful") {

    $data = $_SESSION['login'];
    $date = date("Y-m-d h:i:sa");
    $ref  = "tref".rand(0, 999);
    $tref = "tpay".rand(0, 999);
    $msg  = "Hi there, <br/>Thank you for signing up with SAVEARNS. <br/>Your account is now fully activated.";
    $sbj  = "Account Activated";
    $note = "Your wallet was credited NGN200";
    
    $csql = "UPDATE users SET `wallet` = '200' WHERE `usname` = '$data'";
    $cres = query($csql);

    //alert user a message
    $msql = "INSERT INTO msgs(`usname`, `status`, `sn`, `msg`, `date`, `ticket`, `sbj`)";
    $msql .="VALUES('$data', 'unread', '1', '$msg', '$date', '$ref', '$sbj')";

    $mes = query($msql);

    //insert into transaction history
    $tsql = "INSERT INTO t_his(`t_ref`, `amt`, `datepaid`, `username`, `sn`, `status`, `paynote`)";
    $tsql .= "VALUES('$tref', '200', '$date', '$data', '1', 'credit', '$note')";

    $tes = query($tsql);

    //redirect to home
    redirect("./");
    
    } else {

        redirect(".././signin");
    }

} else {

    redirect(".././signin");
}
?>