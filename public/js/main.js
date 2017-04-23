
var docURL = document.URL;
    var links = document.querySelectorAll('a[href]');
    for (var i = 0; i< links.length; i++) {
        var link = links[i];
        if (link.href === docURL) {
            link.className += 'current-link';
        }
    }






$(document).ready(function() {
      var i=1,j=1,k=1;
      var btn='<button class="hiden btn btn-info btn-sm AddChoice" id="1" >Add Choice</button>';
      var template=$("div.idtxt").first().clone();

  /////          ADD Question

      $("#idbtn").on('click',function(){
        i++;
        template.attr('id',i);
        template.find('select').attr('id',i);
        template.find('div.answer').attr('id',i);
        $('div#Questions').append(template.clone());
    });

      $(document).on('change','radio',function(){
          if ($(this).prop('checked')) {
              $(this).prop('checked', true);
          }
          else{
          $(this).prop('checked', false);
          }
      });

//////            Delete Questions

      $(document).on('click', "button.delete", function(e){
        $(this).parentsUntil('div.idtxt').parent().remove();
        e.preventDefault();
      });

///                  Button  ADD CHOICE

      $(document).on('click', "button.AddChoice", function(e){
        var ida=$(this).parent().attr('id');
        if($('select#'+ida+'.dropdown-menu-right').val()===('multiplechoiceS')){
            $(addS()).insertBefore('button#'+ida+'.hiden');
        }
        else {
          $(addM()).insertBefore('button#'+ida+'.hiden');
        }
        e.preventDefault();
      });


/////             Delete Choice

      $(document).on('click', "button.choiceDelete", function(e){
        $(this).parent().remove();
        e.preventDefault();
      });

      var multiple='<div class="choice1"><label for="">Choice : </label> <input type="text" name="answer[]" placeholder="Enter Choice "><input type="radio" val="1" name="1">Correct?</input><button type="button" class="choiceDelete" name="button">Delete</button></div>';
      var single='<div class="choice1"><label for="">Choice : </label> <input type="text" name="answer[]" placeholder="Enter Choice..."><input type="radio" val="1" name="1">Correct?</input><button type="button" class="choiceDelete"  name="button">Delete</button></div>';
      var text='<label for="answer">Answer : </label><input type="text" name="answer[]" placeholder="Enter Answer....">';

/////        ADD Choices function

      function addM(){
        j++;
        return multiple.replace('class="choice1"','class="choice'+j+'"').replace('name="1"','name="'+j+'"').replace('val="1"','val="'+j+'"');
      }

      function addS(){
        k++;
        return multiple.replace('class="choice1"','class="choice'+k+'"').replace('val="1"','val="'+k+'"');
      }


/////          Change Select Option

      $(document).on('change','.dropdown-menu-right',function(){
              var ida=$(this).attr('id');

              if($(this).val()==="text"){
                $('button.hiden').hide();
                $('div#'+ida+'.answer').html(text);
              }
              else if ($(this).val()==="multiplechoiceS"){
                  $('div#'+ida+'.answer').html(multiple + addS() + addS()).append(btn);
                  $('button.hiden').show();
              }
              else if ($(this).val()==="multiplechoiceM"){
                  $('div#'+ida+'.answer').html(multiple + addM() + addM()).append(btn);
                  $('button.hiden').show();
             }
             $(this).parentsUntil('div#'+ida).parent().find('button.hiden').attr('id',ida);

    });
});
