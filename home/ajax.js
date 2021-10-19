$(document).ready(function () {
  //profile complete
  $("#subprof").click(function () {
    var gend = $("#gend").val();
    var inst = $("#inst").val();
    var dept = $("#dept").val();
    var level = $("#level").val();
    var matric = $("#matric").val();
    var bank = $("#bank").val();
    var acctn = $("#acctn").val();
    var actn = $("#actn").val();
    var pword = $("#pword").val();
    var cpword = $("#cpword").val();

    if (inst == "" || inst == null) {
      $("#msg").html("Please input your institution name");
    } else {
      if (dept == "" || dept == null) {
        $("#msg").html("Your departent is empty");
      } else {
        if (level == "" || level == null) {
          $("#msg").html("kinldy fill your level field");
        } else {
          if (matric == "" || matric == null) {
            $("#msg").html("Matric Field is empty");
          } else {
            if (bank == "" || bank == null) {
              $("#msg").html("Your Bank name is empty");
            } else {
              if (acctn == "" || acctn == null) {
                $("#msg").html("Invalid account number");
              } else {
                if (actn == "" || actn == null) {
                  $("#msg").html("Unable to retrieve account name");
                } else {
                  if (pword == "" || pword == null) {
                    $("#msg").html("Transaction Pin not set");
                  } else {
                    if (cpword == "" || cpword == null) {
                      $("#msg").html(
                        "Kindly confirm the transaction pin inputted"
                      );
                    } else {
                      if (pword != cpword) {
                        $("#msg").html("Transaction pin doesn't match");
                      } else {
                        $("#msg").html("Loading...Please Wait");

                        $.ajax({
                          type: "post",
                          url: "functions/init.php",
                          data: {
                            fname: fname,
                            tel: tel,
                            email: email,
                            user: user,
                            pword: pword,
                            cpword: cpword,
                            ref: ref,
                          },
                          success: function (data) {
                            $("#msg").html(data);
                          },
                        });
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  });

  //get account name
  $("#acctn").change(function () {
    var bank = $("#bank").val();
    var acctn = $("#acctn").val();
    var trd = "hello";

    $.ajax({
      type: "post",
      url: "../functions/init.php",
      data: { bank: bank, acctn: acctn, trd: trd },
      success: function (data) {
        $("#actn").val(data);
      },
    });

    //alert(bank + acctn);
  });
});
