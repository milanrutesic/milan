'use strict';

/* Directives */

angular.module('alefos.directives', []).
	
	directive('appVersion', ['version', function(version) {
	    return function(scope, elm, attrs) {
	        elm.text(version);
	    };
	}]).

	directive("buttonDirective", function () {
	    return function (scope, element, attrs) {
	    	element.text(scope.lang[eval("'" + element.text() + "'")]);
	    	$(element).button({
	            
	        });
	    };
	});
