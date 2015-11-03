
<label>Numéro de passport :</label>  
<input class="form-control" name="NumPassport" type="text">

<label>Début de la validité du passport :</label>
<input class="form-control" type="date" name="DebutValPassport" value="aaaa-mm-jj">

<label>Fin de la validité du passport :</label>
<input class="form-control" type="date" name="FinValPassport" value="aaaa-mm-jj">

<label>Numéro de récepissé :</label>  
<input class="form-control" name="NumRecepisse" type="text">

<label>Début de la validité du récepissé :</label>
<input class="form-control" type="date" name="DebutValRecepisse" value="aaaa-mm-jj">

<label>Fin de la validité du récepissé :</label>
<input class="form-control" type="date" name="FinValRecepisse" value="aaaa-mm-jj">

<label>Numéro de séjour :</label>  
<input class="form-control" name="NumSejour" type="text">

<label>Début de la validité du séjour :</label>
<input class="form-control" type="date" name="DebutValSejour" value="aaaa-mm-jj">

<label>Fin de la validité du séjour :</label>
<input class="form-control" type="date" name="FinValSejour" value="aaaa-mm-jj">

<label>Prestation sociale :</label>  
<input class="form-control" name="PrestationSociale" type="text">

<label>Mode Migration :</label>
<select name="ModeMigration" class="form-control">
	<option value="Air">Air</option>
	<option value="Terre">Terre</option>
	<option value="Mer">Mer</option>
	<option value="Air-Terre">Air-Terre</option>
	<option value="Air-Mer">Air-Mer</option>
	<option value="Terre-Mer">Terre-Mer</option>
	<option value="Air-Terre-Mer">Air-Terre-Mer</option>
</select>

<label>Arrivée en Europe :</label>
<input class="form-control" type="date" name="ArriveeEurope" value="aaaa-mm-jj">

<label>Arrivée en France :</label>
<input class="form-control" type="date" name="ArriveeFrance" value="aaaa-mm-jj">

<?php  
selectInput('Pays de transit 1 :','pays','IDPaysTransit1','IDPays','Pays');
selectInput('Pays de transit 2 :','pays','IDPaysTransit2','IDPays','Pays');
?>

</br>
<button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-ok"></span> Valider </button>
<button class="btn btn-warning" type="reset"><span class="glyphicon glyphicon-repeat"></span> Reset </button>