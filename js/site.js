

jQuery(document).ready(function ($) {

  /*
   * Shake effect
   *	$(element).hugy_shake(max_count, [num_count]); // where num_count is  internal to remember how many loops
   */
  $.fn.hugy_shake = function (max_count, num_count) {
    shake_count = Math.random() * 3 + 1; // 1 to 4 shakes
    delay = (Math.random() * 12000) + 4000; // 4 to 16 seconds
    num_count = typeof num_count !== 'undefined' ? num_count : 1;
    max_count = typeof max_count !== 'undefined' ? max_count : 3;
    var b = 0;
    function a(t, shake_count, delay, num_count, max_count) {
      $(t).animate({ bottom: "+=10px" }, 150)
        .animate({ bottom: "-=10px" }, 80, function () {
          b++;
          if (b < shake_count)
            a($(this), shake_count, delay, num_count, max_count);
          else {
            if (num_count++ < max_count)
              $(this).delay(delay).hugy_shake(max_count, num_count);
          }
        });

    }
    a($(this), shake_count, delay, num_count, max_count);

    return $(this);
  };


  /* 
   * Bounce effect
   */
  $.fn.bounce = function (options) {
    var settings = $.extend({
      speed: 10
    }, options);

    return $(this).each(function () {

      var $this = $(this),
        $parent = $this.parent(),
        height = $parent.height(),
        width = $parent.width(),
        top = Math.floor(Math.random() * (height / 2)) + height / 4,
        left = Math.floor(Math.random() * (width / 2)) + width / 4,
        vectorX = settings.speed * (Math.random() > 0.5 ? 1 : -1),
        vectorY = settings.speed * (Math.random() > 0.5 ? 1 : -1);

      // place initialy in a random location
      $this.css({
        'top': top,
        'left': left
      }).data('vector', {
        'x': vectorX,
        'y': vectorY
      });

      var move = function ($e) {

        var offset = $e.offset(),
          width = $e.width(),
          height = $e.height(),
          vector = $e.data('vector'),
          $parent = $e.parent();

        if (offset.left <= 0 && vector.x < 0) {
          vector.x = -1 * vector.x;
        }
        if ((offset.left + width) >= $parent.width()) {
          vector.x = -1 * vector.x;
        }
        if (offset.top <= 0 && vector.y < 0) {
          vector.y = -1 * vector.y;
        }
        if ((offset.top + height) >= $parent.height()) {
          vector.y = -1 * vector.y;
        }

        $e.css({
          'top': offset.top + vector.y + 'px',
          'left': offset.left + vector.x + 'px'
        }).data('vector', {
          'x': vector.x,
          'y': vector.y
        });

        setTimeout(function () {
          move($e);
        }, 50);

      };

      move($this);
    });

  };


  /*
   * Scroll effect
   */
  $.fn.softscroll = function (pos, time, callback) {
    if (pos == 0) {
      pos3 = pos + 10;
      pos2 = pos + 4;
    }
    else {
      pos3 = pos + 5;
      pos2 = pos - 4;
    }
    $(this)
      .stop()
      .animate({ scrollTop: pos3 }, time / 2)
      .animate({ scrollTop: pos2 }, time / 4)
      .animate({ scrollTop: pos }, time / 4, function () {
        if (typeof callback == 'function') { // make sure the callback is a function
          callback.call(this); // brings the scope to the callback
        }
      });
  }
  function hugy_do_teaser_shake() {

  }







  if ($("body").hasClass("home")) {
    //$(".top-navigation-wrapper").hide();
    $(".firstpage-menu").click(function () {
      $($("body,html")).softscroll(($(".page-wrapper").position().top - $(".top-navigation-wrapper").height()), 600);
    });
  }


  // make click animate to anchor
  $('a[href^="#"]').on('click', function (e) {
    e.preventDefault();
    if ($(this).hasClass("left-arrow") || $(this).hasClass("right-arrow") || $(this).hasClass("load-more-news"))
      return;
    
    var target = this.hash,
      $target = $(target);

    $('html, body').softscroll($target.offset().top, 600, function () {
      window.location.hash = target;
    });

    return false;
  });



  /* 
   * click effect on facebook
   */
  $(".facebook-module").append('<div class="fb-more-wrapper hidden"></div>');
  $(".facebook-module").append('<div class="fb-load-button">Se fler...</div>');
  $(".facebook-module .fb-feed-item").each(function () {
    if ($(this).height() > 250) {
      $(this).css("max-height", "210px");
      $(this).prepend($("<span class='expand-item'>&gt; l&auml;s mer</span>"));

    }
  });
  $(".expand-item").click(function () {
    $(this).parent().css("max-height", "inherit");
    $(this).remove();
  });
  $(".facebook-module .fb-feed-item:hidden").each(function () {
    $(this).show().appendTo('.fb-more-wrapper');
  });
  $(".fb-load-button").click(function () {
    if (!$(".fb-load-button").hasClass('link')) {
      $(".fb-load-button").addClass("link fb-loader").html('');
      $(".facebook-module .fb-more-wrapper").delay(1500).slideDown('fast', function () {
        $(".fb-load-button").html('<a href="' + $(".facebook-module").attr('data-fb-url') + '">Se mer p&aring; facebook...</a>').removeClass('fb-loader');
      });
    }
  });


  /* 
   * click effect on contactlist
   */
  $(".contactlist").find('.contact').each(function () {
    $(this).find('a').click(function (ev) {
      if ($(this).parents('.contact').hasClass('expanded') && $(this).hasClass('nolink')) {
        $(this).parents('.contact').addClass('clicked');
      }
      else if ($(this).hasClass('nolink')) {
        ev.preventDefault();
      }
    });
    $(this).click(function (ev) {
      //ev.preventDefault();
      //ev.stopPropagation();
      //ev.stopImmediatePropagation();
      if (!$(this).hasClass('clicked')) {
        if (!$(this).hasClass('expanded')) {
          $(this).addClass('expanded');
          if ($(document).width() > 500)
            $(this).find('.bild img').animate({ width: '150px' }, 'fast');
          $(this).find('.contact-data').slideDown('fast');
        }
        else {
          $(this).removeClass('expanded');
          $(this).find('.bild img').animate({ width: '100px' }, 'fast');
          $(this).find('.contact-data').slideUp('fast');
        }
      }
    });
  });


  /* what to do when scrolling */
  $(window).scroll(function () {

    /* show/hide up-icon */
    // if ($(window).scrollTop() < 100)
    //   $(".up-icon").css("opacity", 0).hide();
    // else if ($(window).scrollTop() > 300)
    //   $(".up-icon").css("opacity", 1).show();
    // else if ($(window).scrollTop() > 100)
    //   $(".up-icon").css("opacity", ($(window).scrollTop() - 100) / 200).show();


    /* reset selected */
    // $(".top-menu-button").removeClass("selected");
    // $(".top-navigation-wrapper").removeClass("selected");

    /* make menu fixed */

    // // remove fixed menu when top of page
    // if ($(window).scrollTop() - $(".top").height() <= 0) {
    //   $(".top-navigation-wrapper, .top-menu-button").removeClass("fixed");
    //   $(".top-wrapper").css('margin-bottom', 0);
    // }
    // // show selected menu and stick to menu when at menu place in footer
    // else if ($(window).scrollTop() - $(".main-menu-wrapper").position().top + $(".top-navigation-wrapper").height() > -5) {
    //   $(".top-navigation-wrapper").css("top", -($(window).scrollTop() - $(".main-menu-wrapper").position().top + $(".top-navigation-wrapper").height()));
    //   if (!$("body").hasClass("home"))
    //     $(".top-wrapper").css('margin-bottom', $(".top-navigation-wrapper").height());
    //   $(".top-menu-button").addClass("selected");
    //   $(".top-navigation-wrapper").addClass("selected");
    // }
    // // else show menu
    // else { // if ($(window).scrollTop() - $(".top").height() > 0) {
    //   $(".top-navigation-wrapper, .top-menu-button").addClass("fixed").show().css("top", "0");
    //   if (!$("body").hasClass("home"))
    //     $(".top-wrapper").css('margin-bottom', $(".top-navigation-wrapper").height());
    // }

  });

  /* filter table in schema page */
  if ($("body").hasClass("page-template-page-hugy-schema-php")) {

    $(".filter.tool").append("<span>filtrera</span>");
    $(".filter.tool").append("<input type='text' name='filter' id='filter' />");
    $(".filter.tool").append("<span id='rensa' class='rensa link hidden'>X</span>");
    $('#filter').focus();
    $('#rensa').click(function () {
      $('#filter').val('');
      $('#rensa').hide();
      $('#filter').focus();
      filter_schema();
    });


    $(".filter.toggle").append("<input type='button' class='toggle selected' id='alla' value='Alla' />");
    $(".filter.toggle").append("<input type='button' class='toggle' id='klasser' value='Klasser' />");
    $(".filter.toggle").append("<input type='button' class='toggle' id='larare' value='L&auml;rare' />");
    $(".filter.toggle").append("<input type='button' class='toggle' id='salar' value='Salar' />");

    $("input.toggle").click(function (ev) {
      if ($(this).hasClass("selected") || $(this).attr("id") == "alla") {
        $("input.toggle").removeClass("selected");
        $("#alla").addClass("selected");
        $(".klasser, .larare, .salar").show();
      }
      else {
        $("input.toggle").removeClass("selected");
        $(this).addClass("selected");
        $(".klasser, .larare, .salar").hide();
        $("." + $(this).attr("id")).show();
      }
    });


    $("#filter").keyup(function (ev) {
      $('#rensa').show();
      filter_schema();
    });
  }
  function filter_schema() {
    filter = $('#filter').val().toLowerCase();
    $("table tr:not(:containsi('" + filter + "'))").css("display", "none");
    $("table tr:containsi('" + filter + "')").css("display", "");
  }




  /* filter table in kontakter page */
  if ($("body").hasClass("page-template-page-hugy-kontakter-php")) {
    contactlist = $(".contactlist");

    $(".filter.tool").append("<span>filtrera</span>");
    $(".filter.tool").append("<input type='text' name='filter' id='filter' />");
    $(".filter.tool").append("<span id='rensa' class='rensa link hidden'>X</span>");
    $('#filter').focus();
    $('#rensa').click(function () {
      $('#filter').val('');
      contact_filter();
      $('#rensa').hide();
      $('#filter').focus();
    });

    $(".filter.toggle").append("<input type='button' class='toggle selected' id='alla' value='Alla' />");
    $(".filter.toggle").append("<input type='button' class='toggle' id='Administration' value='Administration' />");
    $(".filter.toggle").append("<input type='button' class='toggle' id='Pedagoger' value='Pedagoger' />");
    $(".filter.toggle").append("<input type='button' class='toggle' id='Servicefunktion' value='Servicefunktion' />");
    $(".filter.toggle").append("<input type='button' class='toggle' id='Skolledning' value='Skolledning' />");

    $("input.toggle").click(function (ev) {
      if ($(this).hasClass("selected") || $(this).attr("id") == "alla") {
        $("input.toggle").removeClass("selected");
        $("#alla").addClass("selected");
        $(".contactlist .contact").show();
      }
      else {
        $("input.toggle").removeClass("selected");
        $(this).addClass("selected");
      }
      contact_filter();
    });
    $("#filter").keyup(function (ev) {
      $('#rensa').show();
      contact_filter();
    });
  }
  function contact_filter() {
    typ = $("input.toggle.selected").attr("id");
    filter = $("#filter").val().toLowerCase();
    $(".contactlist .contact").show();
    if (typ != 'alla')
      $(".contactlist .typ_av_kontakt:not(:containsi('" + typ + "'))").parents(".contact").hide();
    if (filter != '')
      $(".contactlist .contact:not(:containsi('" + filter + "'))").hide();
  }



  /* case insensitive contain */
  $.extend($.expr[':'], {
    'containsi': function (elem, i, match, array) {
      return (elem.textContent || elem.innerText || '').toLowerCase()
        .indexOf((match[3] || "").toLowerCase()) >= 0;
    }
  });




  /* add + and expanding submenu in hovermenu */
  $('.main-menu-wrapper .menu a').each(function () {
    if ($(this).parent('li').children('ul').size() > 0) {
      if (!($(this).hasClass("menu-head") || $(this).parent().hasClass("current_page_item") || $(this).parent().hasClass("current_page_ancestor") || $(this).parent().hasClass("current_page_parent"))) {
        if ($(this).next().hasClass("children"))
          $(this).next().hide();
        expand = $("<span />").addClass("expand").html("+").click(function (ev) {
          ev.preventDefault();
          if ($(this).html() == "+")
            $(this).html("-");
          else
            $(this).html("+");
          if ($(this).parent().next().hasClass("children")) {
            $(this).parent().next().slideToggle();
          }
        });
        $(this).append(expand);
      }
    }
  });


  /* up icon click */
  // $(".up-icon").hide().click(function () {
  //   $("body,html").softscroll(0, 600);
  // });

  /* picto function on program pages */
  $(".picto img.hover-image").each(function () {
    $(this).hover(function () {
      $(this).attr("data-org-src", $(this).attr("src")).attr("src", $(this).attr("data-hover"));
    }, function () {
      $(this).attr("src", $(this).attr("data-org-src"));
    });
  });

  /* teaser function on firstpage */
  $(".teaser img").each(function () {
    $(this).hover(function () {
      $(this).attr("data-org-src", $(this).attr("src")).attr("src", $(this).attr("data-hover"));
    }, function () {
      $(this).attr("src", $(this).attr("data-org-src"));
    });
  });
  if ($(".teaser-1").length > 0) {
    $(".teaser-1").hover(function () {
      $(this).hugy_shake(1);
    }, function () {
    });
    $(".teaser-1").hide().click(function () {
      $($("body,html")).softscroll(($(".page-wrapper").position().top - $(".top-navigation-wrapper").height()), 800);
    });

    $(".teaser-1").hide();
    $(".teaser-1").css("left", ($(document).width() - $(".teaser-1").width()) / 2);
    $(".teaser-1").css("bottom", 20);
    $(".teaser-1").fadeIn("slow", function () {
      $(this).hugy_shake(1);
    });
  }

    
});




