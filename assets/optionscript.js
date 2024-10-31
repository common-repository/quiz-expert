function quexp_add_mcq_option_button()
{
    var options = document.getElementsByName('new_chk[]');
    
    var option=options.length;
    option=parseFloat(option)+1;

    if (option<=26){
        nops=quexp_option(option);

    
    var optioninput="<div class='quexp-row quexp-answer_row ' id='mcq_ans_option"+option+"'><div class='quexp-input_group'>"+
    "<div class='quexp-input_group_prepend'><div class='quexp-input_group_text'>&nbsp;&nbsp;&nbsp;&nbsp;"+nops+"&nbsp;&nbsp;</div></div>"+
    "<input type='text'class='regular-text' name='options[]'>"+
    "<div class='quexp-input_group_append'><label class='quexp-cb-container'>Correct<input type='checkbox' name='new_chk[]' value='"+nops+"'><span class='quexp-cb-checkmark'></span></label></div></div></div>"
   
    jQuery("#quexp_answers").append(optioninput);
}
}

function quexp_delete_mcq_option_button()
{
    var checkboxes = document.getElementsByName('new_chk[]');
    
    var option=checkboxes.length;
    option=parseFloat(option);

    var row=document.getElementById("mcq_ans_option"+option);
    row.parentNode.removeChild(row);
}

function quexp_add_mcq_edit_option_button(id)
{
    var options = document.getElementsByName('edit_chk[]');
    
    var option=options.length;
    option=parseFloat(option)+1;

    if (option<=26){
        nops=quexp_option(option);

    
    var optioninput="<div class='quexp-row quexp-answer_row ' id='mcq_ans_option_edit"+option+"'><div class='quexp-input_group'>"+
    "<div class='quexp-input_group_prepend'><div class='quexp-input_group_text'>&nbsp;&nbsp;&nbsp;&nbsp;"+nops+"&nbsp;&nbsp;</div></div>"+
    "<input type='text'class='regular-text' name='edit_options[]'>"+
    "<div class='quexp-input_group_append'><label class='quexp-cb-container'>Correct<input type='checkbox' name='edit_chk[]' value='"+nops+"'><span class='quexp-cb-checkmark'></span></label></div></div></div>"
   
    jQuery("#quexp_answers_edit").append(optioninput);
    }
}

function quexp_delete_mcq_edit_option_button(id)
{
    var checkboxes = document.getElementsByName('edit_chk[]');
    
    var option=checkboxes.length;
    option=parseFloat(option);
    if(option>2){
    var row=document.getElementById("mcq_ans_option_edit"+option);
    row.parentNode.removeChild(row);
    }
}

function question_sh_button() {
    var shide = document.getElementById("allcontents");
    if (shide.style.display === "none") {
        shide.style.display = "block";
    } else {
        shide.style.display = "none";
    }
  } 

function quexp_option(option_sl){
    newoption=0; 

    if (option_sl == "1"){newoption="A"; }
    else if (option_sl == "2"){newoption="B"; }
    else if (option_sl == "3"){newoption="C"; }
    else if (option_sl == "4"){newoption="D"; }
    else if (option_sl == "5"){newoption="E"; }
    else if (option_sl == "6"){newoption="F"; }
    else if (option_sl == "7"){newoption="G"; }
    else if (option_sl == "8"){newoption="H"; }
    else if (option_sl == "9"){newoption="I"; }
    else if (option_sl == "10"){newoption="J"; }
    else if (option_sl == "11"){newoption="K"; }
    else if (option_sl == "12"){newoption="L"; }
    else if (option_sl == "13"){newoption="M"; }
    else if (option_sl == "14"){newoption="N"; }
    else if (option_sl == "15"){newoption="0"; }
    else if (option_sl == "16"){newoption="P"; }
    else if (option_sl == "17"){newoption="Q"; }
    else if (option_sl == "18"){newoption="R"; }
    else if (option_sl == "19"){newoption="S"; }
    else if (option_sl == "20"){newoption="T"; }
    else if (option_sl == "21"){newoption="U"; }
    else if (option_sl == "22"){newoption="V"; }
    else if (option_sl == "23"){newoption="W"; }
    else if (option_sl == "24"){newoption="X"; }
    else if (option_sl == "25"){newoption="Y"; }
    else if (option_sl == "26"){newoption="Z"; }

    return newoption;
}