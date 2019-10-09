/*** 
Using AJAX to get the contents of whichever post is clicked
on the post-list page
****************************************************************/
function getPage(str)
{
if (str=="")
  {
  document.getElementById("postBody").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("postBody").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getpage.php?q="+str,true);
xmlhttp.send();
}





/*** 
Alert box when deleting a Post
****************************************************************/
function deletePost(str)
{
 var checkDelete= confirm("Sure?");
 if (checkDelete== true)
 {
   window.location="post/delete.php?id="+str;
 }
 else {}
}





/*** 
Alert box when deleting a Page
****************************************************************/
function deletePage(str)
{
 var checkDelete= confirm("Sure?");
 if (checkDelete== true)
 {
   window.location="delete.php?id="+str;
 }
 else {}
}





/*** 
Fluid Edit Page textarea Height
****************************************************************/
$(function() {
    $('.post-md textarea').flexible();
});




/*** 
Slide Up Success Message After 3 Seconds
****************************************************************/
setTimeout(function() {
    $('.message').slideUp('600');
}, 3000);




/*** 
Render Edit Title as Live Title and Edit Slug as Slug to be Saved
****************************************************************/
$(function() {
    $('.post-content form').append('<input type="hidden" id="newTitle" name="newTitle" />'); // Create a hidden field in the form to hold new title to be saved
    $('.post-content form').append('<input type="hidden" id="newSlug" name="newSlug" />'); // Create a hidden field in the form to hold new slug to be saved
    $('#newTitle').val($('.edit-title').val()); //Set initial content
    $('.html-title').html($('.edit-title').val()); //Set initial content
    $('#newSlug').val($('.edit-slug').val()); //Set initial content

    $('.edit-title').keypress(function() { // Mirror content changes
        $('.html-title').html($(this).val());
        $('#newTitle').val($(this).val());
    });

    $('.edit-slug').keypress(function() { // Mirror content changes
        $('#newSlug').val($(this).val());
    });
});




/*** 
Hidden Fields for Saving New Data
****************************************************************/
$(function() {
    $('.post-content form').append('<textarea class="hidden" id="newMd" name="newMd" />');
    $('.post-content form').append('<textarea class="hidden" id="newHtml" name="newHtml" />');
});





/*** 
Render Edit Page Markdown as HTML
****************************************************************/
$(function() {
    var $textarea = $('textarea'),
    converter = new Showdown.converter();
    $textarea.keyup(function() {
        $('#newMd').html($textarea.val()); // Put new Markdown in a hidden field for form processing
        $('#newHtml').html(converter.makeHtml($textarea.val())); // Put new HTML in a hidden field for form processing
        $('.post-html').html(converter.makeHtml($textarea.val())); // Display new HTML to user
    }).trigger('keyup');
});





/*** 
Pikaday Date Picker
****************************************************************/
$('.edit-date').pikaday({
    firstDay:1,
    format: 'DD-MM-YYYY'
});