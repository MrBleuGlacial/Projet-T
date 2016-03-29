
<?php
/**
*Formulaires pour les attributs familiaux.
*/
/**
*
*/
	$donnees = readAllTableWhere('attributsFamiliaux','IDPersonneFam = '.$personneTmp)->fetch();
	/*
	?>
	<pre>
	<?php
	print_r($donnees);
	*/
	
	$formMode = 'add';
	if($donnees)
	{
		$formMode = 'mod';
	}
	//echo $formMode;
	
	/*
	?>
	</pre>
	<?php
	*/
?>

<input type='hidden' name='formMode' value=<?php echo '"'.$formMode.'"';?>>

<!-- Text input-->

<label>Père :</label>  
<input id="Pere" name="Pere" class="form-control" type="text"
<?php if($donnees){echo 'value = "'.$donnees['Pere'].'"';}?>
/>
  


<!-- Text input-->

<label>Mère :</label>  
<input id="Mere" name="Mere" class="form-control" type="text"
<?php if($donnees){echo 'value = "'.$donnees['Mere'].'"';}?>
/>


<!-- Select Basic -->

<label>Rupture Parentale :</label>
<select id="RuptureParentale" name="RuptureParentale" class="chzn-select form-control">
	<option value="NR" <?php if($donnees){if($donnees['RuptureParentale']=='NR') echo ' selected';}?> >NR</option>
	<option value="non" <?php if($donnees){if($donnees['RuptureParentale']=='non') echo ' selected';}?>>Non</option>
	<option value="NSP" <?php if($donnees){if($donnees['RuptureParentale']=='NSP') echo ' selected';}?>>NSP</option>
	<option value="décès" <?php if($donnees){if($donnees['RuptureParentale']=='décès') echo ' selected';}?>>Décès</option>
	<option value="divorce/séparation" <?php if($donnees){if($donnees['RuptureParentale']=='divorce/séparation') echo ' selected';}?>>Divorce/séparation</option>
</select>
  

<!-- Text input-->

<label>Fratrie :</label>  
<input id="Fratrie" name="Fratrie" class="form-control" type="text"
<?php if($donnees){echo 'value = "'.$donnees['Fratrie'].'"';}?>
/>
    


<!-- Text input-->

<label>Position dans la fratrie :</label>  
<input id="PositionFratrie" name="PositionFratrie" class="form-control" type="text"
<?php if($donnees){echo 'value = "'.$donnees['PositionFratrie'].'"';}?>
/>
    


<!-- Select Basic -->

<label>Situation Matrimoniale :</label>
<select id="SituationMatrimoniale" name="SituationMatrimoniale" class="chzn-select form-control">
	<option value="inconnue" <?php if($donnees){if($donnees['SituationMatrimoniale']=='inconnue') echo ' selected';}?> >Inconnue</option>
	<option value="en couple" <?php if($donnees){if($donnees['SituationMatrimoniale']=='en couple') echo ' selected';}?>>En couple</option>
	<option value="marié(e)" <?php if($donnees){if($donnees['SituationMatrimoniale']=='marié(e)') echo ' selected';}?>>Marié(e)</option>
	<option value="célibataire" <?php if($donnees){if($donnees['SituationMatrimoniale']=='célibataire') echo ' selected';}?>>Célibataire</option>
	<option value="séparé(e)/divorcé(e)" <?php if($donnees){if($donnees['SituationMatrimoniale']=='séparé(e)/divorcé(e)') echo ' selected';}?>>Séparé(e)/Divorcé(e)</option>
	<option value="veuf/veuve" <?php if($donnees){if($donnees['SituationMatrimoniale']=='veuf/veuve') echo ' selected';}?>>Veuf/Veuve</option>
</select>
  


<!-- Select Basic -->

<label>Validation de la Source :</label>
<select id="ValidationSource" name="ValidationSource" class="chzn-select form-control">
	<option value="inconnue" <?php if($donnees){if($donnees['ValidationSource']=='inconnue') echo ' selected';}?>>Inconnue</option>
	<option value="déclarée" <?php if($donnees){if($donnees['ValidationSource']=='déclarée') echo ' selected';}?>>Déclarée</option>
	<option value="inférée" <?php if($donnees){if($donnees['ValidationSource']=='inférée') echo ' selected';}?>>Inférée</option>
	<option value="administrative" <?php if($donnees){if($donnees['ValidationSource']=='administrative') echo ' selected';}?>>Administrative</option>
</select>
 


<!-- Multiple Radios (inline) -->

<label>Vit en couple :</label>
<div class="form-control">
<label class="radio-inline">
	<input name="VitEnCouple" value="0" type="radio"
	<?php if($donnees){if($donnees['VitEnCouple']==0) echo ' checked';}?>
	>
	Non
</label>
<label class="radio-inline">
	<input name="VitEnCouple" value="1" type="radio"
	<?php if($donnees){if($donnees['VitEnCouple']==1) echo ' checked';}?>
	>
	Oui
</label> 
<label class="radio-inline">
	<input name="VitEnCouple" value="" type="radio"
	<?php if($donnees){if($donnees['VitEnCouple']=="") echo ' checked';}else{echo ' checked';}?>
	>
	Inconnu
</label>
</div>

<label>Localisation du couple :</label>
<select name="IDLocalisationCouple" class="form-control chzn-select">
	<option value= ''>
	Aucune valeur à ajouter
	</option>
	<?php
	$rep = readLocalisation();
	while($donneesLoc = $rep->fetch())
	{
		?>
		<option value= <?php echo '\''. $donneesLoc['IDLocalisation'] . '\'';  if($donnees){if($donnees['IDLocalisationCouple']==$donneesLoc['IDLocalisation']) echo ' selected="selected"';}?>> 
		    <?php echo $donneesLoc['IDLocalisation'] . ' - ' . $donneesLoc['Pays'] . ' / ' . $donneesLoc['Ville'] . ' / ' . $donneesLoc['Adresse'] . ' / ' .  $donneesLoc['CodePostal'];?>
		</option>
		<?php
	}
	?>
</select>

<!-- Multiple Radios (inline) -->
<label>Est Enceinte :</label>
<div class="form-control">
<label class="radio-inline">
	<input name="Enceinte" id="Enceinte-0" value="0" type="radio"
	<?php if($donnees){if($donnees['Enceinte']==0) echo ' checked';}?>
	>
	Non
</label> 
<label class="radio-inline">
	<input name="Enceinte" id="Enceinte-1" value="1" type="radio"
	<?php if($donnees){if($donnees['Enceinte']==1) echo ' checked';}?>
	>
	Oui
</label> 
<label class="radio-inline">
	<input name="Enceinte" id="Enceinte-null" value="" type="radio"
	<?php if($donnees){if($donnees['Enceinte']=="") echo ' checked';}else{echo ' checked';}?>
	>
	Inconnu
</label> 
</div>

<!---  -->
<label>Enfant dans le pays d'origine :</label>
<div class="form-control">
<label class="radio-inline">
	<input name="EnfantPaysOrigine" id="EnfantPaysOrigine-0" value="0" type="radio"
	<?php if($donnees){if($donnees['EnfantPaysOrigine']==0) echo ' checked';}?>
	>
	Non
</label> 
<label class="radio-inline">
	<input name="EnfantPaysOrigine" id="EnfantPaysOrigine-1" value="1" type="radio"
	<?php if($donnees){if($donnees['EnfantPaysOrigine']==1) echo ' checked';}?>
	>
	Oui
</label> 
<label class="radio-inline">
	<input name="EnfantPaysOrigine" id="EnfantPaysOrigine-null" value="" type="radio"
	<?php if($donnees){if($donnees['EnfantPaysOrigine']=="") echo ' checked';}else{echo ' checked';}?>
	>
	Inconnu
</label> 
</div>

<!---  -->
<label>Maison construite au Nigéria :</label>
<div class="form-control">
<label class="radio-inline">
	<input name="MaisonNigeria" value="0" type="radio"
	<?php if($donnees){if($donnees['MaisonNigeria']==0) echo ' checked';}?>
	>
	Non
</label> 
<label class="radio-inline">
	<input name="MaisonNigeria" value="1" type="radio"
	<?php if($donnees){if($donnees['MaisonNigeria']==1) echo ' checked';}?>
	>
	Oui
</label> 
<label class="radio-inline">
	<input name="MaisonNigeria" value="" type="radio"
	<?php if($donnees){if($donnees['MaisonNigeria']=="") echo ' checked';}else{echo ' checked';}?>
	>
	Inconnu
</label> 
</div>


</br>
<button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-ok"></span> Valider </button>
<button class="btn btn-warning" type="reset"><span class="glyphicon glyphicon-repeat"></span> Reset </button>