var stop={};

function quexp_submit_answer_button()
{
  var quiz_id=document.getElementById("quiz_id").value;
  var quiz_user_id=document.getElementById("quiz_uid").value;
  var sl=document.getElementById("sl_no").value;
  sl=parseFloat(sl);
  var mark=0;

  jQuery.ajax
  ({
   type:'post',
   url:quexp_frontajax.ajaxurl,
   data:{
    action:'quexp_record_room',
    quiz_id_val:quiz_id,
    quiz_user_id_val:quiz_user_id,
   },
   success:function(response) { 
    rr_id=response;

    for (var j=1;j<sl;j++) 
  {
    var q_type=document.getElementById("q_type"+j).value;
    var correct_answer="";
    if(q_type != "ufinput" && q_type != "uftext"){
    if(q_type==="mcq"){
      correct_answer=document.getElementById("correct_answer"+j).value;
      var checkboxes = document.getElementsByName("chk_"+j+"[]");
      var answer = "";
      for (var i=0, n=checkboxes.length;i<n;i++) 
      {
          if (checkboxes[i].checked) 
          {
              answer += ","+checkboxes[i].value;
          }
      }
      if (answer) answer = answer.substring(1);
    }

    else{
      correct_answer=document.getElementById("correct_answer"+j).value;
      var answer=document.getElementById("answer"+j).value;
     }

   
    if(correct_answer.toUpperCase() === answer.toUpperCase()){
      document.getElementById("answer_div"+j).innerHTML="&nbsp;&nbsp;Answer:&nbsp;&nbsp;"+correct_answer;
      document.getElementById("answer_div"+j).style.border  = "solid #ececa3";
      document.getElementById("answer_div"+j).style.background = "#ececa3";
      document.getElementById("answer_div"+j).style.color = "#000000";
      mark++;
    }
    else{
      document.getElementById("answer_div"+j).innerHTML="&nbsp;&nbsp;Answer:&nbsp;&nbsp;"+correct_answer;
      document.getElementById("answer_div"+j).style.border = "solid #FF4347";
      document.getElementById("answer_div"+j).style.background = "#FF4347";
      document.getElementById("answer_div"+j).style.color = "#FFFFFF";
    }
    }
    else{
      var q_id=document.getElementById("q_id"+j).value;
      var uf_text=document.getElementById("uf_text"+j).value;
      if(uf_text != ""){
      jQuery.ajax
      ({
       type:'post',
       url:quexp_frontajax.ajaxurl,
       data:{
        action:'quexp_record_field',
        rr_id_val:rr_id,
        q_id_val:q_id,
        uf_text_val:uf_text,
       },
       success:function(response) { }
     });}
    }

  }
  document.getElementById("score_div").innerHTML="&nbsp;&nbsp;You got&nbsp;"+mark+"&nbsp;out of&nbsp;"+(sl-1);
  document.getElementById("score_div").style.border  = "solid #ececa3";
  document.getElementById("score_div").style.background = "#ececa3";
  document.getElementById("score_div").style.color = "#000000";
  document.getElementById("submit_answer").innerHTML="";
  stop=0;

  jQuery.ajax
 ({
  type:'post',
  url:quexp_frontajax.ajaxurl,
  data:{
   action:'quexp_record_result',
   rr_id_val:rr_id,
   mark_val:mark,
  },
  success:function(response) {

}
});
}
});
}

function quexp_startTimer(duration) {
  var timer = duration, minutes, seconds;
  var timerint= setInterval(function () {
      minutes = parseInt(timer / 60, 10);
      seconds = parseInt(timer % 60, 10);

      minutes = minutes < 10 ? "0" + minutes : minutes;
      seconds = seconds < 10 ? "0" + seconds : seconds;

      
      document.getElementById("clock").innerHTML="<h3>"+minutes+" : "+seconds+"<h3>";
  
      
      if (--timer < 0) {
        clearInterval(timerint);
        quexp_submit_answer_button();
        document.getElementById("clock").innerHTML="<h3>00 : 00<h3><h4>Time up</h4>";
        document.getElementById("clock").style.color = "#ff0000";
      }
      if (stop === 0) {
        clearInterval(timerint);
      }
  }, 1000);
}

jQuery(function ($) {
  var quiz_time = parseFloat(document.getElementById("quiz_time").value);
  var quiz_type = document.getElementById("quiz_type").value;
  quiz_time=60* quiz_time;
  if(quiz_type === "Exam" && quiz_time > 0){
    quexp_startTimer(quiz_time);}
});


function quexp_show_answer_button(id){
  var correct_answer=document.getElementById("correct_answer"+id).value;
  document.getElementById("answer_div"+id).innerHTML="&nbsp;&nbsp;Answer:&nbsp;&nbsp;"+correct_answer;
}