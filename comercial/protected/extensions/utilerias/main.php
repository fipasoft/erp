<?php

/** KumbiaForms - PHP Rapid Development Framework *****************************
 *
 * Copyright (C) 2005-2007 Andr�s Felipe Guti�rrez (andresfelipe at vagoogle.net)
 *
 * This framework is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This framework is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this framework; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * Este framework es software libre; puedes redistribuirlo y/o modificarlo
 * bajo los terminos de la licencia p�blica general GNU tal y como fue publicada
 * por la Fundaci�n del Software Libre; desde la versi�n 2.1 o cualquier
 * versi�n superior.
 *
 * Este framework es distribuido con la esperanza de ser util pero SIN NINGUN
 * TIPO DE GARANTIA; dejando atr�s su LADO MERCANTIL o PARA FAVORECER ALGUN
 * FIN EN PARTICULAR. Lee la licencia publica general para m�s detalles.
 *
 * Debes recibir una copia de la Licencia P�blica General GNU junto con este
 * framework, si no es asi, escribe a Fundaci�n del Software Libre Inc.,
 * 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 ****************************************************************************
 * Some PHP Utility Functions
 ****************************************************************************/

class Utils {

	/**
	 * Separa el nombre
	 * @param nombre
	 */
	public static function separaNombre($nombre) {
		$cadenas = explode(" ", strtoupper($nombre));
		$r = array();
		$r['ap'] = trim($cadenas[0]);
		$r['am'] = trim($cadenas[1]);

		$n = '';
		for ($i = 2; $i < count($cadenas); $i++) {
			$n .= $cadenas[$i] . ' ';
		}

		$r['nombre'] = trim($n);

		return $r;

	}

	/**
	 * Carga la cache del paginador indicado por la llave, si esiste en la cache redirecciona a la pagina indicada
	 * @param llave
	 */
	public static function cargaCache($llave) {
		$session = new CHttpSession;
		$session -> open();

		$url = explode("?", Utils::currentURL());

		if ($url[1] == '') {
			if ($session['paginadores'][$llave] != '') {
				$uri = $url[0] . '?' . $session['paginadores'][$llave];
				Utils::redirect($uri);
			} else {
				$paginadores = $session['paginadores'];
				$paginadores[$llave] = $url[1];
				$session['paginadores'] = $paginadores;
			}
		} else {
			$paginadores = $session['paginadores'];
			$paginadores[$llave] = $url[1];
			$session['paginadores'] = $paginadores;
		}

	}

	/**
	 * Redireciona a la url indicada
	 * @param uri
	 * @param code
	 */
	public static function redirect($uri, $code = 302) {
		// Specific URL
		$location = null;
		if (substr($uri, 0, 4) == 'http') {
			$location = $uri;
		} else {
			$location = self::base(true);
			// Special Trick, // starts at webserver root / starts at app root
			if (substr($uri, 0, 2) == '//') {
				$location .= '/' . ltrim($uri, '/');
			} elseif (substr($uri, 0, 1) == '/') {
				$location .= '/' . ltrim($uri, '/');
			}
		}

		// $sn = \$_SERVER['SCRIPT_NAME'];
		// $cp = dirname($sn);
		// $schema = \$_SERVER['SERVER_PORT']=='443'?'https':'http';
		// $host = strlen(\$_SERVER['HTTP_HOST'])?\$_SERVER['HTTP_HOST']:\$_SERVER['SERVER_NAME'];
		// if (substr($to,0,1)=='/') $location = "$schema://$host$to";
		// elseif (substr($to,0,1)=='.') // Relative Path
		// {
		//   $location = "$schema://$host/";
		//   $pu = parse_url($to);
		//   $cd = dirname(\$_SERVER['SCRIPT_FILENAME']).'/';
		//   $np = realpath($cd.\$pu['path']);
		//   $np = str_replace(\$_SERVER['DOCUMENT_ROOT'],'',$np);
		//   $location.= $np;
		//   if ((isset(\$pu['query'])) && (strlen(\$pu['query'])>0)) $location.= '?'.\$pu['query'];
		// }
		// }

		$hs = headers_sent();
		if ($hs === false) {
			switch ($code) {
				case 301 :
				// Convert to GET
					header("301 Moved Permanently HTTP/1.1", true, $code);
					break;
				case 302 :
				// Conform re-POST
					header("302 Found HTTP/1.1", true, $code);
					break;
				case 303 :
				// dont cache, always use GET
					header("303 See Other HTTP/1.1", true, $code);
					break;
				case 304 :
				// use cache
					header("304 Not Modified HTTP/1.1", true, $code);
					break;
				case 305 :
					header("305 Use Proxy HTTP/1.1", true, $code);
					break;
				case 306 :
					header("306 Not Used HTTP/1.1", true, $code);
					break;
				case 307 :
					header("307 Temporary Redirect HTTP/1.1", true, $code);
					break;
			}
			header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
			header("Location: $location");
		}
		// Show the HTML?
		if (($hs == true) || ($code == 302) || ($code == 303)) {
			// todo: draw some javascript to redirect
			$cover_div_style = 'background-color: #ccc; height: 100%; left: 0px; position: absolute; top: 0px; width: 100%;';
			echo "<div style='$cover_div_style'>\n";
			$link_div_style = 'background-color: #fff; border: 2px solid #f00; left: 0px; margin: 5px; padding: 3px; ';
			$link_div_style .= 'position: absolute; text-align: center; top: 0px; width: 95%; z-index: 99;';
			echo "<div style='$link_div_style'>\n";
			echo "<p>Please See: <a href='$uri'>" . htmlspecialchars($location) . "</a></p>\n";
			echo "</div>\n</div>\n";
		}
		exit(0);
	}

	/**
	 * Obtiene la url actual
	 *
	 */
	static function currentURL() {
		$url = (!empty($_SERVER['HTTPS'])) ? "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] : "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
		return $url;
	}

	/**
	 * Separa un nombre completo en ap,am,nombre
	 *
	 * @param str $nom
	 * @return array
	 */
	static function separar_nombre($nom) {
		$arr = explode(' ', $nom);
		$nombre = array();
		$i = 0;
		foreach ($arr as $palabra) {
			$nombre[$i] .= ($nombre[$i] != '' ? ' ' : '') . $palabra;
			if ($i < 2 && $palabra != 'DEL' && $palabra != 'DE' && $palabra != 'LA' && $palabra != 'LOS') {
				$i++;
			}
		}

		return $nombre;
	}

	/**
	 * Merge Two Arrays Overwriting Values $a1
	 * from $a2
	 *
	 * @param array $a1
	 * @param array $a2
	 * @return array
	 */
	static function array_merge_overwrite($a1, $a2) {
		foreach ($a2 as $key2 => $value2) {
			if (!is_array($value2)) {
				$a1[$key2] = $value2;
			} else {
				if (!is_array($a1[$key2]))
					$a1[$key2] = $value2;
				else
					$a1[$key2] = array_merge_overwrite($a1[$key2], $a2[$key2]);
			}
		}
		return $a1;
	}

	/**
	 * Inserts a element into a defined position
	 * in a array
	 *
	 * @param array $form
	 * @param mixed $index
	 * @param mixed $value
	 * @param mixed $key
	 */
	static function array_insert(&$form, $index, $value, $key = null) {
		$ret = array();
		$n = 0;
		$i = false;
		foreach ($form as $keys => $val) {
			if ($n != $index) {
				$ret[$keys] = $val;
			} else {
				if (!$key) {
					$ret[$index] = $value;
					$i = true;
				} else {
					$ret[$key] = $value;
					$i = true;
				}
				$ret[$keys] = $val;
			}
			$n++;
		}
		if (!$i) {
			if (!$key) {
				$ret[$index] = $value;
				$i = true;
			} else {
				$ret[$key] = $value;
				$i = true;
			}
		}
		$form = $ret;
	}

	/**
	 * Las siguientes funciones son utilizadas para la generaci�n
	 * de versi�nes escritas de numeros
	 *
	 * @param numeric $a
	 * @return string
	 */
	static function value_num($a) {
		if ($a <= 21) {
			switch ($a) {
				case 1 :
					return 'UNO';
				case 2 :
					return 'DOS';
				case 3 :
					return 'TRES';
				case 4 :
					return 'CUATRO';
				case 5 :
					return 'CINCO';
				case 6 :
					return 'SEIS';
				case 7 :
					return 'SIETE';
				case 8 :
					return 'OCHO';
				case 9 :
					return 'NUEVE';
				case 10 :
					return 'DIEZ';
				case 11 :
					return 'ONCE';
				case 12 :
					return 'DOCE';
				case 13 :
					return 'TRECE';
				case 14 :
					return 'CATORCE';
				case 15 :
					return 'QUINCE';
				case 16 :
					return 'DIECISEIS';
				case 17 :
					return 'DIECISIETE';
				case 18 :
					return 'DIECIOCHO';
				case 19 :
					return 'DIECINUEVE';
				case 20 :
					return 'VEINTE';
				case 21 :
					return 'VEINTIUN';
			}
		} else {
			if ($a <= 99) {
				if ($a >= 22 && $a <= 29)
					return "VENTI" . value_num($a % 10);
				if ($a == 30)
					return "TREINTA";
				if ($a >= 31 && $a <= 39)
					return "TREINTA Y " . value_num($a % 10);
				if ($a == 40)
					$b = "CUARENTA";
				if ($a >= 41 && $a <= 49)
					return "CUARENTA Y " . value_num($a % 10);
				if ($a == 50)
					return "CINCUENTA";
				if ($a >= 51 && $a <= 59)
					return "CINCUENTA Y " . value_num($a % 10);
				if ($a == 60)
					return "SESENTA";
				if ($a >= 61 && $a <= 69)
					return "SESENTA Y " . value_num($a % 10);
				if ($a == 70)
					return "SETENTA";
				if ($a >= 71 && $a <= 79)
					return "SETENTA Y " . value_num($a % 10);
				if ($a == 80)
					return "OCHENTA";
				if ($a >= 81 && $a <= 89)
					return "OCHENTA Y " . value_num($a % 10);
				if ($a == 90)
					return "NOVENTA";
				if ($a >= 91 && $a <= 99)
					return "NOVENTA Y " . value_num($a % 10);
			} else {
				if ($a == 100)
					return "CIEN";
				if ($a >= 101 && $a <= 199)
					return "CIENTO " . value_num($a % 100);
				if ($a >= 200 && $a <= 299)
					return "DOSCIENTOS " . value_num($a % 100);
				if ($a >= 300 && $a <= 399)
					return "TRECIENTOS " . value_num($a % 100);
				if ($a >= 400 && $a <= 499)
					return "CUATROCIENTOS " . value_num($a % 100);
				if ($a >= 500 && $a <= 599)
					return "QUINIENTOS " . value_num($a % 100);
				if ($a >= 600 && $a <= 699)
					return "SEICIENTOS " . value_num($a % 100);
				if ($a >= 700 && $a <= 799)
					return "SETECIENTOS " . value_num($a % 100);
				if ($a >= 800 && $a <= 899)
					return "OCHOCIENTOS " . value_num($a % 100);
				if ($a >= 901 && $a <= 999)
					return "NOVECIENTOS " . value_num($a % 100);
			}
		}
	}

	static function millones($a) {
		$a = $a / 1000000;
		if ($a == 1)
			return "UN MILLON ";
		else
			return value_num($a) . " MILLONES ";
	}

	static function miles($a) {
		$a = $a / 1000;
		if ($a == 1)
			return "MIL";
		else
			return value_num($a) . "MIL ";
	}

	static function numlet($a, $p, $c) {
		$val = "";
		$v = $a;
		$a = (int)$a;
		$d = round($v - $a, 2);
		if ($a >= 1000000) {
			$val = millones($a - ($a % 1000000));
			$a = $a % 1000000;
		}
		if ($a >= 1000) {
			$val .= miles($a - ($a % 1000));
			$a = $a % 1000;
		}
		$val .= value_num($a) . " $p ";
		if ($d) {
			$d *= 100;
			$val .= " CON " . value_num($d) . " $c ";
		}
		return $val;
	}

	static function money_letter($valor, $moneda, $centavos) {
		return numlet($valor, $moneda, $centavos);
	}

	static function to_human($num) {
		if ($num < 1024) {
			return $num . " bytes";
		} else {
			if ($num < 1024 * 1024) {
				return round($num / 1024, 2) . " kb";
			} else {
				return round($num / 1024 / 1024, 2) . " mb";
			}
		}
	}

	static function fecha_hora_convertir($f) {
		$tmp = explode(' ', $f);
		$fecha = str_replace('-', '/', self::fecha_convertir($tmp[0]));
		$hora = substr($tmp[1], 0, 5);
		return $fecha . ' ' . $hora;
	}

	static function fecha_convertir($f) {
		$fecha = '';
		if (substr_count($f, '-') > 0) {
			$f = explode('-', $f);
			$fecha = $f[2] . '-' . $f[1] . '-' . $f[0];
		}else if (substr_count($f, '/') > 0) {
			$f = explode('/', $f);
			$fecha = $f[2] . '/' . $f[1] . '/' . $f[0];
		}
		return $fecha;
	}

	static function fecha_espanol($f) {
		$fecha = explode('-', $f);
		$mes = '';
		switch(intval($fecha[1], 10)) {
			case  1 :
				$mes = 'enero';
				break;
			case  2 :
				$mes = 'febrero';
				break;
			case  3 :
				$mes = 'marzo';
				break;
			case  4 :
				$mes = 'abril';
				break;
			case  5 :
				$mes = 'mayo';
				break;
			case  6 :
				$mes = 'junio';
				break;
			case  7 :
				$mes = 'julio';
				break;
			case  8 :
				$mes = 'agosto';
				break;
			case  9 :
				$mes = 'septiembre';
				break;
			case 10 :
				$mes = 'octubre';
				break;
			case 11 :
				$mes = 'noviembre';
				break;
			case 12 :
				$mes = 'diciembre';
				break;
			default :
				$mes = '';
		}
		$f = intval($fecha[2], 10) . " de " . $mes . " de " . intval($fecha[0], 10);
		return $f;
	}

	static function fecha_mix($f) {
		$fecha = explode('-', $f);
		$mes = '';
		switch(intval($fecha[1], 10)) {
			case  1 :
				$mes = 'ene';
				break;
			case  2 :
				$mes = 'feb';
				break;
			case  3 :
				$mes = 'mar';
				break;
			case  4 :
				$mes = 'abr';
				break;
			case  5 :
				$mes = 'may';
				break;
			case  6 :
				$mes = 'jun';
				break;
			case  7 :
				$mes = 'jul';
				break;
			case  8 :
				$mes = 'ago';
				break;
			case  9 :
				$mes = 'sep';
				break;
			case 10 :
				$mes = 'oct';
				break;
			case 11 :
				$mes = 'nov';
				break;
			case 12 :
				$mes = 'dic';
				break;
			default :
				$mes = '';
		}
		$f = intval($fecha[2], 10) . "/" . $mes . "/" . intval($fecha[0], 10);
		return $f;
	}

	static function mes_espanol($f) {
		switch($f) {
			case '01' :
				$mes = 'Enero';
				break;
			case '02' :
				$mes = 'Febrero';
				break;
			case '03' :
				$mes = 'Marzo';
				break;
			case '04' :
				$mes = 'Abril';
				break;
			case '05' :
				$mes = 'Mayo';
				break;
			case '06' :
				$mes = 'Junio';
				break;
			case '07' :
				$mes = 'Julio';
				break;
			case '08' :
				$mes = 'Agosto';
				break;
			case '09' :
				$mes = 'Septiembre';
				break;
			case '10' :
				$mes = 'Octubre';
				break;
			case '11' :
				$mes = 'Noviembre';
				break;
			case '12' :
				$mes = 'Diciembre';
				break;
			default :
				$mes = '';
		}
		return $mes;
	}

	static function dia_espanol($d) {
		switch($d) {
			case '0' :
				$dia = 'Domingo';
				break;
			case '1' :
				$dia = 'Lunes';
				break;
			case '2' :
				$dia = 'Martes';
				break;
			case '3' :
				$dia = 'Mi&eacute;rcoles';
				break;
			case '4' :
				$dia = 'Jueves';
				break;
			case '5' :
				$dia = 'Viernes';
				break;
			case '6' :
				$dia = 'S&aacute;bado';
				break;
			default :
				$dia = '';
		}
		return $dia;
	}

	static function dia_semana($datetime) {
		$arr = explode("-", $datetime);
		$d = date("w", mktime(0, 0, 0, $arr[1], $arr[2], $arr[0]));
		return self::dia_espanol($d);
	}

	static function ordinales($n) {
		switch($n) {
			case 1 :
				return 'primer';
				break;
			case 2 :
				return 'pegundo';
				break;
			case 3 :
				return 'tercer';
				break;
			case 4 :
				return 'cuarto';
				break;
			case 5 :
				return 'quinto';
				break;
			case 6 :
				return 'sexto';
				break;
		}
	}
	
	
	static function convierteFechaReducido($fecha){
		$i=explode("-",$fecha);
		$i=$i[2]."/".substr(Utils::mes_espanol($i[1]),0,3)."/".substr($i[0],2,2);
		return $i;
	}

	static function textoPlano($text) {

		$acentos = array("á", "é", "í", "ó", "ú", "Ã¡", "Ã©", "Ã", "Ã³", "Ãº");
		$rem = array("a", "e", "i", "o", "u", "a", "e", "i", "o", "u");
		$text = str_replace($acentos, $rem, $text);

		$tofind = "ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ";
		$replac = "AAAAAAaaaaaaOOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn";
		$text = (strtr($text, $tofind, $replac));

		return $text;
	}

	static function idValido($text) {
		$text = textoPlano($text);
		$text = str_replace(" ", "_", $text);
		return $text;
	}

	static function getRealIP() {
		if ($_SERVER['HTTP_X_FORWARDED_FOR'] != '') {
			$client_ip = (!empty($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : ((!empty($_ENV['REMOTE_ADDR'])) ? $_ENV['REMOTE_ADDR'] : "unknown");
			// los proxys van añadiendo al final de esta cabecera
			// las direcciones ip que van "ocultando". Para localizar la ip real
			// del usuario se comienza a mirar por el principio hasta encontrar
			// una dirección ip que no sea del rango privado. En caso de no
			// encontrarse ninguna se toma como valor el REMOTE_ADDR
			$entries = split('[, ]', $_SERVER['HTTP_X_FORWARDED_FOR']);
			reset($entries);
			while (list(, $entry) = each($entries)) {
				$entry = trim($entry);
				if (preg_match("/^([0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)/", $entry, $ip_list)) {
					// http://www.faqs.org/rfcs/rfc1918.html
					$private_ip = array('/^0\./', '/^127\.0\.0\.1/', '/^192\.168\..*/', '/^172\.((1[6-9])|(2[0-9])|(3[0-1]))\..*/', '/^10\..*/');
					$found_ip = preg_replace($private_ip, $client_ip, $ip_list[1]);
					if ($client_ip != $found_ip) {
						$client_ip = $found_ip;
						break;
					}
				}
			}
		} else {
			$client_ip = (!empty($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : ((!empty($_ENV['REMOTE_ADDR'])) ? $_ENV['REMOTE_ADDR'] : "unknown");
		}
		return $client_ip;
	}

	function comparaDateTime($fecha1, $fecha2) {
		$f1 = new DateTime($fecha1);
		$f2 = new DateTime($fecha2);

		$f1 = $f1 -> format('U');
		$f2 = $f2 -> format('U');

		return $f1 - $f2;
	}

	function compara_fechas($fecha1, $fecha2) {
		if (preg_match("/[0-9]{1,2}\/[0-9]{1,2}\/([0-9][0-9]){1,2}/", $fecha1))

			list($dia1, $mes1, $año1) = split("/", $fecha1);

		if (preg_match("/[0-9]{1,2}-[0-9]{1,2}-([0-9][0-9]){1,2}/", $fecha1))

			list($dia1, $mes1, $año1) = split("-", $fecha1);
		if (preg_match("/[0-9]{1,2}\/[0-9]{1,2}\/([0-9][0-9]){1,2}/", $fecha2))

			list($dia2, $mes2, $año2) = split("/", $fecha2);

		if (preg_match("/[0-9]{1,2}-[0-9]{1,2}-([0-9][0-9]){1,2}/", $fecha2))

			list($dia2, $mes2, $año2) = split("-", $fecha2);
		$dif = mktime(0, 0, 0, $mes1, $dia1, $año1) - mktime(0, 0, 0, $mes2, $dia2, $año2);
		return ($dif);

	}

	function convierteFecha($fecha) {
		$i = explode("-", $fecha);
		$i = $i[2] . "/" . $i[1] . "/" . $i[0];
		return $i;
	}

	function convierteFechaMySql($fecha) {
		$i = explode("/", $fecha);
		$i = $i[2] . "-" . $i[1] . "-" . $i[0];
		return $i;
	}

	static function dia_espanol_lista($d) {
		switch($d) {
			case '0' :
				$dia = 'Domingo';
				break;
			case '1' :
				$dia = 'Lunes';
				break;
			case '2' :
				$dia = 'Martes';
				break;
			case '3' :
				$dia = 'Miercoles';
				break;
			case '4' :
				$dia = 'Jueves';
				break;
			case '5' :
				$dia = 'Viernes';
				break;
			case '6' :
				$dia = 'Sabado';
				break;
			default :
				$dia = '';
		}
		return $dia;
	}

	static function endsWith($str, $sub) {
		return (substr($str, strlen($str) - strlen($sub)) == $sub);
	}

	static public function verTurno($t) {
		switch($t) {
			case 'M' :
				return 'Matutino';
			case 'V' :
				return 'Vespertino';
			case 'N' :
				return 'Nocturno';
		}
	}

	static public function materiaTipo($tipo) {
		switch($tipo) {
			case 'OBL' :
				return 'Obligatoria';
			case 'OPT' :
				return 'Optativa';
			case 'TLR' :
				return 'Taller';
			case 'PRO' :
				return 'Programa de extensi&oacute;n y difusi&oacute;n cultural';
		}
		return;
	}

	/*
	 * Mueve archivos de un directorio a otro directorio.
	 * Move files from one directory to another directory.
	 */
	static public function cortarArchivo($oldfile, $newfile) {
		if (copy($oldfile, $newfile)) {
			unlink($oldfile);
			return true;
		}

		return false;
	}

	static public function delete_directory($dirname) {
		if (is_dir($dirname))
			$dir_handle = opendir($dirname);
		if (!$dir_handle)
			return false;
		while ($file = readdir($dir_handle)) {
			if ($file != "." && $file != "..") {
				if (!is_dir($dirname . "/" . $file))
					unlink($dirname . "/" . $file);
				else
					Utils::delete_directory($dirname . '/' . $file);
			}
		}
		closedir($dir_handle);
		rmdir($dirname);
		return true;
	}

	static public function escribeArchivo($archivo, $contenido) {
		try{
			//Actualizamos el archivo con el nuevo valor
			$fp = fopen($archivo, "w+");
			fwrite($fp, $contenido);
			fclose($fp);
		}catch(Exception $e){
			
		}

	}

	static function timeToMinutes($time) {
		$horaSplit = explode(":", $time);
		if (count($horaSplit) < 3) {
			$horaSplit[2] = 0;
		}

		# Pasamos los elementos a segundos
		$horaSplit[0] = $horaSplit[0] * 60 * 60;
		$horaSplit[1] = $horaSplit[1] * 60;

		return (($horaSplit[0] + $horaSplit[1] + $horaSplit[2]) / 60);
	}

	static function minutesToHours($mins) {
		$hours = floor($mins / 60);
		$minutes = $mins - ($hours * 60);

		if (!$minutes) {
			$minutes = "00";
		} else if ($minutes <= 9) {
			$minutes = "0" . $minutes;
		}

		return ("{$hours}:{$minutes}");
	}

	static function compararFecha($fecha, $actualizacion) {
		$datetime2 = new DateTime($fecha);
		$intervalo = ($actualizacion);
		$datetime2 -> modify($intervalo);
		$hoy = new DateTime();
		return ($datetime2 -> format('U') < $hoy -> format('U'));
	}

}
?>