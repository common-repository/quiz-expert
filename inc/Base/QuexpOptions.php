<?php 
/**
 * db table function
 * @author WePupil<wepupilteam@gmail.com>
 * @package QuizExpert
 */
namespace Inc\Base;

/**
* 
*/
class QuexpOptions
{

	public function quexp_option($option_sl){
        $newoption; 

        if ($option_sl == "1"){$newoption="A"; }
        else if ($option_sl == "2"){$newoption="B"; }
        else if ($option_sl == "3"){$newoption="C"; }
        else if ($option_sl == "4"){$newoption="D"; }
        else if ($option_sl == "5"){$newoption="E"; }
        else if ($option_sl == "6"){$newoption="F"; }
        else if ($option_sl == "7"){$newoption="G"; }
        else if ($option_sl == "8"){$newoption="H"; }
        else if ($option_sl == "9"){$newoption="I"; }
        else if ($option_sl == "10"){$newoption="J"; }
        else if ($option_sl == "11"){$newoption="K"; }
        else if ($option_sl == "12"){$newoption="L"; }
        else if ($option_sl == "13"){$newoption="M"; }
        else if ($option_sl == "14"){$newoption="N"; }
        else if ($option_sl == "15"){$newoption="0"; }
        else if ($option_sl == "16"){$newoption="P"; }
        else if ($option_sl == "17"){$newoption="Q"; }
        else if ($option_sl == "18"){$newoption="R"; }
        else if ($option_sl == "19"){$newoption="S"; }
        else if ($option_sl == "20"){$newoption="T"; }
        else if ($option_sl == "21"){$newoption="U"; }
        else if ($option_sl == "22"){$newoption="V"; }
        else if ($option_sl == "23"){$newoption="W"; }
        else if ($option_sl == "24"){$newoption="X"; }
        else if ($option_sl == "25"){$newoption="Y"; }
        else if ($option_sl == "26"){$newoption="Z"; }

        echo wp_kses_post($newoption);
	}
}