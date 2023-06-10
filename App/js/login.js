var modal = document.getElementById("registerModal");

var btn = document.getElementById("register");

var span = document.getElementsByClassName("close")[0];

var form = document.getElementById('registrationForm');

var register_btn = document.getElementById('register_btn');

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



var form = document.getElementById('registrationForm');
var submitBtn = document.getElementById('submitBtn');

form.addEventListener('submit', function(event) {
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirm-password').value;
    if (password !== confirmPassword) {
        event.preventDefault();

        var errorModal = document.getElementById('errorModal');
        var errorMessage = document.getElementById('error_message');
        errorModal.style.display = 'block';
        errorMessage.innerHTML = 'Passwords do not match';

        setTimeout(function() {
            errorModal.style.display = 'none';
        }, 2500);

        var closeBtn = errorModal.querySelector('.close');
        closeBtn.addEventListener('click', function() {
            errorModal.style.display = 'none';
        });
    }
});
