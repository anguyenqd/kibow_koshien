/**
 * @author Viet Duc Phan
 */
$(document).ready(function(){
  var hover_schools = $('#koushien_first_round .school .school_uniform');
  var hover_schools_match = $('#koushien_match .school .school_uniform');
  var first_round_schools = $('#koushien_first_round .school .school_uniform .select_button');
  var second_round_schools = $("#koushien_second_round .school .school_uniform .select_button");
  var third_round_schools = $("#koushien_third_round .school .school_uniform .select_button");
  var deselect_buttons = $(".school .school_uniform .deselect_button");
  var first_section = "#koushien_first_round";
  var second_section = "#koushien_second_round";
  var third_section = "#koushien_third_round";
  var second_section_left = "#koushien_second_round .left_four";
  var second_section_right = "#koushien_second_round .right_four";
  var third_section_left = "#koushien_third_round .left_four";
  var third_section_right = "#koushien_third_round .right_four";
  var champion_section = "#champion";
  var champion_selected = "#champion .champion_selected";
  var item_second_selected = 0;
  var item_third_selected = 0;
  var item_champ = 0;
  $(hover_schools).hover(
    function(){//over
      $(this).animate({opacity:.7},70);
      var map_url = $(this).attr("data-map");
      var element_position = $(this).parent().position();
      var element_height = $(this).parent().height();
      $(".hover").append("<img class=\"map_image\" width=\"172\" height=\"163\" src=\""+map_url+"\" /><p>"+$(this).attr("data-desc")+"</p>");
      $(".hover").css("display","block");
      var hover_height = $(".hover").height();
      $(".hover").css("top",element_position.top-hover_height).css("left",element_position.left);
    },
    function(){//out
      $(this).animate({opacity:1},70);
      $(".hover .map_image").remove();
      $(".hover p").remove();
      $(".hover").css("display","none");
    });
  $(hover_schools_match).hover(
    function(){//over
      $(this).animate({opacity:.7},70);
      var map_url = $(this).attr("data-map");
      var element_position = $(this).parent().position();
      var element_height = $(this).parent().height();
      var hover_class = $(this).parent().parent().parent().find('.hover');
      if($(this).attr("data-desc") != '')
      {
	      $(hover_class).append("<p>"+$(this).attr("data-desc")+"</p>");
	      $(hover_class).css("display","block");
	      var hover_height = $(".hover").height();
	      $(hover_class).css("top",element_position.top-hover_height).css("left",element_position.left);
      }
    },
    function(){//out
      $(this).animate({opacity:1},70);
      var hover_class = $(this).parent().parent().parent().find('.hover');
      $(hover_class).find('p').remove();
      $(hover_class).css("display","none");
    });
  //select 8 schools
  $(first_round_schools).click(function(){
    if(item_second_selected < 8){
      if($(this).attr("data-selected") == "false"){
        $(this).css("opacity",1);
        if($("#koushien_second_round .left_four .school").length<4){
          $(this).parent().parent().clone().appendTo(second_section_left);
        } else {
          $(this).parent().parent().clone().appendTo(second_section_right);
        }
        var first_round_selected = $(this).attr("data-school-id");
        $("#koushien_second_round .school .odd_vote .odd_number[data-school-id='"+first_round_selected+"']").html($(this).attr("data-top-4"));
        var first_round_selected = $(this).attr("data-school-id");
        var first_round_input = $("#form_submit .first_round");
        for(var i = 0; i < first_round_input.length; i++ ){
          if($(first_round_input[i]).attr("value") == 0){
            $(first_round_input[i]).attr("value",first_round_selected);
            item_second_selected++;
            if(item_second_selected>0){
              $(second_section).css("display","block");
            }
            break;
          }
        }
        $(this).attr("data-selected","true").toggleClass("hide");
        $("#user_choice_dashboard .total_choices_8").html(item_second_selected);
        $(".top-8").append("<p data-school-id=\""+first_round_selected+"\"><img width=\"15\" style=\"float:left\" src='"+$(this).parent().parent().find("img.uniform_image").attr("src")+"' /><span class=\"deselect_button\">"+$(this).parent().parent().find(".school_name").html()+"</span></p>");
        if(item_second_selected>0){
          $(".confirm_chosen_school").css("display","block");
          $("#user_choice_dashboard").css("display","block");
          $(".top-4").css("display","block");
        }
      }
    }
    if(item_second_selected == 8){
      $("html, body").animate({ scrollTop: $('#top-8-move').offset().top }, 1000);
    }
  });
  //select 4 schools
  $(second_section).on('click',".school .school_uniform .select_button",function(e){
    if(item_third_selected < 4){
      if($(this).attr("data-selected") == "false"){
        $(this).css("opacity",1);
        if($("#koushien_third_round .left_four .school").length < 2){
          $(this).parent().parent().clone().appendTo(third_section_left);
        } else {
          $(this).parent().parent().clone().appendTo(third_section_right);
        }
        var second_round_selected = $(this).attr("data-school-id");
        $("#champion .school .odd_vote .odd_number[data-school-id='"+second_round_selected+"']").html($(this).attr("data-top-1"));
        var second_round_input = $("#form_submit .second_round");
        for(var i = 0; i < second_round_input.length; i++ ){
          if($(second_round_input[i]).attr("value") == 0){
            $(second_round_input[i]).attr("value",second_round_selected);
            item_third_selected++;
            if(item_third_selected>0){
              $(third_section).css("display","block");
              $(".top-4").css("display","block");
              $(".top-1").css("display","block");
            }
            break;
          }
        }
        $(".top-4").append("<p data-school-id=\""+second_round_selected+"\"><img width=\"15\" style=\"float:left\" src='"+$(this).parent().parent().find("img.uniform_image").attr("src")+"' /><span class=\"deselect_button\">"+$(this).parent().parent().find(".school_name").html()+"</span></p>");
        $("#user_choice_dashboard .total_choices_4").html(item_third_selected);
        $(this).attr("data-selected","true").toggleClass("hide");
      }
    }
    if(item_third_selected == 4){
      $("html, body").animate({ scrollTop: $('#top-4-move').offset().top }, 1000);
    }
  });
  //select champ
  $(third_section).on('click',".school .school_uniform .select_button",function(e){
    if(item_champ < 1){
      if($(this).attr("data-selected") == "false"){
        $(this).css("opacity",1);
        $(this).parent().parent().clone().appendTo(champion_selected);
        var third_round_selected = $(this).attr("data-school-id");
        $("#champion .school .odd_vote .odd_number[data-school-id='"+third_round_selected+"']").html($(this).attr("data-top-1"));
        var third_round_input = $("#form_submit .champion");
        for(var i = 0; i < third_round_input.length; i++ ){
          if($(third_round_input[i]).attr("value") == 0){
            $(third_round_input[i]).attr("value",third_round_selected);
            item_champ++;
            if(item_champ>0){
              $(champion_section).css("display","block");
              $(".top-1").css("display","block");
            }
            break;
          }
        }
        $(".top-1").append("<p data-school-id=\""+third_round_selected+"\"><img width=\"15\" style=\"float:left\" src='"+$(this).parent().parent().find("img.uniform_image").attr("src")+"' /><span class=\"deselect_button\">"+$(this).parent().parent().find(".school_name").html()+"</span></p>");
        $("#user_choice_dashboard .total_choices_1").html(item_champ);
        $(this).attr("data-selected","true").toggleClass("hide");
      }
    }
  });
  $("section").on('click',".school .school_uniform .deselect_button",function(e){
    switch($(this).parent().parent().parent().parent().attr("id")){
      case "koushien_second_round":
      var first_round_input = $("#form_submit .first_round");
      for(var i = 0; i < first_round_input.length; i++ ){
        if($(first_round_input[i]).attr("value") == $(this).attr("data-school-id")){
          $(first_round_input[i]).attr("value",0);
          item_second_selected--;
          $(this).parent().parent().remove();
          var data_school_id = $(this).attr("data-school-id");
          var first_round_deselect = $("#koushien_first_round").find(".select_button[data-school-id='"+data_school_id+"']");
          var third_round_deselect = $("#koushien_third_round").find("[data-school-id='"+data_school_id+"']");
          var champion_round_deselect = $("#champion").find("[data-school-id='"+data_school_id+"']");
          var second_round_form = $("#form_submit").find("[value='"+data_school_id+"']");
          $(second_round_form).attr("value",0);
          $(first_round_deselect).attr("data-selected","false").toggleClass("hide");
          if(item_second_selected<=0){
            $(".confirm_chosen_school").css("display","none");
            $("#user_choice_dashboard").css("display","none");
          }
          if(third_round_deselect.length>0){
            item_third_selected--;
          }
          if(champion_round_deselect.length>0){
            item_champ--;
          }
          if(item_second_selected<=0){
            $(second_section).css("display","none");
          }
          if(item_third_selected<=0){
            $(third_section).css("display","none");
            $(".top-4").css("display","none");
          }
          if(item_champ<=0){
              $(champion_section).css("display","none");
              $(".top-1").css("display","none");
          }
          $("#user_choice_dashboard .total_choices_8").html(item_second_selected);
          $("#user_choice_dashboard .total_choices_4").html(item_third_selected);
          $("#user_choice_dashboard .total_choices_1").html(item_champ);
          $("#user_choice_dashboard p[data-school-id=\""+data_school_id+"\"]").remove();
          $(third_round_deselect).parent().parent().remove();
          $(champion_round_deselect).parent().parent().remove();
          break;
        }
      }
      case "koushien_third_round":
      var first_round_input = $("#form_submit .second_round");
      for(var i = 0; i < first_round_input.length; i++ ){
        if($(first_round_input[i]).attr("value") == $(this).attr("data-school-id")){
          $(first_round_input[i]).attr("value",0);
          item_third_selected--;
          $(this).parent().parent().remove();
          var data_school_id = $(this).attr("data-school-id");  
          var second_round_deselect = $("#koushien_second_round").find(".select_button[data-school-id='"+data_school_id+"']");
          var third_round_deselect = $("#koushien_third_round").find("[data-school-id='"+data_school_id+"']");
          var champion_round_deselect = $("#champion").find("[data-school-id='"+data_school_id+"']");
          var second_round_form = $("#form_submit").find("input.champion[value='"+data_school_id+"']");
          $(second_round_form).attr("value",0);
          $(second_round_deselect).attr("data-selected","false").toggleClass("hide");
          $(champion_round_deselect).parent().parent().remove();
          if(champion_round_deselect.length>0){
            item_champ--;
          }
          if(item_third_selected<=0){
            $(third_section).css("display","none");
            $(".top-4").css("display","none");
          }
          if(item_champ<=0){
              $(champion_section).css("display","none");
              $(".top-1").css("display","none");
          }
          $("#user_choice_dashboard .top-4 p[data-school-id=\""+data_school_id+"\"]").remove();
          $("#user_choice_dashboard .top-1 p[data-school-id=\""+data_school_id+"\"]").remove();
          $("#user_choice_dashboard .total_choices_4").html(item_third_selected);
          $("#user_choice_dashboard .total_choices_1").html(item_champ);
          break;
        }
      }
      case "champion":
      var first_round_input = $("#form_submit .champion");
      for(var i = 0; i < first_round_input.length; i++ ){
        if($(first_round_input[i]).attr("value") == $(this).attr("data-school-id")){
          $(first_round_input[i]).attr("value",0);
          item_champ--;
          $(this).parent().parent().remove();
          var data_school_id = $(this).attr("data-school-id");  
          var second_round_deselect = $("#koushien_second_round").find("[data-school-id='"+data_school_id+"']");
          var third_round_deselect = $("#koushien_third_round").find(".select_button[data-school-id='"+data_school_id+"']");
          var champion_round_deselect = $("#champion").find("[data-school-id='"+data_school_id+"']");
          $(third_round_deselect).attr("data-selected","false").toggleClass("hide");
          $(champion_round_deselect).parent().parent().remove();
          if(champion_round_deselect.length<=0){
            $(champion_section).css("display","none");$(".top-1").css("display","none");
          }
          if(item_champ<=0){
              $(champion_section).css("display","none");
              $(".top-1").css("display","none");
          }
          $("#user_choice_dashboard .total_choices_1").html(item_champ);
          $("#user_choice_dashboard .top-1 p[data-school-id=\""+data_school_id+"\"]").remove();
          break;
        }
      }
    }
  });
//deselect from dashboard---------------------------------------------------
$("#user_choice_dashboard").on("click",".deselect_button",function(){
  var top = $(this).parent().parent().attr("class");
  var data_school_id = $(this).parent().attr("data-school-id");
  switch(top){
    case "top-8":
    $(this).parent().remove();
    var first_round_input = $("#form_submit .first_round");
      for(var i = 0; i < first_round_input.length; i++ ){
        if($(first_round_input[i]).attr("value") == data_school_id){
          $(first_round_input[i]).attr("value",0);
          item_second_selected--;
          $("#koushien_second_round").find(".select_button[data-school-id='"+data_school_id+"']").parent().parent().remove();
          var first_round_deselect = $("#koushien_first_round").find(".select_button[data-school-id='"+data_school_id+"']");
          var third_round_deselect = $("#koushien_third_round").find("[data-school-id='"+data_school_id+"']");
          var champion_round_deselect = $("#champion").find("[data-school-id='"+data_school_id+"']");
          var second_round_form = $("#form_submit").find("[value='"+data_school_id+"']");
          $(second_round_form).attr("value",0);
          $(first_round_deselect).attr("data-selected","false").toggleClass("hide");
          if(item_second_selected<=0){
            $(".confirm_chosen_school").css("display","none");
            $("#user_choice_dashboard").css("display","none");
          }
          if(third_round_deselect.length>0){
            item_third_selected--;
          }
          if(champion_round_deselect.length>0){
            item_champ--;
          }
          if(item_second_selected<=0){
            $(second_section).css("display","none");
          }
          if(item_third_selected<=0){
            $(third_section).css("display","none");
            $(".top-4").css("display","none");
          }
          if(item_champ<=0){
              $(champion_section).css("display","none");
              $(".top-1").css("display","none");
          }
          $("#user_choice_dashboard .total_choices_8").html(item_second_selected);
          $("#user_choice_dashboard .total_choices_4").html(item_third_selected);
          $("#user_choice_dashboard .total_choices_1").html(item_champ);
          $("#user_choice_dashboard p[data-school-id=\""+data_school_id+"\"]").remove();
          $(third_round_deselect).parent().parent().remove();
          $(champion_round_deselect).parent().parent().remove();
          break;
        }
      }
    break;
    case "top-4":
    $(this).parent().remove();
    var first_round_input = $("#form_submit .second_round");
      for(var i = 0; i < first_round_input.length; i++ ){
        if($(first_round_input[i]).attr("value") == data_school_id){
          $(first_round_input[i]).attr("value",0);
          item_third_selected--;
          $("#koushien_third_round").find(".select_button[data-school-id='"+data_school_id+"']").parent().parent().remove(); 
          var second_round_deselect = $("#koushien_second_round").find(".select_button[data-school-id='"+data_school_id+"']");
          var third_round_deselect = $("#koushien_third_round").find("[data-school-id='"+data_school_id+"']");
          var champion_round_deselect = $("#champion").find("[data-school-id='"+data_school_id+"']");
          var second_round_form = $("#form_submit").find("input.champion[value='"+data_school_id+"']");
          $(second_round_form).attr("value",0);
          $(second_round_deselect).attr("data-selected","false").toggleClass("hide");
          $(champion_round_deselect).parent().parent().remove();
          if(champion_round_deselect.length>0){
            item_champ--;
          }
          if(item_third_selected<=0){
            $(champion_section).css("display","none");
            $(third_section).css("display","none");
            $(".top-4").css("display","none");
          }
          if(item_champ<=0){
              $(champion_section).css("display","none");
              $(".top-1").css("display","none");
          }
          $("#user_choice_dashboard .top-4 p[data-school-id=\""+data_school_id+"\"]").remove();
          $("#user_choice_dashboard .top-1 p[data-school-id=\""+data_school_id+"\"]").remove();
          $("#user_choice_dashboard .total_choices_4").html(item_third_selected);
          $("#user_choice_dashboard .total_choices_1").html(item_champ);
          break;
        }
      }
    break;
    case "top-1":
    var first_round_input = $("#form_submit .champion");
      for(var i = 0; i < first_round_input.length; i++ ){
        if($(first_round_input[i]).attr("value") == data_school_id){
          $(first_round_input[i]).attr("value",0);
          item_champ--;
          $("#champion").find(".select_button[data-school-id='"+data_school_id+"']").parent().parent().remove(); 
          var second_round_deselect = $("#koushien_second_round").find("[data-school-id='"+data_school_id+"']");
          var third_round_deselect = $("#koushien_third_round").find(".select_button[data-school-id='"+data_school_id+"']");
          var champion_round_deselect = $("#champion").find("[data-school-id='"+data_school_id+"']");
          $(third_round_deselect).attr("data-selected","false").toggleClass("hide");
          $(champion_round_deselect).parent().parent().remove();
          if(champion_round_deselect.length<=0){
            $(champion_section).css("display","none");$(".top-1").css("display","none");
          }
          if(item_champ<=0){
              $(champion_section).css("display","none");$(".top-1").css("display","none");
              
          }
          $("#user_choice_dashboard .total_choices_1").html(item_champ);
          $("#user_choice_dashboard .top-1 p[data-school-id=\""+data_school_id+"\"]").remove();
          break;
        }
      }
  }
});
//maincarousel--------------------------------------------------------------

  $("#main_slide").carouFredSel({
    width:"100%",
    items : {
      visible : 3,
      width : 1296,
      height : 579,
    },
    direction : "left",
    scroll : {
      items : 1,
      easing : "quadratic",
      duration : 1000,
    },
    prev : ".prev",
    next : ".next"
  }); 
  
if($("body.result")){
  $("#first_round .round_name").css("margin-top",($("#first_round .round_horizontal").outerHeight()/2)-$("#first_round .round_name").outerHeight());
  $("#second_round .round_name").css("margin-top",($("#second_round .round_horizontal").outerHeight()/2)-$("#second_round .round_name").outerHeight());
  $("#third_round .round_name").css("margin-top",($("#third_round .round_horizontal").outerHeight()/2)-$("#third_round .round_name").outerHeight());
  $("#top8_round .round_name").css("margin-top",($("#top8_round .round_horizontal").outerHeight()/2-$("#top8_round .round_name").outerHeight()));
  $("#top4_round .round_name").css("margin-top",($("#top4_round .round_horizontal").outerHeight()/2)-$("top4_round .round_name").outerHeight());
  $("#final_round .round_name").css("margin-top",($("#final_round .round_horizontal").outerHeight()/2)-$("#final_round .round_name").outerHeight());
}

//form submit---------------------------------------------------------------
  $(".confirm_chosen_school").click(function(){
    $("#form_submit").submit();
  });
//video pop up--------------------------------------------------------------
  $(".video_popup").click(function(){
    $("body").append('<div class="video_background close_video"><div class="video_container"><span class="close_button close_video">x</span><iframe width="560" height="315" src="//www.youtube.com/embed/'+$(this).attr("data-video-id")+'" frameborder="0" allowfullscreen></iframe></div></div>');
    if($(this).attr("data-video-desc")){
      $(".video_container").append("<div class=\"video_desc\">"+$(this).attr("data-video-desc")+"</div>");
    }
  });
  $("body").on('click',".close_video",function(e){
    $(this).remove();
  });
});
