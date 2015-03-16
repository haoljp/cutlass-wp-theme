/* global jQuery:true */
;(function($, window, document, undefined) {
  'use strict';

  var pluginName = 'backtotop',
      defaults = {
        backToTopTxt: '回顶部'
      };

  function Plugin(element, options) {
    this.element = element;

    this.options = $.extend({}, defaults, options);

    this._defaults = defaults;
    this._name = pluginName;

    this.init();
  }

  Plugin.prototype.init = function() {
    var $backToTopEle = $(this.element);

    $backToTopEle.html(this.options.backToTopTxt)
      .click(function() {
        $('html, body').animate({
          scrollTop: 0
        }, 120);
      });

    var $backToTopFun = function() {
      var st = $(document).scrollTop(),
          winh = $(window).height();

      $backToTopEle.toggle(st > 0);

      //IE6 positioning
      if (!window.XMLHttpRequest) {
        $backToTopEle.css('top', st + winh - 166);
      }
    };

    $(window).bind('scroll', $backToTopFun);
    $(function() {
      $backToTopFun();
    });

  };

  $.fn[pluginName] = function(options) {
    return this.each(function() {
      if (!$.data(this, 'plugin_' + pluginName)) {
        $.data(this, 'plugin_' + pluginName,
          new Plugin(this, options));
      }
    });
  };

})(jQuery, window, document);
