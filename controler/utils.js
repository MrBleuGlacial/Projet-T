
function openPopUp(){
        window.open('../view/popUp.php','_blank','height=850,width=1200,top=100,left=100,menubar=0,toolbar=0,scrollbars=1');
}

function refreshPopUp(value){
	url = '../view/popUp.php'+'?mode='+value;
	window.open(url,'_self','menubar=0,toolbar=0');
}

function colourize()
{
	var dnl = document.getElementsByTagName("tr");
	for(i = 0; i < dnl.length; i++)
	{
		if((Math.round(i / 2) * 2) == ((i / 2) * 2) )
		dnl.item(i).style.background="#E6E6E6";
	}
}

function functest(){
    var testP = document.getElementById("test");

    testP.innerHTML +=  document.getElementById("tabPersonneMain").rows[2].cells[3].innerHTML;

    /*
    var arrayLignes = document.getElementById("tabPersonneMain").rows;
    var longueur = arrayLignes.length;
    for(var i=0; i<longueur; i++)
    {
        var arrayColonnes = arrayLignes[i].cells;
        var largeur = arrayColonnes.length;
        for(var j=0; j<largeur; j++){
            testP.innerHTML += arrayColonnes.innerHTML;
        }           
    }   
    */ 
    //window.alert("Done");
}

function switchModeP(urlValue,modeReadValue,modeWriteValue,subModeValue,IDPersonneMode){
	url = urlValue + '?modeRead='+modeReadValue+'&modeWrite='+modeWriteValue+'&subMode='+subModeValue+'&IDPersonneMode='+IDPersonneMode;
	window.open(url,'_self');
}

function switchModeR(urlValue,modeReadValue,modeWriteValue,subModeValue,IDPersonneMode){
	url = urlValue + '?relationView=1&modeRead='+modeReadValue+'&modeWrite='+modeWriteValue+'&subMode='+subModeValue+'&IDPersonneMode='+IDPersonneMode;
	window.open(url,'_self');
}

function switchModeG(urlValue,modeReadValue,modeWriteValue,subModeValue,IDPersonneMode){
	url = urlValue + '?geoView=1&modeRead='+modeReadValue+'&modeWrite='+modeWriteValue+'&subMode='+subModeValue+'&IDPersonneMode='+IDPersonneMode;
	window.open(url,'_self');
}

function createCookie(name,value,days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}

function eraseCookie(name) {
	createCookie(name,"",-1);
}

//------------------------------------------------------

/*
function createCookie(name,value,days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}

function eraseCookie(name) {
	createCookie(name,"",-1);
}
*/



/*
function cacheMontre(id) {
	x=document.getElementById(id);
	if (x.style.display=="none") 
		{x.style.display="block"; }     
	else 
		{x.style.display="none";}
}

function selectModeOnOff(id1,id2){
	x=document.getElementById(id1);
	y=document.getElementById(id2);
	y.style.display="none";
	x.style.display="block";
}
*/

//window.onload = colourize;