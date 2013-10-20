(function($) {

  $(function() {
    $('.nav-main-link').on('click', function() {
      $('body').toggleClass('nav-main-active');
    });
    $('.nav-main-filter-link').on('click', function() {
      $('body').toggleClass('nav-main-filter-active');
    });

    $('.btn-create').on('click', function() {
      $('.create-form').modal();
    });

    $('.interested').on('click', function(){
      $(this).toggleClass('active disabled');
    });

    $('.modal').on('click', '.btn.btn-primary', function() {
      $('[data-dismiss="modal"]').eq(0).trigger('click');
      window.location = "event-details.php";
    });
  });

  window.onload = function() {    
    /*
      Removes .loading from body
    */
    var $body = $('body');
    $body.removeClass('loading');

    $('.logo.fade-in').addClass('active');
  };

})(jQuery);