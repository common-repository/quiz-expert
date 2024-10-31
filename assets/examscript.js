function quexp_add_exam_button()
{
 var ename=document.getElementById("new_exam").value;
 var etype=document.getElementById("new_type").value;
 var uid=document.getElementById("quiz_uid").value;

 if(ename.length >= 1){
   jQuery.ajax
 ({
  type:'post',
  url:quexp_examajax.ajaxurl,
  data:{
   action:'quexp_add_exam',
   exam_val:ename,
   uid_val:uid,
   type_val:etype,

  },
  success:function(response) {
   if(response!="")

   {
    document.getElementById("new_exam").value="";
    document.getElementById("new_exam_comment").innerHTML="New Quiz Created. You are redirecting to quiz edit page.";
    window.location.href = "admin.php?page=quiz-expert-edit-quiz&edit="+response;
   }
   
   else{

   } 
}
});
}
}

function quexp_delete_question_button(id)
{
  document.getElementById("delete_question_button").innerHTML="<div class='quexp-row' onclick='quexp_delete_confirm_question_button("+id+");'><button class='quexp-btn quexp-btn_danger quexp-btn_ls quexp-add_answer'>Confirm Delete</button></div> ";

}

function quexp_delete_confirm_question_button(id)
{
  var q_type=document.getElementById("q_type"+id).value;
   jQuery.ajax
 ({
  type:'post',
  url:quexp_examajax.ajaxurl,
  data:{
   action:'quexp_delete_question',
   q_id_val:id,
   q_type_val:q_type
  },
  success:function(response) {
   if(response!="")
   {
    var row=document.getElementById("q_box"+id);
    row.parentNode.removeChild(row);
    tb_remove();
  }
}
});
}

function quexp_delete_exam_button(id)
{
  document.getElementById("delete_exam_button").innerHTML="<div class='quexp-row' onclick='quexp_delete_confirm_exam_button("+id+");'><button class='quexp-btn quexp-btn_danger quexp-btn_ls quexp-add_answer'>Confirm Delete</button></div>  ";

}

function quexp_delete_confirm_exam_button(id)
{
  var wp_post_id=document.getElementById("wp_post_id"+id).value;
   jQuery.ajax
 ({
  type:'post',
  url:quexp_examajax.ajaxurl,
  data:{
   action:'quexp_delete_exam',
   quiz_id_val:id,
   wp_post_id_val:wp_post_id,
 
  },
  success:function(response) {
   response=parseFloat(response);
   if(response!="")
   {
    var row=document.getElementById("quiz_row"+id);
    row.parentNode.removeChild(row);
    tb_remove();
  }
}
});
}

function quexp_save_settings_button(id)
{
  var quiz_type=document.getElementById("new_quiz_type").value;
  var quiz_time=document.getElementById("new_quiz_time").value;
  quiz_time=parseFloat(quiz_time);

   jQuery.ajax
 ({
  type:'post',
  url:quexp_examajax.ajaxurl,
  data:{
   action:'quexp_save_settings',
   quiz_id_val:id,
   quiz_type_val:quiz_type,
   quiz_time_val:quiz_time
  },
  success:function(response) {
   if(response!="")
   {
    document.getElementById("savecheck").innerHTML="Settings Saved Successfully.";
  }
}
});
}

function quexp_delete_result_button(id)
{
  document.getElementById("delete_result_button").innerHTML="<div class='quexp-row' onclick='quexp_delete_confirm_result_button("+id+");'><button class='quexp-btn quexp-btn_danger quexp-btn_ls quexp-add_answer'>Confirm Delete</button></div>  ";

}

function quexp_delete_confirm_result_button(id)
{

   jQuery.ajax
 ({
  type:'post',
  url:quexp_examajax.ajaxurl,
  data:{
   action:'quexp_delete_result',
   rr_id_val:id,
  },
  success:function(response) {
   response=parseFloat(response);
   if(response!="")
   {
    var row=document.getElementById("result_row"+id);
    row.parentNode.removeChild(row);
    tb_remove();
  }
}
});
}