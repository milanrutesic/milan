// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

// Place any jQuery/helper plugins in here.

// Initiate accordion menu
$(function() {	
	var menu_ul = $('.menu > li > ul');
	var menu_a  = $('.menu > li > a');
	
	menu_ul.hide();
	
	menu_a.click(function(e) {
	    menu_ul.hide();
	    e.preventDefault();
	    if(!$(this).hasClass('active')) {
	        menu_a.removeClass('active');
	        menu_ul.filter(':visible').slideUp('normal');
	        $(this).addClass('active').next().stop(true,true).slideDown('normal');
	    } else {
	        $(this).removeClass('active');
	        $(this).next().stop(true,true).slideUp('normal');
	    }
	});
	
	var currLocation = window.location.hash;
	var activeMenu = currLocation.substr(0, currLocation.indexOf('/', 2));
	activeMenu = activeMenu.substr(2);
	$("." + activeMenu + " > a").click();
});