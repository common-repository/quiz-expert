function quexp_add_mcq_question_button()
{
  var quiz_id=document.getElementById("new_quiz_id").value;
  var no=document.getElementById("new_no").value;
  var qname=document.getElementById("new_mcq_qname").value;
  var explaination=document.getElementById("new_mcq_explaination").value;
  var optionvalue="";
  var optionprint="";
  var answer = "";
  var inputcheck=true;

  var options = document.getElementsByName('options[]');
  var checkboxes = document.getElementsByName('new_chk[]');

  for (var i=0, n=options.length;i<n;i++){
      if (options[i].value != ""){
        if (checkboxes[i].checked){answer += ","+checkboxes[i].value;}
          optionvalue += ","+options[i].value; 
        }
        else{
            inputcheck=false;
        }
  }
  if (optionvalue) optionvalue = optionvalue.substring(1);
  if (answer) answer = answer.substring(1);

    if(qname.length >= 1 && answer!="" && inputcheck != false){
    jQuery.ajax
    ({
     type:'post',
     url:quexp_mcqajax.ajaxurl,
     data:{
      action:'quexp_add_mcq_question',
      quiz_id_val:quiz_id,
      qname_val:qname,
     },
     success:function(response) {
      if(response!="")
      {
       var q_id=response;

        jQuery.ajax
        ({
        type:'post',
        url:quexp_mcqajax.ajaxurl,
        data:{
        action:'quexp_insert_all_question',
        q_id_val:q_id,
        options_val:optionvalue,
        answer_val:answer,
        explaination_val:explaination,
        },
        success:function(response) {
        if(response!="")
        {

    for (var i=0, n=options.length;i<n;i++){
        if (options[i].value != ""){
            nops=quexp_option(i+1);
            optionprint +="<div class='quexp-opt'><strong>"+nops+"</strong>.&nbsp;&nbsp;&nbsp; <span name='print_options"+q_id+"[]'>"+options[i].value+"</span></div>";
            options[i].value="";             
            checkboxes[i].checked=false;
          }
    }
    var row ="<input type='hidden' id='q_type"+q_id+"' value='mcq'><br/>"+
    "<div class='embox' id='q_box"+q_id+"'>"+
    "<div class='quexp-q'>"+no+".&nbsp;&nbsp;&nbsp<a id='qname_mcq_val"+q_id+"' style='color:#393939'>"+qname+"</a></div><div class='quexp-dangerBtn'>"+
    "<a href='#TB_inline?width=600&height=550&inlineId=delete_question_popup' title='Delete Question' class='thickbox' onclick='quexp_delete_question_button("+q_id+");'>"+
    "<button class='quexp-btn quexp-btn_danger quexp-tooltip'>"+
    "<span class='quexp-tooltiptext quexp-tooltip-bottom'>Delete Question</span><span class='dashicons dashicons-trash'></span><i class='quexp-icon-trash'></i></button></a></div>"+
    "<div class='quexp-warningBtn'><a href='#TB_inline?width=600&height=550&inlineId=edit_question_popup' title='Edit Question' class='thickbox' onclick='quexp_edit_mcq_question_button("+q_id+");'> "+
    "<button class='quexp-btn quexp-btn_warning quexp-tooltip'>"+
    "<span class='quexp-tooltiptext quexp-tooltip-bottom'>Edit Question</span><span class='dashicons dashicons-edit-large'></span><i class='quexp-icon-edit'></i></button></a></div>"+
    "<div id='mcq_answer_option"+q_id+"'>"+optionprint+"</div><br/>Answer: <a class='row-title' id='answer_mcq_val"+q_id+"'>"+answer+"</a><br/>"+
    "<div id='explain_div"+q_id+"'></div>";
    jQuery("#allcontents").append(row);

            if(explaination != ""){
            document.getElementById("explain_div"+q_id).innerHTML="Explaination: <a class='row-title' id='explaination_mcq_val"+q_id+"'>"+explaination+"</a></div>"; }
           

             newno=parseFloat(no)+1;
            document.getElementById("new_no").value=newno;
            document.getElementById("inputcheckmcq").innerHTML="";
            document.getElementById("q_box"+q_id).scrollIntoView()
            
            document.getElementById("new_mcq_qname").value="";
            document.getElementById("new_mcq_explaination").value="";
}}}); }
}});}
 else if(answer === ""){
  document.getElementById("inputcheckmcq").innerHTML="Please Check Correct Answer";
 } 
 else{
    document.getElementById("inputcheckmcq").innerHTML="Question and options field can not be blank. Remove option if not necessary.";
   } 

}

function quexp_edit_mcq_question_button(id)
{
 var qname=document.getElementById("qname_mcq_val"+id).innerHTML;
 var answer=document.getElementById("answer_mcq_val"+id).innerHTML;
 var explaination="";
 var options = document.getElementsByName('print_options'+id+'[]');
 if(document.getElementById("explaination_mcq_val"+id)){
 var explaination=document.getElementById("explaination_mcq_val"+id).innerHTML;
 }
 var optionprint="";
 
 for (var i=0, n=options.length;i<n;i++){
       nops=quexp_option(i+1);
            optionprint +="<div class='quexp-row quexp-answer_row ' id='mcq_ans_option_edit"+(i+1)+"'><div class='quexp-input_group'>"+
            "<div class='quexp-input_group_prepend'><div class='quexp-input_group_text'>&nbsp;&nbsp;&nbsp;&nbsp;"+nops+"&nbsp;&nbsp;</div></div>"+
            "<input type='text'class='regular-text' name='edit_options[]' value='"+options[i].innerHTML+"'>"+
            "<div class='quexp-input_group_append'><label class='quexp-cb-container'>Correct<input type='checkbox' name='edit_chk[]' value='"+nops+"'><span class='quexp-cb-checkmark'></span></label></div></div></div>";        
 }

 document.getElementById("edit_question_body").innerHTML="<!-- Question Field -->"+
 "<div class='quexp-row '><div class='quexp-input_group'><div class='quexp-input_group_prepend'>"+
 "<div class='quexp-input_group_text'>Question</div></div>"+
 "<input type='text' class='quexp-input ' id='qname_mcq_text"+id+"' value='"+qname+"'></div></div>"+
 "<!-- Option Field -->"+
 "<div id='quexp_answers_edit'>"+optionprint+"</div>"+
 "<!-- option buttoon -->"+
 "<div class='quexp-row'>"+
 "<div class='quexp-infoBtn' onclick='quexp_add_mcq_edit_option_button();'>"+
 "<button class='quexp-btn quexp-btn_info quexp-tooltip'>"+
 "Add Option</button></div>"+
 "<div class='quexp-dangerBtn' onclick='quexp_delete_mcq_edit_option_button();'>"+                        
 "<button class='quexp-btn quexp-btn_danger quexp-tooltip' >"+
 "Delete Option</button></div></div>"+
 "<!-- Explaination Field -->"+
 "<div class='quexp-row '><div class='quexp-input_group'><div class='quexp-input_group_prepend'>"+
 "<div class='quexp-input_group_text'>Explaination</div></div>"+
 "<input type='text' class='quexp-input ' id='mcq_explaination_text"+id+"' value='"+explaination+"'></div></div>"+
 "<div class='quexp-row' id='inputcheckmcqedit'></div>"+
 "<div class='quexp-row' onclick='quexp_save_mcq_question_button("+id+");'>"+
 "<button class='quexp-btn quexp-btn_secondary quexp-btn_ls quexp-add_answer'>Edit Question</button></div>";

var checkboxes = document.getElementsByName('edit_chk[]');
var answerarray = answer.split(',');

for (var i=0, n=answerarray.length;i<n;i++) 
{
  for (var j=0, m=checkboxes.length;j<m;j++) 
  {
      if (answerarray[i]===checkboxes[j].value) 
      {
          checkboxes[j].checked=true;
      }
  }
}



}


function quexp_save_mcq_question_button(id)
{

var qname=document.getElementById("qname_mcq_text"+id).value;
var explaination=document.getElementById("mcq_explaination_text"+id).value;
var optionvalue="";
var optionprint="";
var answer = "";
var inputcheck=true;



  var options = document.getElementsByName('edit_options[]');
  var checkboxes = document.getElementsByName('edit_chk[]');

  for (var i=0, n=options.length;i<n;i++){
      if (options[i].value != ""){
        nops=quexp_option(i+1);
        if (checkboxes[i].checked){answer += ","+checkboxes[i].value;}
          optionvalue += ","+options[i].value; 
          optionprint +="<div class='quexp-opt'>"+nops+".&nbsp;&nbsp;&nbsp; <span name='print_options"+id+"[]'>"+options[i].value+"</span></div>";
        }
        else{
            inputcheck=false;
        }
  }
  if (optionvalue) optionvalue = optionvalue.substring(1);
  if (answer) answer = answer.substring(1);

  if(qname.length >= 1 && answer!="" && inputcheck != false){
 jQuery.ajax
 ({
  type:'post',
  url:quexp_mcqajax.ajaxurl,
  data:{
   action:'quexp_save_all_question',
   q_id_val:id,
   qname_val:qname,
   options_val:optionvalue,
   answer_val:answer,
   explaination_val:explaination,
  },
  success:function(response) {
   if(response!="")
   {

    document.getElementById("qname_mcq_val"+id).innerHTML=qname;
    document.getElementById("mcq_answer_option"+id).innerHTML=optionprint;

    if(explaination != ""){
    document.getElementById("explain_div"+id).innerHTML="Explaination: <a class='row-title' id='explaination_mcq_val"+id+"'>"+explaination+"</a></div>"; }
    else{
        document.getElementById("explain_div"+id).innerHTML="</div>"; }
    

    document.getElementById("answer_mcq_val"+id).innerHTML=answer;

    tb_remove();
  }
}
});
 }
 else if(answer === ""){
  document.getElementById("inputcheckmcqedit").innerHTML="Please Check Correct Answer";
 } 
 else{
    document.getElementById("inputcheckmcqedit").innerHTML="Question and options field can not be blank. Remove option if not necessary.";
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