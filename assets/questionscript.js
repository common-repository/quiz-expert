
function quexp_add_tf_question_button()
{
  var quiz_id=document.getElementById("new_quiz_id").value;
  var no=document.getElementById("new_no").value;
  var qname=document.getElementById("new_tf_qname").value;
  var answer=document.getElementById("new_tf_answer").value;
  var explaination=document.getElementById("new_tf_explaination").value;
  var options="";

 if(qname.length >= 1 && answer.length >=1){
    jQuery.ajax
    ({
     type:'post',
     url:quexp_questionajax.ajaxurl,
     data:{
      action:'quexp_add_tf_question',
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
      url:quexp_questionajax.ajaxurl,
      data:{
      action:'quexp_insert_all_question',
      q_id_val:q_id,
      answer_val:answer,
      options_val:options,
      explaination_val:explaination,
      },
      success:function(response) {
      if(response!="")
      {
        var row ="<input type='hidden' id='q_type"+q_id+"' value='tf'><br/>"+
        "<div class='embox' id='q_box"+q_id+"'>"+
        "<div class='quexp-q'>"+no+".&nbsp;&nbsp;&nbsp<a id='qname_tf_val"+q_id+"' style='color:#393939'>"+qname+"</a></div><div class='quexp-dangerBtn'>"+
        "<a href='#TB_inline?width=600&height=550&inlineId=delete_question_popup' title='Delete Question' class='thickbox' onclick='quexp_delete_question_button("+q_id+");'>"+
        "<button class='quexp-btn quexp-btn_danger quexp-tooltip' >"+
        "<span class='quexp-tooltiptext quexp-tooltip-bottom'>Delete Question</span><span class='dashicons dashicons-trash'></span><i class='quexp-icon-trash'></i></button></a></div>"+
        "<div class='quexp-warningBtn'><a href='#TB_inline?width=600&height=550&inlineId=edit_question_popup' title='Edit Question' class='thickbox' onclick='quexp_edit_tf_question_button("+q_id+");'> "+
        "<button class='quexp-btn quexp-btn_warning quexp-tooltip'>"+
        "<span class='quexp-tooltiptext quexp-tooltip-bottom'>Edit Question</span><span class='dashicons dashicons-edit-large'></span><i class='quexp-icon-edit'></i></button></a></div>"+
        "<br/>Answer: <a class='row-title' id='answer_tf_val"+q_id+"'>"+answer+"</a><br/>"+
        "<div id='explain_div"+q_id+"'></div>";
        jQuery("#allcontents").append(row);
        if(explaination != ""){
          document.getElementById("explain_div"+q_id).innerHTML="Explaination: <a class='row-title' id='explaination_tf_val"+q_id+"'>"+explaination+"</a></div>"; }
         
        newno=parseFloat(no)+1;
        document.getElementById("new_no").value=newno;
        document.getElementById("q_box"+q_id).scrollIntoView()
        document.getElementById("new_tf_qname").value="";
        document.getElementById("new_tf_explaination").value="";
        document.getElementById("inputchecktf").innerHTML="";
    }} });   } }
});
 }
 else{
  document.getElementById("inputchecktf").innerHTML="No field can be blank.";
 } 
}

function quexp_edit_tf_question_button(id)
{
 var qname=document.getElementById("qname_tf_val"+id).innerHTML;
 var answer=document.getElementById("answer_tf_val"+id).innerHTML;
 var explaination="";
 if(document.getElementById("explaination_tf_val"+id)){
 var explaination=document.getElementById("explaination_tf_val"+id).innerHTML;
 }

 document.getElementById("edit_question_body").innerHTML="<!-- Question Field -->"+
 "<div class='quexp-row '><div class='quexp-input_group'><div class='quexp-input_group_prepend'>"+
 "<div class='quexp-input_group_text'>Question</div></div>"+
 "<input type='text' class='quexp-input ' id='qname_tf_text"+id+"' value='"+qname+"'></div></div>"+
"<!-- Answer Field -->"+
"<div class='quexp-row '><div class='quexp-input_group'><div class='quexp-input_group_prepend'>"+
"<div class='quexp-input_group_text'>Answer</div></div>"+
"<select id='answer_tf_text"+id+"'><option value='"+answer+"'>"+answer+"</option><option value='True'>True</option><option value='False'>False</option></select></div></div>"+
 "<!-- Explaination Field -->"+
 "<div class='quexp-row '><div class='quexp-input_group'><div class='quexp-input_group_prepend'>"+
 "<div class='quexp-input_group_text'>Explaination</div></div>"+
 "<input type='text' class='quexp-input ' id='tf_explaination_text"+id+"' value='"+explaination+"'></div></div>"+
 "<div class='quexp-row' id='inputchecktfedit'></div>"+
 "<div class='quexp-row' onclick='quexp_save_tf_question_button("+id+");'>"+
 "<button class='quexp-btn quexp-btn_secondary quexp-btn_ls quexp-add_answer'>Edit Question</button></div>";
}


function quexp_save_tf_question_button(id)
{

 var qname=document.getElementById("qname_tf_text"+id).value;
 var answer=document.getElementById("answer_tf_text"+id).value;
 var explaination=document.getElementById("tf_explaination_text"+id).value;
var options="";
  if(qname.length >= 1 && answer.length >=1){
 jQuery.ajax
 ({
  type:'post',
  url:quexp_questionajax.ajaxurl,
  data:{
   action:'quexp_save_all_question',
   q_id_val:id,
   qname_val:qname,
   options_val:options,
   answer_val:answer,
   explaination_val:explaination,
  },
  success:function(response) {
   if(response!="")
   {
    document.getElementById("qname_tf_val"+id).innerHTML=qname;
    document.getElementById("answer_tf_val"+id).innerHTML=answer;
    if(explaination != ""){
      document.getElementById("explain_div"+id).innerHTML="Explaination: <a class='row-title' id='explaination_mcq_val"+id+"'>"+explaination+"</a></div>"; }
      else{
          document.getElementById("explain_div"+id).innerHTML="</div>"; }
    tb_remove();
  }
}
});
 }
 else {
  document.getElementById("inputchecktfedit").innerHTML="No field can be blank.";
 } }


function quexp_add_sq_question_button()
{
  var quiz_id=document.getElementById("new_quiz_id").value;
  var no=document.getElementById("new_no").value;
  var qname=document.getElementById("new_sq_qname").value;
  var answer=document.getElementById("new_sq_answer").value;
  var explaination=document.getElementById("new_sq_explaination").value;
  var options="";

 if(qname.length >= 1 && answer.length >=1){
    jQuery.ajax
    ({
     type:'post',
     url:quexp_questionajax.ajaxurl,
     data:{
      action:'quexp_add_sq_question',
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
      url:quexp_questionajax.ajaxurl,
      data:{
      action:'quexp_insert_all_question',
      q_id_val:q_id,
      options_val:options,
      answer_val:answer,
      explaination_val:explaination,
      },
      success:function(response) {
      if(response!="")
      {
        var row ="<input type='hidden' id='q_type"+q_id+"' value='sq'><br/>"+
        "<div class='embox' id='q_box"+q_id+"'>"+
        "<div class='quexp-q'>"+no+".&nbsp;&nbsp;&nbsp<a id='qname_sq_val"+q_id+"' style='color:#393939'>"+qname+"</a></div><div class='quexp-dangerBtn'>"+
        "<a href='#TB_inline?width=600&height=550&inlineId=delete_question_popup' title='Delete Question' class='thickbox' onclick='quexp_delete_question_button("+q_id+");'>"+
        "<button class='quexp-btn quexp-btn_danger quexp-tooltip' >"+
        "<span class='quexp-tooltiptext quexp-tooltip-bottom'>Delete Question</span><span class='dashicons dashicons-trash'></span><i class='quexp-icon-trash'></i></button></a></div>"+
        "<div class='quexp-warningBtn'><a href='#TB_inline?width=600&height=550&inlineId=edit_question_popup' title='Edit Question' class='thickbox' onclick='quexp_edit_sq_question_button("+q_id+");'> "+
        "<button class='quexp-btn quexp-btn_warning quexp-tooltip' >"+
        "<span class='quexp-tooltiptext quexp-tooltip-bottom'>Edit Question</span><span class='dashicons dashicons-edit-large'></span><i class='quexp-icon-edit'></i></button></a></div>"+
        "<br/>Answer: <a class='row-title' id='answer_sq_val"+q_id+"'>"+answer+"</a><br/>"+
        "<div id='explain_div"+q_id+"'></div>";
        jQuery("#allcontents").append(row);
        if(explaination != ""){
          document.getElementById("explain_div"+q_id).innerHTML="Explaination: <a class='row-title' id='explaination_sq_val"+q_id+"'>"+explaination+"</a></div>"; }
         
        newno=parseFloat(no)+1;
        document.getElementById("new_no").value=newno;
        document.getElementById("q_box"+q_id).scrollIntoView()
        document.getElementById("new_sq_qname").value="";
        document.getElementById("new_sq_answer").value="";
        document.getElementById("new_sq_explaination").value="";
        document.getElementById("inputchecktf").innerHTML="";
    }} });   } }
});
 }
 else{
  document.getElementById("inputchecksq").innerHTML="No field can be blank.";
 } 
}

function quexp_edit_sq_question_button(id)
{
 var qname=document.getElementById("qname_sq_val"+id).innerHTML;
 var answer=document.getElementById("answer_sq_val"+id).innerHTML;
 var explaination="";
 if(document.getElementById("explaination_sq_val"+id)){
 var explaination=document.getElementById("explaination_sq_val"+id).innerHTML;
 }

 document.getElementById("edit_question_body").innerHTML="<!-- Question Field -->"+
 "<div class='quexp-row '><div class='quexp-input_group'><div class='quexp-input_group_prepend'>"+
 "<div class='quexp-input_group_text'>Question</div></div>"+
 "<input type='text' class='quexp-input ' id='qname_sq_text"+id+"' value='"+qname+"'></div></div>"+
"<!-- Answer Field -->"+
 "<div class='quexp-row '><div class='quexp-input_group'><div class='quexp-input_group_prepend'>"+
 "<div class='quexp-input_group_text'>Answer</div></div>"+
 "<input type='text' class='quexp-input ' id='answer_sq_text"+id+"' value='"+answer+"'></div></div>"+
 "<!-- Explaination Field -->"+
 "<div class='quexp-row '><div class='quexp-input_group'><div class='quexp-input_group_prepend'>"+
 "<div class='quexp-input_group_text'>Explaination</div></div>"+
 "<input type='text' class='quexp-input ' id='sq_explaination_text"+id+"' value='"+explaination+"'></div></div>"+
 "<div class='quexp-row' id='inputchecksqedit'></div>"+
 "<div class='quexp-row' onclick='quexp_save_sq_question_button("+id+");'>"+
 "<button class='quexp-btn quexp-btn_secondary quexp-btn_ls quexp-add_answer'>Edit Question</button></div>";
}



function quexp_save_sq_question_button(id)
{
 var qname=document.getElementById("qname_sq_text"+id).value;
 var answer=document.getElementById("answer_sq_text"+id).value;
 var explaination=document.getElementById("sq_explaination_text"+id).value;
 var options="";

  if(qname.length >= 1 && answer.length >=1){
 jQuery.ajax
 ({
  type:'post',
  url:quexp_questionajax.ajaxurl,
  data:{
   action:'quexp_save_all_question',
   q_id_val:id,
   qname_val:qname,
   options_val:options,
   answer_val:answer,   
   explaination_val:explaination,
  },
  success:function(response) {
   if(response!="")
   {
    document.getElementById("qname_sq_val"+id).innerHTML=qname;
    document.getElementById("answer_sq_val"+id).innerHTML=answer;
    if(explaination != ""){
      document.getElementById("explain_div"+id).innerHTML="Explaination: <a class='row-title' id='explaination_mcq_val"+id+"'>"+explaination+"</a></div>"; }
      else{
          document.getElementById("explain_div"+id).innerHTML="</div>"; }
    tb_remove();
  }
}
});
 }
 else {
  document.getElementById("inputchecksqedit").innerHTML="No field can be blank.";
 } }


 function quexp_add_uf_question_button()
{
  var quiz_id=document.getElementById("new_quiz_id").value;
  var no=document.getElementById("new_no").value;
  var qname=document.getElementById("new_uf_qname").value;
  var type=document.getElementById("new_uf_type").value;
  var newtype="";

 if(qname.length >= 1){
    jQuery.ajax
    ({
     type:'post',
     url:quexp_questionajax.ajaxurl,
     data:{
      action:'quexp_add_user_field',
      quiz_id_val:quiz_id,
      qname_val:qname,
      type_val:type,
     },
     success:function(response) {
      if(response!="")
      {
       var q_id=response;
        if(type === "ufinput"){
            newtype= "Input Field";
        }
        else{
             newtype= "Text Field";
        }
        var row ="<input type='hidden' id='q_type"+q_id+"' value='uf'><br/>"+
        "<div class='embox' id='q_box"+q_id+"'>"+
        "<div class='quexp-q'>"+no+".&nbsp;&nbsp;&nbsp<a id='qname_uf_val"+q_id+"' style='color:#393939'>"+qname+"</a></div><div class='quexp-dangerBtn'>"+
        "<a href='#TB_inline?width=600&height=550&inlineId=delete_question_popup' title='Delete Question' class='thickbox' onclick='quexp_delete_question_button("+q_id+");'>"+
        "<button class='quexp-btn quexp-btn_danger quexp-tooltip' >"+
        "<span class='quexp-tooltiptext quexp-tooltip-bottom'>Delete Question</span><span class='dashicons dashicons-trash'></span><i class='quexp-icon-trash'></i></button></a></div>"+
        "<div class='quexp-warningBtn'><a href='#TB_inline?width=600&height=550&inlineId=edit_question_popup' title='Edit Question' class='thickbox' onclick='quexp_edit_uf_question_button("+q_id+");'> "+
        "<button class='quexp-btn quexp-btn_warning quexp-tooltip'>"+
        "<span class='quexp-tooltiptext quexp-tooltip-bottom'>Edit Question</span><span class='dashicons dashicons-edit-large'></span><i class='quexp-icon-edit'></i></button></a></div>"+
        "<br/>Field Type: <a class='row-title' id='type_uf_val"+q_id+"'>"+newtype+"</a></div>";
        jQuery("#allcontents").append(row);
        
        newno=parseFloat(no)+1;
        document.getElementById("new_no").value=newno;
        document.getElementById("q_box"+q_id).scrollIntoView()
        document.getElementById("new_uf_qname").value="";
        document.getElementById("inputcheckuf").innerHTML="";
      }}
});
 }
 else{
  document.getElementById("inputcheckuf").innerHTML="Question field can not be blank.";
 } 
}

function quexp_edit_uf_question_button(id)
{
 var qname=document.getElementById("qname_uf_val"+id).innerHTML;
 var type=document.getElementById("type_uf_val"+id).innerHTML;

 if(type === "Input Field"){
  newtype= "ufinput";
}
else{
   newtype= "uftext";
}

 document.getElementById("edit_question_body").innerHTML="<!-- Question Field -->"+
 "<div class='quexp-row '><div class='quexp-input_group'><div class='quexp-input_group_prepend'>"+
 "<div class='quexp-input_group_text'>Question</div></div>"+
 "<input type='text' class='quexp-input ' id='qname_uf_text"+id+"' value='"+qname+"'></div></div>"+
"<!-- type Field -->"+
"<div class='quexp-row '><div class='quexp-input_group'><div class='quexp-input_group_prepend'>"+
"<div class='quexp-input_group_text'>type</div></div>"+
"<select id='type_uf_text"+id+"'><option value='"+newtype+"'>"+type+"</option><option value='ufinput'>Input Field</option><option value='uftext'>Text Field</option></select></div></div>"+

 "<div class='quexp-row' id='inputcheckufedit'></div>"+
 "<div class='quexp-row' onclick='quexp_save_uf_question_button("+id+");'>"+
 "<button class='quexp-btn quexp-btn_secondary quexp-btn_ls quexp-add_type'>Edit User Field</button></div>";
}



function quexp_save_uf_question_button(id)
{
 var qname=document.getElementById("qname_uf_text"+id).value;
 var type=document.getElementById("type_uf_text"+id).value;

  if(qname.length >= 1){
 jQuery.ajax
 ({
  type:'post',
  url:quexp_questionajax.ajaxurl,
  data:{
   action:'quexp_save_user_field',
   q_id_val:id,
   qname_val:qname,
   q_type_val:type
  },
  success:function(response) {
   if(response!="")
   {
    if(type === "ufinput"){
      newtype= "Input Field";
  }
  else{
       newtype= "Text Field";
  }
    document.getElementById("qname_uf_val"+id).innerHTML=qname;
    document.getElementById("type_uf_val"+id).innerHTML=q_type;

    tb_remove();
  }
}
});
 }
 else {
  document.getElementById("inputcheckufedit").innerHTML="No field can be blank.";
 } }
