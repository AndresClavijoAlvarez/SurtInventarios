/*
 * jQuery validate.password plug-in 1.0
 *
 * http://bassistance.de/jquery-plugins/jquery-plugin-validate.password/
 *
 * Copyright (c) 2009 Jörn Zaefferer
 *
 * $Id$
 *
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 */
(function($) {
	
	var LOWER = /[a-z]/,
		UPPER = /[A-Z]/,
		DIGIT = /[0-9]/,
		DIGITS = /[0-9].*[0-9]/,
		SPECIAL = /[^a-zA-Z0-9]/,
		SAME = /^(.)\1+$/;
		
	function rating(rate, message) {
		return {
			rate: rate,
			messageKey: message
		};
	}
	function rating2(rate, message) {
		return {
			rate: rate,
			messageKey: message
		};
	}
	
	function uncapitalize(str) {
		return str.substring(0, 1).toLowerCase() + str.substring(1);
	}
	/*
	$.validator.passwordRating = function(password, username) {
		if (!password || password.length < 8)
			return rating(0, "too-short");
		if (username && password.toLowerCase().match(username.toLowerCase()))
			return rating(0, "similar-to-username");		
		if (SAME.test(password))
			return rating(1, "very-weak");
			
	
		var lower = LOWER.test(password),
			upper = UPPER.test(uncapitalize(password)),
			digit = DIGIT.test(password),
			digits = DIGITS.test(password),
			special = SPECIAL.test(password);
		
		if (lower && upper && digit || lower && digits || upper && digits || special)
			return rating(4, "strong");
		if (lower && upper || lower && digit || upper && digit)
			return rating(3, "good");
		return rating(2, "weak");
	}JHOAN POSADA
	*/
	$.validator.passwordRating = function(password, user) {
		if (!password || password.length < 8)
			return rating(0, "too-short");
		if (user && password.toLowerCase().match(user.toLowerCase()))
			return rating(0, "similar-to-user");		
		if (SAME.test(password))
			return rating(1, "very-weak");
			
	
		var lower = LOWER.test(password),
			upper = UPPER.test(uncapitalize(password)),
			digit = DIGIT.test(password),
			digits = DIGITS.test(password),
			special = SPECIAL.test(password);
		
		if (lower && upper && digit || lower && digits || upper && digits || special)
			return rating(4, "strong");
		if (lower && upper || lower && digit || upper && digit)
			return rating(3, "good");
		return rating(2, "weak");
	}				

	$.validator.passwordRating2 = function(password, user) {
		if (!password || password.length < 8)
			return rating(0, "too-short");
		if (user && password.toLowerCase().match(user.toLowerCase()))
			return rating(0, "similar-to-user2");		
		if (SAME.test(password))
			return rating(1, "very-weak");
			
	
		var lower = LOWER.test(password),
			upper = UPPER.test(uncapitalize(password)),
			digit = DIGIT.test(password),
			digits = DIGITS.test(password),
			special = SPECIAL.test(password);
		
		if (lower && upper && digit || lower && digits || upper && digits || special)
			return rating(4, "strong");
		if (lower && upper || lower && digit || upper && digit)
			return rating(3, "good");
		return rating(2, "weak");	
	}

	$.validator.passwordRating.messages = {
		"similar-to-username": "Clave similar a la clave anterior",
		"similar-to-user": "Clave similar a la antigua clave",
		"similar-to-user2": "La clave no puede contener el número de cedula",
		"too-short": "Muy Corta",
		"very-weak": "Muy Debil",
		"weak": "Debil",
		"good": "Bien",
		"strong": "Fuerte"

	}
		$.validator.passwordRating2.messages = {
				"similar-to-user2": "Clave similar al usuario",
		}
	
	$.validator.addMethod("password", function(value, element, userField) {
		
		var password = element.value,
		user = $(typeof userField != "boolean" ? userField : []);
		

		var rating = $.validator.passwordRating(password, user.val());
		var meter = $(".password-meter", element.form);
		// update message for this field

		if (rating.messageKey == "similar-to-user"){

		meter.find(".password-meter-bar").removeClass().addClass("password-meter-bar").addClass("password-meter-" + rating.messageKey);
		meter.find(".password-meter-message")
		.removeClass()
		.addClass("password-meter-message")
		.addClass("password-meter-message-" + rating.messageKey)
		.text($.validator.passwordRating.messages[rating.messageKey]);
		// display process bar instead of error message
	
		return rating.rate > 2;
		}else{
		var susuario = element.align;	
		var rating = $.validator.passwordRating2(password,susuario);
		var meter = $(".password-meter", element.form);
		
		meter.find(".password-meter-bar").removeClass().addClass("password-meter-bar").addClass("password-meter-" + rating.messageKey);
		meter.find(".password-meter-message")
		.removeClass()
		.addClass("password-meter-message")
		.addClass("password-meter-message-" + rating.messageKey)
		.text($.validator.passwordRating.messages[rating.messageKey]);
		// display process bar instead of error message
		
		return rating.rate > 2;}
/*


		meter2.find(".password-meter-bar").removeClass().addClass("password-meter-bar").addClass("password-meter-" + rating2.messageKey);
		meter2.find(".password-meter-message")
		.removeClass()
		.addClass("password-meter-message")
		.addClass("password-meter-message-" + rating2.messageKey)
		.text($.validator.passwordRating2.messages[rating2.messageKey]);
		// display process bar instead of error message
//		alert (rating2.rate);
		return rating2.rate > 2;*/
	}, "&nbsp;");
	// manually add class rule, to make username param optional
	$.validator.classRuleSettings.password = { password: true };
	
})(jQuery);
