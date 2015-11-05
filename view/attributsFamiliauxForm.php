
<!-- Text input-->

<label>Père :</label>  
<input id="Pere" name="Pere" class="form-control" type="text">
  


<!-- Text input-->

<label >Mère :</label>  
<input id="Mere" name="Mere" class="form-control" type="text">


<!-- Select Basic -->

<label>Rupture Parentale :</label>
<select id="RuptureParentale" name="RuptureParentale" class="form-control">
	<option value="non">Non</option>
	<option value="NSP">NSP</option>
	<option value="NR">NR</option>
	<option value="décès">Décès</option>
	<option value="divorce/séparation">Divorce/séparation</option>
</select>
  

<!-- Text input-->

<label>Fratrie :</label>  
<input id="Fratrie" name="Fratrie" class="form-control" type="text">
    


<!-- Text input-->

<label>Position dans la fratrie :</label>  
<input id="PositionFratrie" name="PositionFratrie" class="form-control" type="text">
    


<!-- Select Basic -->

<label>Situation Matrimoniale :</label>
<select id="SituationMatrimoniale" name="SituationMatrimoniale" class="form-control">
	<option value="en couple">En couple</option>
	<option value="marié(e)">Marié(e)</option>
	<option value="célibataire">Célibataire</option>
	<option value="inconnue">Inconnue</option>
	<option value="séparé(e)/divorcé(e)">Séparé(e)/Divorcé(e)</option>
	<option value="veuf/veuve">Veuf/Veuve</option>
</select>
  


<!-- Select Basic -->

<label>Validation de la Source :</label>
<select id="ValidationSource" name="ValidationSource" class="form-control">
	<option value="déclarée">Déclarée</option>
	<option value="inférée">Inférée</option>
	<option value="administrative">Administrative</option>
	<option value="inconnue">Inconnue</option>
</select>
 


<!-- Multiple Radios (inline) -->
<label>Vit en couple :</label>
<div class="form-control">
<label class="radio-inline">
	<input name="VitEnCouple" id="VitEnCouple-0" value="1" type="radio">
	Oui
</label> 
<label class="radio-inline">
	<input name="VitEnCouple" id="VitEnCouple-1" value="0" type="radio">
	Non
</label>
<label class="radio-inline">
	<input name="VitEnCouple" id="VitEnCouple-null" value="" checked="checked" type="radio">
	Inconnu
</label>
</div>

<label>Localisation du couple :</label>
<select name="IDLocalisationCouple" class="form-control">
	<option value= ''>
	Aucune valeur à ajouter
	</option>
	<?php
	$rep = readLocalisation();
	while($donnees = $rep->fetch())
	{
		?>
		<option value= <?php echo '\''. $donnees['IDLocalisation'] . '\''; ?>> 
		    <?php echo $donnees['IDLocalisation'] . ' - ' . $donnees['Pays'] . ' / ' . $donnees['Ville'] . ' / ' . $donnees['Adresse'] . ' / ' .  $donnees['CodePostal'];?>
		</option>
		<?php
	}
	?>
</select>

<!-- Multiple Radios (inline) -->
<label>Est Enceinte :</label>
<div class="form-control">
<label class="radio-inline">
	<input name="Enceinte" id="Enceinte-0" value="0" type="radio">
	Non
</label> 
<label class="radio-inline">
	<input name="Enceinte" id="Enceinte-1" value="1" type="radio">
	Oui
</label> 
<label class="radio-inline">
	<input name="Enceinte" id="Enceinte-null" value="" checked="checked" type="radio">
	Inconnu
</label> 
</div>

</br>
<button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-ok"></span> Valider </button>
<button class="btn btn-warning" type="reset"><span class="glyphicon glyphicon-repeat"></span> Reset </button>