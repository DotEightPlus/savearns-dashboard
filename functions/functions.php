<?php

/*************helper functions***************/

function clean($string) {

	return htmlentities($string);
}

function redirect($location) {

	return header("Location: {$location}");
}

function set_message($message) {

	if(!empty($message)) {

		$_SESSION['message'] = $message;

		}else {

			$message = "";
		}
}



function display_message() {

	if(isset($_SESSION['message'])) {

		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
}

function token_generator() {

	$token = $_SESSION['token'] = md5(uniqid(mt_rand(), true));

	return $token; 
}

function otp() {

	$otp = $_SESSION['otp'] = mt_rand(0, 99999);

	return $otp; 
}

function validation_errors($error_message) {

$error_message = <<<DELIMITER

<div class="col-md-12 alert alert-danger alert-mg-b alert-success-style6 alert-st-bg3 alert-st-bg14">
    <button type="button" class="col-md-12 close sucess-op" data-dismiss="alert" aria-label="Close">
		<span class="icon-sc-cl" aria-hidden="true">&times;</span>
									</button>
                 <p><strong>$error_message </strong></p>
                            </div>
DELIMITER;

   return $error_message;     

}

function validator($error_message) {

$error_message = <<<DELIMITER
<div style="background: #FFE9E6; color: #ff0000;" class="col-md-12 alert alert-danger alert-mg-b alert-success-style6 alert-st-bg3 alert-st-bg14">
    <button type="button" style="color: white;" class="col-md-12 close sucess-op" data-dismiss="modal" aria-label="Close">
		<span class="icon-sc-cl" aria-hidden="true">&times;</span>
									</button>
                 <p><strong>$error_message </strong></p>
                            </div>
DELIMITER;

   return $error_message;     

}



									/****** Helper Functions********/

function email_exist($email) {

	$sql = "SELECT * FROM users WHERE `email` = '$email'";
	$result = query($sql);

	if(row_count($result) == 1) {

		return true;

	}else {

		return false;
	} 
}

function username_exist($usname) {

	$sql = "SELECT * FROM users WHERE `usname` = '$usname'";
	$result = query($sql);

	if(row_count($result) == 1) {

		return true;

	}else {

		return false;
	} 
}





/** VALIDATE USER REGISTRATION **/

if(isset($_POST['fname']) && isset($_POST['tel']) && isset($_POST['email']) && isset($_POST['pword']) && isset($_POST['cpword']) && isset($_POST['ref'])) {

$fname 			= clean(escape($_POST['fname']));
$tel	 		= clean(escape($_POST['tel']));
$email	 		= clean(escape($_POST['email']));
$uname	 		= clean(escape(ucwords($_POST['user'])));
$pword    		= clean(escape($_POST['pword']));
$cpword 		= clean(escape($_POST['cpword']));
$ref            = clean(escape($_POST['ref']));

if(email_exist($email)) {

			echo "Sorry! The email inputted already has an account";
		} else {

if(username_exist($uname)) {

			echo "That username is unavailable!";
		} else {

			register($fname, $tel, $email, $uname, $pword, $ref);
		}
	}
	} // post request


	

/** REGISTER USER **/
function register($fname, $tel, $email, $uname, $pword, $ref) {

	$fnam = escape($fname);
	$emai = escape($email);
	$unam = escape(ucwords($uname));
	$pwor = md5($pword);

	$datereg = date("Y-m-d");

	$_SESSION['usermail'] = $emai;
		

	$activator = otp();
	
$sql = "INSERT INTO users(`sn`, `fname`, `usname`, `email`, `pword`, `datereg`, `active`, `tel`, `activator`, `ref`)";
$sql.= " VALUES('1', '$fnam', '$unam', '$emai', '$pwor', '$datereg', '0', '$tel', '$activator', '$ref')";
$result = query($sql);

//redirect to verify function
$subj = "VERIFY YOUR EMAIL";
$msg  = "Hi there! <br /><br />Kindly use the otp below to activate your account;";

mail_mailer($email, $activator, $subj, $msg);

//open otp page
echo 'Loading... Please Wait!';
echo'<script>otpVerify(); signupClose();</script>';
	 }



/* MAIL VERIFICATIONS */
function mail_mailer($email, $activator, $subj, $msg) {

$to = $email;
$from = "noreply@savearns.com";

$headers = "From: " . $from . "\r\n";
$headers .= "Reply-To: ". $from . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
$headers .= "X-Priority: 1 (Highest)\n";
$headers .= "X-MSMail-Priority: High\n";
$headers .= "Importance: High\n";

$subject = $subj;

$logo = 'https://savearns.com/assets/3.png';
$url = 'https://savearns.com/';

$body = "
<!DOCTYPE html>
<html lang='en'>

<head>
<meta charset='UTF-8'>
<title>Savearns</title>
</head>
<link rel='stylesheet' href='https://savearns.com/assets/css/bootstrap.min.css'>
<body style='text-align: center;'>";
$body .= "<section style='margin: 30px; margin-top: 50px ; background: #34459C; color: #fff;'>";
$body .= "<img style='margin-top: 35px; width: 460px; height: 105px;' src='{$logo}' alt='Savearns'>";
$body .= "<h1 style='margin-top: 45px; color: #fff'>{$subj}</h1>
<br />";
$body .= "<h3 style='margin-left: 45px; margin-top: 34px; text-align: left; font-size: 17px;'>{$msg}</h3>
<br />";
$body .= "<h1 style='margin-left: 45px; text-align: center;'><b>{$activator}</b></h1>
<br />";
$body .= "<p style='margin-left: 45px; padding-bottom: 80px; text-align: left;'>Do not bother replying this
email. This is a virtual email</p>";
$body .= "<p text-align: center;'><a href='https://savearns.com/contact'><img style='width:150px;heght:150px'
		src='https://savearns.com/assets/footer.png'></a>";
$body .= "
<h4 style='text-align: center;'>Email.: <span style='color: #fff'>savings@savearns.com</span></h4>";
$body .= "<h4 style='text-align: center;'>Call/Chat.: <span style='color: #fff'>+234(0) 810 317 1902</span>
</h4>";
$body .= "<h4 style='text-align: center; padding-bottom: 80px; padding-top: 40px;'>Team Savearns</h4>";    
$body .= "<script src='https://avearns.com/assets/js/bootstrap.min.js'></script>";
$body .= "</section>";
$body .= "</body></html>";
$send = mail($to, $subject, $body, $headers);
}


/** RESEND OTP */
if(isset($_POST['otpp'])) {

	$otpp = clean(escape($_POST['otpp']));
	
	$email = $_SESSION['usermail'];
	
	$activator = otp();	

	$sql = "UPDATE users SET `activator` = '$activator'  WHERE `email` = '$email'";
	$res = query($sql);

	if($otpp == 100) {

	$subj = "VERIFY YOUR EMAIL";
	$msg  = "Hi there! <br /><br />Kindly use the otp below to activate your account;";	
	} else{
	
		$subj = "RESET YOUR PASSWORD";
		$msg  = "Hi there! <br /><br />Kindly use the otp below to restore your password;";		

	}

	mail_mailer($email, $activator, $subj, $msg);
	echo "New OTP Code sent to your email";
}


/**Activate OTP ACCOUNT */
if(isset($_POST['votp'])) {

	$email = $_SESSION['usermail'];
	$veotp = clean(escape($_POST['votp']));

	$otp   = $_SESSION['otp'];

	//select otp from db and confirm with session
	if($veotp != $otp) {

		echo "Invalid OTP Code!";
		
	} else {

	//update database and login
	$sql = "UPDATE users SET `activator` = '', `active` = '1' WHERE `email` = '$email'";
	$res = query($sql);

	//get username and redirect to dashboard
	$ssl = "SELECT * FROM users WHERE `email` =  '$email'";
	$rsl = query($ssl);
	if(row_count($rsl) == '') {
		
		echo 'Loading... Please Wait';
		echo '<script>window.location.href ="./signin"</script>';
		
	} else {

		$row  = mysqli_fetch_array($rsl);
		$user = $row['usname'];

		$_SESSION['login'] = $user;
		
		
		echo 'Loading... Please Wait';

		if(!isset($_SESSION['vnext'])) {
		echo '<script>window.location.href ="./"</script>';
		} else {
			$data = $_SESSION['vnext'];
			echo '<script>'.$data.'</script>';
		}
	}
	}

}

/** SIGN IN USER **/
 	if(isset($_POST['username']) && isset($_POST['password'])) {

			$username        = clean(escape($_POST['username']));
			$password   	 = md5($_POST['password']);

			$sql = "SELECT * FROM `users` WHERE `usname` = '$username' AND `pword` = '$password'";
			$result = query($sql);
			if(row_count($result) == 1) {

				$row 	    = mysqli_fetch_array($result);
				
				$user 		= $row['usname'];
				$active 	= $row['active'];
				$email 		= $row['email'];
				$activate 	= $row['activator'];

				if ($active == 0 || $activate != '') {

					$activator = otp();

					$_SESSION['usermail'] = $email;

					//update activation link
					$ups = "UPDATE users SET `activator` = '$activate' WHERE `usname` = '$username'";
					$ues = query($ups);

					$subj = "VERIFY YOUR EMAIL";
					$msg  = "Hi there! <br /><br />Kindly use the otp below to activate your account;";

					mail_mailer($email, $activator, $subj, $msg);

					//open otp page
					echo 'Loading... Please Wait!';
					echo '<script>otpVerify(); signupClose();</script>';
	
					
				}  else {

					if($username == $user) {
						
						$_SESSION['login'] = $username;

						echo 'Loading... Please Wait';	

						echo '<script>window.location.href ="./"</script>';	
					} else {

						echo "This username doesn't have an account.";
					}

			} 

		}  else {
			
			echo '<script>window.location.href ="./forgot"</script>';
		}
	}


/** FORGOT PASSWORD **/
if(isset($_POST['fgeml'])) {
	
	$email  = clean(escape($_POST['fgeml']));

	$_SESSION['usermail'] = $email;

	if(!email_exist($email)) {

		echo "Sorry! This email doesn't have an account";
		
	} else {

	$activator = otp();

	$ssl = "UPDATE users SET `activator` = '$activator' WHERE `email` = '$email'";
	$rsl = query($ssl);

	//redirect to verify function
	$subj = "RESET YOUR PASSWORD";
	$msg  = "Hi there! <br /><br />Kindly use the otp below to restore your password;";

	mail_mailer($email, $activator, $subj, $msg);

	//open otp page
	echo 'Loading... Please Wait!';
	$_SESSION['vnext'] = "updatePword();";
	echo '<script>otpVerify(); signupClose();</script>';

	}
}



/** RESET PASSWORD **/
if(isset($_POST['fgpword']) && isset($_POST['fgcpword'])) {

	    $fgpword = md5($_POST['fgpword']);
        $eml = $_SESSION['usermail'];

	$sql = "UPDATE users SET `pword` = '$fgpword', `activator` = '' WHERE `email` = '$eml'";
	$rsl = query($sql);
	
	//get username and redirect to dashboard
	$ssl = "SELECT * FROM users WHERE `email` =  '$eml'";
	$rsl = query($ssl);
	if(row_count($rsl) == '') {
		
		echo 'Loading... Please Wait';
		echo '<script>window.location.href ="./signin"</script>';
		
	} else {

		$row  = mysqli_fetch_array($rsl);
		$user = $row['usname'];

		$_SESSION['login'] = $user;
		
		
		echo 'Loading... Please Wait';

		echo '<script>window.location.href ="./"</script>';
		
	}
}




// DASHBOARD FUNCTIONS FOR USER
function user_details() {
	
	$data = $_SESSION['login'];


	//users details
	$sql = "SELECT * FROM users WHERE `usname` = '$data'";
	$rsl = query($sql);

	//check if user details is valid
	if(row_count($rsl) == '') {

		redirect(".././logout");
		
	} else {

    $GLOBALS['t_users'] = mysqli_fetch_array($rsl);

	}

	//referal details
	$rss = "SELECT sum(`active`) AS `earn` FROM `users` WHERE `ref` = '$data'";
	$res = query($rss);
    $GLOBALS['t_ref'] = mysqli_fetch_array($res);

	$GLOBALS['t_ref_earn'] = $GLOBALS['t_ref']['earn'] * 100;


	//classic savings plan
	$clsvs = "SELECT * FROM `savings` WHERE `usname` = '$data' AND `plan` = 'Classic Savings Plan' AND `status` = 'Active'";
	$clsvl = query($clsvs);
	if(row_count($clsvl) != null) {
		
		$GLOBALS['clcsvs'] = mysqli_fetch_array($clsvl);

		//get savings duration
		$dur = $GLOBALS['clcsvs']['duration'];
		$GLOBALS['campdura'] = date('Y-m-d h:i:s', strtotime($GLOBALS['clcsvs']['datepaid']. ' +'.$dur));
	} 
	

	//flex target
	$flsvs = "SELECT * FROM `flex` WHERE `usname` = '$data' AND `status` = 'Active'";
	$flsvl = query($flsvs);
	if(row_count($flsvl) != null) {
	
		$GLOBALS['flsvs'] = mysqli_fetch_array($flsvl);
		
	}


	//flex savings
	$lsvlr = "SELECT * FROM `savings` WHERE `usname` = '$data' AND `plan` = 'Flex Savings Plan' AND `status` = 'Active'";
	$lsvrl = query($lsvlr);
	if(row_count($lsvrl) != null) {
	
		$GLOBALS['lsrs'] = mysqli_fetch_array($lsvrl);
	}

	//campus saving plan
	$cmsvs = "SELECT * FROM `savings` WHERE `usname` = '$data' AND `plan` = 'Campus Savings Plan' AND `status` = 'Active'";
	$cmsvl = query($cmsvs);
	if(row_count($cmsvl) != null) {

	
	$GLOBALS['cmsvs'] = mysqli_fetch_array($cmsvl);

	}


}



//get account name
if(isset($_POST['bank']) && isset($_POST['acctn']) && isset($_POST['trd'])) {

	$bank  = clean(escape($_POST['bank']));
	$acctn = clean(escape($_POST['acctn']));


	//get bank code first
    $banks = array(
		array('id' => '1','name' => 'Access Bank','code'=>'044'),
		array('id' => '2','name' => 'Citibank','code'=>'023'),
		array('id' => '3','name' => 'Diamond Bank','code'=>'063'),
		array('id' => '4','name' => 'Dynamic Standard Bank','code'=>''),
		array('id' => '5','name' => 'Ecobank Nigeria','code'=>'050'),
		array('id' => '6','name' => 'Fidelity Bank Nigeria','code'=>'070'),
		array('id' => '7','name' => 'First Bank of Nigeria','code'=>'011'),
		array('id' => '8','name' => 'First City Monument Bank','code'=>'214'),
		array('id' => '9','name' => 'Guaranty Trust Bank','code'=>'058'),
		array('id' => '10','name' => 'Heritage Bank Plc','code'=>'030'),
		array('id' => '11','name' => 'Jaiz Bank','code'=>'301'),
		array('id' => '12','name' => 'Keystone Bank Limited','code'=>'082'),
		array('id' => '13','name' => 'Providus Bank Plc','code'=>'101'),
		array('id' => '14','name' => 'Polaris Bank','code'=>'076'),
		array('id' => '15','name' => 'Stanbic IBTC Bank Nigeria Limited','code'=>'221'),
		array('id' => '16','name' => 'Standard Chartered Bank','code'=>'068'),
		array('id' => '17','name' => 'Sterling Bank','code'=>'232'),
		array('id' => '18','name' => 'Suntrust Bank Nigeria Limited','code'=>'100'),
		array('id' => '19','name' => 'Union Bank of Nigeria','code'=>'032'),
		array('id' => '20','name' => 'United Bank for Africa','code'=>'033'),
		array('id' => '21','name' => 'Unity Bank Plc','code'=>'215'),
		array('id' => '22','name' => 'Wema Bank','code'=>'035'),
		array('id' => '23','name' => 'Zenith Bank','code'=>'057'),
		array('id' => '24','name' => 'HighStreet MFB bank','code'=>'090175'),
		array('id' => '25','name' => 'TCF MFB','code' => '90115'),
	  array(
		  'id' => 132,
		  'code' => '560',
		  'name' => 'Page MFBank'
	  ),
	  array(
		  'id' => 133,
		  'code' => '304',
		  'name' => 'Stanbic Mobile Money'
	  ),
	  array(
		  'id' => 134,
		  'code' => '308',
		  'name' => 'FortisMobile'
	  ),
	  array(
		  'id' => 135,
		  'code' => '328',
		  'name' => 'TagPay'
	  ),
	  array(
		  'id' => 136,
		  'code' => '309',
		  'name' => 'FBNMobile'
	  ),
	  array(
		  'id' => 137,
		  'code' => '011',
		  'name' => 'First Bank of Nigeria'
	  ),
	  array(
		  'id' => 138,
		  'code' => '326',
		  'name' => 'Sterling Mobile'
	  ),
	  array(
		  'id' => 139,
		  'code' => '990',
		  'name' => 'Omoluabi Mortgage Bank'
	  ),
	  array(
		  'id' => 140,
		  'code' => '311',
		  'name' => 'ReadyCash (Parkway)'
	  ),
	  array(
		  'id' => 143,
		  'code' => '306',
		  'name' => 'eTranzact'
	  ),
	  array(
		  'id' => 145,
		  'code' => '023',
		  'name' => 'CitiBank'
	  ),
	  array(
		  'id' => 147,
		  'code' => '323',
		  'name' => 'Access Money'
	  ),
	  array(
		  'id' => 148,
		  'code' => '302',
		  'name' => 'Eartholeum'
	  ),
	  array(
		  'id' => 149,
		  'code' => '324',
		  'name' => 'Hedonmark'
	  ),
	  array(
		  'id' => 150,
		  'code' => '325',
		  'name' => 'MoneyBox'
	  ),
	  array(
		  'id' => 151,
		  'code' => '301',
		  'name' => 'JAIZ Bank'
	  ),
		array(
		  'id' => 153,
		  'code' => '307',
		  'name' => 'EcoMobile'
	  ),
	  array(
		  'id' => 154,
		  'code' => '318',
		  'name' => 'Fidelity Mobile'
	  ),
	  array(
		  'id' => 155,
		  'code' => '319',
		  'name' => 'TeasyMobile'
	  ),
	  array(
		  'id' => 156,
		  'code' => '999',
		  'name' => 'NIP Virtual Bank'
	  ),
	  array(
		  'id' => 157,
		  'code' => '320',
		  'name' => 'VTNetworks'
	  ),
		array(
		  'id' => 159,
		  'code' => '501',
		  'name' => 'Fortis Microfinance Bank'
	  ),
	  array(
		  'id' => 160,
		  'code' => '329',
		  'name' => 'PayAttitude Online'
	  ),
	  array(
		  'id' => 161,
		  'code' => '322',
		  'name' => 'ZenithMobile'
	  ),
	  array(
		  'id' => 162,
		  'code' => '303',
		  'name' => 'ChamsMobile'
	  ),
	  array(
		  'id' => 163,
		  'code' => '403',
		  'name' => 'SafeTrust Mortgage Bank'
	  ),
	  array(
		  'id' => 164,
		  'code' => '551',
		  'name' => 'Covenant Microfinance Bank'
	  ),
	  array(
		  'id' => 165,
		  'code' => '415',
		  'name' => 'Imperial Homes Mortgage Bank'
	  ),
	  array(
		  'id' => 166,
		  'code' => '552',
		  'name' => 'NPF MicroFinance Bank'
	  ),
	  array(
		  'id' => 167,
		  'code' => '526',
		  'name' => 'Parralex'
	  ),
	  array(
		  'id' => 169,
		  'code' => '084',
		  'name' => 'Enterprise Bank'
	  ),
		array(
		  'id' => 187,
		  'code' => '314',
		  'name' => 'FET'
	  ),
	  array(
		  'id' => 188,
		  'code' => '523',
		  'name' => 'Trustbond'
	  ),
	  array(
		  'id' => 189,
		  'code' => '315',
		  'name' => 'GTMobile'
	  ),
		array(
		  'id' => 182,
		  'code' => '327',
		  'name' => 'Pagatech'
	  ),
	  array(
		  'id' => 183,
		  'code' => '559',
		  'name' => 'Coronation Merchant Bank'
	  ),
	  array(
		  'id' => 184,
		  'code' => '601',
		  'name' => 'FSDH'
	  ),
	  array(
		  'id' => 185,
		  'code' => '313',
		  'name' => 'Mkudi'
	  ),
	   array(
		  'id' => 171,
		  'code' => '305',
		  'name' => 'Paycom'
	  ),
	  array(
		  'id' => 172,
		  'code' => '100',
		  'name' => 'SunTrust Bank'
	  ),
	  array(
		  'id' => 173,
		  'code' => '317',
		  'name' => 'Cellulant'
	  ),
	  array(
		  'id' => 174,
		  'code' => '401',
		  'name' => 'ASO Savings and & Loans'
	  ),
	  array(
		  'id' => 176,
		  'code' => '402',
		  'name' => 'Jubilee Life Mortgage Bank'
	  ),
	);

	$row = 0; 
	
	while($row < 68) {
        
        if($banks[$row]['name'] == $bank){
    
        $bankcode = $banks[$row]['code'];
        }
		
		$row++;
    }
	
	//echo $bank;

	$request = [

		'account_number' => $acctn,
		'account_bank' => $bankcode
	];
	
	$curl = curl_init();
	
		curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://api.flutterwave.com/v3/accounts/resolve',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS => json_encode($request),
		CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer FLWSECK-1109e7cb4c9e1871e91a90f1d91c8479-X',
			'Content-Type: application/json'
		),
		));
	
	    $response = curl_exec($curl);
		$err = curl_error($curl);

		if($err){
		// there was an error contacting the rave API
		die('Error Retrieving Your Account Name');
		}
		
		curl_close($curl);

		
		$res = json_decode($response);

        if($res->status == "success") {
		echo $res->data->account_name;
        } else {

            echo "Error Retrieving Your Account Name";
        }
	
}


if(isset($_POST['gend']) && isset($_POST['inst']) && isset($_POST['dept']) && isset($_POST['level']) && isset($_POST['matric']) && isset($_POST['bank']) && isset($_POST['acctn']) && isset($_POST['actn']) && isset($_POST['pword'])) {

	$gend 	 = clean(escape($_POST['gend']));
	$inst 	 = clean(escape($_POST['inst']));
	$dept 	 = clean(escape($_POST['dept']));
	$level	 = clean(escape($_POST['level']));
	$matric  = clean(escape($_POST['matric']));
	$bank    = clean(escape($_POST['bank']));
	$acctn   = clean(escape($_POST['acctn']));
	$actn    = clean(escape($_POST['actn']));
	$pword   = md5($_POST['pword']);

	$user = $_SESSION['login'];

	$sql = "UPDATE users SET `gend` = '$gend', `inst` = '$inst', `tpin` = '$pword', `dept` = '$dept', `level` = '$level', `matric` = '$matric', `bname` = '$bank', `bact` = '$acctn', `actname` = '$actn' WHERE `usname` = '$user'";
	$res = query($sql);

	echo "Loading... Please wait";
	echo '<script>window.location.href ="./"</script>';
}



//transfer function
function transfer($usus) {

	$sql = "SELECT * FROM users WHERE `usname` = '$usus'";
	$res = query($sql);

	if(row_count($res) == null) {
		
		echo "Username is invalid";
		die();
	} else {

		$GLOBALS['t_trans'] = mysqli_fetch_array($res);
		
	}
}



//sending money to a savearn user
if(isset($_POST['amt']) && isset($_POST['usus'])) {

$amt = clean(escape($_POST['amt']));
$usus = clean(escape($_POST['usus']));

//get current user details
user_details();

$mainuser = ucwords($t_users['usname']);

//check if user is crediting self
if($mainuser == ucwords($usus)) {
	
	echo "You can't send money to yourself";
	
} else {

	//check if user exist
	transfer($usus);

	//chcek if user has enough funds
	$bal = ($t_users['wallet'] + $t_ref_earn) - 100;
	if($bal < $amt) {

		echo "A minimum of NGN100 should be left on your account";
		
	} else {

		//deduct current user wallet
		$newbal = $bal - $amt;
		
		//get beneficiary user wallet and add amt
		$tbal = $t_trans['wallet'] + $amt;
		
		//update user wallet
		$sql = "UPDATE users SET `wallet` = '$newbal' WHERE `usname` = '$mainuser'";
		$res = query($sql);

		//credit beneficiary
		$bsql = "UPDATE users SET `wallet` = '$tbal' WHERE `usname` = '$usus'";
		$bres = query($bsql);

		//notify user transaction history
		$date = date("Y-m-d h:i:sa");
		$ref = "tpay".rand(0, 999);
		$msg  = "Your transfer of NGN".number_format($newbal)." to ". $usus ." was successful";
		$sbj  = "Debit Alert";

		$msql = "INSERT INTO msgs(`usname`, `status`, `sn`, `msg`, `date`, `ticket`, `sbj`)";
		$msql .="VALUES('$mainuser', 'unread', '1', '$msg', '$date', '$ref', '$sbj')";
		$mes = query($msql);

		//notify beneficiary
		$bref  = "tpay".rand(0, 999);
		$bmsg  = "You have been credited NGN".number_format($newbal)." from ". $usus;
		$bsbj  = "Credit Alert";

		$bmsql = "INSERT INTO msgs(`usname`, `status`, `sn`, `msg`, `date`, `ticket`, `sbj`)";
		$bmsql .="VALUES('$mainuser', 'unread', '1', '$msg', '$date', '$ref', '$sbj')";
		$bmes = query($bmsql);


		//create an alert message
		$_SESSION['transfered'] = "Success";
		echo "Loading... Please wait";
		echo '<script>window.location.href ="./"</script>';
		
	}
	
}
}


/*** SAVING PLANS FUNCTIOn */

//campus plan
if(isset($_POST['campan']) && isset($_POST['rrcampan'])) {

	$ammt  =  clean($_POST['campan']);
	$det   =  clean($_POST['rrcampan']);

	//get user wallet balance
	user_details();

	$user = $t_users['usname'];

	//chcek if user has enough funds
	$bal = ($t_users['wallet'] + $t_ref_earn) - 100;

	if($bal < $ammt) {

		echo "<script>
        iziToast.error({
          title: 'Error!',
          message: 'You do not have enough funds in your wallet. Kindly fund your wallet and try again',
          position: 'topCenter'
        });</script>";
		
	} else {

		//deduct current user wallet
		$newbal = $bal - $ammt + 100;

		//notify user transaction history
		$date = date("Y-m-d h:i:sa");
		$ref = "tpay".rand(0, 999);
		$msg  = "Your ". $det ." of NGN".number_format($ammt)." was successful";
		$tref = "tpay".rand(0, 999);
		$sbj  = "Savings Alert";

		$nsql = "INSERT INTO msgs(`usname`, `status`, `sn`, `msg`, `date`, `ticket`, `sbj`)";
		$nsql .="VALUES('$user', 'unread', '1', '$msg', '$date', '$ref', '$sbj')";
		$nes = query($nsql);

		//update user wallet
		$sql = "UPDATE users SET `wallet` = '$newbal' WHERE `usname` = '$user'";
		$res = query($sql);

		//credit savings wallet
		$vsql = "INSERT INTO savings(`usname`, `datepaid`, `plan`, `duration`, `amt`, `status`, `mode`, `descrip`)";
		$vsql .="VALUES('$user', '$date', '$det', 'A week before exam', '$ammt', 'Active', 'Wallet', 'Campus Savings')";
		$ves = query($vsql);

		//insert transaction history
		$tsql = "INSERT INTO t_his(`t_ref`, `amt`, `datepaid`, `username`, `sn`, `status`, `paynote`)";
		$tsql .= "VALUES('$tref', '$ammt', '$date', '$user', '1', 'debit', '$msg')";
		$tes = query($tsql);

		//create an alert message
		$_SESSION['campusplan'] = "Success";
		echo "Loading... Please wait";
		echo '<script>window.location.href ="./plans"</script>';
	}

	
}

//fund campus wallet
if(isset($_POST['fndcampan']) && isset($_POST['fndrrcampan'])) {

	$fndammt  =  clean($_POST['fndcampan']);
	$fnddet   =  clean($_POST['fndrrcampan']);

	//get user wallet balance
	user_details();

	$user = $t_users['usname'];

	//chcek if user has enough funds
	$bal = ($t_users['wallet'] + $t_ref_earn) - 100;

	if($bal < $fndammt) {

		echo "<script>
        iziToast.error({
          title: 'Error!',
          message: 'You do not have enough funds in your wallet. Kindly fund your wallet and try again',
          position: 'topCenter'
        });</script>";
		
	} else {

		
		//deduct current user wallet
		$newbal = $bal - $fndammt + 100;

		//get previous campus saving and add with new campus savings
		$cmbal = $cmsvs['amt'] + $fndammt;

		//notify user transaction history
		$date = date("Y-m-d h:i:sa");
		$ref = "tpay".rand(0, 999);
		$msg  = "Your ". $det ." of NGN".number_format($fndammt)." was successful";
		$tref = "tpay".rand(0, 999);
		$sbj  = "Savings Alert";

		$nsql = "INSERT INTO msgs(`usname`, `status`, `sn`, `msg`, `date`, `ticket`, `sbj`)";
		$nsql .="VALUES('$user', 'unread', '1', '$msg', '$date', '$ref', '$sbj')";
		$nes = query($nsql);

		//update user wallet
		$sql = "UPDATE users SET `wallet` = '$newbal' WHERE `usname` = '$user'";
		$res = query($sql);

		//update credit savings wallet
		$vsql = "UPDATE savings SET `amt` = '$cmbal' WHERE `usname` = '$user' AND `plan` = 'Campus Savings Plan' AND `status` = 'Active'";
		$ves = query($vsql);

		//insert transaction history
		$tsql = "INSERT INTO t_his(`t_ref`, `amt`, `datepaid`, `username`, `sn`, `status`, `paynote`)";
		$tsql .= "VALUES('$tref', '$fndammt', '$date', '$user', '1', 'debit', '$msg')";
		$tes = query($tsql);

		//create an alert message
		$_SESSION['campusplan'] = "Success";
		echo "Loading... Please wait";
		echo '<script>window.location.href ="./plans"</script>';
		
	} 

	
}


//flex plan
if(isset($_POST['flxamt']) && isset($_POST['dest']) && isset($_POST['plann']) && isset($_POST['saflxamt'])) {

	$flxamt     =  clean($_POST['flxamt']);
	$saflxamt   =  clean($_POST['saflxamt']);
	$dest       =  clean($_POST['dest']);
	$plann      =  clean($_POST['plann']);
	$date 		=  date("Y-m-d h:i:sa");

	//get user wallet balance
	user_details();

	$user = $t_users['usname'];

	//chcek if user has enough funds
	$bal = ($t_users['wallet'] + $t_ref_earn) - 100;

	if($bal < $saflxamt) {

		echo "<script>
        iziToast.error({
          title: 'Error!',
          message: 'You do not have enough funds in your wallet. Kindly fund your wallet and try again',
          position: 'topCenter'
        });</script>";
		
	} else {

	if($saflxamt > $flxamt) {
		
		echo "<script>
        iziToast.error({
          title: 'Error!',
          message: 'You current deposit is greater than your targeted saving',
          position: 'topCenter'
        });</script>";
		
	} else {

		//deduct current user wallet
		$newbal = $bal - $saflxamt + 100;

		//notify user transaction history
		$ref = "tpay".rand(0, 999);
		$tref = "tpay".rand(0, 999);
		$msg  = "Your ". $plann ." of NGN".number_format($saflxamt)." was successful";
		$sbj  = "Savings Alert";

		$nsql = "INSERT INTO msgs(`usname`, `status`, `sn`, `msg`, `date`, `ticket`, `sbj`)";
		$nsql .="VALUES('$user', 'unread', '1', '$msg', '$date', '$ref', '$sbj')";
		$nes = query($nsql);

		//insert transaction history
		$tsql = "INSERT INTO t_his(`t_ref`, `amt`, `datepaid`, `username`, `sn`, `status`, `paynote`)";
		$tsql .= "VALUES('$tref', '$saflxamt', '$date', '$user', '1', 'debit', '$msg')";
		$tes = query($tsql);

		//update user wallet
		$sql = "UPDATE users SET `wallet` = '$newbal' WHERE `usname` = '$user'";
		$res = query($sql);

		//credit flex wallet
		$vsql = "INSERT INTO flex(`usname`, `date`, `amt`, `status`, `mode`, `descrip`)";
		$vsql .="VALUES('$user', '$date', '$flxamt', 'Active', 'Wallet', '$dest')";
		$ves = query($vsql);

		//credit savings wallet
		$ssql = "INSERT INTO savings(`usname`, `datepaid`, `plan`, `amt`, `status`, `mode`, `descrip`)";
		$ssql .="VALUES('$user', '$date', 'Flex Savings Plan', '$saflxamt', 'Active', 'Wallet', 'Flex Saving')";
		$fes = query($ssql);

		//create an alert message
		$_SESSION['flexplan'] = "Success";
		echo "Loading... Please wait";
		echo '<script>window.location.href ="./plans"</script>';
	}
	}
}

//fund flex plan
if(isset($_POST['fnddsaflxamt'])) {

	$fnddsaflxamt   =  clean($_POST['fnddsaflxamt']);
	$date 		    =  date("Y-m-d h:i:sa");
	

	//get user wallet balance
	user_details();

	$flxamt         =  $flsvs['amt'];
	$user 			=  $t_users['usname'];

	//chcek if user has enough funds
	$bal = ($t_users['wallet'] + $t_ref_earn) - 100;

	//add previous saving
	$flnwmt = $lsrs['amt'] + $fnddsaflxamt;

	if($bal < $fnddsaflxamt) {

		echo "<script>
        iziToast.error({
          title: 'Error!',
          message: 'You do not have enough funds in your wallet. Kindly fund your wallet and try again',
          position: 'topCenter'
        });</script>";
		
	} else {

	if($flnwmt > $flxamt) {
		
		echo "<script>
        iziToast.error({
          title: 'Error!',
          message: 'You current deposit is greater than your targeted saving',
          position: 'topCenter'
        });</script>";
		
	} else {

		//deduct current user wallet
		$newbal = $bal - $fnddsaflxamt + 100;

		//notify user transaction history
		$ref = "tpay".rand(0, 999);
		$tref = "tpay".rand(0, 999);
		$msg  = "Your Flex Savings Plan of NGN".number_format($fnddsaflxamt)." was successful";
		$sbj  = "Savings Alert";

		$nsql = "INSERT INTO msgs(`usname`, `status`, `sn`, `msg`, `date`, `ticket`, `sbj`)";
		$nsql .="VALUES('$user', 'unread', '1', '$msg', '$date', '$ref', '$sbj')";
		$nes = query($nsql);

		//insert transaction history
		$tsql = "INSERT INTO t_his(`t_ref`, `amt`, `datepaid`, `username`, `sn`, `status`, `paynote`)";
		$tsql .= "VALUES('$tref', '$fnddsaflxamt', '$date', '$user', '1', 'debit', '$msg')";
		$tes = query($tsql);

		//update user wallet
		$sql = "UPDATE users SET `wallet` = '$newbal' WHERE `usname` = '$user'";
		$res = query($sql);

		//update credit savings wallet
		$vsql = "UPDATE savings SET `amt` = '$flnwmt' WHERE `usname` = '$user' AND `plan` = 'Flex Savings Plan' AND `status` = 'Active'";
		$ves = query($vsql);
		
		//create an alert message
		$_SESSION['flexplan'] = "Success";
		echo "Loading... Please wait";
		echo '<script>window.location.href ="./plans"</script>';
	}
	}
}


//classic plan
if(isset($_POST['classic']) && isset($_POST['cldd']) && isset($_POST['clplan'])) {

	$classic    =  clean($_POST['classic']);
	$cldd       =  clean($_POST['cldd']);
	$clplan     =  clean($_POST['clplan']);

	//get user wallet balance
	user_details();

	$user = $t_users['usname'];

	//chcek if user has enough funds
	$bal = ($t_users['wallet'] + $t_ref_earn) - 100;

	if($bal < $classic) {

		echo "<script>
        iziToast.error({
          title: 'Error!',
          message: 'You do not have enough funds in your wallet. Kindly fund your wallet and try again',
          position: 'topCenter'
        });</script>";
		
	} else {

		//deduct current user wallet
		$newbal = $bal - $classic + 100;

		//notify user transaction history
		$date = date("Y-m-d h:i:sa");
		$ref = "tpay".rand(0, 999);
		$tref = "tpay".rand(0, 999);
		$msg  = "Your ". $clplan ." of NGN".number_format($classic)." was successful";
		$sbj  = "Savings Alert";

		$nsql = "INSERT INTO msgs(`usname`, `status`, `sn`, `msg`, `date`, `ticket`, `sbj`)";
		$nsql .="VALUES('$user', 'unread', '1', '$msg', '$date', '$ref', '$sbj')";
		$nes = query($nsql);

		//update user wallet
		$sql = "UPDATE users SET `wallet` = '$newbal' WHERE `usname` = '$user'";
		$res = query($sql);

		//credit savings wallet
		$vsql = "INSERT INTO savings(`usname`, `datepaid`, `plan`, `duration`, `amt`, `status`, `mode`, `descrip`)";
		$vsql .="VALUES('$user', '$date', '$clplan', '$cldd', '$classic', 'Active', 'Wallet', 'Classic Saving')";
		$ves = query($vsql);

		//insert transaction history
		 $tsql = "INSERT INTO t_his(`t_ref`, `amt`, `datepaid`, `username`, `sn`, `status`, `paynote`)";
		 $tsql .= "VALUES('$tref', '$classic', '$date', '$user', '1', 'debit', '$msg')";
		 $tes = query($tsql);

		//create an alert message
		$_SESSION['classicplan'] = "Success";
		echo "Loading... Please wait";
		echo '<script>window.location.href ="./plans"</script>';
	}
}

//fund classic plan
if(isset($_POST['fndclassic']) && isset($_POST['fndclplan'])) {

	$fndclassic    =  clean($_POST['fndclassic']);
	$fndclplan     =  clean($_POST['fndclplan']);

	//get user wallet balance
	user_details();

	$user = $t_users['usname'];

	//chcek if user has enough funds
	$bal = ($t_users['wallet'] + $t_ref_earn) - 100;

	if($bal < $fndclassic) {

    echo "<script>
    iziToast.error({
      title: 'Error!',
      message: 'You do not have enough funds in your wallet. Kindly fund your wallet and try again',
      position: 'topCenter'
    });</script>";
} else {

	 //deduct current user wallet
	$newbal = $bal - $fndclassic + 100;

	 //notify user transaction history
	 $date = date("Y-m-d h:i:sa");
	 $ref = "tpay".rand(0, 999);
	 $msg  = "Your ". $fndclplan ." of NGN".number_format($fndclassic)." was successful";
	 $sbj  = "Savings Alert";
	 $tref = "tpay".rand(0, 999);

	 $nsql = "INSERT INTO msgs(`usname`, `status`, `sn`, `msg`, `date`, `ticket`, `sbj`)";
     $nsql .="VALUES('$user', 'unread', '1', '$msg', '$date', '$ref', '$sbj')";
     $nes = query($nsql);

	//update savings wallet
	$clsvbal = $clcsvs['amt'] + $fndclassic;
	
    $svup = "UPDATE savings SET `amt` = '$clsvbal' WHERE `usname` = '$user' AND `plan` = 'Classic Savings Plan' AND `status` = 'Active'";
    $svql = query($svup);
    

    //update user wallet
    $sql = "UPDATE users SET `wallet` = '$newbal' WHERE `usname` = '$user'";
    $res = query($sql);

	//insert transaction history
	$tsql = "INSERT INTO t_his(`t_ref`, `amt`, `datepaid`, `username`, `sn`, `status`, `paynote`)";
	$tsql .= "VALUES('$tref', '$fndclassic', '$date', '$user', '1', 'debit', '$msg')";
	$tes = query($tsql);

    //create an alert message
    $_SESSION['classicplan'] = "Success";
    echo "Loading... Please wait";
    echo '<script>window.location.href ="./plans"</script>';
}
    
} 
?>