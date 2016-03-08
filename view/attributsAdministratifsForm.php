<?php

	$donnees = readAllTableWhere('attributsAdministratifs','IDPersonneAdm = '.$personneTmp)->fetch();
	/*
	?>
	<pre>
	<?php
	print_r($donnees);
	if(!$donnees)
		echo 'CEST NULL CEST OK';
	?>
	</pre>
	<?php
	*/

	$formMode = 'add';
	if($donnees)
	{
		$formMode = 'mod';
	}
	//echo $formMode;
?>

<input type='hidden' name='formMode' value=<?php echo '"'.$formMode.'"';?>>

<label>N° d'étranger</label>
<input class="form-control" type="date" name="NumEtranger"
<?php if($donnees){echo 'value = "'.$donnees['NumEtranger'].'"';}?>
>

<label>Numéro de récepissé :</label>  
<input class="form-control" name="NumRecepisse" type="text"
<?php if($donnees){echo 'value = "'.$donnees['NumRecepisse'].'"';}?>
>

<label>Numéro de recours OFPRA :</label>  
<input class="form-control" name="NumRecoursOFPRA" type="text"
<?php if($donnees){echo 'value = "'.$donnees['NumRecoursOFPRA'].'"';}?>
>

<label>Début de la validité du récepissé :</label>
<input class="form-control" type="date" name="DebutValRecepisse"
<?php if($donnees){echo 'value = "'.$donnees['DebutValRecepisse'].'"';}?>
>

<label>Fin de la validité du récepissé :</label>
<input class="form-control" type="date" name="FinValRecepisse"
<?php if($donnees){echo 'value = "'.$donnees['FinValRecepisse'].'"';}?>
>

<!-- -->
<label>Numéro de l'OQTF :</label>  
<input class="form-control" name="NumOQTF" type="text"
<?php if($donnees){echo 'value = "'.$donnees['NumOQTF'].'"';}?>
>

<label>Début de la validité de l'OQTF :</label>
<input class="form-control" type="date" name="DebutOQTF"
<?php if($donnees){echo 'value = "'.$donnees['DebutOQTF'].'"';}?>
>

<label>Fin de la validité de l'OQTF :</label>
<input class="form-control" type="date" name="FinOQTF"
<?php if($donnees){echo 'value = "'.$donnees['FinOQTF'].'"';}?>
>
<!-- -->

<label>Numéro de séjour :</label>  
<input class="form-control" name="NumSejour" type="text"
<?php if($donnees){echo 'value = "'.$donnees['NumSejour'].'"';}?>
>

<label>Début de la validité du séjour :</label>
<input class="form-control" type="date" name="DebutValSejour"
<?php if($donnees){echo 'value = "'.$donnees['DebutValSejour'].'"';}?>
>

<label>Fin de la validité du séjour :</label>
<input class="form-control" type="date" name="FinValSejour"
<?php if($donnees){echo 'value = "'.$donnees['FinValSejour'].'"';}?>
>

<label>Carte nationale d'identité :</label>  
<input class="form-control" name="CarteNationale" type="text"
<?php if($donnees){echo 'value = "'.$donnees['CarteNationale'].'"';}?>
>

<label>Prestation sociale :</label>  
<input class="form-control" name="PrestationSociale" type="text"
<?php if($donnees){echo 'value = "'.$donnees['PrestationSociale'].'"';}?>
>

<label>Mode Migration :</label>
<select name="ModeMigration" class="form-control chzn-select">
	<option value="" <?php if($donnees){if($donnees['ModeMigration']=='') echo ' selected';}?> >Inconnu</option>
	<option value="Air" <?php if($donnees){if($donnees['ModeMigration']=='Air') echo ' selected';}?> >Air</option>
	<option value="Terre" <?php if($donnees){if($donnees['ModeMigration']=='Terre') echo ' selected';}?> >Terre</option>
	<option value="Mer" <?php if($donnees){if($donnees['ModeMigration']=='Mer') echo ' selected';}?> >Mer</option>
	<option value="Air-Terre" <?php if($donnees){if($donnees['ModeMigration']=='Air-Terre') echo ' selected';}?> >Air-Terre</option>
	<option value="Air-Mer" <?php if($donnees){if($donnees['ModeMigration']=='Air-Mer') echo ' selected';}?> >Air-Mer</option>
	<option value="Terre-Mer" <?php if($donnees){if($donnees['ModeMigration']=='Terre-Mer') echo ' selected';}?> >Terre-Mer</option>
	<option value="Air-Terre-Mer" <?php if($donnees){if($donnees['ModeMigration']=='Air-Terre-Mer') echo ' selected';}?> >Air-Terre-Mer</option>
</select>

<label>Arrivée en Europe :</label>
<input class="form-control" type="date" name="ArriveeEurope"
<?php if($donnees){echo 'value = "'.$donnees['ArriveeEurope'].'"';}?>
>

<label>Arrivée en Europe Approximation :</label>
<input class="form-control" type="text" name="ArriveeEuropeApx"
<?php if($donnees){echo 'value = "'.$donnees['ArriveeEuropeApx'].'"';}?>
>

<label>Arrivée en France :</label>
<input class="form-control" type="date" name="ArriveeFrance"
<?php if($donnees){echo 'value = "'.$donnees['ArriveeFrance'].'"';}?>
>

<label>Arrivée en France Approximation :</label>
<input class="form-control" type="text" name="ArriveeFranceApx"
<?php if($donnees){echo 'value = "'.$donnees['ArriveeFranceApx'].'"';}?>
>

<?php  
selectInput('Pays de transit 1 :','pays','IDPaysTransit1','IDPays','Pays',true,true,$donnees['IDPaysTransit1']);
selectInput('Pays de transit 2 :','pays','IDPaysTransit2','IDPays','Pays',true,true,$donnees['IDPaysTransit2']);
?>
</br>
</br>
<button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-ok"></span> Valider </button>
<button class="btn btn-warning" type="reset"><span class="glyphicon glyphicon-repeat"></span> Reset </button>