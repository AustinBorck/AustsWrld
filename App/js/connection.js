    function sendRequest(data) {
      $.ajax({
        url: 'ping.php',
        type: 'POST',
        data: data,
        success: function(response) {
            handleResponse(200);
        },
        error: function(xhr, status, error) {
            handleResponse(401);
        }
      });
    }

$(document).ready(function() {
    sendRequest({ 'a': 'ping' });
});
//test