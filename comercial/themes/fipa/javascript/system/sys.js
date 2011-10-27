function cancelar(){

	cancelar = $("#cancelar");
	if(cancelar.exists()){
	cancelar.click(function(){
		if(confirm('Al cancelar se perderan los cambios hechos en este formulario, desea continuar?')){
			document.location.href = $("#YIIbaseUrl").val() + $("#controller").val() + "/" + "index";
		}
	});
	}	
	
}


function selectorCiclos(){
	if($('#cicloSel').exists() && $('#cicloBtn').exists()){
		
		$('#cicloBtn').click(function (){
			$('#cicloSel').show();
			$('#cicloBtn').hide();
		});
		
		$('#cicloSel').change(function (){
			$('#frm_ciclo').submit();
		});
		
	}	
	

}

function busqueda(){
	if($('#btnBusqueda').exists()){
		$('#btnBusqueda').attr("href","javascript:;");
		$('#btnBusqueda').click(function (){
			$('#divBusqueda').slideToggle();
		});
		}

	if($('#btnQuitar').exists()){
		$('#btnQuitar').attr("href","javascript:;");
		$('#btnQuitar').click(function (){
 			$("#formBusqueda input[type=text], #formBusqueda textarea, #formBusqueda select").val('');
 			$("#formBusqueda").submit()
		});
		}
		
	if($('#btnLimpiar').exists()){
		$('#btnLimpiar').attr("href","javascript:;");
		$('#btnLimpiar').click(function (){
			$("#formBusqueda input[type=text], #formBusqueda textarea, #formBusqueda select").val('');
		});
		}
}

function fecha(){
	$( "input._fecha_" ).datepicker(
		{ 
				dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
			 	monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
			 	monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
			 	dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
			 	dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
				dateFormat: 'dd/mm/yy' });
}



function init(){
	selectorCiclos();
	busqueda();
	cancelar();
	fecha();
}



addDOMLoadEvent(init);