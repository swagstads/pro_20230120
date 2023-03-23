<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Language Conversion Demo</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
  function translatePage() {
    // Get the content to be translated
    var contentToTranslate = $('h1').html();
    var translationApiUrl = 'https://translate.googleapis.com/translate_a/single';




    var allTags = document.getElementsByTagName("body *");

    // Get all the HTML tags
    var allTags = document.getElementsByTagName("*");

    // Loop through all the tags and log their text and input values
    for (var i = 0; i < allTags.length; i++) {
    var tag = allTags[i];
    
    // Check if the tag is an input field or textarea
    if ($(tag).is('input[type=text], textarea')) {
        // If it is an input field or textarea, log its value
        console.log(tag.value);
    } else {
        // If it is not an input field or textarea, log its text content
        console.log($(tag).text());
            // Make the translation API call
        var requestData = {
        client: 'gtx',
        sl: 'en',
        tl: 'hi',
        dt: 't',
        q: $(tag).text()
        };
    }
    }




    // Make the translation API call
    // var requestData = {
    //   client: 'gtx',
    //   sl: 'en',
    //   tl: 'hi',
    //   dt: 't',
    //   q: contentToTranslate
    // };


    $.getJSON(translationApiUrl, requestData, function(response) {
      // Replace the content of the webpage with the translated content
      $('html').html(response[0][0][0]);
    });
  }
  
  // Load the Hindi translation when the page loads
  $(document).ready(function() {
    translatePage();
  });

</script>
</head>
<body>

<h1>hello</h1>
<h1>world!</h1>

</body>
</html>
