(function($) {

	var methods = {
		cancelar : function() {
			cancelar = $("#cancelar");
			if(cancelar.exists()) {
				cancelar.click(function() {
					if(confirm('Al cancelar se perderan los cambios hechos en este formulario, desea continuar?')) {
						document.location.href = $("#YIIbaseUrl").val() + $("#controller").val() + "/" + "index";
					}
				});
			}
		},
		
		selectorCiclos : function() {
			if($('#cicloSel').exists() && $('#cicloBtn').exists()) {

				$('#cicloBtn').click(function() {
					$('#cicloSel').show();
					$('#cicloBtn').hide();
				});

				$('#cicloSel').change(function() {
					$('#frm_ciclo').submit();
				});
			}
		},
		
		busqueda : function() {
			if($('#btnBusqueda').exists()) {
				$('#btnBusqueda').attr("href", "javascript:;");
				$('#btnBusqueda').click(function() {
					$('#divBusqueda').slideToggle();
				});
			}

			if($('#btnQuitar').exists()) {
				$('#btnQuitar').attr("href", "javascript:;");
				$('#btnQuitar').click(function() {
					$("#formBusqueda input[type=text], #formBusqueda textarea, #formBusqueda select").val('');
					$("#formBusqueda").submit()
				});
			}

			if($('#btnLimpiar').exists()) {
				$('#btnLimpiar').attr("href", "javascript:;");
				$('#btnLimpiar').click(function() {
					$("#formBusqueda input[type=text], #formBusqueda textarea, #formBusqueda select").val('');
				});
			}
		},
		
		fecha : function() {
			$("input._fecha_").datepicker({
				dayNames : ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
				monthNames : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
				monthNamesShort : ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
				dayNamesMin : ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
				dayNamesShort : ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
				dateFormat : 'dd/mm/yy'
			});
		},
		
		fvalidator : function() {
			$(".fvalidator").fvalidator();
		}
	};

	//Funciones

	$.fn.system = function(method) {

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

function init() {
	$(document.body).system('cancelar');
	$(document.body).system('selectorCiclos');
	$(document.body).system('busqueda');
	$(document.body).system('fecha');
	$(document.body).system('fvalidator');
}

addDOMLoadEvent(init);
