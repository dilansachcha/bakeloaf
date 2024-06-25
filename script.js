window.onscroll = function () {
  scroll();
};

function scroll() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("header").style.top = "0";
  } else {
    document.getElementById("header").style.top = "-60px";
  }
}

function b11() {
  var b11 = document.getElementById("b11");
  var b12 = document.getElementById("b12");

  b11.className = "text-white bg-danger p-1 rounded-4 visible";
  b12.className =
    "position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger mt-3 visually-hidden";
}

function breads() {
  window.location = "breads.php";
}

function cakesandcupcakes() {
  window.location = "cakesandcupcakes.php";
}

function danishes() {
  window.location = "pastrydanish.php";
}

function cookiesandbars() {
  window.location = "cookiesandbars.php";
}

function savory() {
  window.location = "savoryitems.php";
}

function qty_inc() {
  var inp = document.getElementById("inp");

  var newValue = parseInt(inp.value) + 1;
  inp.value = newValue.toString();
}

function qty_dec() {
  var inp = document.getElementById("inp");

  if (inp.value == 1) {
  } else {
    var newValue = parseInt(inp.value) - 1;
    inp.value = newValue.toString();
  }
}

function showbutton() {
  var change = document.getElementById("change");

  change.classList.toggle("disabled");
}

function checkOut() {
  var total = document.getElementById("total").innerHTML;

  var spinner = document.getElementById("spinner2");
  spinner.classList = "spinner-wraper2";

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "ppp") {
        const spinerwraperEL = document.querySelector(".spinner-wraper2");
        setTimeout(() => {
          spinerwraperEL.style.opacity = "0";

          setTimeout(() => {
            spinerwraperEL.style.display = "none";
          }, 200);
        }, 3700);

        setTimeout(() => {
          window.location = "payment.php";
        }, 3700);
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "checkOutProcess.php?total=" + total, true);
  r.send();
}

function cancelRequest() {
  var email = document.getElementById("email").value;
  var total = document.getElementById("total").value;
  var orderId = document.getElementById("orderID").value;

  var spinner = document.getElementById("spinner3");
  spinner.classList = "spinner-wraper3";

  var f = new FormData();
  f.append("email", email);
  f.append("total", total);
  f.append("orderid", orderId);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        const spinerwraperEL = document.querySelector(".spinner-wraper3");
        setTimeout(() => {
          spinerwraperEL.style.opacity = "0";

          setTimeout(() => {
            spinerwraperEL.style.display = "none";
          }, 200);
        }, 3700);

        setTimeout(() => {
          window.location = "cart.php";
        }, 3700);
      } else if (t == "nathoo") {
        const spinerwraperEL = document.querySelector(".spinner-wraper3");
        setTimeout(() => {
          spinerwraperEL.style.opacity = "0";

          setTimeout(() => {
            spinerwraperEL.style.display = "none";
          }, 200);
        }, 3700);

        setTimeout(() => {
          window.location = "cart.php";
        }, 3700);
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "cancelRequestProcess.php", true);
  r.send(f);
}

function pendingOrders() {
  var total = document.getElementById("total");
  var mobile = document.getElementById("mobile");
  var city = document.getElementById("city");
  var address = document.getElementById("address");
  var name = document.getElementById("name");
  var email = document.getElementById("email");
  var orderId = document.getElementById("orderID");

  var f = new FormData();
  f.append("total", total.value);
  f.append("mobile", mobile.value);
  f.append("city", city.value);
  f.append("address", address.value);
  f.append("name", name.value);
  f.append("email", email.value);
  f.append("orderid", orderId.value);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == "Let's Pay.") {
        window.location = "directpay.php";
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "pendingOrdersProcess.php", true);
  r.send(f);
}

function pay() {
  var id = document.getElementById("id").innerHTML;
  var total = document.getElementById("total").innerHTML;
  var email = document.getElementById("email").innerHTML;

  var form = new FormData();
  form.append("id", id);
  form.append("total", total);


  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      // alert(request.responseText);

      var obj = JSON.parse(request.responseText);

      // Payment completed. It can be a successful failure.
      payhere.onCompleted = function onCompleted() {
        console.log("Payment completed.");

        setTimeout(() => {
          window.location = "invoice.php";
          alert("We Send Invoice to your email. Please Check!");
          update();

          function update() {
            const success = "success";

            var f = new FormData();
            f.append("total", total);
            f.append("success", success);
            f.append("email", email);

            var r = new XMLHttpRequest();

            // r.onreadystatechange = function () {
            //   if (r.readyState == 4) {
            //     var t = r.responseText;
            //     alert(t);
            //   }
            // };

            r.open("POST", "updateOrdersProcess.php", true);
            r.send(f);
          }
        }, 3000);
        // Note: validate the payment and show success or failure page to the customer
      };

      // Payment window closed
      payhere.onDismissed = function onDismissed() {
        // Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
      };

      // Error occurred
      payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:" + error);
      };

      // Put the payment variables here
      var payment = {
        sandbox: true,
        merchant_id: "1227401", // Replace your Merchant ID
        return_url: "http://localhost/bakeloaf/payment.php/", // Important
        cancel_url: "http://localhost/bakeloaf/payment.php/", // Important
        notify_url: "http://sample.com/notify",
        order_id: obj["order_id"],
        items: "...",
        amount: obj["amount"],
        currency: obj["currency"],
        hash: obj["hash"], // *Replace with generated hash retrieved from backend
        first_name: "Saman",
        last_name: "Perera",
        email: email,
        phone: "0771234567",
        address: "No.1, Galle Road",
        city: "Colombo",
        country: "Sri Lanka",
        delivery_address: "No. 46, Galle road, Kalutara South",
        delivery_city: "Kalutara",
        delivery_country: "Sri Lanka",
        custom_1: "",
        custom_2: "",
      };
      payhere.startPayment(payment);
    }
  };
  request.open("POST", "payhereprocess.php", true);
  request.send(form);
}
function page1() {
  var d1 = document.getElementById("d1");
  var d2 = document.getElementById("d2");
  var d3 = document.getElementById("d3");
  var pro = document.getElementById("pro");
  var d4 = document.getElementById("d4");

  d1.classList = "col-12  visible";
  d2.classList = "col-12  visually-hidden";
  d3.classList = "col-12  visually-hidden";
  d4.classList = "col-12  visually-hidden";
  pro.style = "width: 25%";
  pro.innerHTML = "25%";
}

function page2() {
  var d1 = document.getElementById("d1");
  var d2 = document.getElementById("d2");
  var d3 = document.getElementById("d3");
  var d4 = document.getElementById("d4");
  var pro = document.getElementById("pro");

  d1.classList = "col-12  visually-hidden";
  d2.classList = "col-12  visible";
  d3.classList = "col-12  visually-hidden";
  d4.classList = "col-12  visually-hidden";

  pro.style = "width: 50%";
  pro.innerHTML = "50%";
}

function page3() {
  var d1 = document.getElementById("d1");
  var d2 = document.getElementById("d2");
  var d3 = document.getElementById("d3");
  var d4 = document.getElementById("d4");
  var pro = document.getElementById("pro");

  d1.classList = "col-12  visually-hidden";
  d2.classList = "col-12  visually-hidden";
  d3.classList = "col-12  visible";
  d4.classList = "col-12  visually-hidden";
  pro.style = "width: 75%";
  pro.innerHTML = "75%";
}

function showButton() {
  var da = document.getElementById("da");
  var city = document.getElementById("city");

  var f = new FormData();
  f.append("da", da.value);
  f.append("city", city.value);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var rt = r.responseText;
      if (rt == "success") {
        var st3 = document.getElementById("step3");
        var co = document.getElementById("payhere-payment");

        st3.classList = "btn btn-success fw-bold visible";
        co.classList = "btn btn-warning fw-bold visible";
      } else {
        alert(rt);
      }
    }
  };

  r.open("POST", "showLocation.php", true);
  r.send(f);
}

function invoice(total) {
  var date = document.getElementById("date").innerHTML;
  // var total = document.getElementById("total").innerHTML;

  alert(date);
  alert(total).value;

  var f = new FormData();
  f.append("date", date);
  f.append("total", total);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "hello") {
        // window.location = 'invoice.php';
      }
    }
  };

  r.open("POST", "invoiceProcess.php", true);
  r.send(f);
}

function deleteonhistory(oid) {
  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var rt = r.responseText;
      if (rt == "Delete Complete") {
        window.location.reload();
        alert("Delete Complete.");
      } else {
        alert(rt);
      }
    }
  };

  r.open("GET", "deleteonhistoryprocecss.php?oid=" + oid, true);
  r.send();
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//    Programing Codes

var av;
function sendverification() {
  var spinner = document.getElementById("spinner");
  spinner.classList = "spinner-wraper";

  const spinerwraperEL = document.querySelector(".spinner-wraper");
  setTimeout(() => {
    spinerwraperEL.style.opacity = "0";

    setTimeout(() => {
      spinerwraperEL.style.display = "none";
    }, 200);
  }, 3700);

  var email = document.getElementById("e");

  var f = new FormData();
  f.append("e", email.value);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var b = r.responseText;
      if (b == "success") {
        var adminVerificationModal =
          document.getElementById("verificationModal");
        av = new bootstrap.Modal(adminVerificationModal);
        av.show();
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "adminVerificationProcess.php", true);
  r.send(f);
}

function verify() {
  var verification = document.getElementById("vcode");

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        av.hide();
        window.location = "adminPanel.php";
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "verificationProcess.php?v=" + verification.value, true);
  r.send();
}

function signUp() {
  var fn = document.getElementById("fn");
  var ln = document.getElementById("ln");
  var p = document.getElementById("p");
  var m = document.getElementById("m");
  var e = document.getElementById("e");
  var g = document.getElementById("g");

  var f = new FormData();

  f.append("fn", fn.value);
  f.append("ln", ln.value);
  f.append("p", p.value);
  f.append("m", m.value);
  f.append("e", e.value);
  f.append("g", g.value);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        alert("Sign Up Success...");
        window.location = "signin.php";
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "signUpProcess.php", true);
  r.send(f);
}

function signIn() {
  var email = document.getElementById("email2");
  var password = document.getElementById("password2");
  var rememberme = document.getElementById("rememberme");

  var f = new FormData();
  f.append("e", email.value);
  f.append("p", password.value);
  f.append("r", rememberme.checked);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        window.location = "home.php";
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "signInProcess.php", true);
  r.send(f);
}

var bm;

function forgotPassword() {
  var email = document.getElementById("email2");

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "Success") {
        alert(
          "Verification code has sent to your email. Please check your inbox"
        );
        var m = document.getElementById("forgotPasswordModal");
        bm = new bootstrap.Modal(m);
        bm.show();
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "forgotPasswordProcess.php?e=" + email.value, true);
  r.send();
}

function ShowPassword() {
  var i = document.getElementById("npi");
  var eye = document.getElementById("e1");

  if (i.type == "password") {
    i.type = "text";
    eye.className = "bi bi-eye-fill";
  } else {
    i.type = "password";
    eye.className = "bi bi-eye-slash-fill";
  }
}

function ShowPassword2() {
  var i = document.getElementById("rnp");
  var eye = document.getElementById("e2");

  if (i.type == "password") {
    i.type = "text";
    eye.className = "bi bi-eye-fill";
  } else {
    i.type = "password";
    eye.className = "bi bi-eye-slash-fill";
  }
}

function resetpw() {
  var email = document.getElementById("email2");
  var np = document.getElementById("npi");
  var rnp = document.getElementById("rnp");
  var vcode = document.getElementById("vc");

  var f = new FormData();
  f.append("e", email.value);
  f.append("n", np.value);
  f.append("r", rnp.value);
  f.append("v", vcode.value);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        bm.hide();
        alert("Password reset success");
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "resetPassword.php", true);
  r.send(f);
}

function signout() {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        alert("are you sure you want to quit?");
        window.location = "signin.php";
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "signoutProcess.php", true);
  r.send();
}

function basicSearch(x) {
  var txt = document.getElementById("basic_search_txt");
  var select = document.getElementById("basic_search_select");

  var f = new FormData();
  f.append("t", txt.value);
  f.append("s", select.value);
  f.append("page", x);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      document.getElementById("basicSearchResult").innerHTML = t;
    }
  };

  r.open("POST", "basicSearchProcess.php", true);
  r.send(f);
}

function addFeedback(order_id) {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        window.location = "addFeedback.php";
      } else {
        alert("not working.");
      }
    }
  };

  r.open("GET", "addOrderIdFeedbackProcess.php?order_id=" + order_id, true);
  r.send();
}

function saveFeedback(order_id) {
  var type;
  if (document.getElementById("type1").checked) {
    type = 1;
  } else if (document.getElementById("type2").checked) {
    type = 2;
  } else if (document.getElementById("type3").checked) {
    type = 3;
  }

  var feedback = document.getElementById("feed");
  var demail = document.getElementById("demail");

  var f = new FormData();
  f.append("type", type);
  f.append("order_id", order_id);
  f.append("feedback", feedback.value);
  f.append("demail", demail.value);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        alert("feedback successfully saved");
        window.location = "home.php";
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "saveFeedbackProcess.php", true);
  r.send(f);
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////// admin panel  ///////////////////////////////////////////////////////////

function changeProductImage() {
  var image = document.getElementById("imageuploader");

  image.onchange = function () {
    var file_count = image.files.length;

    if ((file_count = 1)) {
      for (var x = 0; x < file_count; x++) {
        var file = this.files[x];
        var url = window.URL.createObjectURL(file);

        document.getElementById("i").src = url;
      }
    } else {
      alert("Please select 1 image.");
    }
  };
}

function addFood() {
  var category = document.getElementById("category");
  var name = document.getElementById("name");
  var price = document.getElementById("price");
  var status = document.getElementById("status");
  var desc = document.getElementById("desc");
  var dfh = document.getElementById("dfh");
  var dfo = document.getElementById("dfo");
  var desc = document.getElementById("desc");
  var image = document.getElementById("imageuploader");

  var f = new FormData();

  f.append("ca", category.value);
  f.append("name", name.value);
  f.append("price", price.value);
  f.append("status", status.value);
  f.append("dfh", dfh.value);
  f.append("dfo", dfo.value);
  f.append("desc", desc.value);

  var file_count = image.files.length;

  for (var x = 0; x < file_count; x++) {
    f.append("image" + x, image.files[x]);
  }

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "Food Add successfully") {
        alert("success");
        window.location.reload();
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "addFoodProcess.php", true);
  r.send(f);
}

function updateFood() {
  var category1 = document.getElementById("category1");
  var name1 = document.getElementById("name1");
  var price1 = document.getElementById("price1");
  var status1 = document.getElementById("status1");
  var desc1 = document.getElementById("desc1");
  var dfh1 = document.getElementById("dfh1");
  var dfo1 = document.getElementById("dfo1");

  var f = new FormData();

  f.append("ca", category1.value);
  f.append("name", name1.value);
  f.append("price", price1.value);
  f.append("status", status1.value);
  f.append("dfh", dfh1.value);
  f.append("dfo", dfo1.value);
  f.append("desc", desc1.value);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "Food Update successfully") {
        alert("success");
        window.location.reload();
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "updateFoodProcess.php", true);
  r.send(f);
}

function deleteFood(name) {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        alert("Food Deleted Successfully");
        window.location.reload();
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "deleteFoodProcess.php?name=" + name, true);
  r.send();
}

function singleProductView(id) {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        window.location = "singleProductview.php";
      } else {
        alert("not working.");
      }
    }
  };

  r.open("GET", "singleProductProcess.php?id=" + id, true);
  r.send();
}

function addToCart(id) {
  var input = document.getElementById("inp").value;

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == "success") {
        alert("food add to cart successfully...");
        window.location.reload();
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "addToCartProcess.php?id=" + id + "&input=" + input, true);
  r.send();
}

function deleteFromCart() {
  var email = document.getElementById("email").innerHTML;
  var id1 = document.getElementById("id1").innerHTML;

  var f = new FormData();
  f.append("email", email);
  f.append("id1", id1);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        alert("Food Delete Successfully...");
        window.location.reload();
      } else {
        alert(t);
      }
    }
  };
  r.open("POST", "deleteFromCartProcess.php", true);
  r.send(f);
}

function changeImage() {
  var view = document.getElementById("viewimg");
  var file = document.getElementById("profileimg");

  file.onchange = function () {
    var file1 = this.files[0];
    var url = window.URL.createObjectURL(file1);
    view.src = url;
  };
}

function updateProfile() {
  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var mobile = document.getElementById("mobile");
  var line1 = document.getElementById("line1");
  var line2 = document.getElementById("line2");
  var province = document.getElementById("province");
  var district = document.getElementById("district");
  var city = document.getElementById("city");
  var pcode = document.getElementById("pcode");
  var image = document.getElementById("profileimg");

  var f = new FormData();

  f.append("fn", fname.value);
  f.append("ln", lname.value);
  f.append("m", mobile.value);
  f.append("l1", line1.value);
  f.append("l2", line2.value);
  f.append("p", province.value);
  f.append("d", district.value);
  f.append("c", city.value);
  f.append("pc", pcode.value);

  if (image.files.length == 0) {
    var confirmation = confirm(
      "Are you sure You don't want to update Profile Image?"
    );

    if (confirmation) {
      alert("you have not selected any image.");
    }
  } else {
    f.append("image", image.files[0]);
  }

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        window.location = "home.php";
        // window.location.reload();
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "updateProfileProcess.php", true);
  r.send(f);
}

// function singleProductView(id) {

//     var r = new XMLHttpRequest();

//     r.onreadystatechange = function () {
//         if (r.readyState == 4) {
//             var t = r.responseText;
//             if (t == "success") {
//                 window.location = "singleProductview.php";
//             } else {
//                 alert("not working.")
//             }

//         }
//     };

//     r.open("GET", "singleProductProcess.php?id=" + id, true);
//     r.send();

// }

function delivererVerification(email) {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        alert("verification success.");
        window.location.reload();
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "delivererVerificationProcess.php?email=" + email, true);
  r.send();
}

function foodStatus(order_id) {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == "cooking") {
        alert("status updated to cooking..");
        window.location.reload();
      } else if (t == "packing") {
        alert("status updated to packing");
        window.location.reload();
      } else if (t == "ready to deliver") {
        alert("status updated to ready to deliver ");
        window.location.reload();
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "foodStatusChangeProcess.php?order_id=" + order_id, true);
  r.send();
}

function addFoodChange() {
  var add = document.getElementById("addfood");

  setTimeout(() => {
    add.classList.toggle("d-none");
  }, 150);
}

function addFoodChange1() {
  var add2 = document.getElementById("updatefood");

  setTimeout(() => {
    add2.classList.toggle("d-none");
  }, 150);
}

function addFoodChange2() {
  var add3 = document.getElementById("deletefood");

  setTimeout(() => {
    add3.classList.toggle("d-none");
  }, 150);
}

function customerClick() {
  var user1 = document.getElementById("user1");

  setTimeout(() => {
    user1.classList.toggle("d-none");
  }, 150);
}

function delivererClick() {
  var user2 = document.getElementById("user2");

  setTimeout(() => {
    user2.classList.toggle("d-none");
  }, 150);
}

function blockCustomer(email) {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        alert("Blocked User successfully.");
        window.location.reload();
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "blockCustomerProcess.php?email=" + email, true);
  r.send();
}

function blockDiliverer(email2) {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        alert("Blocked Deliverer successfully.");
        window.location.reload();
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "blockDelivererProcess.php?email2=" + email2, true);
  r.send();
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////// Deliver /////////////////////////////////////////////////////////////////

function signUpDeliver() {
  var fn = document.getElementById("fn");
  var ln = document.getElementById("ln");
  var p = document.getElementById("p");
  var m = document.getElementById("m");
  var e = document.getElementById("e");
  var g = document.getElementById("g");

  var f = new FormData();

  f.append("fn", fn.value);
  f.append("ln", ln.value);
  f.append("p", p.value);
  f.append("m", m.value);
  f.append("e", e.value);
  f.append("g", g.value);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        alert("Sign Up Success...");
        window.location = "diliver_signin.php";
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "diliversignUpProcess.php", true);
  r.send(f);
}

var lm;

function deliverersignIn() {
  var email = document.getElementById("email2");
  var password = document.getElementById("password2");
  var rememberme = document.getElementById("rememberme");

  var f = new FormData();
  f.append("e", email.value);
  f.append("p", password.value);
  f.append("r", rememberme.checked);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        window.location = "delivererHome.php";
      } else if (t == "nathoo") {
        alert("your account not verified yet. please wait....");
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "delivererSignInProcess.php", true);
  r.send(f);
}

var bm;

function delivererforgotPassword() {
  var email = document.getElementById("email2");

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "Success") {
        alert(
          "Verification code has sent to your email. Please check your inbox"
        );
        var m = document.getElementById("forgotPasswordModal");
        bm = new bootstrap.Modal(m);
        bm.show();
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "deliverForgotPasswordProcess.php?e=" + email.value, true);
  r.send();
}

function delivererShowPassword() {
  var i = document.getElementById("npi");
  var eye = document.getElementById("e1");

  if (i.type == "password") {
    i.type = "text";
    eye.className = "bi bi-eye-fill";
  } else {
    i.type = "password";
    eye.className = "bi bi-eye-slash-fill";
  }
}

function delivererShowPassword2() {
  var i = document.getElementById("rnp");
  var eye = document.getElementById("e2");

  if (i.type == "password") {
    i.type = "text";
    eye.className = "bi bi-eye-fill";
  } else {
    i.type = "password";
    eye.className = "bi bi-eye-slash-fill";
  }
}

function deliverResetpw() {
  var email = document.getElementById("email2");
  var np = document.getElementById("npi");
  var rnp = document.getElementById("rnp");
  var vcode = document.getElementById("vc");

  var f = new FormData();
  f.append("e", email.value);
  f.append("n", np.value);
  f.append("r", rnp.value);
  f.append("v", vcode.value);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        bm.hide();
        alert("Password reset success");
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "deliverResetPassword.php", true);
  r.send(f);
}

function dilivererStatusSet(email) {
  var option = document.getElementById("option");

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "1") {
        alert("you are online now");

        window.location.reload();
      } else if (t == "2") {
        alert("you are offline now");

        window.location.reload();
      } else {
        alert(t);
      }
    }
  };

  r.open(
    "GET",
    "dilivererStatusSetProcess.php?option=" + option.value + "&email=" + email,
    true
  );
  r.send();
}

function delivererAcceptOrders(order_id) {
  var email = document.getElementById("email").innerHTML;

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "Accept") {
        alert("you accept this order. Please check your orders list...");
        window.location.reload();
      } else {
        alert(t);
      }
    }
  };

  r.open(
    "GET",
    "foodStatusChangeProcessByDeliverer.php?order_id=" +
      order_id +
      "&email=" +
      email,
    true
  );
  r.send();
}

function dilivererAcceptClick(order_id) {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        alert("status changed to dilivered.");
        window.location.reload();
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "dilivererAcceptClickProcess.php?order_id=" + order_id, true);
  r.send();
}

function changeImage1() {
  var view = document.getElementById("viewimg");
  var file = document.getElementById("profileimg");

  file.onchange = function () {
    var file1 = this.files[0];
    var url = window.URL.createObjectURL(file1);
    view.src = url;
  };
}

function updateProfile1() {
  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var mobile = document.getElementById("mobile");
  var line1 = document.getElementById("line1");
  var line2 = document.getElementById("line2");
  var province = document.getElementById("province");
  var district = document.getElementById("district");
  var city = document.getElementById("city");
  var pcode = document.getElementById("pcode");
  var image = document.getElementById("profileimg");

  var f = new FormData();

  f.append("fn", fname.value);
  f.append("ln", lname.value);
  f.append("m", mobile.value);
  f.append("l1", line1.value);
  f.append("l2", line2.value);
  f.append("p", province.value);
  f.append("d", district.value);
  f.append("c", city.value);
  f.append("pc", pcode.value);

  if (image.files.length == 0) {
    var confirmation = confirm(
      "Are you sure You don't want to update Profile Image?"
    );

    if (confirmation) {
      alert("you have not selected any image.");
    }
  } else {
    f.append("image", image.files[0]);
  }

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        window.location = "delivererHome.php";
        // window.location.reload();
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "updateDelivererProfileProcess.php", true);
  r.send(f);
}
