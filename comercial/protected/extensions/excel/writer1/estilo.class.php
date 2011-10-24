<?php
class XLSEstilo{
	public $catalogo;
	public function XLSEstilo(){
		// H1
		$this->catalogo['H1']['setAlign'] = 'center';
		$this->catalogo['H1']['setBold'] = '1';
		$this->catalogo['H1']['setFontFamily'] = 'Arial';
		$this->catalogo['H1']['setSize'] = '16';
		$this->catalogo['H1']['setVAlign'] = 'vcenter';
		// H2
		$this->catalogo['H2']['setAlign'] = 'center';
		$this->catalogo['H2']['setBold'] = '1';
		$this->catalogo['H2']['setFontFamily'] = 'Arial';
		$this->catalogo['H2']['setSize'] = '14';
		$this->catalogo['H2']['setVAlign'] = 'vcenter';
		// H2.Left
		$this->catalogo['H2.Left']['setAlign'] = 'left';
		$this->catalogo['H2.Left']['setBold'] = '1';
		$this->catalogo['H2.Left']['setFontFamily'] = 'Arial';
		$this->catalogo['H2.Left']['setSize'] = '14';
		$this->catalogo['H2.Left']['setVAlign'] = 'vcenter';
		// H2.BGyellow
		$this->catalogo['H2.BGYellow']['setAlign'] = 'center';
		$this->catalogo['H2.BGYellow']['setBold'] = '1';
		$this->catalogo['H2.BGYellow']['setFgColor'] = '5';
		$this->catalogo['H2.BGYellow']['setFontFamily'] = 'Arial';
		$this->catalogo['H2.BGYellow']['setSize'] = '14';
		$this->catalogo['H2.BGYellow']['setVAlign'] = 'vcenter';
		// H3
		$this->catalogo['H3']['setAlign'] = 'center';
		$this->catalogo['H3']['setBold'] = '1';
		$this->catalogo['H3']['setFontFamily'] = 'Arial';
		$this->catalogo['H3']['setSize'] = '11';
		$this->catalogo['H3']['setVAlign'] = 'vcenter';
		// H4
		$this->catalogo['H4']['setAlign'] = 'center';
		$this->catalogo['H4']['setFontFamily'] = 'Arial';
		$this->catalogo['H4']['setSize'] = '10';
		$this->catalogo['H4']['setVAlign'] = 'vcenter';
		// TH
		$this->catalogo['TH']['setAlign'] = 'center';
		$this->catalogo['TH']['setBold'] = '1';
		$this->catalogo['TH']['setBorder'] = '1';
		$this->catalogo['TH']['setFgColor'] = '43';
		$this->catalogo['TH']['setFontFamily'] = 'Arial';
		$this->catalogo['TH']['setSize'] = '10';
		$this->catalogo['TH']['setVAlign'] = 'vcenter';
		$this->catalogo['TH']['setTextWrap'] = '';
		// TH.BGGray
		$this->catalogo['TH.BGGray']['setAlign'] = 'center';
		$this->catalogo['TH.BGGray']['setBorder'] = '1';
		$this->catalogo['TH.BGGray']['setFgColor'] = '22';
		$this->catalogo['TH.BGGray']['setFontFamily'] = 'Arial';
		$this->catalogo['TH.BGGray']['setSize'] = '10';
		$this->catalogo['TH.BGGray']['setVAlign'] = 'vcenter';
		// TH.BGGrayNoBorder
		$this->catalogo['TH.BGGrayNoBorder']['setAlign'] = 'center';
		$this->catalogo['TH.BGGrayNoBorder']['setFgColor'] = '22';
		$this->catalogo['TH.BGGrayNoBorder']['setFontFamily'] = 'Arial';
		$this->catalogo['TH.BGGrayNoBorder']['setSize'] = '10';
		$this->catalogo['TH.BGGrayNoBorder']['setVAlign'] = 'vcenter';
		// TH.BGOrange
		$this->catalogo['TH.BGOrange']['setAlign'] = 'center';
		$this->catalogo['TH.BGOrange']['setBold'] = '1';
		$this->catalogo['TH.BGOrange']['setBorder'] = '1';
		$this->catalogo['TH.BGOrange']['setFgColor'] = '51';
		$this->catalogo['TH.BGOrange']['setFontFamily'] = 'Arial';
		$this->catalogo['TH.BGOrange']['setSize'] = '10';
		$this->catalogo['TH.BGOrange']['setTextWrap'] = '';
		$this->catalogo['TH.BGOrange']['setVAlign'] = 'vcenter';
		// TH.BGYellow
		$this->catalogo['TH.BGYellow']['setAlign'] = 'center';
		$this->catalogo['TH.BGYellow']['setBold'] = '1';
		$this->catalogo['TH.BGYellow']['setBorder'] = '1';
		$this->catalogo['TH.BGYellow']['setFgColor'] = '5';
		$this->catalogo['TH.BGYellow']['setFontFamily'] = 'Arial';
		$this->catalogo['TH.BGYellow']['setSize'] = '10';
		$this->catalogo['TH.BGYellow']['setVAlign'] = 'vcenter';
		// TD.BGYellow9
		$this->catalogo['TD.BGYellow9']['setAlign'] = 'center';
		$this->catalogo['TD.BGYellow9']['setBold'] = '1';
		$this->catalogo['TD.BGYellow9']['setBorder'] = '1';
		$this->catalogo['TD.BGYellow9']['setFgColor'] = '5';
		$this->catalogo['TD.BGYellow9']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.BGYellow9']['setSize'] = '9';
		$this->catalogo['TD.BGYellow9']['setVAlign'] = 'vcenter';
		// TD
		$this->catalogo['TD']['setAlign'] = 'left';
		$this->catalogo['TD']['setBorder'] = '1';
		$this->catalogo['TD']['setFontFamily'] = 'Arial';
		$this->catalogo['TD']['setNumFormat'] = '_-* #,##0.00_-;-* #,##0.00_-;_-* "-"??_-;_-@_-';
		$this->catalogo['TD']['setSize'] = '10';
		$this->catalogo['TD']['setVAlign'] = 'vcenter';
		// TD.Bold
		$this->catalogo['TD.Bold']['setAlign'] = 'center';
		$this->catalogo['TD.Bold']['setBold'] = '1';
		$this->catalogo['TD.Bold']['setBorder'] = '1';
		$this->catalogo['TD.Bold']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.Bold']['setSize'] = '10';
		$this->catalogo['TD.Bold']['setVAlign'] = 'vcenter';
		// TD.Alert
		$this->catalogo['TD.Alert']['setAlign'] = 'left';
		$this->catalogo['TD.Alert']['setBorder'] = '1';
		$this->catalogo['TD.Alert']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.Alert']['setSize'] = '10';
		$this->catalogo['TD.Alert']['setVAlign'] = 'vcenter';
		$this->catalogo['TD.Alert']['setTextWrap'] = '';
		// TD.Alert
		$this->catalogo['TD+.Alert']['setAlign'] = 'left';
		$this->catalogo['TD+.Alert']['setBorder'] = '1';
		$this->catalogo['TD+.Alert']['setFgColor'] = '42';
		$this->catalogo['TD+.Alert']['setFontFamily'] = 'Arial';
		$this->catalogo['TD+.Alert']['setSize'] = '10';
		$this->catalogo['TD+.Alert']['setVAlign'] = 'vcenter';
		$this->catalogo['TD+.Alert']['setTextWrap'] = '';
		// TD-.Alert
		$this->catalogo['TD-.Alert']['setAlign'] = 'left';
		$this->catalogo['TD-.Alert']['setBorder'] = '1';
		$this->catalogo['TD-.Alert']['setFgColor'] = '45';
		$this->catalogo['TD-.Alert']['setFontFamily'] = 'Arial';
		$this->catalogo['TD-.Alert']['setSize'] = '10';
		$this->catalogo['TD-.Alert']['setVAlign'] = 'vcenter';
		$this->catalogo['TD-.Alert']['setTextWrap'] = '';
		// TD.Normal
		$this->catalogo['TD.Normal']['setAlign'] = 'left';
		$this->catalogo['TD.Normal']['setBorder'] = '1';
		$this->catalogo['TD.Normal']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.Normal']['setSize'] = '10';
		$this->catalogo['TD.Normal']['setVAlign'] = 'vcenter';
		$this->catalogo['TD.Normal']['setTextWrap'] = '';
		// TD.NormalCenter
		$this->catalogo['TD.NormalCenter']['setAlign'] = 'center';
		$this->catalogo['TD.NormalCenter']['setBorder'] = '1';
		$this->catalogo['TD.NormalCenter']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.NormalCenter']['setSize'] = '10';
		$this->catalogo['TD.NormalCenter']['setVAlign'] = 'vcenter';
		$this->catalogo['TD.NormalCenter']['setTextWrap'] = '';
		// TDPar.Normal
		$this->catalogo['TDPar.Normal']['setAlign'] = 'left';
		$this->catalogo['TDPar.Normal']['setBorder'] = '1';
		$this->catalogo['TDPar.Normal']['setFgColor'] = '43';
		$this->catalogo['TDPar.Normal']['setFontFamily'] = 'Arial';
		$this->catalogo['TDPar.Normal']['setSize'] = '10';
		$this->catalogo['TDPar.Normal']['setVAlign'] = 'vcenter';
		$this->catalogo['TDPar.Normal']['setTextWrap'] = '';
		// TDPar.NormalCenter
		$this->catalogo['TDPar.NormalCenter']['setAlign'] = 'center';
		$this->catalogo['TDPar.NormalCenter']['setBorder'] = '1';
		$this->catalogo['TDPar.NormalCenter']['setFgColor'] = '43';
		$this->catalogo['TDPar.NormalCenter']['setFontFamily'] = 'Arial';
		$this->catalogo['TDPar.NormalCenter']['setSize'] = '10';
		$this->catalogo['TDPar.NormalCenter']['setVAlign'] = 'vcenter';
		$this->catalogo['TDPar.NormalCenter']['setTextWrap'] = '';
		// TDTetra.Normal
		$this->catalogo['TDTetra.Normal']['setAlign'] = 'left';
		$this->catalogo['TDTetra.Normal']['setBorder'] = '1';
		$this->catalogo['TDTetra.Normal']['setFgColor'] = '41';
		$this->catalogo['TDTetra.Normal']['setFontFamily'] = 'Arial';
		$this->catalogo['TDTetra.Normal']['setSize'] = '10';
		$this->catalogo['TDTetra.Normal']['setVAlign'] = 'vcenter';
		$this->catalogo['TDTetra.Normal']['setTextWrap'] = '';
		// TDTetra.NormalCenter
		$this->catalogo['TDTetra.NormalCenter']['setAlign'] = 'center';
		$this->catalogo['TDTetra.NormalCenter']['setBorder'] = '1';
		$this->catalogo['TDTetra.NormalCenter']['setFgColor'] = '41';
		$this->catalogo['TDTetra.NormalCenter']['setFontFamily'] = 'Arial';
		$this->catalogo['TDTetra.NormalCenter']['setSize'] = '10';
		$this->catalogo['TDTetra.NormalCenter']['setVAlign'] = 'vcenter';
		$this->catalogo['TDTetra.NormalCenter']['setTextWrap'] = '';
		// TD.center
		$this->catalogo['TD.center']['setAlign'] = 'center';
		$this->catalogo['TD.center']['setBorder'] = '1';
		$this->catalogo['TD.center']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.center']['setNumFormat'] = '_-* #,##0.00_-;-* #,##0.00_-;_-* "-"??_-;_-@_-';
		$this->catalogo['TD.center']['setSize'] = '10';
		$this->catalogo['TD.center']['setVAlign'] = 'vcenter';
		// TD.BGGrayBold
		$this->catalogo['TD.BGGray']['setAlign'] = 'left';
		$this->catalogo['TD.BGGray']['setBold'] = '1';
		$this->catalogo['TD.BGGray']['setBorder'] = '1';
		$this->catalogo['TD.BGGray']['setFgColor'] = '22';
		$this->catalogo['TD.BGGray']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.BGGray']['setNumFormat'] = '_-* #,##0.00_-;-* #,##0.00_-;_-* "-"??_-;_-@_-';
		$this->catalogo['TD.BGGray']['setSize'] = '10';
		$this->catalogo['TD.BGGray']['setVAlign'] = 'vcenter';
		// TD.BGGrayCenterBold
		$this->catalogo['TD.BGGrayCenter']['setAlign'] = 'center';
		$this->catalogo['TD.BGGrayCenter']['setBold'] = '1';
		$this->catalogo['TD.BGGrayCenter']['setBorder'] = '1';
		$this->catalogo['TD.BGGrayCenter']['setFgColor'] = '22';
		$this->catalogo['TD.BGGrayCenter']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.BGGrayCenter']['setNumFormat'] = '_-* #,##0.00_-;-* #,##0.00_-;_-* "-"??_-;_-@_-';
		$this->catalogo['TD.BGGrayCenter']['setSize'] = '10';
		$this->catalogo['TD.BGGrayCenter']['setVAlign'] = 'vcenter';
		// TD.BGDarkgrayRightBold
		$this->catalogo['TD.BGDarkgrayRight']['setAlign'] = 'right';
		$this->catalogo['TD.BGDarkgrayRight']['setBold'] = '1';
		$this->catalogo['TD.BGDarkgrayRight']['setBorder'] = '1';
		$this->catalogo['TD.BGDarkgrayRight']['setFgColor'] = '23';
		$this->catalogo['TD.BGDarkgrayRight']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.BGDarkgrayRight']['setNumFormat'] = '_-* #,##0.00_-;-* #,##0.00_-;_-* "-"??_-;_-@_-';
		$this->catalogo['TD.BGDarkgrayRight']['setSize'] = '10';
		$this->catalogo['TD.BGDarkgrayRight']['setVAlign'] = 'vcenter';
		// TD.BGDarkgrayBold
		$this->catalogo['TD.BGDarkgray']['setAlign'] = 'left';
		$this->catalogo['TD.BGDarkgray']['setBold'] = '1';
		$this->catalogo['TD.BGDarkgray']['setBorder'] = '1';
		$this->catalogo['TD.BGDarkgray']['setFgColor'] = '23';
		$this->catalogo['TD.BGDarkgray']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.BGDarkgray']['setNumFormat'] = '_-* #,##0.00_-;-* #,##0.00_-;_-* "-"??_-;_-@_-';
		$this->catalogo['TD.BGDarkgray']['setSize'] = '10';
		$this->catalogo['TD.BGDarkgray']['setVAlign'] = 'vcenter';
		// TD.BGDarkgrayCenterBold
		$this->catalogo['TD.BGDarkgrayCenter']['setAlign'] = 'center';
		$this->catalogo['TD.BGDarkgrayCenter']['setBold'] = '1';
		$this->catalogo['TD.BGDarkgrayCenter']['setBorder'] = '1';
		$this->catalogo['TD.BGDarkgrayCenter']['setFgColor'] = '23';
		$this->catalogo['TD.BGDarkgrayCenter']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.BGDarkgrayCenter']['setNumFormat'] = '_-* #,##0.00_-;-* #,##0.00_-;_-* "-"??_-;_-@_-';
		$this->catalogo['TD.BGDarkgrayCenter']['setSize'] = '10';
		$this->catalogo['TD.BGDarkgrayCenter']['setVAlign'] = 'vcenter';
		// TD.BGOrange
		$this->catalogo['TD.BGOrange']['setBold'] = '1';
		$this->catalogo['TD.BGOrange']['setBorder'] = '1';
		$this->catalogo['TD.BGOrange']['setFgColor'] = '51';
		$this->catalogo['TD.BGOrange']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.BGOrange']['setNumFormat'] = '_-* #,##0.00_-;-* #,##0.00_-;_-* "-"??_-;_-@_-';
		$this->catalogo['TD.BGOrange']['setSize'] = '10';		
		$this->catalogo['TD.BGOrange']['setTextWrap'] = '';
		$this->catalogo['TD.BGOrange']['setVAlign'] = 'vcenter';
		// TD.BGLightyellowCenter
		$this->catalogo['TD.BGLightyellowCenter']['setAlign'] = 'center';
		$this->catalogo['TD.BGLightyellowCenter']['setBold'] = '1';
		$this->catalogo['TD.BGLightyellowCenter']['setBorder'] = '1';
		$this->catalogo['TD.BGLightyellowCenter']['setFgColor'] = '43';
		$this->catalogo['TD.BGLightyellowCenter']['setFontFamily'] = 'Arial';
//		$this->catalogo['TD.BGLightyellowCenter']['setNumFormat'] = '_-* #,##0.00_-;-* #,##0.00_-;_-* "-"??_-;_-@_-';		
		$this->catalogo['TD.BGLightyellowCenter']['setSize'] = '11';
		$this->catalogo['TD.BGLightyellowCenter']['setTextWrap'] = '';
		$this->catalogo['TD.BGLightyellowCenter']['setVAlign'] = 'vcenter';
		// TD.BGYellow
		$this->catalogo['TD.BGYellow']['setBold'] = '1';
		$this->catalogo['TD.BGYellow']['setBorder'] = '1';
		$this->catalogo['TD.BGYellow']['setFgColor'] = '5';
		$this->catalogo['TD.BGYellow']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.BGYellow']['setNumFormat'] = '_-* #,##0.00_-;-* #,##0.00_-;_-* "-"??_-;_-@_-';
		$this->catalogo['TD.BGYellow']['setSize'] = '10';
		$this->catalogo['TD.BGYellow']['setTextWrap'] = '';
		$this->catalogo['TD.BGYellow']['setVAlign'] = 'vcenter';
		//INCIDENCIAS
		// TDNRM.NormalCenter
		$this->catalogo['TDNRM.NormalCenter']['setAlign'] = 'center';
		$this->catalogo['TDNRM.NormalCenter']['setBorder'] = '1';
		$this->catalogo['TDNRM.NormalCenter']['setFgColor'] = '42';
		$this->catalogo['TDNRM.NormalCenter']['setFontFamily'] = 'Arial';
		$this->catalogo['TDNRM.NormalCenter']['setSize'] = '10';
		$this->catalogo['TDNRM.NormalCenter']['setVAlign'] = 'vcenter';
		$this->catalogo['TDNRM.NormalCenter']['setTextWrap'] = '';
		// TDFTA.NormalCenter
		$this->catalogo['TDFTA.NormalCenter']['setAlign'] = 'center';
		$this->catalogo['TDFTA.NormalCenter']['setBorder'] = '1';
		$this->catalogo['TDFTA.NormalCenter']['setColor'] = '10';
		$this->catalogo['TDFTA.NormalCenter']['setFgColor'] = '47';
		$this->catalogo['TDFTA.NormalCenter']['setFontFamily'] = 'Arial';
		$this->catalogo['TDFTA.NormalCenter']['setSize'] = '10';
		$this->catalogo['TDFTA.NormalCenter']['setVAlign'] = 'vcenter';
		$this->catalogo['TDFTA.NormalCenter']['setTextWrap'] = '';
		// TDDSC.NormalCenter
		$this->catalogo['TDDSC.NormalCenter']['setAlign'] = 'center';
		$this->catalogo['TDDSC.NormalCenter']['setBorder'] = '1';
		$this->catalogo['TDDSC.NormalCenter']['setFgColor'] = '44';
		$this->catalogo['TDDSC.NormalCenter']['setFontFamily'] = 'Arial';
		$this->catalogo['TDDSC.NormalCenter']['setSize'] = '10';
		$this->catalogo['TDDSC.NormalCenter']['setVAlign'] = 'vcenter';
		$this->catalogo['TDDSC.NormalCenter']['setTextWrap'] = '';
		// TDLIC.NormalCenter
		$this->catalogo['TDLIC.NormalCenter']['setAlign'] = 'center';
		$this->catalogo['TDLIC.NormalCenter']['setBorder'] = '1';
		$this->catalogo['TDLIC.NormalCenter']['setFgColor'] = '46';
		$this->catalogo['TDLIC.NormalCenter']['setFontFamily'] = 'Arial';
		$this->catalogo['TDLIC.NormalCenter']['setSize'] = '10';
		$this->catalogo['TDLIC.NormalCenter']['setVAlign'] = 'vcenter';
		$this->catalogo['TDLIC.NormalCenter']['setTextWrap'] = '';
		// TDEXT.NormalCenter
		$this->catalogo['TDEXT.NormalCenter']['setAlign'] = 'center';
		$this->catalogo['TDEXT.NormalCenter']['setBorder'] = '1';
		$this->catalogo['TDEXT.NormalCenter']['setFgColor'] = '41';
		$this->catalogo['TDEXT.NormalCenter']['setFontFamily'] = 'Arial';
		$this->catalogo['TDEXT.NormalCenter']['setSize'] = '10';
		$this->catalogo['TDEXT.NormalCenter']['setVAlign'] = 'vcenter';
		$this->catalogo['TDEXT.NormalCenter']['setTextWrap'] = '';
		// TDRTD.NormalCenter
		$this->catalogo['TDRTD.NormalCenter']['setAlign'] = 'center';
		$this->catalogo['TDRTD.NormalCenter']['setBorder'] = '1';
		$this->catalogo['TDRTD.NormalCenter']['setFgColor'] = '45';
		$this->catalogo['TDRTD.NormalCenter']['setFontFamily'] = 'Arial';
		$this->catalogo['TDRTD.NormalCenter']['setSize'] = '10';
		$this->catalogo['TDRTD.NormalCenter']['setVAlign'] = 'vcenter';
		$this->catalogo['TDRTD.NormalCenter']['setTextWrap'] = '';
		// TDOMI.NormalCenter
		$this->catalogo['TDOMI.NormalCenter']['setAlign'] = 'center';
		$this->catalogo['TDOMI.NormalCenter']['setBorder'] = '1';
		$this->catalogo['TDOMI.NormalCenter']['setFgColor'] = '43';
		$this->catalogo['TDOMI.NormalCenter']['setFontFamily'] = 'Arial';
		$this->catalogo['TDOMI.NormalCenter']['setSize'] = '10';
		$this->catalogo['TDOMI.NormalCenter']['setVAlign'] = 'vcenter';
		$this->catalogo['TDOMI.NormalCenter']['setTextWrap'] = '';
		// TDATC.NormalCenter
		$this->catalogo['TDATC.NormalCenter']['setAlign'] = 'center';
		$this->catalogo['TDATC.NormalCenter']['setBorder'] = '1';
		$this->catalogo['TDATC.NormalCenter']['setFgColor'] = '45';
		$this->catalogo['TDATC.NormalCenter']['setFontFamily'] = 'Arial';
		$this->catalogo['TDATC.NormalCenter']['setSize'] = '10';
		$this->catalogo['TDATC.NormalCenter']['setVAlign'] = 'vcenter';
		$this->catalogo['TDATC.NormalCenter']['setTextWrap'] = '';
		// TDVACIO.NormalCenter
		$this->catalogo['TDVACIO.NormalCenter']['setAlign'] = 'center';
		$this->catalogo['TDVACIO.NormalCenter']['setBorder'] = '1';
		$this->catalogo['TDVACIO.NormalCenter']['setFontFamily'] = 'Arial';
		$this->catalogo['TDVACIO.NormalCenter']['setSize'] = '10';
		$this->catalogo['TDVACIO.NormalCenter']['setVAlign'] = 'vcenter';
		$this->catalogo['TDVACIO.NormalCenter']['setTextWrap'] = '';
		// TDNoBorder
		$this->catalogo['TD.NoBorder']['setAlign'] = 'left';
		$this->catalogo['TD.NoBorder']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.NoBorder']['setSize'] = '10';
		$this->catalogo['TD.NoBorder']['setVAlign'] = 'vcenter';
		$this->catalogo['TD.NoBorder']['setTextWrap'] = '';
		// TDNoBorderSmall
		$this->catalogo['TD.NoBorderSmall']['setAlign'] = 'left';
		$this->catalogo['TD.NoBorderSmall']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.NoBorderSmall']['setSize'] = '8';
		$this->catalogo['TD.NoBorderSmall']['setVAlign'] = 'vcenter';
		$this->catalogo['TD.NoBorderSmall']['setTextWrap'] = '';
		// TDNoBorder.Bold
		$this->catalogo['TD.NoBorderBold']['setAlign'] = 'left';
		$this->catalogo['TD.NoBorderBold']['setBold'] = '1';
		$this->catalogo['TD.NoBorderBold']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.NoBorderBold']['setSize'] = '10';
		$this->catalogo['TD.NoBorderBold']['setVAlign'] = 'vcenter';
		$this->catalogo['TD.NoBorderBold']['setTextWrap'] = '';
	}
}
?>
