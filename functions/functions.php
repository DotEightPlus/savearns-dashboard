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
$uname	 		= clean(escape($_POST['user']));
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
	$unam = escape($uname);
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

		}else {

		         echo 'Loading... Please Wait!';
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

	$sql = "UPDATE signup SET `pword` = '$fgpword', `activator` = '' WHERE `email` = '$eml'";
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

	$data	    = $_SESSION['login']; 

	$sql = "SELECT * FROM users WHERE `usname` = '$data'";
	$rsl = query($sql);

	//check if user details is valid
	if(row_count($rsl) == '') {

		redirect(".././logout");
		
	} else {

		$GLOBALS['t_users'] = mysqli_fetch_array($rsl);

	}
}
?>