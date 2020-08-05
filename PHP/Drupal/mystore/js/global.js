/**
 * @file
 * Global utilities.
 *
 */
(function ($, Drupal) {

  'use strict';

  Drupal.behaviors.bootstrap_barrio_subtheme = {
    attach: function (context, settings) {

      /*
        Carousel
      */
      $('#carousel-example').on('slide.bs.carousel', function (e) {
        /*
            CC 2.0 License Iatek LLC 2018 - Attribution required
        */
        var $e = $(e.relatedTarget);
        var idx = $e.index();
        var itemsPerSlide = 5;
        var totalItems = $('#carousel-example .carousel-item').length;

        if (idx >= totalItems - (itemsPerSlide - 1)) {
          var it = itemsPerSlide - (totalItems - idx);
          for (var i = 0; i < it; i++) {
            // append slides to end
            if (e.direction == "left") {
              $('#carousel-example .carousel-item').eq(i).appendTo('#carousel-example .carousel-inner');
            }
            else {
              $('#carousel-example .carousel-item').eq(0).appendTo('#carousel-example .carousel-inner');
            }
          }
        }
      });

    }
  };

})(jQuery, Drupal);
