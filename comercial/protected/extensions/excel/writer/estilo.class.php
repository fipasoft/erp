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
		// H1.Bigger
		$this->catalogo['H1.Bigger']['setAlign'] = 'center';
		$this->catalogo['H1.Bigger']['setBold'] = '1';
		$this->catalogo['H1.Bigger']['setFontFamily'] = 'Times New Roman';
		$this->catalogo['H1.Bigger']['setSize'] = '55';
		// H1.Diagonal
		$this->catalogo['H1.Diagonal']['setAlign'] = 'right';
		$this->catalogo['H1.Diagonal']['setBold'] = '1';
		$this->catalogo['H1.Diagonal']['setFontFamily'] = 'Arial';
		$this->catalogo['H1.Diagonal']['setSize'] = '35';
		$this->catalogo['H1.Diagonal']['setTextRotation'] = '90';
		$this->catalogo['H1.Diagonal']['setVAlign'] = 'top';
		// H2
		$this->catalogo['H2']['setAlign'] = 'center';
		$this->catalogo['H2']['setBold'] = '1';
		$this->catalogo['H2']['setFontFamily'] = 'Arial';
		$this->catalogo['H2']['setSize'] = '14';
		$this->catalogo['H2']['setVAlign'] = 'vcenter';
		// H2.Border
		$this->catalogo['H2.Border']['setAlign'] = 'center';
		$this->catalogo['H2.Border']['setBold'] = '1';
		$this->catalogo['H2.Border']['setFontFamily'] = 'Arial';
		$this->catalogo['H2.Border']['setSize'] = '14';
		$this->catalogo['H2.Border']['setVAlign'] = 'vcenter';
		$this->catalogo['H2.Border']['setBorder'] = '1';
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
		//H2.BGYellowBorder
		$this->catalogo['H2.BGYellowBorder']['setAlign'] = 'center';
		$this->catalogo['H2.BGYellowBorder']['setBold'] = '1';
		$this->catalogo['H2.BGYellowBorder']['setFgColor'] = '5';
		$this->catalogo['H2.BGYellowBorder']['setFontFamily'] = 'Arial';
		$this->catalogo['H2.BGYellowBorder']['setSize'] = '14';
		$this->catalogo['H2.BGYellowBorder']['setVAlign'] = 'vcenter';
		$this->catalogo['H2.BGYellowBorder']['setBorder'] = '1';
		// H3
		$this->catalogo['H3']['setAlign'] = 'center';
		$this->catalogo['H3']['setBold'] = '1';
		$this->catalogo['H3']['setFontFamily'] = 'Arial';
		$this->catalogo['H3']['setSize'] = '11';
		$this->catalogo['H3']['setVAlign'] = 'vcenter';
		// H3.Left
		$this->catalogo['H3.Left']['setAlign'] = 'left';
		$this->catalogo['H3.Left']['setBold'] = '1';
		$this->catalogo['H3.Left']['setFontFamily'] = 'Arial';
		$this->catalogo['H3.Left']['setSize'] = '11';
		$this->catalogo['H3.Left']['setVAlign'] = 'vcenter';
		// H3.Right
		$this->catalogo['H3.Right']['setAlign'] = 'right';
		$this->catalogo['H3.Right']['setBold'] = '1';
		$this->catalogo['H3.Right']['setFontFamily'] = 'Arial';
		$this->catalogo['H3.Right']['setSize'] = '11';
		$this->catalogo['H3.Right']['setTextWrap'] = '';
		$this->catalogo['H3.Right']['setVAlign'] = 'vcenter';
		// H3.LeftNumber
		$this->catalogo['H3.LeftNumber']['setAlign'] = 'left';
		$this->catalogo['H3.LeftNumber']['setBold'] = '1';
		$this->catalogo['H3.LeftNumber']['setFontFamily'] = 'Arial';
		$this->catalogo['H3.LeftNumber']['setNumFormat'] = '_-* #,##0.00_-;-* #,##0.00_-;_-* "-"??_-;_-@_-';
		$this->catalogo['H3.LeftNumber']['setSize'] = '11';
		$this->catalogo['H3.LeftNumber']['setVAlign'] = 'vcenter';
		// H3.BGGray
		$this->catalogo['H3.BGGray']['setAlign'] = 'center';
		$this->catalogo['H3.BGGray']['setBold'] = '1';
		$this->catalogo['H3.BGGray']['setFgColor'] = '22';
		$this->catalogo['H3.BGGray']['setFontFamily'] = 'Arial';
		$this->catalogo['H3.BGGray']['setNumFormat'] = '_-* #,##0.00_-;-* #,##0.00_-;_-* "-"??_-;_-@_-';
		$this->catalogo['H3.BGGray']['setSize'] = '11';
		$this->catalogo['H3.BGGray']['setTextWrap'] = '';
		$this->catalogo['H3.BGGray']['setVAlign'] = 'vcenter';
		// H3.BGGrayLeft
		$this->catalogo['H3.BGGrayLeft']['setAlign'] = 'left';
		$this->catalogo['H3.BGGrayLeft']['setBold'] = '1';
		$this->catalogo['H3.BGGrayLeft']['setFgColor'] = '22';
		$this->catalogo['H3.BGGrayLeft']['setFontFamily'] = 'Arial';
		$this->catalogo['H3.BGGrayLeft']['setNumFormat'] = '_-* #,##0.00_-;-* #,##0.00_-;_-* "-"??_-;_-@_-';
		$this->catalogo['H3.BGGrayLeft']['setSize'] = '11';
		$this->catalogo['H3.BGGrayLeft']['setTextWrap'] = '';
		$this->catalogo['H3.BGGrayLeft']['setVAlign'] = 'vcenter';
		// H3.OrangeBold
		$this->catalogo['H3.OrangeBold']['setAlign'] = 'left';
		$this->catalogo['H3.OrangeBold']['setBold'] = '1';
		$this->catalogo['H3.OrangeBold']['setColor'] = 'orange';
		$this->catalogo['H3.OrangeBold']['setFontFamily'] = 'Arial';
		$this->catalogo['H3.OrangeBold']['setSize'] = '11';
		$this->catalogo['H3.OrangeBold']['setNumFormat'] = '_-* #,##0.00_-;-* #,##0.00_-;_-* "-"??_-;_-@_-';
		$this->catalogo['H3.OrangeBold']['setVAlign'] = 'vcenter';
		// H3.RedBold
		$this->catalogo['H3.RedBold']['setAlign'] = 'left';
		$this->catalogo['H3.RedBold']['setBold'] = '1';
		$this->catalogo['H3.RedBold']['setColor'] = '37';
		$this->catalogo['H3.RedBold']['setFontFamily'] = 'Arial';
		$this->catalogo['H3.RedBold']['setSize'] = '11';
		$this->catalogo['H3.RedBold']['setVAlign'] = 'vcenter';
		// H3.RedBGGray
		$this->catalogo['H3.RedBGGray']['setAlign'] = 'center';
		$this->catalogo['H3.RedBGGray']['setBold'] = '1';
		$this->catalogo['H3.RedBGGray']['setColor'] = '37';
		$this->catalogo['H3.RedBGGray']['setFgColor'] = '22';
		$this->catalogo['H3.RedBGGray']['setFontFamily'] = 'Arial';
		$this->catalogo['H3.RedBGGray']['setSize'] = '11';
		$this->catalogo['H3.RedBGGray']['setVAlign'] = 'vcenter';
		// H4
		$this->catalogo['H4']['setAlign'] = 'center';
		$this->catalogo['H4']['setFontFamily'] = 'Arial';
		$this->catalogo['H4']['setSize'] = '10';
		$this->catalogo['H4']['setVAlign'] = 'vcenter';
		// H4.Left
		$this->catalogo['H4.Left']['setAlign'] = 'left';
		$this->catalogo['H4.Left']['setBold'] = '1';
		$this->catalogo['H4.Left']['setFontFamily'] = 'Arial';
		$this->catalogo['H4.Left']['setSize'] = '10';
		$this->catalogo['H4.Left']['setVAlign'] = 'vcenter';
		// TH
		$this->catalogo['TH']['setAlign'] = 'center';
		$this->catalogo['TH']['setBold'] = '1';
		$this->catalogo['TH']['setBorder'] = '1';
		$this->catalogo['TH']['setFgColor'] = '43';
		$this->catalogo['TH']['setFontFamily'] = 'Arial';
		$this->catalogo['TH']['setSize'] = '10';
		$this->catalogo['TH']['setVAlign'] = 'vcenter';
		$this->catalogo['TH']['setTextWrap'] = '';
		// TH.BGAquaCenter
		$this->catalogo['TH.BGAquaCenter']['setAlign'] = 'center';
		$this->catalogo['TH.BGAquaCenter']['setBold'] = '1';
		$this->catalogo['TH.BGAquaCenter']['setBorder'] = '1';
		$this->catalogo['TH.BGAquaCenter']['setFgColor'] = '44';
		$this->catalogo['TH.BGAquaCenter']['setFontFamily'] = 'Arial';
		$this->catalogo['TH.BGAquaCenter']['setSize'] = '11';
		$this->catalogo['TH.BGAquaCenter']['setTextWrap'] = '';
		$this->catalogo['TH.BGAquaCenter']['setVAlign'] = 'vcenter';
		// TH.BGBlueCenter
		$this->catalogo['TH.BGBlueCenter']['setAlign'] = 'center';
		$this->catalogo['TH.BGBlueCenter']['setBold'] = '1';
		$this->catalogo['TH.BGBlueCenter']['setBorder'] = '1';
		$this->catalogo['TH.BGBlueCenter']['setFgColor'] = '31';
		$this->catalogo['TH.BGBlueCenter']['setFontFamily'] = 'Arial';
		$this->catalogo['TH.BGBlueCenter']['setSize'] = '11';
		$this->catalogo['TH.BGBlueCenter']['setTextWrap'] = '';
		$this->catalogo['TH.BGBlueCenter']['setVAlign'] = 'vcenter';
		// TH.BGDarkgray
		$this->catalogo['TH.BGDarkgray']['setAlign'] = 'left';
		$this->catalogo['TH.BGDarkgray']['setBold'] = '1';
		$this->catalogo['TH.BGDarkgray']['setBorder'] = '1';
		$this->catalogo['TH.BGDarkgray']['setFgColor'] = '23';
		$this->catalogo['TH.BGDarkgray']['setFontFamily'] = 'Arial';
		$this->catalogo['TH.BGDarkgray']['setNumFormat'] = '_-* #,##0.00_-;-* #,##0.00_-;_-* "-"??_-;_-@_-';
		$this->catalogo['TH.BGDarkgray']['setSize'] = '11';
		$this->catalogo['TH.BGDarkgray']['setVAlign'] = 'vcenter';
		// TH.BGDarkgrayCenter
		$this->catalogo['TH.BGDarkgrayCenter']['setAlign'] = 'center';
		$this->catalogo['TH.BGDarkgrayCenter']['setBold'] = '1';
		$this->catalogo['TH.BGDarkgrayCenter']['setBorder'] = '1';
		$this->catalogo['TH.BGDarkgrayCenter']['setFgColor'] = '23';
		$this->catalogo['TH.BGDarkgrayCenter']['setFontFamily'] = 'Arial';
		$this->catalogo['TH.BGDarkgrayCenter']['setNumFormat'] = '_-* #,##0.00_-;-* #,##0.00_-;_-* "-"??_-;_-@_-';
		$this->catalogo['TH.BGDarkgrayCenter']['setSize'] = '11';
		$this->catalogo['TH.BGDarkgrayCenter']['setVAlign'] = 'vcenter';
		// TH.BGGray
		$this->catalogo['TH.BGGray']['setAlign'] = 'center';
		$this->catalogo['TH.BGGray']['setBorder'] = '1';
		$this->catalogo['TH.BGGray']['setFgColor'] = '22';
		$this->catalogo['TH.BGGray']['setFontFamily'] = 'Arial';
		$this->catalogo['TH.BGGray']['setSize'] = '10';
		$this->catalogo['TH.BGGray']['setVAlign'] = 'vcenter';
		// TH.BGGrayBold
		$this->catalogo['TH.BGGrayBold']['setAlign'] = 'center';
		$this->catalogo['TH.BGGrayBold']['setBold'] = '1';
		$this->catalogo['TH.BGGrayBold']['setBorder'] = '1';
		$this->catalogo['TH.BGGrayBold']['setFgColor'] = '22';
		$this->catalogo['TH.BGGrayBold']['setFontFamily'] = 'Arial';
		$this->catalogo['TH.BGGrayBold']['setSize'] = '10';
		$this->catalogo['TH.BGGrayBold']['setVAlign'] = 'vcenter';
		// TH.BGGrayBoldLeft
		$this->catalogo['TH.BGGrayBoldLeft']['setAlign'] = 'left';
		$this->catalogo['TH.BGGrayBoldLeft']['setBold'] = '1';
		$this->catalogo['TH.BGGrayBoldLeft']['setBorder'] = '1';
		$this->catalogo['TH.BGGrayBoldLeft']['setFgColor'] = '22';
		$this->catalogo['TH.BGGrayBoldLeft']['setFontFamily'] = 'Arial';
		$this->catalogo['TH.BGGrayBoldLeft']['setSize'] = '10';
		$this->catalogo['TH.BGGrayBoldLeft']['setVAlign'] = 'vcenter';
		// TH.BGGrayNoBorder
		$this->catalogo['TH.BGGrayNoBorder']['setAlign'] = 'center';
		$this->catalogo['TH.BGGrayNoBorder']['setFgColor'] = '22';
		$this->catalogo['TH.BGGrayNoBorder']['setFontFamily'] = 'Arial';
		$this->catalogo['TH.BGGrayNoBorder']['setSize'] = '10';
		$this->catalogo['TH.BGGrayNoBorder']['setVAlign'] = 'vcenter';
		// TH.BGLightblueCenter
		$this->catalogo['TH.BGLightblueCenter']['setAlign'] = 'center';
		$this->catalogo['TH.BGLightblueCenter']['setBold'] = '1';
		$this->catalogo['TH.BGLightblueCenter']['setBorder'] = '1';
		$this->catalogo['TH.BGLightblueCenter']['setFgColor'] = '41';
		$this->catalogo['TH.BGLightblueCenter']['setFontFamily'] = 'Arial';
		$this->catalogo['TH.BGLightblueCenter']['setSize'] = '11';
		$this->catalogo['TH.BGLightblueCenter']['setTextWrap'] = '';
		$this->catalogo['TH.BGLightblueCenter']['setVAlign'] = 'vcenter';
		// TH.BGLightgreenCenter
		$this->catalogo['TH.BGLightgreenCenter']['setAlign'] = 'center';
		$this->catalogo['TH.BGLightgreenCenter']['setBold'] = '1';
		$this->catalogo['TH.BGLightgreenCenter']['setBorder'] = '1';
		$this->catalogo['TH.BGLightgreenCenter']['setFgColor'] = '42';
		$this->catalogo['TH.BGLightgreenCenter']['setFontFamily'] = 'Arial';
		$this->catalogo['TH.BGLightgreenCenter']['setSize'] = '11';
		$this->catalogo['TH.BGLightgreenCenter']['setTextWrap'] = '';
		$this->catalogo['TH.BGLightgreenCenter']['setVAlign'] = 'vcenter';
		// TH.BGLightgreenNumber
		$this->catalogo['TH.BGLightgreenNumber']['setAlign'] = 'center';
		$this->catalogo['TH.BGLightgreenNumber']['setBold'] = '1';
		$this->catalogo['TH.BGLightgreenNumber']['setBorder'] = '1';
		$this->catalogo['TH.BGLightgreenNumber']['setFgColor'] = '42';
		$this->catalogo['TH.BGLightgreenNumber']['setFontFamily'] = 'Arial';
		$this->catalogo['TH.BGLightgreenNumber']['setNumFormat'] = '_-* #,##0.00_-;-* #,##0.00_-;_-* "-"??_-;_-@_-';
		$this->catalogo['TH.BGLightgreenNumber']['setSize'] = '11';
		$this->catalogo['TH.BGLightgreenNumber']['setTextWrap'] = '';
		$this->catalogo['TH.BGLightgreenNumber']['setVAlign'] = 'vcenter';
		// TH.BGLightpinkCenter
		$this->catalogo['TH.BGLightpinkCenter']['setAlign'] = 'center';
		$this->catalogo['TH.BGLightpinkCenter']['setBold'] = '1';
		$this->catalogo['TH.BGLightpinkCenter']['setBorder'] = '1';
		$this->catalogo['TH.BGLightpinkCenter']['setFgColor'] = '45';
		$this->catalogo['TH.BGLightpinkCenter']['setFontFamily'] = 'Arial';
		$this->catalogo['TH.BGLightpinkCenter']['setSize'] = '11';
		$this->catalogo['TH.BGLightpinkCenter']['setTextWrap'] = '';
		$this->catalogo['TH.BGLightpinkCenter']['setVAlign'] = 'vcenter';
		// TH.BGLightredCenter
		$this->catalogo['TH.BGLightredCenter']['setAlign'] = 'center';
		$this->catalogo['TH.BGLightredCenter']['setBold'] = '1';
		$this->catalogo['TH.BGLightredCenter']['setBorder'] = '1';
		$this->catalogo['TH.BGLightredCenter']['setFgColor'] = '29';
		$this->catalogo['TH.BGLightredCenter']['setFontFamily'] = 'Arial';
		$this->catalogo['TH.BGLightredCenter']['setSize'] = '11';
		$this->catalogo['TH.BGLightredCenter']['setTextWrap'] = '';
		$this->catalogo['TH.BGLightredCenter']['setVAlign'] = 'vcenter';
		// TH.BGLightyellowCenter
		$this->catalogo['TH.BGLightyellowCenter']['setAlign'] = 'center';
		$this->catalogo['TH.BGLightyellowCenter']['setBold'] = '1';
		$this->catalogo['TH.BGLightyellowCenter']['setBorder'] = '1';
		$this->catalogo['TH.BGLightyellowCenter']['setFgColor'] = '43';
		$this->catalogo['TH.BGLightyellowCenter']['setFontFamily'] = 'Arial';
		$this->catalogo['TH.BGLightyellowCenter']['setSize'] = '11';
		$this->catalogo['TH.BGLightyellowCenter']['setTextWrap'] = '';
		$this->catalogo['TH.BGLightyellowCenter']['setVAlign'] = 'vcenter';
		// TH.BGLightyellowNumber
		$this->catalogo['TH.BGLightyellowNumber']['setAlign'] = 'center';
		$this->catalogo['TH.BGLightyellowNumber']['setBold'] = '1';
		$this->catalogo['TH.BGLightyellowNumber']['setBorder'] = '1';
		$this->catalogo['TH.BGLightyellowNumber']['setFgColor'] = '43';
		$this->catalogo['TH.BGLightyellowNumber']['setFontFamily'] = 'Arial';
		$this->catalogo['TH.BGLightyellowNumber']['setNumFormat'] = '_-* #,##0.00_-;-* #,##0.00_-;_-* "-"??_-;_-@_-';
		$this->catalogo['TH.BGLightyellowNumber']['setSize'] = '11';
		$this->catalogo['TH.BGLightyellowNumber']['setTextWrap'] = '';
		$this->catalogo['TH.BGLightyellowNumber']['setVAlign'] = 'vcenter';
		// TH.BGVerylightyellowCenter
		$this->catalogo['TH.BGVerylightyellowCenter']['setAlign'] = 'center';
		$this->catalogo['TH.BGVerylightyellowCenter']['setBold'] = '1';
		$this->catalogo['TH.BGVerylightyellowCenter']['setBorder'] = '1';
		$this->catalogo['TH.BGVerylightyellowCenter']['setFgColor'] = '26';
		$this->catalogo['TH.BGVerylightyellowCenter']['setFontFamily'] = 'Arial';
		$this->catalogo['TH.BGVerylightyellowCenter']['setSize'] = '11';
		$this->catalogo['TH.BGVerylightyellowCenter']['setTextWrap'] = '';
		$this->catalogo['TH.BGVerylightyellowCenter']['setVAlign'] = 'vcenter';
		// TH.BGPurpleCenter
		$this->catalogo['TH.BGPurpleCenter']['setAlign'] = 'center';
		$this->catalogo['TH.BGPurpleCenter']['setBold'] = '1';
		$this->catalogo['TH.BGPurpleCenter']['setBorder'] = '1';
		$this->catalogo['TH.BGPurpleCenter']['setFgColor'] = '46';
		$this->catalogo['TH.BGPurpleCenter']['setFontFamily'] = 'Arial';
		$this->catalogo['TH.BGPurpleCenter']['setSize'] = '11';
		$this->catalogo['TH.BGPurpleCenter']['setTextWrap'] = '';
		$this->catalogo['TH.BGPurpleCenter']['setVAlign'] = 'vcenter';
		// TH.BGPurpleBlueCenter
		$this->catalogo['TH.BGPurpleBlueCenter']['setAlign'] = 'center';
		$this->catalogo['TH.BGPurpleBlueCenter']['setBold'] = '1';
		$this->catalogo['TH.BGPurpleBlueCenter']['setBorder'] = '1';
		$this->catalogo['TH.BGPurpleBlueCenter']['setFgColor'] = '24';
		$this->catalogo['TH.BGPurpleBlueCenter']['setFontFamily'] = 'Arial';
		$this->catalogo['TH.BGPurpleBlueCenter']['setSize'] = '11';
		$this->catalogo['TH.BGPurpleBlueCenter']['setTextWrap'] = '';
		$this->catalogo['TH.BGPurpleBlueCenter']['setVAlign'] = 'vcenter';
		// TH.BGAquaCenterSmall
		$this->catalogo['TH.BGAquaCenterSmall']['setAlign'] = 'center';
		$this->catalogo['TH.BGAquaCenterSmall']['setBold'] = '1';
		$this->catalogo['TH.BGAquaCenterSmall']['setBorder'] = '1';
		$this->catalogo['TH.BGAquaCenterSmall']['setFgColor'] = '44';
		$this->catalogo['TH.BGAquaCenterSmall']['setFontFamily'] = 'Arial';
		$this->catalogo['TH.BGAquaCenterSmall']['setSize'] = '10';
		$this->catalogo['TH.BGAquaCenterSmall']['setTextWrap'] = '';
		$this->catalogo['TH.BGAquaCenterSmall']['setVAlign'] = 'vcenter';
		// TH.BGBlueCenterSmall
		$this->catalogo['TH.BGBlueCenterSmall']['setAlign'] = 'center';
		$this->catalogo['TH.BGBlueCenterSmall']['setBold'] = '1';
		$this->catalogo['TH.BGBlueCenterSmall']['setBorder'] = '1';
		$this->catalogo['TH.BGBlueCenterSmall']['setFgColor'] = '31';
		$this->catalogo['TH.BGBlueCenterSmall']['setFontFamily'] = 'Arial';
		$this->catalogo['TH.BGBlueCenterSmall']['setSize'] = '10';
		$this->catalogo['TH.BGBlueCenterSmall']['setTextWrap'] = '';
		$this->catalogo['TH.BGBlueCenterSmall']['setVAlign'] = 'vcenter';
		// TH.BGLightgreenCenterSmall
		$this->catalogo['TH.BGLightgreenCenterSmall']['setAlign'] = 'center';
		$this->catalogo['TH.BGLightgreenCenterSmall']['setBold'] = '1';
		$this->catalogo['TH.BGLightgreenCenterSmall']['setBorder'] = '1';
		$this->catalogo['TH.BGLightgreenCenterSmall']['setFgColor'] = '42';
		$this->catalogo['TH.BGLightgreenCenterSmall']['setFontFamily'] = 'Arial';
		$this->catalogo['TH.BGLightgreenCenterSmall']['setSize'] = '10';
		$this->catalogo['TH.BGLightgreenCenterSmall']['setTextWrap'] = '';
		$this->catalogo['TH.BGLightgreenCenterSmall']['setVAlign'] = 'vcenter';
		// TH.BGLightyellowCenterSmall
		$this->catalogo['TH.BGLightyellowCenterSmall']['setAlign'] = 'center';
		$this->catalogo['TH.BGLightyellowCenterSmall']['setBold'] = '1';
		$this->catalogo['TH.BGLightyellowCenterSmall']['setBorder'] = '1';
		$this->catalogo['TH.BGLightyellowCenterSmall']['setFgColor'] = '43';
		$this->catalogo['TH.BGLightyellowCenterSmall']['setFontFamily'] = 'Arial';
		$this->catalogo['TH.BGLightyellowCenterSmall']['setSize'] = '10';
		$this->catalogo['TH.BGLightyellowCenterSmall']['setTextWrap'] = '';
		$this->catalogo['TH.BGLightyellowCenterSmall']['setVAlign'] = 'vcenter';
		// TH.BGPurpleCenterSmall
		$this->catalogo['TH.BGPurpleCenterSmall']['setAlign'] = 'center';
		$this->catalogo['TH.BGPurpleCenterSmall']['setBold'] = '1';
		$this->catalogo['TH.BGPurpleCenterSmall']['setBorder'] = '1';
		$this->catalogo['TH.BGPurpleCenterSmall']['setFgColor'] = '46';
		$this->catalogo['TH.BGPurpleCenterSmall']['setFontFamily'] = 'Arial';
		$this->catalogo['TH.BGPurpleCenterSmall']['setSize'] = '10';
		$this->catalogo['TH.BGPurpleCenterSmall']['setTextWrap'] = '';
		$this->catalogo['TH.BGPurpleCenterSmall']['setVAlign'] = 'vcenter';
		// TH.BGRedBold
		$this->catalogo['TH.BGRedBold']['setBold'] = '1';
		$this->catalogo['TH.BGRedBold']['setBorder'] = '1';
		$this->catalogo['TH.BGRedBold']['setColor'] = 'white';
		$this->catalogo['TH.BGRedBold']['setFgColor'] = '37';
		$this->catalogo['TH.BGRedBold']['setFontFamily'] = 'Arial';
		$this->catalogo['TH.BGRedBold']['setNumFormat'] = '_-* #,##0.00_-;-* #,##0.00_-;_-* "-"??_-;_-@_-';
		$this->catalogo['TH.BGRedBold']['setSize'] = '10';
		$this->catalogo['TH.BGRedBold']['setVAlign'] = 'vcenter';
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
		$this->catalogo['TH.BGYellow']['setTextWrap'] = '';
		$this->catalogo['TH.BGYellow']['setVAlign'] = 'vcenter';
		// TH.BGYellowLeft
		$this->catalogo['TH.BGYellowLeft']['setAlign'] = 'left';
		$this->catalogo['TH.BGYellowLeft']['setBold'] = '1';
		$this->catalogo['TH.BGYellowLeft']['setBorder'] = '1';
		$this->catalogo['TH.BGYellowLeft']['setFgColor'] = '5';
		$this->catalogo['TH.BGYellowLeft']['setFontFamily'] = 'Arial';
		$this->catalogo['TH.BGYellowLeft']['setSize'] = '10';
		$this->catalogo['TH.BGYellowLeft']['setTextWrap'] = '';
		$this->catalogo['TH.BGYellowLeft']['setVAlign'] = 'vcenter';
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
		// TD.BoldLeft
		$this->catalogo['TD.BoldLeft']['setAlign'] = 'left';
		$this->catalogo['TD.BoldLeft']['setBold'] = '1';
		$this->catalogo['TD.BoldLeft']['setBorder'] = '1';
		$this->catalogo['TD.BoldLeft']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.BoldLeft']['setSize'] = '10';
		$this->catalogo['TD.BoldLeft']['setVAlign'] = 'vcenter';
		// TD.BoldNumber
		$this->catalogo['TD.BoldNumber']['setAlign'] = 'center';
		$this->catalogo['TD.BoldNumber']['setBold'] = '1';
		$this->catalogo['TD.BoldNumber']['setBorder'] = '1';
		$this->catalogo['TD.BoldNumber']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.BoldNumber']['setNumFormat'] = '_-* #,##0.00_-;-* #,##0.00_-;_-* "-"??_-;_-@_-';
		$this->catalogo['TD.BoldNumber']['setSize'] = '10';
		$this->catalogo['TD.BoldNumber']['setVAlign'] = 'vcenter';
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
		// TD.Normal12
		$this->catalogo['TD.Normal12']['setAlign'] = 'left';
		$this->catalogo['TD.Normal12']['setBorder'] = '1';
		$this->catalogo['TD.Normal12']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.Normal12']['setSize'] = '14';
		$this->catalogo['TD.Normal12']['setVAlign'] = 'vcenter';
		$this->catalogo['TD.Normal12']['setTextWrap'] = '';
		// TD.NormalBold
		$this->catalogo['TD.NormalBold']['setAlign'] = 'left';
		$this->catalogo['TD.NormalBold']['setBold'] = '1';
		$this->catalogo['TD.NormalBold']['setBorder'] = '1';
		$this->catalogo['TD.NormalBold']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.NormalBold']['setSize'] = '10';
		$this->catalogo['TD.NormalBold']['setVAlign'] = 'vcenter';
		$this->catalogo['TD.NormalBold']['setTextWrap'] = '';
		// TD.NormalCenter
		$this->catalogo['TD.NormalCenter']['setAlign'] = 'center';
		$this->catalogo['TD.NormalCenter']['setBorder'] = '1';
		$this->catalogo['TD.NormalCenter']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.NormalCenter']['setSize'] = '10';
		$this->catalogo['TD.NormalCenter']['setVAlign'] = 'vcenter';
		$this->catalogo['TD.NormalCenter']['setTextWrap'] = '';
		// TD.NormalNoWrap
		$this->catalogo['TD.NormalNoWrap']['setAlign'] = 'left';
		$this->catalogo['TD.NormalNoWrap']['setBorder'] = '1';
		$this->catalogo['TD.NormalNoWrap']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.NormalNoWrap']['setSize'] = '10';
		$this->catalogo['TD.NormalNoWrap']['setVAlign'] = 'vcenter';
		// TD.NormalRight
		$this->catalogo['TD.NormalRight']['setAlign'] = 'right';
		$this->catalogo['TD.NormalRight']['setBorder'] = '1';
		$this->catalogo['TD.NormalRight']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.NormalRight']['setSize'] = '10';
		$this->catalogo['TD.NormalRight']['setVAlign'] = 'vcenter';
		$this->catalogo['TD.NormalRight']['setTextWrap'] = '';
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
		// TD.BGGray
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
		// TD.BGGrayCenterNormal
		$this->catalogo['TD.BGGrayCenterNormal']['setAlign'] = 'center';
		$this->catalogo['TD.BGGrayCenterNormal']['setBold'] = '1';
		$this->catalogo['TD.BGGrayCenterNormal']['setBorder'] = '1';
		$this->catalogo['TD.BGGrayCenterNormal']['setFgColor'] = '22';
		$this->catalogo['TD.BGGrayCenterNormal']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.BGGrayCenterNormal']['setNumFormat'] = '_-* #,##0.00_-;-* #,##0.00_-;_-* "-"??_-;_-@_-';
		$this->catalogo['TD.BGGrayCenterNormal']['setSize'] = '10';
		$this->catalogo['TD.BGGrayCenterNormal']['setTextWrap'] = '';
		$this->catalogo['TD.BGGrayCenterNormal']['setVAlign'] = 'vcenter';
		// TD.BGGrayNormal
		$this->catalogo['TD.BGGrayNormal']['setAlign'] = 'left';
		$this->catalogo['TD.BGGrayNormal']['setBold'] = '1';
		$this->catalogo['TD.BGGrayNormal']['setBorder'] = '1';
		$this->catalogo['TD.BGGrayNormal']['setFgColor'] = '22';
		$this->catalogo['TD.BGGrayNormal']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.BGGrayNormal']['setNumFormat'] = '_-* #,##0.00_-;-* #,##0.00_-;_-* "-"??_-;_-@_-';
		$this->catalogo['TD.BGGrayNormal']['setSize'] = '10';
		$this->catalogo['TD.BGGrayNormal']['setTextWrap'] = '';
		$this->catalogo['TD.BGGrayNormal']['setVAlign'] = 'vcenter';
		// TD.BGGrayRight
		$this->catalogo['TD.BGGrayRight']['setAlign'] = 'right';
		$this->catalogo['TD.BGGrayRight']['setBold'] = '1';
		$this->catalogo['TD.BGGrayRight']['setBorder'] = '1';
		$this->catalogo['TD.BGGrayRight']['setFgColor'] = '22';
		$this->catalogo['TD.BGGrayRight']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.BGGrayRight']['setNumFormat'] = '_-* #,##0.00_-;-* #,##0.00_-;_-* "-"??_-;_-@_-';
		$this->catalogo['TD.BGGrayRight']['setSize'] = '10';
		$this->catalogo['TD.BGGrayRight']['setVAlign'] = 'vcenter';
		// TD.BGDarkgrayRight
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
		// TD.BGOrangeNormal
		$this->catalogo['TD.BGOrangeNormal']['setAlign'] = 'left';
		$this->catalogo['TD.BGOrangeNormal']['setBorder'] = '1';
		$this->catalogo['TD.BGOrangeNormal']['setFgColor'] = '51';
		$this->catalogo['TD.BGOrangeNormal']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.BGOrangeNormal']['setSize'] = '10';
		$this->catalogo['TD.BGOrangeNormal']['setVAlign'] = 'vcenter';
		$this->catalogo['TD.BGOrangeNormal']['setTextWrap'] = '';
		// TD.BGOrangeNormalCenter
		$this->catalogo['TD.BGOrangeNormalCenter']['setAlign'] = 'center';
		$this->catalogo['TD.BGOrangeNormalCenter']['setBorder'] = '1';
		$this->catalogo['TD.BGOrangeNormalCenter']['setFgColor'] = '51';
		$this->catalogo['TD.BGOrangeNormalCenter']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.BGOrangeNormalCenter']['setSize'] = '10';
		$this->catalogo['TD.BGOrangeNormalCenter']['setVAlign'] = 'vcenter';
		$this->catalogo['TD.BGOrangeNormalCenter']['setTextWrap'] = '';
		// TD.BGOrangeNoBorder
		$this->catalogo['TD.BGOrangeNoBorder']['setBold'] = '1';
		$this->catalogo['TD.BGOrangeNoBorder']['setFgColor'] = '51';
		$this->catalogo['TD.BGOrangeNoBorder']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.BGOrangeNoBorder']['setNumFormat'] = '_-* #,##0.00_-;-* #,##0.00_-;_-* "-"??_-;_-@_-';
		$this->catalogo['TD.BGOrangeNoBorder']['setSize'] = '10';
		$this->catalogo['TD.BGOrangeNoBorder']['setTextWrap'] = '';
		$this->catalogo['TD.BGOrangeNoBorder']['setVAlign'] = 'vcenter';
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
		// TD.BGLightyellowNormal
		$this->catalogo['TD.BGLightyellowNormal']['setBorder'] = '1';
		$this->catalogo['TD.BGLightyellowNormal']['setFgColor'] = '43';
		$this->catalogo['TD.BGLightyellowNormal']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.BGLightyellowNormal']['setNumFormat'] = '_-* #,##0.00_-;-* #,##0.00_-;_-* "-"??_-;_-@_-';
		$this->catalogo['TD.BGLightyellowNormal']['setSize'] = '10';
		$this->catalogo['TD.BGLightyellowNormal']['setTextWrap'] = '';
		$this->catalogo['TD.BGLightyellowNormal']['setVAlign'] = 'vcenter';
		// TD.BGYellow
		$this->catalogo['TD.BGYellow']['setBold'] = '1';
		$this->catalogo['TD.BGYellow']['setBorder'] = '1';
		$this->catalogo['TD.BGYellow']['setFgColor'] = '5';
		$this->catalogo['TD.BGYellow']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.BGYellow']['setNumFormat'] = '_-* #,##0.00_-;-* #,##0.00_-;_-* "-"??_-;_-@_-';
		$this->catalogo['TD.BGYellow']['setSize'] = '10';
		$this->catalogo['TD.BGYellow']['setTextWrap'] = '';
		$this->catalogo['TD.BGYellow']['setVAlign'] = 'vcenter';
		// TD.BGGreen
		$this->catalogo['TD.BGGreen']['setBold'] = '1';
		$this->catalogo['TD.BGGreen']['setFgColor'] = '12';
		$this->catalogo['TD.BGGreen']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.BGGreen']['setNumFormat'] = '_-* #,##0.00_-;-* #,##0.00_-;_-* "-"??_-;_-@_-';
		$this->catalogo['TD.BGGreen']['setSize'] = '10';
		$this->catalogo['TD.BGGreen']['setTextWrap'] = '';
		$this->catalogo['TD.BGGreen']['setVAlign'] = 'vcenter';
		// TDH.VRightSmall
		$this->catalogo['TDH.VRightSmall']['setAlign'] = 'left';
		$this->catalogo['TDH.VRightSmall']['setSize'] = '9';
		$this->catalogo['TDH.VRightSmall']['setTextRotation'] = '90';
		$this->catalogo['TDH.VRightSmall']['setVAlign'] = 'right';
		// TDH.VTopSmall
		$this->catalogo['TDH.VTopSmall']['setAlign'] = 'left';
		$this->catalogo['TDH.VTopSmall']['setSize'] = '9';
		$this->catalogo['TDH.VTopSmall']['setTextRotation'] = '90';
		$this->catalogo['TDH.VTopSmall']['setVAlign'] = 'top';
		// TDH.VCenter
		$this->catalogo['TDH.VCenter']['setAlign'] = 'left';
		$this->catalogo['TDH.VCenter']['setSize'] = '10';
		$this->catalogo['TDH.VCenter']['setTextRotation'] = '90';
		$this->catalogo['TDH.VCenter']['setVAlign'] = 'vcenter';
		// TDH.BiggerRightTop
		$this->catalogo['TDH.BiggerRightTop']['setAlign'] = 'right';
		$this->catalogo['TDH.BiggerRightTop']['setSize'] = '35';
		$this->catalogo['TDH.BiggerRightTop']['setTextRotation'] = '90';
		$this->catalogo['TDH.BiggerRightTop']['setVAlign'] = 'top';

		// TDNoBorder
		$this->catalogo['TD.NoBorder']['setAlign'] = 'left';
		$this->catalogo['TD.NoBorder']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.NoBorder']['setSize'] = '10';
		$this->catalogo['TD.NoBorder']['setVAlign'] = 'vcenter';
		// TDNoBorderBig
		$this->catalogo['TD.NoBorderBig']['setAlign'] = 'left';
		$this->catalogo['TD.NoBorderBig']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.NoBorderBig']['setSize'] = '11';
		$this->catalogo['TD.NoBorderBig']['setVAlign'] = 'vcenter';
		// TDNoBorderBigRight
		$this->catalogo['TD.NoBorderBigRight']['setAlign'] = 'left';
		$this->catalogo['TD.NoBorderBigRight']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.NoBorderBigRight']['setSize'] = '11';
		$this->catalogo['TD.NoBorderBigRight']['setVAlign'] = 'vcenter';
		// TDNoBorderCenter
		$this->catalogo['TD.NoBorderCenter']['setAlign'] = 'center';
		$this->catalogo['TD.NoBorderCenter']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.NoBorderCenter']['setSize'] = '10';
		$this->catalogo['TD.NoBorderCenter']['setVAlign'] = 'vcenter';
		// TDNoBorderNum
		$this->catalogo['TD.NoBorderNum']['setAlign'] = 'right';
		$this->catalogo['TD.NoBorderNum']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.NoBorderNum']['setNumFormat'] = '#,##0.00;-$#,##0.00';
		$this->catalogo['TD.NoBorderNum']['setSize'] = '10';
		$this->catalogo['TD.NoBorderNum']['setVAlign'] = 'vcenter';
		// TDNoBorderSmall
		$this->catalogo['TD.NoBorderSmall']['setAlign'] = 'left';
		$this->catalogo['TD.NoBorderSmall']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.NoBorderSmall']['setSize'] = '8';
		$this->catalogo['TD.NoBorderSmall']['setVAlign'] = 'vcenter';
		// TDNoBorderSmallRight
		$this->catalogo['TD.NoBorderSmallRight']['setAlign'] = 'right';
		$this->catalogo['TD.NoBorderSmallRight']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.NoBorderSmallRight']['setSize'] = '8';
		$this->catalogo['TD.NoBorderSmallRight']['setVAlign'] = 'vcenter';
		// TDNoBorderMedium
		$this->catalogo['TD.NoBorderMedium']['setAlign'] = 'center';
		$this->catalogo['TD.NoBorderMedium']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.NoBorderMedium']['setSize'] = '9';
		$this->catalogo['TD.NoBorderMedium']['setVAlign'] = 'vcenter';
		// TDNoBorderMedium
		$this->catalogo['TD.NoBorderMediumWrap']['setAlign'] = 'center';
		$this->catalogo['TD.NoBorderMediumWrap']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.NoBorderMediumWrap']['setSize'] = '9';
		$this->catalogo['TD.NoBorderMediumWrap']['setVAlign'] = 'vcenter';
		$this->catalogo['TD.NoBorderMediumWrap']['setTextWrap'] = '';
		// TDNoBorder.Bold
		$this->catalogo['TD.NoBorderBold']['setAlign'] = 'left';
		$this->catalogo['TD.NoBorderBold']['setBold'] = '1';
		$this->catalogo['TD.NoBorderBold']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.NoBorderBold']['setSize'] = '10';
		$this->catalogo['TD.NoBorderBold']['setVAlign'] = 'vcenter';
		// TDNoBorderLeftBold
		$this->catalogo['TD.NoBorderLeftBold']['setAlign'] = 'left';
		$this->catalogo['TD.NoBorderLeftBold']['setBold'] = '1';
		$this->catalogo['TD.NoBorderLeftBold']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.NoBorderLeftBold']['setSize'] = '10';
		$this->catalogo['TD.NoBorderLeftBold']['setVAlign'] = 'vcenter';
		// TDNoBorderCenterBold
		$this->catalogo['TD.NoBorderCenterBold']['setAlign'] = 'center';
		$this->catalogo['TD.NoBorderCenterBold']['setBold'] = '1';
		$this->catalogo['TD.NoBorderCenterBold']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.NoBorderCenterBold']['setSize'] = '10';
		$this->catalogo['TD.NoBorderCenterBold']['setVAlign'] = 'vcenter';
		// TDNoBorderRight
		$this->catalogo['TD.NoBorderRight']['setAlign'] = 'right';
		$this->catalogo['TD.NoBorderRight']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.NoBorderRight']['setNumFormat'] = '$#,##0.00;-$#,##0.00';
		$this->catalogo['TD.NoBorderRight']['setSize'] = '10';
		$this->catalogo['TD.NoBorderRight']['setVAlign'] = 'vcenter';
		// TDNoBorderRightNormal
		$this->catalogo['TD.NoBorderRightNormal']['setAlign'] = 'right';
		$this->catalogo['TD.NoBorderRightNormal']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.NoBorderRightNormal']['setSize'] = '10';
		$this->catalogo['TD.NoBorderRightNormal']['setVAlign'] = 'vcenter';
		// TDNoBorderBigRightNormal
		$this->catalogo['TD.NoBorderBigRightNormal']['setAlign'] = 'right';
		$this->catalogo['TD.NoBorderBigRightNormal']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.NoBorderBigRightNormal']['setSize'] = '11';
		$this->catalogo['TD.NoBorderBigRightNormal']['setVAlign'] = 'vcenter';
		// TDNoBorderRightBold
		$this->catalogo['TD.NoBorderRightBold']['setAlign'] = 'right';
		$this->catalogo['TD.NoBorderRightBold']['setBold'] = '1';
		$this->catalogo['TD.NoBorderRightBold']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.NoBorderRightBold']['setNumFormat'] = '$#,##0.00;-$#,##0.00';
		$this->catalogo['TD.NoBorderRightBold']['setSize'] = '10';
		$this->catalogo['TD.NoBorderRightBold']['setVAlign'] = 'vcenter';
		// TDNoHBorder
		$this->catalogo['TD.NoHBorder']['setAlign'] = 'left';
		$this->catalogo['TD.NoHBorder']['setBorder'] = '1';
		$this->catalogo['TD.NoHBorder']['setBottom'] = '0';
		$this->catalogo['TD.NoHBorder']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.NoHBorder']['setSize'] = '10';
		$this->catalogo['TD.NoHBorder']['setTop'] = '0';
		$this->catalogo['TD.NoHBorder']['setVAlign'] = 'vcenter';
		// TDNoHBorderBold
		$this->catalogo['TD.NoHBorderBold']['setAlign'] = 'left';
		$this->catalogo['TD.NoHBorderBold']['setBold'] = '1';
		$this->catalogo['TD.NoHBorderBold']['setBorder'] = '1';
		$this->catalogo['TD.NoHBorderBold']['setBottom'] = '0';
		$this->catalogo['TD.NoHBorderBold']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.NoHBorderBold']['setSize'] = '10';
		$this->catalogo['TD.NoHBorderBold']['setTop'] = '0';
		$this->catalogo['TD.NoHBorderBold']['setVAlign'] = 'vcenter';
		// TDNoHBorderNum
		$this->catalogo['TD.NoHBorderNum']['setAlign'] = 'right';
		$this->catalogo['TD.NoHBorderNum']['setBorder'] = '1';
		$this->catalogo['TD.NoHBorderNum']['setBottom'] = '0';
		$this->catalogo['TD.NoHBorderNum']['setNumFormat'] = '#,##0.00;-$#,##0.00';
		$this->catalogo['TD.NoHBorderNum']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.NoHBorderNum']['setSize'] = '10';
		$this->catalogo['TD.NoHBorderNum']['setTop'] = '0';
		$this->catalogo['TD.NoHBorderNum']['setVAlign'] = 'vcenter';
		// TDNoTBorder
		$this->catalogo['TD.NoTBorder']['setAlign'] = 'right';
		$this->catalogo['TD.NoTBorder']['setBorder'] = '1';
		$this->catalogo['TD.NoTBorder']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.NoTBorder']['setSize'] = '10';
		$this->catalogo['TD.NoTBorder']['setTop'] = '0';
		$this->catalogo['TD.NoTBorder']['setVAlign'] = 'vcenter';
		// TD.Right
		$this->catalogo['TD.Right']['setAlign'] = 'right';
		$this->catalogo['TD.Right']['setBorder'] = '1';
		$this->catalogo['TD.Right']['setFontFamily'] = 'Arial';
		$this->catalogo['TD.Right']['setNumFormat'] = '_-* #,##0.00_-;-* #,##0.00_-;_-* "-"??_-;_-@_-';
		$this->catalogo['TD.Right']['setSize'] = '10';
		$this->catalogo['TD.Right']['setVAlign'] = 'vcenter';
	}
}
?>
