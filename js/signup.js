$(document).ready(function () {
  var form = $('#signup_form');
  var validator = $('#signup_form').validate({
    errorPlacement: function errorPlacement(error, element) {
      element.after(error);
    },
    rules: {
      confirm: {
        equalTo: '#password',
      },
    },
  });
});
