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
            <h2 class="section-title">Welcome to Savearns</h2>
            <p class="section-lead">Kindly fill the
                above
                details to continue</p>

            <div class="row">
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="card">

                        <div class="card-body">
                            <ul class="nav nav-pills" id="myTab3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#profile"
                                        role="tab" aria-controls="home" aria-selected="true">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#account" role="tab"
                                        aria-controls="profile" aria-selected="false">Account</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#security" role="tab"
                                        aria-controls="contact" aria-selected="false">Security</a>
                                </li>
                            </ul>


                            <form id="userdetails">
                                <div class="tab-content" id="myTabContent2">
                                    <div class="tab-pane fade show active" id="profile" role="tabpanel"
                                        aria-labelledby="home-tab3">
                                        <div class="card">

                                            <div class="card-body row">
                                                <div class="form-group col-md-6  col-lg-6 col-sm-12">
                                                    <label>Full Name</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-user"></i>
                                                            </div>
                                                        </div>
                                                        <input type="text" value="<?php echo $t_users['fname'] ?>"
                                                            class="form-control" disabled>
                                                    </div>

                                                </div>
                                                <div class="form-group col-md-6 col-lg-6 col-sm-12">
                                                    <label>Telephone</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-phone"></i>
                                                            </div>
                                                        </div>
                                                        <input type="text" value="<?php echo $t_users['tel'] ?>"
                                                            class="form-control" disabled>
                                                    </div>

                                                </div>
                                                <div class="form-group col-md-6 col-lg-6 col-sm-12">
                                                    <label>Email </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-envelope"></i>
                                                            </div>
                                                        </div>
                                                        <input type="email" value="<?php echo $t_users['email'] ?>"
                                                            class="form-control phone-number" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 col-lg-6 col-sm-12">
                                                    <label>Select Gender</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-users"></i>
                                                            </div>
                                                        </div>
                                                        <select id="gend" class="form-control">
                                                            <option id="gend">Select Gender</option>
                                                            <option id="gend">Male</option>
                                                            <option id="gend">Female</option>
                                                        </select>

                                                    </div>

                                                </div>
                                                <div class="form-group col-md-6 col-lg-6 col-sm-12">
                                                    <label>Institution Name</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-graduation-cap"></i>
                                                            </div>
                                                        </div>
                                                        <input type="text" id="inst" onclick="hideMsg()"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 col-lg-6 col-sm-12">
                                                    <label>Department</label>
                                                    <input type="text" id="dept" class="form-control">
                                                </div>
                                                <div class="form-group col-md-6 col-lg-6 col-sm-12">
                                                    <label>Level</label>
                                                    <input type="text" id="level" class="form-control invoice-input">
                                                </div>
                                                <div class="form-group col-md-6 col-lg-6 col-sm-12">
                                                    <label>Matric Number</label>
                                                    <input type="text" id="matric" class="form-control">
                                                </div>

                                            </div>
                                        </div>
                                    </div>




                                    <div class="tab-pane fade" id="account" role="tabpanel"
                                        aria-labelledby="profile-tab3">
                                        <div class="card">

                                            <div class="card-body row">
                                                <div class="form-group col-md-6  col-lg-6 col-sm-12">
                                                    <label>Bank Name</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-credit-card"></i>
                                                            </div>
                                                        </div>
                                                        <select id="bank" class="form-control">
                                                            <?php

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

                                                                echo '<option id="bank">'.$banks[$row]['name'].'</option>';

                                                                $row++;
                                                                } 
                                                                ?>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="form-group col-md-6 col-lg-6 col-sm-12">
                                                    <label>Account Number</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-key"></i>
                                                            </div>
                                                        </div>
                                                        <input type="number" id="acctn" name="numb"
                                                            class="form-control">
                                                    </div>

                                                </div>
                                                <div class="form-group col-md-12 col-lg-12 col-sm-12">
                                                    <label>Account Name </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-user"></i>
                                                            </div>
                                                        </div>
                                                        <input type="text" id="actn" class="form-control phone-number"
                                                            disabled>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>






                                    <div class="tab-pane fade" id="security" role="tabpanel"
                                        aria-labelledby="contact-tab3">


                                        <div class="card">

                                            <div class="card-body row">
                                                <div class="form-group col-md-6  col-lg-6 col-sm-12">
                                                    <label>Create Transaction PIN</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-lock"></i>
                                                            </div>
                                                        </div>
                                                        <input type="text" id="pword" class="form-control">
                                                    </div>

                                                </div>
                                                <div class="form-group col-md-6 col-lg-6 col-sm-12">
                                                    <label>Confirm PIN</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-lock"></i>
                                                            </div>
                                                        </div>
                                                        <input type="number" id="cpword" class="form-control">
                                                    </div>

                                                </div>

                                                <div class="card-footer text-right">
                                                    <p class="font-weight-bolder text-danger" id="msg"></p>
                                                    <button type="button" id="subprof"
                                                        class="btn btn-primary footer-right">Submit</button>
                                                </div>
                                            </div>
                                        </div>


                                    </div>



                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

            <!--<div class="card">
                            <div class="card-header">
                                <h4>Example Card</h4>
                            </div>
                            <div class="card-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                            <div class="card-footer bg-whitesmoke">
                                This is card footer
                            </div>
                        </div>-->
        </div>
    </section>
</div>

<script>
//get account number
/*document.getElementById('acctn').addEventListener('change', resResult);

function resResult() {
    var bank = document.forms["userdetails"]["bank"].value;
    var numb = document.forms["userdetails"]["numb"].value;

    var xhr = new XMLHttpRequest();
    xhr.open('GET', './accountname?id=' + bank + '&other=' + numb, true);

    xhr.onload = function() {
        if (xhr.status == 200) {
            //document.write(this.responseText);
            document.getElementById('actn').value = xhr.responseText;
        } else {

            document.getElementById('actn').value = 'Poor Internet Connection';
        }
    }

    xhr.send();
}*/
</script>
<script>
//open verify page by default
function otpVerify() {
    document.getElementById('verify').style.display = 'block';
}

//close signup page
function signupClose() {
    document.getElementById('signup').style.display = 'none';
}

//erase validations
function usr() {
    document.getElementById("lmsg").innerHTML = '';
}

function prr() {
    document.getElementById("lmsg").innerHTML = '';
}

function otpr() {
    document.getElementById("vmsg").innerHTML = '';
    document.getElementById("rvmsg").innerHTML = '';
}
</script>