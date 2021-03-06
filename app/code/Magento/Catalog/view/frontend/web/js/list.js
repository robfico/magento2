/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
/*jshint browser:true jquery:true*/
define([
    "jquery",
    "jquery/ui"
], function($){
    "use strict";

    $.widget('mage.compareList', {
        _create: function() {

            var elem = this.element,
                products = $('thead td', elem);

            if (products.length > this.options.productsInRow) {
                var headings = $('<table/>')
                    .addClass('comparison headings data table')
                    .insertBefore(elem.closest('.container'));
                    
                elem.addClass('scroll');

                $('th', elem).each(function(){
                    var th = $(this),
                        thCopy = th.clone();

                    th.animate({
                        top: '+=0'
                    }, 50, function(){
                        var height = th.height();
                        
                        thCopy.css('height', height)
                            .appendTo(headings)
                            .wrap('<tr />');
                    });
                });
            }

            $(this.options.windowPrintSelector).on('click', function(e) {
                e.preventDefault();
                window.print();
            });

            $.each(this.options.selectors, function(i, selector) {
                $(selector).on('click', function(e) {
                    e.preventDefault();
                    window.location.href = $(this).data('url');
                });
            });

        }
    });

    return $.mage.compareList;
});