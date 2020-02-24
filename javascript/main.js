function modalR(register_value) {
  let registerErrors = document.getElementById("register-errors");
  let modal = document.getElementById("register-modal1");
  let employeeI = document.getElementById("employee-inputs");
  let employerI = document.getElementById("employer-inputs");

  registerErrors.innerHTML = "";

  if (register_value == 1) {
    modal.style.cssText = "top: 0 !important; display: block";
    employeeI.style.display = "none";
    employerI.style.display = "block";
  } else if (register_value == 2) {
    modal.style.cssText = "top: 0 !important; display: block";
    employerI.style.display = "none";
    employeeI.style.display = "block";
  }
}

function errorGone() {
  setTimeout(function () {
    $("#error-message, #edit-error, #create-error").hide(500);
  }, 2000);


}

errorGone();

$("#login-form, #register1-form, #register2-form").on("submit", function (e) {
  let data = "";
  let url = "";
  let errorOutput = "";

  if (e.target.id == "login-form") {
    url = "login.php";
    errorOutput = "#login-errors";
    data = $("#login-form").serialize();
  } else if (e.target.id == "register1-form") {
    url = "register.php";
    errorOutput = "#register-errors";
    data = $("#register1-form").serialize();
  } else if (e.target.id == "register2-form") {
    url = "register.php";
    errorOutput = "#register-errors";
    data = $("#register2-form").serialize();
  }

  e.preventDefault();
  $.ajax({
    type: "POST",
    url: url,
    data: {
      data: data
    },
    success: function (data) {
      if (data === "index.php?registered=1" || data === "index.php?logged=1") {
        window.location.href = data;
      } else {
        /* meter aqui uma scrolltop para levar o coiso la pra cima */

        $(".modal").scrollTop(0);
        $(errorOutput).html(data);
      }
    },
    error: function (xhr) {
      alert("An error occured: " + xhr.status + " " + xhr.statusText);
    }
  });
});