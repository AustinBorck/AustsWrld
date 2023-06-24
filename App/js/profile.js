const modal = document.getElementById("confirmationModal");
$(document).ready(function () {
  $("#upload_picture").submit(function (event) {
    event.preventDefault();

    var formData = new FormData(this);

    $.ajax({
      url: "../Controllers/profile_picture.php",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        window.location.href = window.location.href;
      },
      error: function (xhr, status, error) {
      },
    });
  });

  $("#remove_photo").submit(function (event) {
    event.preventDefault();
    openModal();

    var cancelDeleteBtn = document.getElementById("cancelDeleteBtn");
    cancelDeleteBtn.onclick = function () {
      closeModal();
    };
  });
});

function openModal() {
  modal.style.display = "block";
  var confirmDeleteBtn = document.getElementById("confirmDeleteBtn");

  confirmDeleteBtn.onclick = function () {
    $.ajax({
      url: "../Controllers/profile_picture.php",
      type: "POST",
      data: "remove_photo=1",
      success: function (response) {
        window.location.href = window.location.href;
      },
      error: function (xhr, status, error) {
      },
    });
  };
}

function closeModal() {
  modal.style.display = "none";
}
