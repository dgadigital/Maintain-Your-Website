(function($){
AppName.Modules.ThemeModule = (function () {
  //Dependencies
  var core = AppName.Core;

  //////////////////////
  // Private Methods //
  ////////////////////
  const _privateMethod = () => {
    $('.shorten').each(function() {
      const originalText = $(this).text();
      const truncatedText = originalText.split(' ').slice(0, 16).join(' ') + '...'; 
  
      $(this).text(truncatedText);
  
      // const readMoreLink = $(this).next('.readmore-testimonials'); 
  
      // readMoreLink.on('click', function(e) {
      //   e.preventDefault();
  
        // if ($(this).prev('.testimonial-text').text() === truncatedText) {
        //   $(this).prev('.testimonial-text').text(originalText);
        //   $(this).text('READ LESS');
        // } else {
          $(this).prev('.shorten p').text(truncatedText);
          // $(this).text('READ MORE');
        // }
      // });
    });
  };


  const _platformsLogo = () => {
    const itemsCount = $('.platforms .item').length;

    if (itemsCount > 5) {
      $('.platforms').slick({
        slidesToShow: 5,
        slidesToScroll: 2,
        infinite: false,
        arrows: false,
        dots: false,
        responsive: [
          {
            breakpoint: 991,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 2,
            }
          },
          {
            breakpoint: 767,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          }
        ]
      });

      $('.slide-more').on('click', function() {
        $('.platforms').slick('slickNext');
      });
    } else {

      $('.more').hide(); 
      $('.content-wrapper').addClass('slide-deactivated');
    }
  };

  const _resourcesCarousel = () => {
    $('.resources-box').slick({
      centerMode: true,
      slidesToShow: 3,
      slidesToScroll: 1,
      infinite: true,
      arrows: false,
      dots: true,
      centerPadding: '0',
      variableWidth: true,
      // focusOnSelect: true,
      responsive: [
        {
          breakpoint: 1440,
          settings: {
            variableWidth: false,
          }
        },
        {
          breakpoint: 991,
          settings: {
            slidesToShow: 2,
           slidesToScroll: 1,
           variableWidth: false,
           centerMode: false,
          }
        },
        {
          breakpoint: 767,
          settings: {
           slidesToShow: 1,
           slidesToScroll: 1,
           variableWidth: false,
           centerMode: false,
          }
        }
      ]
    });

   $('.resources-box').on('afterChange', function(event, slick, currentSlide) {
    $('.resources-box .slick-slide').removeClass('highlight-first highlight-second');
    $('.resources-box .slick-active').eq(0).addClass('highlight-first');
    $('.resources-box .slick-active').eq(2).addClass('highlight-second');
  });

  $(window).on('load', function() {
    $('.resources-box .slick-slide').removeClass('highlight-first highlight-second');
    $('.resources-box .slick-active').eq(0).addClass('highlight-first');
    $('.resources-box .slick-active').eq(2).addClass('highlight-second');
  });
  };

  const _navToggler = () => {
    $('.custom-toggler').on('click', function () {
      $('.navbar-collapse').toggleClass('open');
      $(this).toggleClass('open');
    });

    $('.dropdown-title svg').each(function(index) {
    $(this).click(function() {
      $('.subs').eq(index).toggleClass('open');
    });
  });
  };

  var _stickynav = function () {
    $(window).on("load scroll", function () {
      if ($(this).scrollTop() > 0) {
        $('header').addClass('sticky');
      } else {
        $('header').removeClass('sticky');
      }
    });
  };

  var _showmoreBlur = function () {
    $('.showmore').each(function() {
      $(this).click(function(e) {

        $('.column-show-more .text-wrapper').toggleClass('open');

        if ($('.column-show-more .text-wrapper').hasClass('open')) {
          $(this).text('Show Less -');
        } else {
          $(this).text('Show More +');
        }

      });
    });
  }

  /////////////////////
  // Public Methods //
  ///////////////////
  const init = function () {
    _privateMethod();
    _platformsLogo();
    _resourcesCarousel();
    _navToggler();
    _stickynav();
    _showmoreBlur();
  };

  return {
    init: init,
  };
})();

})(jQuery)

