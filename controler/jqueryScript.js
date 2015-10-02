
	
$(function(){
  //hideMode = getQuerystring('hideModeWrite');
  //if(hideMode==1){
  if($('#hideAndSeek').hasClass('hideMode')){  
    $('#readPanPersonne').attr('class','col-lg-12');
    $('#writePanPersonne').hide(0);
  }
});

/*
$(function(){
  //x = location.href;
  //alert(x);
  //remplaceInUrl(1,2);

});
*/

function hideAndShowReadPan(){

  if($('#hideAndSeek').hasClass('hideMode')){
  //hideMode = getQuerystring('hideModeWrite');
  //if(hideMode==1){

   $('#readPanPersonne').fadeOut(200,function(){
      $('#readPanPersonne').toggleClass('col-lg-9').toggleClass('col-lg-12').fadeIn(200,function(){
        $('#writePanPersonne').show(800);
      })});
    //createCookie('hideModeWrite',0,0);
    document.cookie = 'hideModeWrite=0;'  
  }
  else{
    
    $('#writePanPersonne').hide(800,function(){
      $('#readPanPersonne').fadeOut(200,function(){
        $('#readPanPersonne').toggleClass('col-lg-9').toggleClass('col-lg-12').fadeIn(200);
      });
    });
    document.cookie = 'hideModeWrite=1;' 
    //createCookie('hideModeWrite',1,0);
  }

  $('#hideAndSeek').toggleClass('hideMode');

  // alert($('#readPanPersonne').attr('class'));
};

//------------------------------------------------------

function getQuerystring(key)
{
  if (default_==null) default_="";
  key = key.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
  var regex = new RegExp("[\\?&]"+key+"=([^&#]*)");
  var qs = regex.exec(window.location.href);
  if(qs == null)
    return "undefined";
  else
    return qs[1];
}

/*
function remplaceInUrl(valueToRemplace, newValue)
{
  url = location.href;
  urlRootLess = url.split('?')[1];
  urlArgs = urlRootLess.split('&');
  //alert(urlArgs); .......
}
*/

//var author_value = getQuerystring('author');

/*
$('#calcul').on("click", function() {
	  		alert("Vous avez cliqué sur l'élément d'identifiant #calcul");
		});

$(function() {
  //$('#texteJQ').html('HW GLHF');
    $('#AppearDesappear').fadeOut("slow",function(index,actuel){
      $(this).fadeIn("slow");
    });

function clickDatAlert(){
	$('#AppearDesappear').fadeOut("slow",function(){
    	$(this).fadeIn("slow");
   	});
}
*/