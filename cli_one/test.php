<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    
    <style>
      .container {
  position: relative;
}

.magnifying-glass {
  position: absolute;
  width: 400px;
  height: 400px;
  border-radius: 50%;
  border: 1px solid #ccc;
  cursor: zoom-in;
  background-repeat: no-repeat;
  background-size: 200% 200%;
  visibility: hidden;
}
        
        </style>
</head>
<body>
    

    <div class="container">
        <img src="/admin_panel/uploads/products/9OeBp49fWR.jpg" width="500px" height="500px" alt="Your Image" class="img">
        <div class="magnifying-glass"></div>
      </div>
      

<script>    
  $(document).ready(function() {
    var magnifyingGlass = $('.magnifying-glass');
    var image = $('.img');
    // Load the full-sized image and set it as the background image of the magnifying glass
    var fullSizeImage = new Image();
    fullSizeImage.src = image.attr('src');
    $(fullSizeImage).on('load', function() {
      magnifyingGlass.css('background-image', 'url(' + fullSizeImage.src + ')');
    });
    
    image.mousemove(function(event) {
      // Calculate the position of the mouse relative to the image
      var posX = event.pageX - image.offset().left;
      var posY = event.pageY - image.offset().top;
      
      // Calculate the position of the magnifying glass relative to the image
      var glassPosX = posX - magnifyingGlass.width() / 2;
      var glassPosY = posY - magnifyingGlass.height() / 2;
      
      console.log(glassPosX,glassPosY);

      // Limit the movement of the magnifying glass to stay within the boundaries of the image
      if (glassPosX < 0) {
        glassPosX = 0;
      } else if (glassPosX > image.width() - magnifyingGlass.width()) {
        glassPosX = image.width() - magnifyingGlass.width();
      }
      
      if (glassPosY < 0) {
        glassPosY = 0;
      } else if (glassPosY > image.height() - magnifyingGlass.height()) {
        glassPosY = image.height() - magnifyingGlass.height();
      }
      
      // Move the magnifying glass to the current mouse position
      magnifyingGlass.css({
        'left': posX + 'px',
        'top': posY + 'px',
        'visibility': 'visible',
        'background-position': '-' + (posX - 50) + 'px -' + (posY - 50) + 'px'
      });
    });
    
    // Hide the magnifying glass when the mouse leaves the image
    image.mouseleave(function() {
      magnifyingGlass.css('visibility', 'hidden');
    });
  });
</script>

</body>
</html>