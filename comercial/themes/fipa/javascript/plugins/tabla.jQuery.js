(function($) {

	var methods = {
		init : function(options) {
			var Wid = this.attr("id");

			$("#" + Wid + " table .switch").each(function(index) {
				$(this).attr("href","javascript:;");
				$(this).click(function() {
					
					$("#" + Wid + " table input.chbox").each(function(index) {
						if(!$(this).is(":disabled")){
							if($(this).is(":checked")){
								$(this).attr("checked", false);
							}else{
								$(this).attr("checked", true);
							}
						}
					});
					
				});
			});
		}
	};

	//Funciones
	
	$.fn.tabla = function(method) {

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
