(function($) {
	// person class
	var Validations = $.Class.create({
		// constructor
		initialize : function() {
		},
		// methods
		ClassName : function() {
			return 'Validations';
		},
		esEntero : function(s) {	
			for(var i = 0; i < s.length; i++) {
				var c = s.charAt(i);
				if(!((c >= "0") && (c <= "9"))) {
					return false;
				}
			}
			return true;
		},
		validarEntero : function(campo) {
			if(!this.esEntero(campo.val())) {
				campo.effect("shake", {
					times : 3
				}, 300);
				campo.val('');
				campo.focus();
			}
		}
	}, {
		// properties
		getset : []
	});

	var methods = {
		init : function(options) {
			var validations = new Validations();
			return this.each(function() {
				var $this = $(this);
				$this.find("input.entero").each(function() {
					
					$(this).blur(function() {
						validations.validarEntero($(this));	
					})
				});
			});
		}
	};

	//Funciones

	$.fn.fvalidator = function(method) {

		// Method calling logic
		if(methods[method]) {
			return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
		} else if( typeof method === 'object' || !method) {
			return methods.init.apply(this, arguments);
		} else {
			$.error('Method ' + method + ' does not exist on jQuery.tblSincro');
		}

	};
})(jQuery);
