




$(document).ready(function() {

  var docURL = document.URL;
      var links = document.querySelectorAll('a[href]');
      for (var i = 0; i< links.length; i++) {
          var link = links[i];
          if (link.href === docURL) {
              link.className += 'current-link';
          }
      }


      var i=0,j=1,k=1,choice=[];
      var btn='<button class="hiden btn btn-info btn-sm AddChoice" id="1" >Add Choice</button>';
      var template=$("div.idtxt").first().clone();
      i++;
      template.attr('id',i);
      template.css('display','block');
      template.find('select').attr('id',i);
      template.find('div.answer').attr('id',i);
      template.find('input[name=answer'+1+'\\[\\]]').attr('name','answer'+i+'[]');
      $('div#Questions').append(template.clone());

  /////          ADD Question

      $("#idbtn").on('click',function(){
        i++;
        template.attr('id',i);
        template.find('select').attr('id',i);
        template.find('div.answer').attr('id',i);
        template.find('input[name=answer'+(i-1)+'\\[\\]]').attr('name','answer'+i+'[]');

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
          $(addM(ida)).insertBefore('button#'+ida+'.hiden');
        }
        e.preventDefault();
      });


/////             Delete Choice

      $(document).on('click', "button.choiceDelete", function(e){
        $(this).parent().remove();
        e.preventDefault();
      });

      var multiple='<div class="choice1"><label for="">Choice : </label> <input type="text" name="answer'+1+'[]" placeholder="Enter Choice "><input type="checkbox" value="1" name="multiple1[]">Correct?</input><button type="button" class="choiceDelete" name="button">Delete</button></div>';
      var single='<div class="choice1"><label for="">Choice : </label> <input type="text" name="answer1[]" placeholder="Enter Choice..."><input type="radio" value="1" name="1">Correct?</input><button type="button" class="choiceDelete"  name="button">Delete</button></div>';
      var text='<label for="answer">Answer : </label><input type="text" name="answer1[]" placeholder="Enter Answer....">';

/////        ADD Choices function

      function addM(ida){
        j++;
        choice[ida]++;
        return multiple.replace('class="choice1"','class="choice'+choice[ida]+'"').replace('name="multiple'+1+'[]"','name="multiple'+ida+'[]"').replace('value="1"','value="'+choice[ida]+'"').replace('name="answer'+1+'[]"','name="answer'+ida+'[]"');
      }

      function addS(ida){
        k++;
        return single.replace('class="choice1"','class="choice'+k+'"').replace('value="1"','value="'+k+'"').replace('name="answer'+1+'[]"','name="answer'+ida+'[]"').replace('name="1"','name="single'+ida+'"');
      }


/////          Change Select Option

      $(document).on('change','.dropdown-menu-right',function(){
              var ida=$(this).attr('id');

              if($(this).val()==="text"){
                $('button.hiden').hide();
                text.replace('name="answer'+(ida-1)+'[]"','name="answer'+ida+'[]"');

                $('div#'+ida+'.answer').html(text);
              }
              else if ($(this).val()==="multiplechoiceS"){
                  $('div#'+ida+'.answer').html(addS(ida) + addS(ida) + addS(ida)).append(btn);
                  $('button.hiden').show();
              }
              else if ($(this).val()==="multiplechoiceM"){
                  choice[ida] = choice[ida] || 0;

                  $('div#'+ida+'.answer').html(addM(ida) + addM(ida) + addM(ida)).append(btn);
                  $('button.hiden').show();
             }
             $(this).parentsUntil('div#'+ida).parent().find('button.hiden').attr('id',ida);

    });
});
