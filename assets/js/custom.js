"use strict";

/**
 * Custom JS.
 *
 * Custom JS scripts.
 *
 * @since 1.0.0
 */
(function ($) {
  $(document).ready(function () {
    $('.owl-carousel').owlCarousel({
      loop: true,
      margin: 10,
      autoplay: true,
      autoHeight: true,
      nav: true,
      navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
      responsive: {
        0: {
          items: 1,
          nav: false
        },
        600: {
          items: 1,
          nav: true
        },
        1000: {
          items: 1
        }
      }
    });
    $('.slider1').owlCarousel({
      loop: true,
      margin: 10,
      autoplay: false,
      autoHeight: true,
      nav: true,
      navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
      responsive: {
        0: {
          items: 1,
          nav: false
        },
        600: {
          items: 1,
          nav: true
        },
        1000: {
          items: 1
        }
      }
    });

    $.fn.VideoPopUp = function (options) {
      var defaults = {
        backgroundColor: "#000000",
        opener: "video",
        maxweight: "640",
        pausevideo: false,
        idvideo: ""
      };
      var patter = this.attr('id');
      var settings = $.extend({}, defaults, options);
      var video = document.getElementById(settings.idvideo);

      function stopVideo() {
        var tag = $('#' + patter + '').get(0).tagName;

        if (tag == 'video') {
          video.pause();
          video.currentTime = 0;
        }
      }

      $('#' + patter + '').css("display", "none");
      $('#' + patter + '').append('<div id="opct"></div>');
      $('#opct').css("background", settings.backgroundColor);
      $('#' + patter + '').css("z-index", "100001");
      $('#' + patter + '').css("position", "fixed");
      $('#' + patter + '').css("top", "0");
      $('#' + patter + '').css("bottom", "0");
      $('#' + patter + '').css("right", "0");
      $('#' + patter + '').css("left", "0");
      $('#' + patter + '').css("padding", "auto");
      $('#' + patter + '').css("text-align", "center");
      $('#' + patter + '').css("background", "none");
      $('#' + patter + '').css("vertical-align", "vertical-align");
      $("#videCont").css("z-index", "100002");
      $('#' + patter + '').append('<div id="closer_videopopup">&otimes;</div>');
      $("#" + settings.opener + "").on('click', function () {
        $('#' + patter + "").show();
        $('#' + settings.idvideo + '').trigger('play');
      });
      $("#closer_videopopup").on('click', function () {
        if (settings.pausevideo == true) {
          $('#' + settings.idvideo + '').trigger('pause');
        } else {
          stopVideo();
        }

        $('#' + patter + "").hide();
      });
      return this.css({});
    };

    $('#vidBox').VideoPopUp({
      backgroundColor: "#17212a",
      opener: "videoBtn",
      maxweight: "340",
      idvideo: "videoPopper"
    });
    $(window).on('load', function () {
      $('.preloader').addClass('hide');
      $('body').addClass('scroll-enable');
    });
    $(document).ready(function () {
      $(".videoWrapper").fitVids();
    });
    /**
    *  Video popup button
    */

    var voiceover_btn = $('#voiceoversBtn');
    voiceover_btn.on('click', function (event) {
      event.preventDefault();
      var section = $(this).attr("href");
      $('html, body').animate({
        scrollTop: $(section).offset().top
      }, 1000);
    });
    var video_btn = $('#videoBtn');
    video_btn.on('click', function (event) {
      event.preventDefault();
      $('#videCont').html('<div class="embed-responsive embed-responsive-16by9"><iframe allowfullscreen frameborder="0" class="embed-responsive-item" src="' + video_btn.data('yt-url') + '" width="789" height="444" style="vertical-align: top; height: 444px; width: 789px;"></iframe></div>');
    });
  });
})(jQuery);