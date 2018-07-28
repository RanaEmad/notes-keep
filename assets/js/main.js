$(document).ready(function(){

  function insert_note(){
      var text=$(".insert_note_text").html();
      var title=$(".insert_note_title").html();
      $.ajax({
          url:base_url+"Notes/insert_note",
          type:"POST",
          data:{"text":text,"title":title},
          success: function(response){
              response= JSON.parse(response);
              if(response.result=="success"){
                reload_notes();
                $("#insert_note").html("Take a note...");
                $("#insert_note").removeClass("expanded");
                $(".insert_note_card").height("auto");
              }
          }
      });
  }

  function reload_notes(){
        $.ajax({
          url: base_url+"Notes/get_notes",
          type: "POST",
          success: function(response){
            response = JSON.parse(response);
            if(response.result=="success"){
              $(".notes").empty();
              var notes_html="";
              var row=0;
              $.each(response.notes, function(i,val){
                row++;
                if(row==1){
                  notes_html +='<div class="row mb_10 mt_10">';
                }
                notes_html +='  <div class="col-sm-3"><div class="card full-height"><div class="card-body"><h5 class="card-title">'+val.title+'</h5><p class="card-text">'+val.text+'</p></div></div></div>';
                if(row==4){
                  notes_html +='</div>';
                  row=0;
                }
              });
              $(".notes").append(notes_html);
            }

          }
        });

  }


  $("body").on("click","#insert_note",function(){
    if(!$(this).hasClass("expanded")){
        $(".insert_note_card").html('<div id="insert_note" class="card-body light_gray expanded" contenteditable="true" data-text="Take a note..."><h5 class="card-title text-muted insert_note_title">Title</h5><div class="insert_note_text"></div><div id="save_note" class="btn btn-info">Save</div></div>');
        $(".insert_note_card").height(300);
        $(".insert_note_text").height(190);
        $("#save_note").attr("contenteditable","false");
      }
    });

  $("body").on("click","#save_note",function(){
      insert_note();
  });

});// end document.ready
