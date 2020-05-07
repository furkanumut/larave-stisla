/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/custom.js":
/*!********************************!*\
  !*** ./resources/js/custom.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */


$('.datatable').DataTable();

function swalDelete(callback) {
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes'
  }).then(function (result) {
    return callback(result.value);
  });
}

/***/ }),

/***/ "./resources/js/scripts.js":
/*!*********************************!*\
  !*** ./resources/js/scripts.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
 // ChartJS

if (window.Chart) {
  Chart.defaults.global.defaultFontFamily = "'Nunito', 'Segoe UI', 'Arial'";
  Chart.defaults.global.defaultFontSize = 12;
  Chart.defaults.global.defaultFontStyle = 500;
  Chart.defaults.global.defaultFontColor = "#999";
  Chart.defaults.global.tooltips.backgroundColor = "#000";
  Chart.defaults.global.tooltips.bodyFontColor = "rgba(255,255,255,.7)";
  Chart.defaults.global.tooltips.titleMarginBottom = 10;
  Chart.defaults.global.tooltips.titleFontSize = 14;
  Chart.defaults.global.tooltips.titleFontFamily = "'Nunito', 'Segoe UI', 'Arial'";
  Chart.defaults.global.tooltips.titleFontColor = '#fff';
  Chart.defaults.global.tooltips.xPadding = 15;
  Chart.defaults.global.tooltips.yPadding = 15;
  Chart.defaults.global.tooltips.displayColors = false;
  Chart.defaults.global.tooltips.intersect = false;
  Chart.defaults.global.tooltips.mode = 'nearest';
} // DropzoneJS


if (window.Dropzone) {
  Dropzone.autoDiscover = false;
} // Basic confirm box


$('[data-confirm]').each(function () {
  var me = $(this),
      me_data = me.data('confirm');
  me_data = me_data.split("|");
  me.fireModal({
    title: me_data[0],
    body: me_data[1],
    buttons: [{
      text: me.data('confirm-text-yes') || 'Yes',
      "class": 'btn btn-danger btn-shadow',
      handler: function handler() {
        eval(me.data('confirm-yes'));
      }
    }, {
      text: me.data('confirm-text-cancel') || 'Cancel',
      "class": 'btn btn-secondary',
      handler: function handler(modal) {
        $.destroyModal(modal);
        eval(me.data('confirm-no'));
      }
    }]
  });
}); // Global

$(function () {
  var sidebar_nicescroll_opts = {
    cursoropacitymin: 0,
    cursoropacitymax: .8,
    zindex: 892
  },
      now_layout_class = null;

  var sidebar_sticky = function sidebar_sticky() {
    if ($("body").hasClass('layout-2')) {
      $("body.layout-2 #sidebar-wrapper").stick_in_parent({
        parent: $('body')
      });
      $("body.layout-2 #sidebar-wrapper").stick_in_parent({
        recalc_every: 1
      });
    }
  };

  sidebar_sticky();
  var sidebar_nicescroll;

  var update_sidebar_nicescroll = function update_sidebar_nicescroll() {
    var a = setInterval(function () {
      if (sidebar_nicescroll != null) sidebar_nicescroll.resize();
    }, 10);
    setTimeout(function () {
      clearInterval(a);
    }, 600);
  };

  var sidebar_dropdown = function sidebar_dropdown() {
    if ($(".main-sidebar").length) {
      $(".main-sidebar").niceScroll(sidebar_nicescroll_opts);
      sidebar_nicescroll = $(".main-sidebar").getNiceScroll();
      $(".main-sidebar .sidebar-menu li a.has-dropdown").off('click').on('click', function () {
        var me = $(this);
        var active = false;

        if (me.parent().hasClass("active")) {
          active = true;
        }

        $('.main-sidebar .sidebar-menu li.active > .dropdown-menu').slideUp(500, function () {
          update_sidebar_nicescroll();
          return false;
        });
        $('.main-sidebar .sidebar-menu li.active').removeClass('active');

        if (active == true) {
          me.parent().removeClass('active');
          me.parent().find('> .dropdown-menu').slideUp(500, function () {
            update_sidebar_nicescroll();
            return false;
          });
        } else {
          me.parent().addClass('active');
          me.parent().find('> .dropdown-menu').slideDown(500, function () {
            update_sidebar_nicescroll();
            return false;
          });
        }

        return false;
      });
      $('.main-sidebar .sidebar-menu li.active > .dropdown-menu').slideDown(500, function () {
        update_sidebar_nicescroll();
        return false;
      });
    }
  };

  sidebar_dropdown();

  if ($("#top-5-scroll").length) {
    $("#top-5-scroll").css({
      height: 315
    }).niceScroll();
  }

  $(".main-content").css({
    minHeight: $(window).outerHeight() - 108
  });
  $(".nav-collapse-toggle").click(function () {
    $(this).parent().find('.navbar-nav').toggleClass('show');
    return false;
  });
  $(document).on('click', function (e) {
    $(".nav-collapse .navbar-nav").removeClass('show');
  });

  var toggle_sidebar_mini = function toggle_sidebar_mini(mini) {
    var body = $('body');

    if (!mini) {
      body.removeClass('sidebar-mini');
      $(".main-sidebar").css({
        overflow: 'hidden'
      });
      setTimeout(function () {
        $(".main-sidebar").niceScroll(sidebar_nicescroll_opts);
        sidebar_nicescroll = $(".main-sidebar").getNiceScroll();
      }, 500);
      $(".main-sidebar .sidebar-menu > li > ul .dropdown-title").remove();
      $(".main-sidebar .sidebar-menu > li > a").removeAttr('data-toggle');
      $(".main-sidebar .sidebar-menu > li > a").removeAttr('data-original-title');
      $(".main-sidebar .sidebar-menu > li > a").removeAttr('title');
    } else {
      body.addClass('sidebar-mini');
      body.removeClass('sidebar-show');
      sidebar_nicescroll.remove();
      sidebar_nicescroll = null;
      $(".main-sidebar .sidebar-menu > li").each(function () {
        var me = $(this);

        if (me.find('> .dropdown-menu').length) {
          me.find('> .dropdown-menu').hide();
          me.find('> .dropdown-menu').prepend('<li class="dropdown-title pt-3">' + me.find('> a').text() + '</li>');
        } else {
          me.find('> a').attr('data-toggle', 'tooltip');
          me.find('> a').attr('data-original-title', me.find('> a').text());
          $("[data-toggle='tooltip']").tooltip({
            placement: 'right'
          });
        }
      });
    }
  };

  $("[data-toggle='sidebar']").click(function () {
    var body = $("body"),
        w = $(window);

    if (w.outerWidth() <= 1024) {
      body.removeClass('search-show search-gone');

      if (body.hasClass('sidebar-gone')) {
        body.removeClass('sidebar-gone');
        body.addClass('sidebar-show');
      } else {
        body.addClass('sidebar-gone');
        body.removeClass('sidebar-show');
      }

      update_sidebar_nicescroll();
    } else {
      body.removeClass('search-show search-gone');

      if (body.hasClass('sidebar-mini')) {
        toggle_sidebar_mini(false);
      } else {
        toggle_sidebar_mini(true);
      }
    }

    return false;
  });

  var toggleLayout = function toggleLayout() {
    var w = $(window),
        layout_class = $('body').attr('class') || '',
        layout_classes = layout_class.trim().length > 0 ? layout_class.split(' ') : '';

    if (layout_classes.length > 0) {
      layout_classes.forEach(function (item) {
        if (item.indexOf('layout-') != -1) {
          now_layout_class = item;
        }
      });
    }

    if (w.outerWidth() <= 1024) {
      if ($('body').hasClass('sidebar-mini')) {
        toggle_sidebar_mini(false);
        $('.main-sidebar').niceScroll(sidebar_nicescroll_opts);
        sidebar_nicescroll = $(".main-sidebar").getNiceScroll();
      }

      $("body").addClass("sidebar-gone");
      $("body").removeClass("layout-2 layout-3 sidebar-mini sidebar-show");
      $("body").off('click touchend').on('click touchend', function (e) {
        if ($(e.target).hasClass('sidebar-show') || $(e.target).hasClass('search-show')) {
          $("body").removeClass("sidebar-show");
          $("body").addClass("sidebar-gone");
          $("body").removeClass("search-show");
          update_sidebar_nicescroll();
        }
      });
      update_sidebar_nicescroll();

      if (now_layout_class == 'layout-3') {
        var nav_second_classes = $(".navbar-secondary").attr('class'),
            nav_second = $(".navbar-secondary");
        nav_second.attr('data-nav-classes', nav_second_classes);
        nav_second.removeAttr('class');
        nav_second.addClass('main-sidebar');
        var main_sidebar = $(".main-sidebar");
        main_sidebar.find('.container').addClass('sidebar-wrapper').removeClass('container');
        main_sidebar.find('.navbar-nav').addClass('sidebar-menu').removeClass('navbar-nav');
        main_sidebar.find('.sidebar-menu .nav-item.dropdown.show a').click();
        main_sidebar.find('.sidebar-brand').remove();
        main_sidebar.find('.sidebar-menu').before($('<div>', {
          "class": 'sidebar-brand'
        }).append($('<a>', {
          href: $('.navbar-brand').attr('href')
        }).html($('.navbar-brand').html())));
        setTimeout(function () {
          sidebar_nicescroll = main_sidebar.niceScroll(sidebar_nicescroll_opts);
          sidebar_nicescroll = main_sidebar.getNiceScroll();
        }, 700);
        sidebar_dropdown();
        $(".main-wrapper").removeClass("container");
      }
    } else {
      $("body").removeClass("sidebar-gone sidebar-show");
      if (now_layout_class) $("body").addClass(now_layout_class);

      var _nav_second_classes = $(".main-sidebar").attr('data-nav-classes'),
          _nav_second = $(".main-sidebar");

      if (now_layout_class == 'layout-3' && _nav_second.hasClass('main-sidebar')) {
        _nav_second.find(".sidebar-menu li a.has-dropdown").off('click');

        _nav_second.find('.sidebar-brand').remove();

        _nav_second.removeAttr('class');

        _nav_second.addClass(_nav_second_classes);

        var _main_sidebar = $(".navbar-secondary");

        _main_sidebar.find('.sidebar-wrapper').addClass('container').removeClass('sidebar-wrapper');

        _main_sidebar.find('.sidebar-menu').addClass('navbar-nav').removeClass('sidebar-menu');

        _main_sidebar.find('.dropdown-menu').hide();

        _main_sidebar.removeAttr('style');

        _main_sidebar.removeAttr('tabindex');

        _main_sidebar.removeAttr('data-nav-classes');

        $(".main-wrapper").addClass("container"); // if(sidebar_nicescroll != null)
        //   sidebar_nicescroll.remove();
      } else if (now_layout_class == 'layout-2') {
        $("body").addClass("layout-2");
      } else {
        update_sidebar_nicescroll();
      }
    }
  };

  toggleLayout();
  $(window).resize(toggleLayout);
  $("[data-toggle='search']").click(function () {
    var body = $("body");

    if (body.hasClass('search-gone')) {
      body.addClass('search-gone');
      body.removeClass('search-show');
    } else {
      body.removeClass('search-gone');
      body.addClass('search-show');
    }
  }); // tooltip

  $("[data-toggle='tooltip']").tooltip(); // popover

  $('[data-toggle="popover"]').popover({
    container: 'body'
  }); // Select2

  if (jQuery().select2) {
    $(".select2").select2();
  } // Selectric


  if (jQuery().selectric) {
    $(".selectric").selectric({
      disableOnMobile: false,
      nativeOnMobile: false
    });
  }

  $(".notification-toggle").dropdown();
  $(".notification-toggle").parent().on('shown.bs.dropdown', function () {
    $(".dropdown-list-icons").niceScroll({
      cursoropacitymin: .3,
      cursoropacitymax: .8,
      cursorwidth: 7
    });
  });
  $(".message-toggle").dropdown();
  $(".message-toggle").parent().on('shown.bs.dropdown', function () {
    $(".dropdown-list-message").niceScroll({
      cursoropacitymin: .3,
      cursoropacitymax: .8,
      cursorwidth: 7
    });
  });

  if ($(".chat-content").length) {
    $(".chat-content").niceScroll({
      cursoropacitymin: .3,
      cursoropacitymax: .8
    });
    $('.chat-content').getNiceScroll(0).doScrollTop($('.chat-content').height());
  }

  if (jQuery().summernote) {
    $(".summernote").summernote({
      dialogsInBody: true,
      minHeight: 250
    });
    $(".summernote-simple").summernote({
      dialogsInBody: true,
      minHeight: 150,
      toolbar: [['style', ['bold', 'italic', 'underline', 'clear']], ['font', ['strikethrough']], ['para', ['paragraph']]]
    });
  }

  if (window.CodeMirror) {
    $(".codeeditor").each(function () {
      var editor = CodeMirror.fromTextArea(this, {
        lineNumbers: true,
        theme: "duotone-dark",
        mode: 'javascript',
        height: 200
      });
      editor.setSize("100%", 200);
    });
  } // Follow function


  $('.follow-btn, .following-btn').each(function () {
    var me = $(this),
        follow_text = 'Follow',
        unfollow_text = 'Following';
    me.click(function () {
      if (me.hasClass('following-btn')) {
        me.removeClass('btn-danger');
        me.removeClass('following-btn');
        me.addClass('btn-primary');
        me.html(follow_text);
        eval(me.data('unfollow-action'));
      } else {
        me.removeClass('btn-primary');
        me.addClass('btn-danger');
        me.addClass('following-btn');
        me.html(unfollow_text);
        eval(me.data('follow-action'));
      }

      return false;
    });
  }); // Dismiss function

  $("[data-dismiss]").each(function () {
    var me = $(this),
        target = me.data('dismiss');
    me.click(function () {
      $(target).fadeOut(function () {
        $(target).remove();
      });
      return false;
    });
  }); // Collapsable

  $("[data-collapse]").each(function () {
    var me = $(this),
        target = me.data('collapse');
    me.click(function () {
      $(target).collapse('toggle');
      $(target).on('shown.bs.collapse', function (e) {
        e.stopPropagation();
        me.html('<i class="fas fa-minus"></i>');
      });
      $(target).on('hidden.bs.collapse', function (e) {
        e.stopPropagation();
        me.html('<i class="fas fa-plus"></i>');
      });
      return false;
    });
  }); // Gallery

  $(".gallery .gallery-item").each(function () {
    var me = $(this);
    me.attr('href', me.data('image'));
    me.attr('title', me.data('title'));

    if (me.parent().hasClass('gallery-fw')) {
      me.css({
        height: me.parent().data('item-height')
      });
      me.find('div').css({
        lineHeight: me.parent().data('item-height') + 'px'
      });
    }

    me.css({
      backgroundImage: 'url("' + me.data('image') + '")'
    });
  });

  if (jQuery().Chocolat) {
    $(".gallery").Chocolat({
      className: 'gallery',
      imageSelector: '.gallery-item'
    });
  } // Background


  $("[data-background]").each(function () {
    var me = $(this);
    me.css({
      backgroundImage: 'url(' + me.data('background') + ')'
    });
  }); // Custom Tab

  $("[data-tab]").each(function () {
    var me = $(this);
    me.click(function () {
      if (!me.hasClass('active')) {
        var tab_group = $('[data-tab-group="' + me.data('tab') + '"]'),
            tab_group_active = $('[data-tab-group="' + me.data('tab') + '"].active'),
            target = $(me.attr('href')),
            links = $('[data-tab="' + me.data('tab') + '"]');
        links.removeClass('active');
        me.addClass('active');
        target.addClass('active');
        tab_group_active.removeClass('active');
      }

      return false;
    });
  }); // Bootstrap 4 Validation

  $(".needs-validation").submit(function () {
    var form = $(this);

    if (form[0].checkValidity() === false) {
      event.preventDefault();
      event.stopPropagation();
    }

    form.addClass('was-validated');
  }); // alert dismissible

  $(".alert-dismissible").each(function () {
    var me = $(this);
    me.find('.close').click(function () {
      me.alert('close');
    });
  });

  if ($('.main-navbar').length) {} // Image cropper


  $('[data-crop-image]').each(function (e) {
    $(this).css({
      overflow: 'hidden',
      position: 'relative',
      height: $(this).data('crop-image')
    });
  }); // Slide Toggle

  $('[data-toggle-slide]').click(function () {
    var target = $(this).data('toggle-slide');
    $(target).slideToggle();
    return false;
  }); // Dismiss modal

  $("[data-dismiss=modal]").click(function () {
    $(this).closest('.modal').modal('hide');
    return false;
  }); // Width attribute

  $('[data-width]').each(function () {
    $(this).css({
      width: $(this).data('width')
    });
  }); // Height attribute

  $('[data-height]').each(function () {
    $(this).css({
      height: $(this).data('height')
    });
  }); // Chocolat

  if ($('.chocolat-parent').length && jQuery().Chocolat) {
    $('.chocolat-parent').Chocolat();
  } // Sortable card


  if ($('.sortable-card').length && jQuery().sortable) {
    $('.sortable-card').sortable({
      handle: '.card-header',
      opacity: .8,
      tolerance: 'pointer'
    });
  } // Daterangepicker


  if (jQuery().daterangepicker) {
    if ($(".datepicker").length) {
      $('.datepicker').daterangepicker({
        locale: {
          format: 'YYYY-MM-DD'
        },
        singleDatePicker: true
      });
    }

    if ($(".datetimepicker").length) {
      $('.datetimepicker').daterangepicker({
        locale: {
          format: 'YYYY-MM-DD hh:mm'
        },
        singleDatePicker: true,
        timePicker: true,
        timePicker24Hour: true
      });
    }

    if ($(".daterange").length) {
      $('.daterange').daterangepicker({
        locale: {
          format: 'YYYY-MM-DD'
        },
        drops: 'down',
        opens: 'right'
      });
    }
  } // Timepicker


  if (jQuery().timepicker && $(".timepicker").length) {
    $(".timepicker").timepicker({
      icons: {
        up: 'fas fa-chevron-up',
        down: 'fas fa-chevron-down'
      }
    });
  }
});

/***/ }),

/***/ "./resources/js/stisla.js":
/*!********************************!*\
  !*** ./resources/js/stisla.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

(function ($, window, i) {
  // Bootstrap 4 Modal
  $.fn.fireModal = function (options) {
    var options = $.extend({
      size: 'modal-md',
      center: false,
      animation: true,
      title: 'Modal Title',
      closeButton: true,
      header: true,
      bodyClass: '',
      footerClass: '',
      body: '',
      buttons: [],
      autoFocus: true,
      removeOnDismiss: false,
      created: function created() {},
      appended: function appended() {},
      onFormSubmit: function onFormSubmit() {},
      modal: {}
    }, options);
    this.each(function () {
      i++;
      var id = 'fire-modal-' + i,
          trigger_class = 'trigger--' + id,
          trigger_button = $('.' + trigger_class);
      $(this).addClass(trigger_class); // Get modal body

      var body = options.body;

      if (_typeof(body) == 'object') {
        if (body.length) {
          var part = body;
          body = body.removeAttr('id').clone().removeClass('modal-part');
          part.remove();
        } else {
          body = '<div class="text-danger">Modal part element not found!</div>';
        }
      } // Modal base template


      var modal_template = '   <div class="modal' + (options.animation == true ? ' fade' : '') + '" tabindex="-1" role="dialog" id="' + id + '">  ' + '     <div class="modal-dialog ' + options.size + (options.center ? ' modal-dialog-centered' : '') + '" role="document">  ' + '       <div class="modal-content">  ' + (options.header == true ? '         <div class="modal-header">  ' + '           <h5 class="modal-title">' + options.title + '</h5>  ' + (options.closeButton == true ? '           <button type="button" class="close" data-dismiss="modal" aria-label="Close">  ' + '             <span aria-hidden="true">&times;</span>  ' + '           </button>  ' : '') + '         </div>  ' : '') + '         <div class="modal-body">  ' + '         </div>  ' + (options.buttons.length > 0 ? '         <div class="modal-footer">  ' + '         </div>  ' : '') + '       </div>  ' + '     </div>  ' + '  </div>  '; // Convert modal to object

      var modal_template = $(modal_template); // Start creating buttons from 'buttons' option

      var this_button;
      options.buttons.forEach(function (item) {
        // get option 'id'
        var id = "id" in item ? item.id : ''; // Button template

        this_button = '<button type="' + ("submit" in item && item.submit == true ? 'submit' : 'button') + '" class="' + item["class"] + '" id="' + id + '">' + item.text + '</button>'; // add click event to the button

        this_button = $(this_button).off('click').on("click", function () {
          // execute function from 'handler' option
          item.handler.call(this, modal_template);
        }); // append generated buttons to the modal footer

        $(modal_template).find('.modal-footer').append(this_button);
      }); // append a given body to the modal

      $(modal_template).find('.modal-body').append(body); // add additional body class

      if (options.bodyClass) $(modal_template).find('.modal-body').addClass(options.bodyClass); // add footer body class

      if (options.footerClass) $(modal_template).find('.modal-footer').addClass(options.footerClass); // execute 'created' callback

      options.created.call(this, modal_template, options); // modal form and submit form button

      var modal_form = $(modal_template).find('.modal-body form'),
          form_submit_btn = modal_template.find('button[type=submit]'); // append generated modal to the body

      $("body").append(modal_template); // execute 'appended' callback

      options.appended.call(this, $('#' + id), modal_form, options); // if modal contains form elements

      if (modal_form.length) {
        // if `autoFocus` option is true
        if (options.autoFocus) {
          // when modal is shown
          $(modal_template).on('shown.bs.modal', function () {
            // if type of `autoFocus` option is `boolean`
            if (typeof options.autoFocus == 'boolean') modal_form.find('input:eq(0)').focus(); // the first input element will be focused
            // if type of `autoFocus` option is `string` and `autoFocus` option is an HTML element
            else if (typeof options.autoFocus == 'string' && modal_form.find(options.autoFocus).length) modal_form.find(options.autoFocus).focus(); // find elements and focus on that
          });
        } // form object


        var form_object = {
          startProgress: function startProgress() {
            modal_template.addClass('modal-progress');
          },
          stopProgress: function stopProgress() {
            modal_template.removeClass('modal-progress');
          }
        }; // if form is not contains button element

        if (!modal_form.find('button').length) $(modal_form).append('<button class="d-none" id="' + id + '-submit"></button>'); // add click event

        form_submit_btn.click(function () {
          modal_form.submit();
        }); // add submit event

        modal_form.submit(function (e) {
          // start form progress
          form_object.startProgress(); // execute `onFormSubmit` callback

          options.onFormSubmit.call(this, modal_template, e, form_object);
        });
      }

      $(document).on("click", '.' + trigger_class, function () {
        var modal = $('#' + id).modal(options.modal);

        if (options.removeOnDismiss) {
          modal.on('hidden.bs.modal', function () {
            modal.remove();
          });
        }

        return false;
      });
    });
  }; // Bootstrap Modal Destroyer


  $.destroyModal = function (modal) {
    modal.modal('hide');
    modal.on('hidden.bs.modal', function () {});
  }; // Card Progress Controller


  $.cardProgress = function (card, options) {
    var options = $.extend({
      dismiss: false,
      dismissText: 'Cancel',
      spinner: true,
      onDismiss: function onDismiss() {}
    }, options);
    var me = $(card);
    me.addClass('card-progress');

    if (options.spinner == false) {
      me.addClass('remove-spinner');
    }

    if (options.dismiss == true) {
      var btn_dismiss = '<a class="btn btn-danger card-progress-dismiss">' + options.dismissText + '</a>';
      btn_dismiss = $(btn_dismiss).off('click').on('click', function () {
        me.removeClass('card-progress');
        me.find('.card-progress-dismiss').remove();
        options.onDismiss.call(this, me);
      });
      me.append(btn_dismiss);
    }

    return {
      dismiss: function dismiss(dismissed) {
        $.cardProgressDismiss(me, dismissed);
      }
    };
  };

  $.cardProgressDismiss = function (card, dismissed) {
    var me = $(card);
    me.removeClass('card-progress');
    me.find('.card-progress-dismiss').remove();
    if (dismissed) dismissed.call(this, me);
  };

  $.chatCtrl = function (element, chat) {
    var chat = $.extend({
      position: 'chat-right',
      text: '',
      time: moment(new Date().toISOString()).format('hh:mm'),
      picture: '',
      type: 'text',
      // or typing
      timeout: 0,
      onShow: function onShow() {}
    }, chat);
    var target = $(element),
        element = '<div class="chat-item ' + chat.position + '" style="display:none">' + '<img src="' + chat.picture + '">' + '<div class="chat-details">' + '<div class="chat-text">' + chat.text + '</div>' + '<div class="chat-time">' + chat.time + '</div>' + '</div>' + '</div>',
        typing_element = '<div class="chat-item chat-left chat-typing" style="display:none">' + '<img src="' + chat.picture + '">' + '<div class="chat-details">' + '<div class="chat-text"></div>' + '</div>' + '</div>';
    var append_element = element;

    if (chat.type == 'typing') {
      append_element = typing_element;
    }

    if (chat.timeout > 0) {
      setTimeout(function () {
        target.find('.chat-content').append($(append_element).fadeIn());
      }, chat.timeout);
    } else {
      target.find('.chat-content').append($(append_element).fadeIn());
    }

    var target_height = 0;
    target.find('.chat-content .chat-item').each(function () {
      target_height += $(this).outerHeight();
    });
    setTimeout(function () {
      target.find('.chat-content').scrollTop(target_height, -1);
    }, 100);
    chat.onShow.call(this, append_element);
  };
})(jQuery, this, 0);

/***/ }),

/***/ "./resources/sass/admin/style.scss":
/*!*****************************************!*\
  !*** ./resources/sass/admin/style.scss ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!***************************************************************************************************************************!*\
  !*** multi ./resources/js/stisla.js ./resources/js/scripts.js ./resources/js/custom.js ./resources/sass/admin/style.scss ***!
  \***************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\laragon\www\stisla-laravel\resources\js\stisla.js */"./resources/js/stisla.js");
__webpack_require__(/*! C:\laragon\www\stisla-laravel\resources\js\scripts.js */"./resources/js/scripts.js");
__webpack_require__(/*! C:\laragon\www\stisla-laravel\resources\js\custom.js */"./resources/js/custom.js");
module.exports = __webpack_require__(/*! C:\laragon\www\stisla-laravel\resources\sass\admin\style.scss */"./resources/sass/admin/style.scss");


/***/ })

/******/ });