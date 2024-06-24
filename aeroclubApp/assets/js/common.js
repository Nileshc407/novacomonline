$(document).ready(function () {

    $("#sidebar").mCustomScrollbar({
        theme: "minimal"
      });

      $('#dismiss, .overlay').on('click', function () {
          $('#sidebar').removeClass('active');
          $('.overlay').hide(2000);
      });

      $('#sidebarCollapse').on('click', function () {
          $('#sidebar').addClass('active');
          $('.overlay').show(2000);
    });

    $('.theClubSlide').slick({
        autoplay: true,
        autoplaySpeed: 3000,
        speed: 3000,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        arrows: false
    });

    $('.facilitieSlide').slick({
        autoplay: true,
        autoplaySpeed: 3000,
        speed: 3000,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        arrows: false
    });

    $('.accommodationSlide').slick({
        autoplay: true,
        autoplaySpeed: 3000,
        speed: 3000,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        arrows: false
    });

    $('.homeOfferSlide').slick({
        autoplay: true,
        autoplaySpeed: 3000,
        speed: 3000,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        arrows: false
    });

    $('#BirthDate input').datepicker({
    });

    $('#AnniversaryDate input').datepicker({
    });

   

});










