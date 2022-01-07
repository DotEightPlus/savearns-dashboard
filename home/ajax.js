$(document).ready(function () {
  //get account name
  $("#acctn").change(function () {
    var bank = $("#bank").val();
    var acctn = $("#acctn").val();
    var trd = "hello";
    $("#actn").val("Retrieving... Please wait");
    $.ajax({
      type: "post",
      url: "../functions/init.php",
      data: { bank: bank, acctn: acctn, trd: trd },
      success: function (data) {
        $("#actn").val(data);
      },
    });
  });

  //campus plan savings
  $("#cmpbtn").click(function () {
    var campan = $("#campan").val();
    var rrcampan = $("#rrcampan").val();

    if (campan < 200) {
      //$("#msg").html("Minimum deposit for the campus plan is NGN100");

      iziToast.error({
        title: "Error!",
        message: "Minimum deposit for the Campus plan is NGN200",
        position: "topCenter",
      });
    } else {
      iziToast.info({
        title: "Info!",
        message: "Please wait while we process your request...",
        position: "topCenter",
      });

      $.ajax({
        type: "post",
        url: "../functions/init.php",
        data: { campan: campan, rrcampan: rrcampan },
        success: function (data) {
          $("#msg").html(data);
        },
      });
    }
  });


  //fund campus plan wallet
  $("#fndcmpbtn").click(function () {
    var fndcampan = $("#fndcampan").val();
    var fndrrcampan = $("#fndrrcampan").val();

    if (fndcampan < 200) {
      //$("#msg").html("Minimum deposit for the campus plan is NGN100");

      iziToast.error({
        title: "Error!",
        message: "Minimum deposit for the Campus plan is NGN200",
        position: "topCenter",
      });
    } else {
      iziToast.info({
        title: "Info!",
        message: "Please wait while we process your request...",
        position: "topCenter",
      });

      $.ajax({
        type: "post",
        url: "../functions/init.php",
        data: { fndcampan: fndcampan, fndrrcampan: fndrrcampan },
        success: function (data) {
          $("#msg").html(data);
        },
      });
    }
  });

  //flex plan savings
  $("#flexsav").click(function () {
    var flxamt = $("#flxamt").val();
    var dest = $("#dest").val();
    var plann = $("#plann").val();
    var saflxamt = $('#saflxamt').val();

    if (flxamt < 5000) {
      iziToast.error({
        title: "Error!",
        message: "Minimum deposit for the Flex plan is NGN5,000",
        position: "topCenter",
      });
    } else {

      if(saflxamt < 500) {
        iziToast.error({
          title: "Error!",
          message: "Minimum amount you can save now is NGN500",
          position: "topCenter",
        });

      } else {
      iziToast.info({
        title: "Info!",
        message: "Please wait while we process your request...",
        position: "topCenter",
      });

      $.ajax({
        type: "post",
        url: "../functions/init.php",
        data: { flxamt: flxamt, dest: dest, plann: plann, saflxamt: saflxamt },
        success: function (data) {
          $("#msg").html(data);
        },
      });
    }
  }
  });

  //classic savings plan
  $("#clsic").click(function () {
    var classic = $("#classic").val();
    var cldd = $("#cldd").val();
    var clplan = $("#clplan").val();

    if (classic < 2000) {
      iziToast.error({
        title: "Error!",
        message: "Minimum deposit for the Classic plan is NGN2,000",
        position: "topCenter",
      });
    } else {
      iziToast.info({
        title: "Info!",
        message: "Please wait while we process your request...",
        position: "topCenter",
      });

      $.ajax({
        type: "post",
        url: "../functions/init.php",
        data: { classic: classic, cldd: cldd, clplan: clplan },
        success: function (data) {
          $("#msg").html(data);
        },
      });
    }
  });

  //fund classic savings plan
  $("#fndclsic").click(function () {
    var fndclassic = $("#fndclassic").val();
    var fndclplan = $("#fndclplan").val();

    if (fndclassic < 500) {
      iziToast.error({
        title: "Error!",
        message: "Minimum deposit for the Classic plan is NGN500",
        position: "topCenter",
      });
    } else {
      iziToast.info({
        title: "Info!",
        message: "Please wait while we process your request...",
        position: "topCenter",
      });

      $.ajax({
        type: "post",
        url: "../functions/init.php",
        data: { fndclassic: fndclassic, fndclplan: fndclplan },
        success: function (data) {
          $("#fdmsg").html(data);
        },
      });
    }
  });


  //send money
  $("#send").click(function () {
    var amt = $("#amt").val();
    var usus = $("#usus").val();

    if (amt == "" || amt == null) {
      $("#smsg").html("Please input an amount");
    } else {
      if (usus == "" || usus == null) {
        $("#smsg").html("Please input the beneficiary username");
      } else {
        $("#smsg").html("Loading... Please wait");
        $.ajax({
          type: "post",
          url: "../functions/init.php",
          data: { amt: amt, usus: usus },
          success: function (data) {
            $("#smsg").html(data);
          },
        });
      }
    }
  });

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
                          url: "../functions/init.php",
                          data: {
                            gend: gend,
                            inst: inst,
                            dept: dept,
                            level: level,
                            matric: matric,
                            bank: bank,
                            acctn: acctn,
                            actn: actn,
                            pword: pword,
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
});
