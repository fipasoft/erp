String.prototype.endsWith = function(str) 
{return (this.match(str+"$")==str);}

String.prototype.startsWith = function(str) 
{return (this.match("^"+str)==str)}

String.prototype.trim = function(){return 
(this.replace(/^[\s\xA0]+/, "").replace(/[\s\xA0]+$/, ""))}

jQuery.fn.exists = function() {
	return jQuery(this).length > 0;
}


function pss_longitud(a) {
	a = $("#" + a);
	if(a.val().length > 0 && a.val().length < 6) {
		alert('La longitud minima del password es de 6 caracteres.');
		return false;
	}
	return true;
}

function pss_comparar(a, b) {
	a = $('#' + a);
	b = $('#' + b);
	if(a.val() != b.val()) {
		alert('No coincide la confirmacion del password.');
		return false;
	}
	return true;
}

function frm_validar(forma) {
	forma = document.getElementById(forma);
	for(var i = 0; i < forma.elements.length; i++) {
		if(forma.elements[i].value == '' && !forma.elements[i].disabled) {
			alert('Faltan campos por llenar ' + forma.elements[i].id);
			return false;
		}
	}
	return true;
}
