
var docURL = document.URL;
    var links = document.querySelectorAll('a[href]');
    for (var i = 0; i< links.length; i++) {
        var link = links[i];
        if (link.href === docURL) {
            link.className += 'current-link';
        }
    }
$(document).ready(function() {

$(".delete").on('click', function() {
  $(".delete").parents('table:first').remove();
});
$("button#clone").click(function(){
        $("div.case").append($("table:first").clone(true));
    });
    $("select").change(function(){
          if($("select").val()==="text")
          {
            $("span#hidden").hide();
            $("tr#answer").show();
          }
          else if ($("select").val()==="multiplechoiceS") {
            $("span#hidden").show();
            $("tr#answer").hide();
          }



    });
});
