
    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="col-12 col-md-12 col-sm-12">
                        <div class="empty-state" data-height="400">
                            <div class="empty-state-icon">
                                <i class="fas fa-gift"></i>
                            </div>
                            <h2 class="mb-3">Get free ₦200</h2>
                            <p class="lead">
                                You and your friends earn cash reward when they signup and save with your referral link
                                or code.
                            </p>
                            
                            <input id="myInput" type="text" value="https://dashboard.savearns.com/signup?link=<?php echo $data ?>" hidden>
                            <a onclick="myFunction()" class="btn btn-primary mt-4 text-white" data-toggle="tooltip" data-placement="top" title="Referal link copied"><?php echo $data ?> <i
                                    class="fa fa-copy"></i></a>
                                    <div class="mt-5 text-center">
                    <a data-media="images/ico.png"
                                href="https://facebook.com/sharer.php?u=https://dashboard.savearns.com/signup?link=<?php echo $data ?>"
                                target="_blank" class="btn btn-social-icon btn-facebook">
                      <i class="fab fa-facebook-f text-dark"></i>
                    </a>
                    <a data-media="images/ico.png"
                                href="https://twitter.com/home?status=https://dashboard.savearns.com/signup?link=<?php echo $data ?>"
                                target="_blank" class="btn btn-social-icon btn-twitter">
                      <i class="fab fa-twitter text-dark"></i>
                    </a>
                    <a data-action="share/whatsapp/share" data-media="images/ico.png"
                                href="https://api.whatsapp.com/send?text=*Yo! I use SAVEARNS to save more while I spend less. It has the best student saving plans! Give it a try using this link *https://dashboard.savearns.com/signup?link=<?php echo $data ?>"
                                target="_blank" class="btn btn-social-icon btn-whatsapp">
                      <i class="fab fa-whatsapp text-dark"></i>
                    </a>
                    
                  </div>
                            <a href="./ref" class="mt-4 bb">View Your Referral Details</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" tabindex="-1" role="dialog" id="payModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Fund Wallet</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-12 col-md-12 col-sm-12">
                        <form method="POST" action="https://checkout.flutterwave.com/v3/hosted/pay">
                            <p>Fill the form below to add funds to your wallet</p>
                            <div class="form-group">
                                <label>Input Amount</label>
                                <div class="input-group">

                                    <input type="number" name="amount" class="form-control" required>
                                </div>
                            </div>

                            <input type="hidden" name="public_key" value="FLWPUBK-aec1e883ede5d055024d042a034f18c9-X" />
                            <input type="hidden" name="customer[email]" value="<?php echo $t_users['email'] ?>" />
                            <input type="hidden" name="customer[phone_number]" value="<?php echo $t_users['tel'] ?>" />
                            <input type="hidden" name="customizations[title]" value="Savearns" />
                            <input type="hidden" name="customer[name]" value="<?php echo $t_users['fname'] ?>" />
                            <input type="hidden" name="tx_ref" value="<?php echo md5(rand(0, 999)); ?>" />
                            <input type="hidden" name="currency" value="NGN" />
                            <input type="hidden" name="redirect_url"
                                value="https://dashboard.savearns.com/home/./fundwallet" />
                            <input type="hidden" name="customizations[logo]"
                                value="https://savearns.com/assets/1.png" />
                            <div class="form-group mb-0">
                                <button type="submit" class="form-control btn-primary">Fund
                                    Now </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="transferModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Send Money</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-12 col-md-12 col-sm-12">
                        <form method="POST" action="#">
                            <p>You can send money from your wallet to other savearns users</p>
                            <div class="form-group">
                                <label>Input Amount</label>
                                <div class="input-group">

                                    <input type="number" name="amount" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Input beneficiary Username</label>
                                <div class="input-group">

                                    <input type="number" name="amount" class="form-control" required>
                                </div>
                            </div>

                            <input type="hidden" name="public_key" value="FLWPUBK-aec1e883ede5d055024d042a034f18c9-X" />
                            <input type="hidden" name="customer[email]" value="<?php echo $t_users['email'] ?>" />
                            <input type="hidden" name="customer[phone_number]" value="<?php echo $t_users['tel'] ?>" />
                            <input type="hidden" name="customizations[title]" value="Savearns" />
                            <input type="hidden" name="customer[name]" value="<?php echo $t_users['fname'] ?>" />
                            <input type="hidden" name="tx_ref" value="<?php echo md5(rand(0, 999)); ?>" />
                            <input type="hidden" name="currency" value="NGN" />
                            <input type="hidden" name="redirect_url"
                                value="https://dashboard.savearns.com/home/./fundwallet" />
                            <input type="hidden" name="customizations[logo]"
                                value="https://savearns.com/assets/1.png" />
                            <div class="form-group mb-0">
                                <button type="submit" class="form-control btn-primary">Fund
                                    Now </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="classicModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Classic Saving Plan(minNGN 1,000/month)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-12 col-md-12 col-sm-12">
                        <form method="POST" action="https://checkout.flutterwave.com/v3/hosted/pay">
                            <p></p>
                            <div class="form-group">
                                <label>Input Amount</label>
                                <div class="input-group">

                                    <input type="number" name="amount" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Select Duration</label>
                                <div class="input-group">
                                <select id="duration" name="duration" class="form-control">
                                <?php
                                    $x = 2;

                                    while($x <= 12) {
                                        echo '

            
                                    <option style="font-size: 20px" id="duration" name="duration">'.$x.' Months</option>
                                

                                    <br>';
                                    $x++;
                                    }
                                ?>

                                </select>
                                </div>
                            </div>

                            <input type="hidden" name="public_key" value="FLWPUBK-aec1e883ede5d055024d042a034f18c9-X" />
                            <input type="hidden" name="customer[email]" value="<?php echo $t_users['email'] ?>" />
                            <input type="hidden" name="customer[phone_number]" value="<?php echo $t_users['tel'] ?>" />
                            <input type="hidden" name="customizations[title]" value="Savearns" />
                            <input type="hidden" name="customer[name]" value="<?php echo $t_users['fname'] ?>" />
                            <input type="hidden" name="tx_ref" value="<?php echo md5(rand(0, 999)); ?>" />
                            <input type="hidden" name="currency" value="NGN" />
                            <input type="hidden" name="redirect_url"
                                value="https://dashboard.savearns.com/home/./fundwallet" />
                            <input type="hidden" name="customizations[logo]"
                                value="https://savearns.com/assets/1.png" />
                            <div class="form-group mb-0">
                                <button type="submit" class="form-control btn-primary">Save Now </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="flexModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Flex Saving Plan(Min NGN 500/month)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-12 col-md-12 col-sm-12">
                        <form method="POST" action="https://checkout.flutterwave.com/v3/hosted/pay">
                            <p></p>
                            <div class="form-group">
                                <label>Input Amount</label>
                                <div class="input-group">

                                    <input type="number" name="amount" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Select Duration</label>
                                <div class="input-group">
                                <select id="duration" name="duration" class="form-control">
                                <?php
                                    $x = 2;

                                    while($x <= 12) {
                                        echo '

            
                                    <option style="font-size: 20px" id="duration" name="duration">'.$x.' Months</option>
                                

                                    <br>';
                                    $x++;
                                    }
                                ?>

                                </select>
                                </div>
                            </div>

                            <input type="hidden" name="public_key" value="FLWPUBK-aec1e883ede5d055024d042a034f18c9-X" />
                            <input type="hidden" name="customer[email]" value="<?php echo $t_users['email'] ?>" />
                            <input type="hidden" name="customer[phone_number]" value="<?php echo $t_users['tel'] ?>" />
                            <input type="hidden" name="customizations[title]" value="Savearns" />
                            <input type="hidden" name="customer[name]" value="<?php echo $t_users['fname'] ?>" />
                            <input type="hidden" name="tx_ref" value="<?php echo md5(rand(0, 999)); ?>" />
                            <input type="hidden" name="currency" value="NGN" />
                            <input type="hidden" name="redirect_url"
                                value="https://dashboard.savearns.com/home/./fundwallet" />
                            <input type="hidden" name="customizations[logo]"
                                value="https://savearns.com/assets/1.png" />
                            <div class="form-group mb-0">
                                <button type="submit" class="form-control btn-primary">Save Now </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="campusModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Campus Saving Plan(minNGN 100/month)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-12 col-md-12 col-sm-12">
                        <form method="POST" action="https://checkout.flutterwave.com/v3/hosted/pay">
                            <p></p>
                            <div class="form-group">
                                <label>Input Amount</label>
                                <div class="input-group">

                                    <input type="number" name="amount" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Select Duration</label>
                                <div class="input-group">
                                <select id="duration" name="duration" class="form-control">
                                <?php
                                    $x = 2;

                                    while($x <= 12) {
                                        echo '

            
                                    <option style="font-size: 20px" id="duration" name="duration">'.$x.' Months</option>
                                

                                    <br>';
                                    $x++;
                                    }
                                ?>

                                </select>
                                </div>
                            </div>

                            <input type="hidden" name="public_key" value="FLWPUBK-aec1e883ede5d055024d042a034f18c9-X" />
                            <input type="hidden" name="customer[email]" value="<?php echo $t_users['email'] ?>" />
                            <input type="hidden" name="customer[phone_number]" value="<?php echo $t_users['tel'] ?>" />
                            <input type="hidden" name="customizations[title]" value="Savearns" />
                            <input type="hidden" name="customer[name]" value="<?php echo $t_users['fname'] ?>" />
                            <input type="hidden" name="tx_ref" value="<?php echo md5(rand(0, 999)); ?>" />
                            <input type="hidden" name="currency" value="NGN" />
                            <input type="hidden" name="redirect_url"
                                value="https://dashboard.savearns.com/home/./fundwallet" />
                            <input type="hidden" name="customizations[logo]"
                                value="https://savearns.com/assets/1.png" />
                            <div class="form-group mb-0">
                                <button type="submit" class="form-control btn-primary">Save Now </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

  /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);
}
</script>