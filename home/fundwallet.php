<?php 
include("../functions/init.php");
if(isset($_GET['status']) && isset($_GET['tx_ref']) && isset($_GET['transaction_id'])) {

    if($_GET['status'] == "successful") {

        $id = $_GET['transaction_id'];

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/".$id."/verify",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json",
            "Authorization: Bearer FLWSECK_TEST-185a2dd929590007032cacfb3837f3c8-X"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

		if($err){
		// there was an error contacting the rave API
        echo "Poor Internet Connection. Refresh this page please";
        //redirect("./");
        die();
        
		}

        curl_close($curl);

        $res = json_decode($response);
        $amt = $res->data->amount;

        $data = $_SESSION['login'];
        $date = date("Y-m-d h:i:sa");
        $tref = "tpay".rand(0, 999);
        
        //get previous wallet balance
        $asql = "SELECT * FROM users WHERE `usname` = '$data'";
        $aes  = query($asql);

        $row = mysqli_fetch_array($aes);

        $prvamt = $row['wallet'];

        $newbal =  $prvamt + $amt;
        $note = "Your wallet was credited with NGN".number_format($amt);

        //credit user
        $csql = "UPDATE users SET `wallet` = '$newbal' WHERE `usname` = '$data'";
        $cres = query($csql);

        //insert into transaction history
        $tsql = "INSERT INTO t_his(`t_ref`, `amt`, `datepaid`, `username`, `sn`, `status`, `paynote`)";
        $tsql .= "VALUES('$tref', '$amt', '$date', '$data', '1', 'credit', '$note')";

        $tes = query($tsql);

        //redirect to home
        $_SESSION['paymsg'] = "Your Wallet has been funded successfully";
           
        redirect("./");
    
        } else {

        $_SESSION['paymsg'] = "Error processing your payment";
        redirect("./");
        }
        } else {

                $_SESSION['paymsg'] = "Error processing your payment";
                redirect("./");
            }
?>