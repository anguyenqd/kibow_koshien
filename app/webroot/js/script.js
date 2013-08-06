/**
 * @author Viet Duc Phan
 */
$(document).ready(function(){
  var hover_schools = $('#koushien_first_round .school .school_uniform');
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
      $(".hover").append("<img class=\"map_image\" width=\"172\" src=\""+map_url+"\" />").css("display","block").css("top",element_position.top-element_height+90).css("left",element_position.left);
    },
    function(){//out
      $(this).animate({opacity:1},70);
      $(".hover .map_image").remove();
      $(".hover").css("display","none");
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
        if(item_second_selected>0){
          $(".confirm_chosen_school").css("display","block");
        }
      }
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
        var second_round_input = $("#form_submit .second_round");
        for(var i = 0; i < second_round_input.length; i++ ){
          if($(second_round_input[i]).attr("value") == 0){
            $(second_round_input[i]).attr("value",second_round_selected);
            item_third_selected++;
            if(item_third_selected>0){
              $(third_section).css("display","block");
            }
            break;
          }
        }
        $(this).attr("data-selected","true").toggleClass("hide");
      }
    }
  });
  //select champ
  $(third_section).on('click',".school .school_uniform .select_button",function(e){
    if(item_champ < 1){
      if($(this).attr("data-selected") == "false"){
        $(this).css("opacity",1);
        $(this).parent().parent().clone().appendTo(champion_selected);
        var third_round_selected = $(this).attr("data-school-id");
        var third_round_input = $("#form_submit .champion");
        for(var i = 0; i < third_round_input.length; i++ ){
          if($(third_round_input[i]).attr("value") == 0){
            $(third_round_input[i]).attr("value",third_round_selected);
            item_champ++;
            if(item_champ>0){
              $(champion_section).css("display","block");
            }
            break;
          }
        }
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
          }
          if(item_champ<=0){
              $(champion_section).css("display","none");
          }
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
          }
          if(item_champ<=0){
              $(champion_section).css("display","none");
          }
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
            $(champion_section).css("display","none");
          }
          if(item_champ<=0){
              $(champion_section).css("display","none");
          }
          break;
        }
      }
    }
  });
//form submit---------------------------------------------------------------
  $(".confirm_chosen_school").click(function(){
    $("#form_submit").submit();
  });
//video pop up--------------------------------------------------------------
  $(".video_button").click(function(){
    $("body").append('<div class="video_background close_video"><div class="video_container"><span class="close_button close_video">x</span><iframe width="560" height="315" src="//www.youtube.com/embed/'+$(this).attr("data-video-id")+'" frameborder="0" allowfullscreen></iframe></div></div>')
  });
  $("body").on('click',".close_video",function(e){
    $(this).remove();
  });
});
