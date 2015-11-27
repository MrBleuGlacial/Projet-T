
 <?php 
    $url = './index.php?relationView=1&IDPersonneMode='.$IDPersonneMode.'&attributsMode='.$attributsMode.'&modeWrite='.$modeWrite.'&subMode='.$subMode.'&modeRead=';
    $varSubMode = $modeRead;
    if($varSubMode == 'main')
        $varSubMode = 'général';
    if($varSubMode == '' OR $varSubMode == 'undefined')
        $varSubMode = 'Veuillez choisir une valeur'; //Sélectionnez une valeur
    else
        $varSubMode = 'Actuel : '.$varSubMode;
?>

<select class="btn btn-primary btn-xs" onchange="location = this.options[this.selectedIndex].value;">
    <option value= <?php echo '\''. $url . ''.'\'';?>><?php echo $varSubMode; ?></option>
    <option value= <?php echo '\''. $url . 'main'.'\'';?>>Général</option>
    <option value= <?php echo '\''. $url . 'financier'.'\'';?>>Financier</option>
    <option value= <?php echo '\''. $url . 'sang'.'\'';?>>Sang</option>
    <option value= <?php echo '\''. $url . 'sexuel'.'\'';?>>Sexuel</option>
    <option value= <?php echo '\''. $url . 'réseau'.'\'';?>>Réseau</option>
    <option value= <?php echo '\''. $url . 'connaissance'.'\'';?>>Connaissance</option>
    <option value= <?php echo '\''. $url . 'juju'.'\'';?>>Juju</option>
    <option value= <?php echo '\''. $url . 'soutien'.'\'';?>>Soutien</option>
</select></br></br>



<?php
if(isset($_GET['modeRead'])){
$i = 0;
?>
<table class="table table-bordered table-striped readTab" id="tabRelation">
<caption></caption>
    <thead>
        <tr class="info">
            <!-- PARTIE IDENTIFIANT-->
        	<th>Numéro</th>
        	<th>ID</th>
            <th>Ego</th>
        	<th>Alter</th>

<?php
//---------------------------------------------------------------------------------------
if(isset($_GET['modeRead']) AND $_GET['modeRead']=='main'){
?>
        	<th>Cotes liées</th>
            <th>Trace du lien</th>
        	<th>Type du lien</th>
        	<th>Contexte Socio Geo</th>
        </tr>
    </thead>
    <?php
	$rep = readRelationMain();
    while($donnees = $rep->fetch())
    {
    ?>
    <tr>
    	<th><?php $i++; echo $i;?></th>
    	<th><?php echo $donnees['IDRelation'].':'; ?></th>
    	<th><?php echo $donnees['NomEgo'].' '.$donnees['PrenomEgo'].' '.'('.$donnees['IDDossierEgo'].'-'.$donnees['IDEgo'].')'; ?></th>
    	<th><?php echo $donnees['NomAlter'].' '.$donnees['PrenomAlter'].' ('.$donnees['IDDossierAlter'].'-'.$donnees['IDAlter'].')'; ?></th>
    	
        <th><?php 
        echo $donnees['NomCoteInitiale']; 
        $rep2=readRelationAndSourceAssociation($donnees['IDRelation']);
        $donnees2 = $rep2->fetchAll();
        /*?>
        <pre>
            <?php
        print_r($donnees2);
            ?>
        </pre>
        <?php
        */
        $nmbrCote = count($donnees2);
        for($i = 0; $i < $nmbrCote; $i++){
            echo ', '.$donnees2[$i][0];
        }
        ?></th>
        <th><?php echo $donnees['TraceLienDossier']; ?></th>
    	<th><?php echo $donnees['TypeLien']; ?></th>
    	<th><?php echo $donnees['ContexteSocioGeo']; ?></th>
    </tr>
    <?php    
	}
}
//---------------------------------------------------------------------------------------
if(isset($_GET['modeRead']) AND $_GET['modeRead']=='financier'){
?>
			<th>Action en contrepartie</th>
			<th>Date du flux</th>
            <th>Date du flux approximation</th>
			<th>Fréquence</th>
			<th>Montant en euro</th>
			<th>Modalité 1</th>
			<th>Modalité 2</th>
			<th>Intermédiaire 1</th>
			<th>Intermédiaire 2</th>
			<th>Localisation Ego</th>
			<th>Localisation Alter</th>
			<th>Présence d'un intermédiaire</th>
			<th>Identifiant du flux</th>
			<th>Action du flux</th>
		</tr>
	</thead>
	<?php
	$rep = readLienFinancier();
	while($donnees2 = $rep->fetch())
	{
		?>
		<tr>
    		<th><?php $i++; echo $i;?></th>
    		<th><?php echo $donnees2['IDRelation'].':'; ?></th>
    		<th><?php echo $donnees2['NomEgo'].' '.$donnees2['PrenomEgo'].' '.'('.$donnees2['IDDossierEgo'].'-'.$donnees2['IDEgo'].')'; ?></th>
    		<th><?php echo $donnees2['NomAlter'].' '.$donnees2['PrenomAlter'].' ('.$donnees2['IDDossierAlter'].'-'.$donnees2['IDAlter'].')'; ?></th>
    		<th><?php echo $donnees2['ActionEnContrepartie']; ?></th>
    		<th><?php echo $donnees2['DateFlux']; ?></th>
            <th><?php echo $donnees2['DateFluxApx']; ?></th>
    		<th><?php echo $donnees2['Frequence']; ?></th>
    		<th><?php echo $donnees2['MontantEuro']; ?></th>
    		<th><?php echo $donnees2['Modalite1']; ?></th>
    		<th><?php echo $donnees2['Modalite2']; ?></th>
    		<th><?php echo $donnees2['NomIntermediaire1'].' '.$donnees2['PrenomIntermediaire1'].' ('.$donnees2['IDIntermediaire'].')'; ?></th>
    		<th><?php echo $donnees2['NomIntermediaire2'].' '.$donnees2['PrenomIntermediaire2'].' ('.$donnees2['IDIntermediaire2'].')'; ?></th>
    		<th><?php echo $donnees2['IDLocalisationEgo'].' - '.$donnees2['PaysEgo'].' / '.$donnees2['VilleEgo'].' / '.$donnees2['AdresseEgo'].' / '.$donnees2['CodePostalEgo']; ?></th>
    		<th><?php echo $donnees2['IDLocalisationAlter'].' - '.$donnees2['PaysAlter'].' / '.$donnees2['VilleAlter'].' / '.$donnees2['AdresseAlter'].' / '.$donnees2['CodePostalAlter']; ?></th>
    		<th><?php echo $donnees2['Intermediaire']; ?></th>
    		<th><?php echo $donnees2['IDFlux'].'#'; ?></th>
    		<th><?php echo $donnees2['ActionDuFlux']; ?></th>
    	</tr>
    	<?php
	}
}
//---------------------------------------------------------------------------------------
if(isset($_GET['modeRead']) AND $_GET['modeRead']=='sang'){
?>
			<th>Action en contrepartie</th>
			<th>Date du flux</th>
		</tr>
	</thead>
	<?php
	$rep = readLienSang();
	while($donnees = $rep->fetch())
	{
		?>
		<tr>
    		<th><?php $i++; echo $i;?></th>
    		<th><?php echo $donnees['IDRelation'].':'; ?></th>
    		<th><?php echo $donnees['NomEgo'].' '.$donnees['PrenomEgo'].' '.'('.$donnees['IDDossierEgo'].'-'.$donnees['IDEgo'].')'; ?></th>
    		<th><?php echo $donnees['NomAlter'].' '.$donnees['PrenomAlter'].' ('.$donnees['IDDossierAlter'].'-'.$donnees['IDAlter'].')'; ?></th>
    		<th><?php echo $donnees['Type']; ?></th>
    		<th><?php echo $donnees['Certification']; ?></th>
    	</tr>
		<?php
	}
}
//---------------------------------------------------------------------------------------
if(isset($_GET['modeRead']) AND $_GET['modeRead']=='sexuel'){
?>
			<th>Prostitution</th>
			<th>Viol</th>
			<th>En couple</th>
			<th>Date de début</th>
			<th>Date de fin</th>
            <th>Date approximation</th>
			<th>Type de lien sexuel</th>
		</tr>
	</thead>
	<?php
	$rep = readLienSexuel();
	while($donnees = $rep->fetch())
	{
		?>
		<tr>
    		<th><?php $i++; echo $i;?></th>
    		<th><?php echo $donnees['IDRelation'].':'; ?></th>
    		<th><?php echo $donnees['NomEgo'].' '.$donnees['PrenomEgo'].' '.'('.$donnees['IDDossierEgo'].'-'.$donnees['IDEgo'].')'; ?></th>
    		<th><?php echo $donnees['NomAlter'].' '.$donnees['PrenomAlter'].' ('.$donnees['IDDossierAlter'].'-'.$donnees['IDAlter'].')'; ?></th>
    		<th><?php echo $donnees['Prostitution']; ?></th>
    		<th><?php echo $donnees['Viol']; ?></th>
    		<th><?php echo $donnees['EnCouple']; ?></th>
    		<th><?php echo $donnees['DateDebut']; ?></th>
    		<th><?php echo $donnees['DateFin']; ?></th>
            <th><?php echo $donnees['DateApx']; ?></th>
    		<th><?php echo $donnees['TypeLienSexuel']; ?></th>
    	</tr>
		<?php
	}
}
//---------------------------------------------------------------------------------------
if(isset($_GET['modeRead']) AND $_GET['modeRead']=='réseau'){
?>
			<th>Action du réseau</th>
			<th>Date de l'identification</th>
            <th>Date de l'identification approximation</th>
			<th>Localisation Ego</th>
			<th>Localisation Alter</th>
			<th>Présence d'un intermédiaire</th>
			<th>Identifiant du réseau</th>
			<th>Note sur l'action</th>
		</tr>
	</thead>
	<?php
	$rep = readLienReseau();
	while($donnees = $rep->fetch())
	{
		?>
		<tr>
    		<th><?php $i++; echo $i;?></th>
    		<th><?php echo $donnees['IDRelation'].':'; ?></th>
    		<th><?php echo $donnees['NomEgo'].' '.$donnees['PrenomEgo'].' '.'('.$donnees['IDDossierEgo'].'-'.$donnees['IDEgo'].')'; ?></th>
    		<th><?php echo $donnees['NomAlter'].' '.$donnees['PrenomAlter'].' ('.$donnees['IDDossierAlter'].'-'.$donnees['IDAlter'].')'; ?></th>
    		<th><?php echo $donnees['ActionReseau']; ?></th>
    		<th><?php echo $donnees['DateIdentification']; ?></th>
            <th><?php echo $donnees['DateIdentificationApx']; ?></th>
    		<th><?php echo $donnees['IDLocalisationEgo'].' - '.$donnees['PaysEgo'].' / '.$donnees['VilleEgo'].' / '.$donnees['AdresseEgo'].' / '.$donnees['CodePostalEgo']; ?></th>
    		<th><?php echo $donnees['IDLocalisationAlter'].' - '.$donnees['PaysAlter'].' / '.$donnees['VilleAlter'].' / '.$donnees['AdresseAlter'].' / '.$donnees['CodePostalAlter']; ?></th>
    		<th><?php echo $donnees['Intermediaire']; ?></th>
    		<th><?php echo $donnees['IDReseau'].'#'; ?></th>
    		<th><?php echo $donnees['NoteAction']; ?></th>
    	</tr>
		<?php
	}
}
//---------------------------------------------------------------------------------------
if(isset($_GET['modeRead']) AND $_GET['modeRead']=='connaissance'){
?>
			<th>Premier évènement</th>
			<th>Localisation Ego</th>
			<th>Localisation Alter</th>
		</tr>
	</thead>
	<?php
	$rep = readLienConnaissance();
	while($donnees = $rep->fetch())
	{
		?>
		<tr>
    		<th><?php $i++; echo $i;?></th>
    		<th><?php echo $donnees['IDRelation'].':'; ?></th>
    		<th><?php echo $donnees['NomEgo'].' '.$donnees['PrenomEgo'].' '.'('.$donnees['IDDossierEgo'].'-'.$donnees['IDEgo'].')'; ?></th>
    		<th><?php echo $donnees['NomAlter'].' '.$donnees['PrenomAlter'].' ('.$donnees['IDDossierAlter'].'-'.$donnees['IDAlter'].')'; ?></th>
    		<th><?php echo $donnees['PremierEvenement']; ?></th>
    		<th><?php echo $donnees['IDLocalisationEgo'].' - '.$donnees['PaysEgo'].' / '.$donnees['VilleEgo'].' / '.$donnees['AdresseEgo'].' / '.$donnees['CodePostalEgo']; ?></th>
    		<th><?php echo $donnees['IDLocalisationAlter'].' - '.$donnees['PaysAlter'].' / '.$donnees['VilleAlter'].' / '.$donnees['AdresseAlter'].' / '.$donnees['CodePostalAlter']; ?></th>
    	</tr>
		<?php
	}
}
//---------------------------------------------------------------------------------------
if(isset($_GET['modeRead']) AND $_GET['modeRead']=='juju'){
?>
            <th>Date de la cérémonie</th>
            <th>Fonction juju d'Ego</th>
            <th>Fonction juju d'Alter</th>
            <th>Localisation du juju</th>
            <th>Identifiant du juju</th>
        </tr>
    </thead>
    <?php
    $rep = readLienJuju();
    while($donnees = $rep->fetch())
    {
        ?>
        <tr>
            <th><?php $i++; echo $i;?></th>
            <th><?php echo $donnees['IDRelation'].':'; ?></th>
            <th><?php echo $donnees['NomEgo'].' '.$donnees['PrenomEgo'].' '.'('.$donnees['IDDossierEgo'].'-'.$donnees['IDEgo'].')'; ?></th>
            <th><?php echo $donnees['NomAlter'].' '.$donnees['PrenomAlter'].' ('.$donnees['IDDossierAlter'].'-'.$donnees['IDAlter'].')'; ?></th>
            <th><?php echo $donnees['Date']; ?></th>
            <th><?php echo $donnees['FonctionJujuEgo']; ?></th>
            <th><?php echo $donnees['FonctionJujuAlter']; ?></th>
            <th><?php echo $donnees['IDLocalisationCeremonie'].' - '.$donnees['PaysCeremonie'].' / '.$donnees['VilleCeremonie'].' / '.$donnees['AdresseCeremonie'].' / '.$donnees['CodePostalCeremonie']; ?></th>
            <th><?php echo $donnees['IDJuju'].'#'; ?></th>
        </tr>
        <?php
    }
}
//---------------------------------------------------------------------------------------
if(isset($_GET['modeRead']) AND $_GET['modeRead']=='soutien'){
?>
            <th>Type du soutien</th>
            <th>Date du premier contact</th>
            <th>Date du premier contact approximation</th>
            <th>Présence d'un intermédiaire</th>
            <th>Identifiant du soutien</th>
        </tr>
    </thead>
    <?php
    $rep = readLienSoutien();
    while($donnees = $rep->fetch())
    {
        ?>
        <tr>
            <th><?php $i++; echo $i;?></th>
            <th><?php echo $donnees['IDRelation'].':'; ?></th>
            <th><?php echo $donnees['NomEgo'].' '.$donnees['PrenomEgo'].' '.'('.$donnees['IDDossierEgo'].'-'.$donnees['IDEgo'].')'; ?></th>
            <th><?php echo $donnees['NomAlter'].' '.$donnees['PrenomAlter'].' ('.$donnees['IDDossierAlter'].'-'.$donnees['IDAlter'].')'; ?></th>
            <th><?php echo $donnees['TypeSoutien']; ?></th>
            <th><?php echo $donnees['DatePremierContact']; ?></th>
            <th><?php echo $donnees['DatePremierContactApx']; ?></th>
            <th><?php echo $donnees['Intermediaire']; ?></th>
            <th><?php echo $donnees['IDSoutien'].'#'; ?></th>
        </tr>
        <?php
    }
}

?>
</table>
<?php
}

?>