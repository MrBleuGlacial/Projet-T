
	
$(function(){
  //hideMode = getQuerystring('hideModeWrite');
  //if(hideMode==1){
  if($('#hideAndSeek').hasClass('hideMode')){  
    $('#readPanPersonne').attr('class','col-lg-12');
    $('#writePanPersonne').hide(0);
  }
});


$(document).ready(function(){
    $('#tabPersonne').DataTable(
    {
      rowReorder: {
        selector: 'tr'
      },
      columnDefs: [
        { targets: 0, visible: false }
      ],
      colReorder:true
    }
    );
});


//-------------------------------
/*
$(function(){
  i = 0
  j = 38
  for(; i <= j; ++i)
    $('td:nth-child('+i+'),th:nth-child('+i+')').hide();
});
*/
/*
$(function(){
  var table = $('#tabPersonne').DataTable();
  var i = 0;
  var j = 0;
  for ( ; i < j; i++) {
      table.column(i).visible(false, false);
  }
  table.columns.adjust().draw( false); // adjust column sizing and redraw
});
*/
function showSelectedElements(type){
  var table = $('#tabPersonne').DataTable();
  var tabLength = 40;
  var start = 4; 
  var end = tabLength;
  switch(type){
    case 'identifiant':
      start = 4;
      end = 16;
      break;
    case 'attributsFam':
      start = 18;
      end = 26;
      break;
    case 'attributsAdm':
      start = 27;
      end = 41;
      break;
  }
  //alert('start :'+start+' end :'+end);
  for(var i = 0; i < tabLength; i++){
    if((start <= i) && (i <= end))
      table.column(i).visible(true, true);
    else
      table.column(i).visible(false, false);
  }
}


//$('td:nth-child(2),th:nth-child(2)').hide();
/*

function showAttFamTabPersonneMain(){
  $('.identifiantTab').hide(0);
  $('.attributsAdmTab').hide(0);
  $('.attributsFamTab').show(0);
};

function showAttAdmTabPersonneMain(){
  $('.identifiantTab').hide(0);
  $('.attributsFamTab').hide(0);
  $('.attributsAdmTab').show(0);
};

function showIdentifiantTabPersonneMain(){
  $('.attributsAdmTab').hide(0);
  $('.attributsFamTab').hide(0);
  $('.identifiantTab').show(0);
};

function showAllTabPersonneMain(){
  $('.attributsAdmTab').show(0);
  $('.attributsFamTab').show(0);
  $('.identifiantTab').show(0);
};
*/
//-------------------------------


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