var modal = document.getElementById("registerModal");

var btn = document.getElementById("register");

var span = document.getElementsByClassName("close")[0];

var form = document.getElementById("registrationForm");

var register_btn = document.getElementById("register_btn");

function openModal() {
  modal.style.display = "block";
}

function closeModal() {
  modal.style.display = "none";
}

btn.addEventListener("click", openModal);

span.addEventListener("click", closeModal);

window.addEventListener("click", function (event) {
  if (event.target === modal) {
    closeModal();
  }
});

var form = document.getElementById("registrationForm");
var submitBtn = document.getElementById("submitBtn");
const errorModal = document.getElementById("errorModal");
const errorMessage = document.getElementById("error_message");

form.addEventListener("submit", function (event) {
  var password = document.getElementById("password").value;
  var confirmPassword = document.getElementById("confirm-password").value;
  if (password !== confirmPassword) {
    event.preventDefault();

    errorModal.style.display = "block";
    errorMessage.innerHTML = "Passwords do not match";

    setTimeout(function () {
      errorModal.style.display = "none";
    }, 2500);

    var closeBtn = errorModal.querySelector(".close");
    closeBtn.addEventListener("click", function () {
      errorModal.style.display = "none";
    });
  }
});

const urlParams = new URLSearchParams(window.location.search);
const urlError = urlParams.get("error");
if (urlError == "user_not_found") {
  console.log("user not found");
  errorModal.style.display = "block";
  errorMessage.innerHTML = "No user found with that username";
  setTimeout(function () {
    errorModal.style.display = "none";
    window.location.href = "/App";
  }, 2500);
} else if (urlError == "incorrect_password") {
  errorModal.style.display = "block";
  errorMessage.innerHTML = "Incorrect password";
  setTimeout(function () {
    errorModal.style.display = "none";
    window.location.href = "/App";
  }, 2500);
}
