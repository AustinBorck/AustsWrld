$(document).ready(function() {
    // Handle form submission
    $('#upload_picture').submit(function(event) {
        console.log('asdf');
      event.preventDefault();
  
      var formData = new FormData(this);
  
      $.ajax({
        url: '../Controllers/upload_picture.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
          // add success modal
        },
        error: function(xhr, status, error) {
          // add error modal
        }
      });
    });
  });
  