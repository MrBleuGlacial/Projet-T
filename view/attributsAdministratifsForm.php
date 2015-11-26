
<label>Numéro de passport :</label>  
<input class="form-control" name="NumPassport" type="text">

<?php
selectInput('Nationalité du passport :','pays','IDNationalitePassport','IDPays','Pays');
?>

<label>Début de la validité du passport :</label>
<input class="form-control" type="date" name="DebutValPassport">

<label>Fin de la validité du passport :</label>
<input class="form-control" type="date" name="FinValPassport">

<label>N° d'étranger</label>
<input class="form-control" type="date" name="NumEtranger">

<label>Numéro de récepissé :</label>  
<input class="form-control" name="NumRecepisse" type="text">

<label>Numéro de recours OFPRA :</label>  
<input class="form-control" name="NumRecoursOFPRA" type="text">

<label>Début de la validité du récepissé :</label>
<input class="form-control" type="date" name="DebutValRecepisse">

<label>Fin de la validité du récepissé :</label>
<input class="form-control" type="date" name="FinValRecepisse">

<!-- -->
<label>Numéro de l'OQTF :</label>  
<input class="form-control" name="NumOQTF" type="text">

<label>Début de la validité de l'OQTF :</label>
<input class="form-control" type="date" name="DebutOQTF">

<label>Fin de la validité de l'OQTF :</label>
<input class="form-control" type="date" name="FinOQTF">
<!-- -->

<label>Numéro de séjour :</label>  
<input class="form-control" name="NumSejour" type="text">

<label>Début de la validité du séjour :</label>
<input class="form-control" type="date" name="DebutValSejour">

<label>Fin de la validité du séjour :</label>
<input class="form-control" type="date" name="FinValSejour">

<label>Carte nationale d'identité :</label>  
<input class="form-control" name="CarteNationale" type="text">

<label>Prestation sociale :</label>  
<input class="form-control" name="PrestationSociale" type="text">

<label>Mode Migration :</label>
<select name="ModeMigration" class="form-control">
	<option value="">Inconnu</option>
	<option value="Air">Air</option>
	<option value="Terre">Terre</option>
	<option value="Mer">Mer</option>
	<option value="Air-Terre">Air-Terre</option>
	<option value="Air-Mer">Air-Mer</option>
	<option value="Terre-Mer">Terre-Mer</option>
	<option value="Air-Terre-Mer">Air-Terre-Mer</option>
</select>

<label>Arrivée en Europe :</label>
<input class="form-control" type="date" name="ArriveeEurope">

<label>Arrivée en France :</label>
<input class="form-control" type="date" name="ArriveeFrance">

<?php  
selectInput('Pays de transit 1 :','pays','IDPaysTransit1','IDPays','Pays');
selectInput('Pays de transit 2 :','pays','IDPaysTransit2','IDPays','Pays');
?>

</br>
<button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-ok"></span> Valider </button>
<button class="btn btn-warning" type="reset"><span class="glyphicon glyphicon-repeat"></span> Reset </button>