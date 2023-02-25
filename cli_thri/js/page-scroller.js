
$(document).ready(function() {

// get the fixed child element
var fixedChild = $('.company-names');

// add click event listener to each child element of the fixed child
fixedChild.children().each(function(index) {
    $(this).click(function() {
    // get the corresponding company banner container
    var companyBanner = $('.company-banner-container').eq(index);
    
    // scroll to the corresponding company banner container
    $('html, body').animate({
        scrollTop: companyBanner.offset().top
    }, 200);
    });
});
});
$(document).ready(function() {
  // get the fixed child element
  var fixedChild = $('.company-names');

  // initially hide the fixed child element
  fixedChild.hide();

  // add scroll event listener
  $(window).scroll(function() {
    // loop through each company banner container
    $('.company-banner-container').each(function(index) {
      var companyBanner = $(this);

      // check if the current scroll position is on this company banner
      if ($(window).scrollTop() >= companyBanner.offset().top  - 250
          && $(window).scrollTop() < companyBanner.offset().top + companyBanner.outerHeight() - 250) {
        // show the fixed child element
        fixedChild.show();
        return false; // exit the loop
      } else {
        // hide the fixed child element
        fixedChild.hide();
      }
    });
  });
});