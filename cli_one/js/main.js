$("#login_form").submit(function (e) {
  e.preventDefault();

  var form = $(this);
  var url = "api/login.php";
  var form_data = form.serialize();

  // console.log(`form=${form_data}`);
  $.ajax({
    type: "POST",
    url: url,
    data: form_data,
    success: function (data) {
      console.log(data);
      var jsonData = JSON.parse(data);
      var return_data = jsonData.response;
      // //console.log(jsonData);
      if (return_data[0].status == "success") {
        localStorage.setItem("username", return_data[0].username);
        localStorage.setItem("password", return_data[0].password);
        localStorage.setItem("#64FFksjfk", return_data[0].id); // storing id of user
        var username = localStorage.getItem("username");
        if (username != "" && username !== null && username !== "null") {
          show_msg("Login successful.. Please wait");
          setTimeout(function () {
            window.location.href = "index.php";
          }, 2000);
        }
      } else (return_data[0].status == "failed") 
      {
        show_msg("Account not found");
      }
    }
  });
});

function get_cat() {
  var form_url = "api/Api.php"; //fetch action of the for
  var fdata = {
    category: "get_cat",
  };
  // console.log(fdata);
  $.ajax({
    type: "POST",
    url: form_url,
    data: fdata,
    success: function (return_data) {
      console.log(return_data);
      var jsonData = JSON.parse(return_data);
      var return_data = jsonData.response;

      if (return_data[0].status == "failed") {
        console.log("failed");
      } else if (return_data[0].status == "success") {
        console.log('success');
        for (var i = 0; i < jsonData.response.length; i++) {
          var return_data = jsonData.response;
          console.log("hi hi");
          $("#category").append(
            '<div class="col-lg-4 col-md-6 portfolio-item filter-app">' +
            '<img src="assets/img/portfolio/'+ return_data[i]["image"] +'" class="img-fluid" alt="">' +
            '<div class="portfolio-info">' +
            '<h4>' + return_data[i]["name"] + '</h4>' +
            '<p>' + return_data[i]["description"] + '</p>' +
            '<a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i class="bi bi-plus"></i></a>' +
            '</div>' +
            '</div>'
          );
        }
      }
    }
  });
}
