/**
*Ensemble des fonctions relatives au jquery.
*/

//Ajoute un champ de saisie dans les input proposant plusieurs valeurs.
$(function(){
    $(".chzn-select").chosen(
      {
        placeholder_text_single: 'Choisissez une option',
        search_contains: true,
        no_results_text: "Aucun résultat trouvé.</br>S'il s'agit d'une donnée de fond, veuillez la créer préalablement puis actualiser la page.</br>Idem pour une personne ou une relation.</br></br>"
      }
    );
});

//Gère la fonction de suppression des boutons Supprimer
$(document).ready(function(){
  $('#deleteSubmit').click(function(){
    alert('Donnée supprimée.');
    $('#deleteValue').val(1);
    $('#formAddModDel').submit();         
  });
});

//Gère la fonction de tri et de parsage des tableaux
$(document).ready(function(){
    $('.readTab').DataTable(
    {
      /*rowReorder: {
        selector: 'tr'
      },*/
      columnDefs: [
        { targets: 0, visible: false }
      ],
      colReorder:true
    }
    );
});

//Gère le bouton de retour en haut de page
$(function(){
  $.scrollUp(
    {
      scrollText: '',
      topDistance: '200',
      animation: 'slide'
    });
});

//Gère le coulissage du panneau d'écriture	
$(function(){
  //hideMode = getQuerystring('hideModeWrite');
  //if(hideMode==1){
  if($('#hideAndSeek').hasClass('hideMode')){  
    $('#readPan').attr('class','col-lg-12');
    $('#writePan').hide(0);
  }
});
/*
$(function(){
  $('#scrollUp').addClass('glyphicon glyphicon-arrow-up');
});
*/

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

//Gère la fonction de tri du tableau (attibuts adm seulment, attribus fam seulement, etc.)
function showSelectedElements(type){
  var table = $('#tabPersonne').DataTable();
  var tabLength = 56;
  var start = 4; 
  var end = tabLength;
  switch(type){
    case 'identifiant':
      end = 23;
      break;
    case 'attributsFam':
      start = 24;
      end = 35;
      break;
    case 'attributsAdm':
      start = 36;
      end = tabLength;
      break;
  }
  //alert('start :'+start+' end :'+end);
  for(var i = 4; i <= tabLength; i++){
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

//Gère le bouton de contrôle du coulissage du panneau d'écriture  
function hideAndShowReadPan(){

  if($('#hideAndSeek').hasClass('hideMode')){
  //hideMode = getQuerystring('hideModeWrite');
  //if(hideMode==1){

   $('#readPan').fadeOut(200,function(){
      $('#readPan').toggleClass('col-lg-9').toggleClass('col-lg-12').fadeIn(200,function(){
        $('#writePan').show(800);
      })});
    //createCookie('hideModeWrite',0,0);
    document.cookie = 'hideModeWrite=0;'  
  }
  else{
    
    $('#writePan').hide(800,function(){
      $('#readPan').fadeOut(200,function(){
        $('#readPan').toggleClass('col-lg-9').toggleClass('col-lg-12').fadeIn(200);
      });
    });
    document.cookie = 'hideModeWrite=1;' 
    //createCookie('hideModeWrite',1,0);
  }

  $('#hideAndSeek').toggleClass('hideMode');

  // alert($('#readPanPersonne').attr('class'));
};

//------------------------------------------------------

//recupère les arguments en GET sous forme de tableau, n'est logiquement plus utilisée
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