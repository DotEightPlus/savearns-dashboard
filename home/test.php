<?php
include('../functions/init.php');


$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.flutterwave.com/v3/bills",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"country\":\"NG\",\"customer\":\"+23490803840303\",\"amount\":\"500\",\"recurrence\":\"ONCE\",\"type\":\"AIRTIME\",\"reference\":\"9300049404444\",\"biller_name\":\"DSTV, MTN VTU, TIGO VTU, VODAFONE VTU, VODAFONE POSTPAID PAYMENT\"}",
  CURLOPT_HTTPHEADER => [
    "Accept: application/json",
    "Authorization: Bearer FLWSECK_TEST-185a2dd929590007032cacfb3837f3c8-X",
    "Content-Type: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}


/**user_details();
$dur = $clcsvs['duration'];
$a = date('Y-m-d h:i:s', strtotime($clcsvs['datepaid']. ' +'.$dur));

*/

?>
<!-- Display the countdown timer in an element 
<p id="demo"></p>

<script>
// Set the date we're counting down to
var countDownDate = new Date("<?php echo $a ?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id="demo"
    document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
        minutes + "m " + seconds + "s ";

    // If the count down is finished, write some text
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
}, 1000);
</script>-->

<script>
// Set the date we're counting down to
var countDownDate = new Date("<?php echo $campdura ?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id="demo"
    document.getElementById("demo").innerHTML = days + "days " + hours + "hrs " +
        minutes + "min " + seconds + "sec ";

    // If the count down is finished, write some text
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "Withdraw funds";
    }
}, 1000);
</script>