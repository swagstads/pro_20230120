event.preventDefault()
let api_url = "_URL_";

// form data values
var form_data = {"key":"value"};
$.ajax({
url: api_url,
type: 'POST',
// type: 'GET',
data: form_data,
success: function (returned_data) {
    console.log(returned_data);
    var jsonData = JSON.parse(returned_data);
    var return_data = jsonData.response[0];
    console.log(return_data);
    alert(return_data.message)
    }
})