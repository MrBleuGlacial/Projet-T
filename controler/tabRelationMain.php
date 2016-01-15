<?php 

function addGlyphiconToMod($url,$IDRelation){
    echo '<a class="glyphicon glyphicon-wrench" href="'.$url.$IDRelation.'"></a> ';
}



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

$url2 = '../view/index.php?relationView=1&modeRead='.$modeRead.'&modeWrite=main&subMode='.$modeRead.'&formMode=mod&IDRelationMode=';

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
    	<td><?php $i++; echo $i;?></td>
    	<td><?php /*addGlyphiconToMod($url2,$donnees['IDRelation']); */echo $donnees['IDRelation'].':'; ?></td>
    	<td><?php echo $donnees['NomEgo'].' '.$donnees['PrenomEgo'].' '.'('.$donnees['IDDossierEgo'].'-'.$donnees['IDEgo'].')'; ?></td>
    	<td><?php echo $donnees['NomAlter'].' '.$donnees['PrenomAlter'].' ('.$donnees['IDDossierAlter'].'-'.$donnees['IDAlter'].')'; ?></td>
    	
        <td><?php 
        //echo $donnees['NomCoteInitiale']; 
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
            echo ' '.$donnees2[$i][0];
        }
        ?></td>
        <td><?php echo $donnees['TraceLienDossier']; ?></td>
    	<td><?php echo $donnees['TypeLien']; ?></td>
    	<td><?php echo $donnees['ContexteSocioGeo']; ?></td>
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
    		<td><?php $i++; echo $i;?></td>
    		<td><?php addGlyphiconToMod($url2,$donnees2['IDLienFinancier']); echo $donnees2['IDRelation'].':'; ?></td>
    		<td><?php echo $donnees2['NomEgo'].' '.$donnees2['PrenomEgo'].' '.'('.$donnees2['IDDossierEgo'].'-'.$donnees2['IDEgo'].')'; ?></td>
    		<td><?php echo $donnees2['NomAlter'].' '.$donnees2['PrenomAlter'].' ('.$donnees2['IDDossierAlter'].'-'.$donnees2['IDAlter'].')'; ?></td>
    		<td><?php echo $donnees2['ActionEnContrepartie']; ?></td>
    		<td><?php echo $donnees2['DateFlux']; ?></td>
            <td><?php echo $donnees2['DateFluxApx']; ?></td>
    		<td><?php echo $donnees2['Frequence']; ?></td>
    		<td><?php echo $donnees2['MontantEuro']; ?></td>
    		<td><?php echo $donnees2['Modalite1']; ?></td>
    		<td><?php echo $donnees2['Modalite2']; ?></td>
    		<td><?php echo $donnees2['NomIntermediaire1'].' '.$donnees2['PrenomIntermediaire1'].' ('.$donnees2['IDIntermediaire'].')'; ?></td>
    		<td><?php echo $donnees2['NomIntermediaire2'].' '.$donnees2['PrenomIntermediaire2'].' ('.$donnees2['IDIntermediaire2'].')'; ?></td>
    		<td><?php echo $donnees2['IDLocalisationEgo'].' - '.$donnees2['PaysEgo'].' / '.$donnees2['VilleEgo'].' / '.$donnees2['AdresseEgo'].' / '.$donnees2['CodePostalEgo']; ?></td>
    		<td><?php echo $donnees2['IDLocalisationAlter'].' - '.$donnees2['PaysAlter'].' / '.$donnees2['VilleAlter'].' / '.$donnees2['AdresseAlter'].' / '.$donnees2['CodePostalAlter']; ?></td>
    		<td><?php echo $donnees2['Intermediaire']; ?></td>
    		<td><?php echo '#'.$donnees2['IDFlux'].'#'; ?></td>
    		<td><?php echo $donnees2['ActionDuFlux']; ?></td>
    	</tr>
    	<?php
	}
}
//---------------------------------------------------------------------------------------
if(isset($_GET['modeRead']) AND $_GET['modeRead']=='sang'){
?>
			<th>Type de la relation</th>
			<th>Date du flux</th>
		</tr>
	</thead>
	<?php
	$rep = readLienSang();
	while($donnees = $rep->fetch())
	{
		?>
        <!--
        <pre>
        <?php //print_r($donnees);?>
        </pre>
        -->
		<tr>
    		<td><?php $i++; echo $i;?></td>
    		<td><?php addGlyphiconToMod($url2,$donnees['IDLienSang']); echo $donnees['IDRelation'].':'; ?></td>
    		<td><?php echo $donnees['NomEgo'].' '.$donnees['PrenomEgo'].' '.'('.$donnees['IDDossierEgo'].'-'.$donnees['IDEgo'].')'; ?></td>
    		<td><?php echo $donnees['NomAlter'].' '.$donnees['PrenomAlter'].' ('.$donnees['IDDossierAlter'].'-'.$donnees['IDAlter'].')'; ?></td>
    		<td><?php echo $donnees['Type']; ?></td>
    		<td><?php echo $donnees['Certification']; ?></td>
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
    		<td><?php $i++; echo $i;?></td>
    		<td><?php addGlyphiconToMod($url2,$donnees['IDLienSexuel']); echo $donnees['IDRelation'].':'; ?></td>
    		<td><?php echo $donnees['NomEgo'].' '.$donnees['PrenomEgo'].' '.'('.$donnees['IDDossierEgo'].'-'.$donnees['IDEgo'].')'; ?></td>
    		<td><?php echo $donnees['NomAlter'].' '.$donnees['PrenomAlter'].' ('.$donnees['IDDossierAlter'].'-'.$donnees['IDAlter'].')'; ?></td>
    		<td><?php echo $donnees['Prostitution']; ?></td>
    		<td><?php echo $donnees['Viol']; ?></td>
    		<td><?php echo $donnees['EnCouple']; ?></td>
    		<td><?php echo $donnees['DateDebut']; ?></td>
    		<td><?php echo $donnees['DateFin']; ?></td>
            <td><?php echo $donnees['DateApx']; ?></td>
    		<td><?php echo $donnees['TypeLienSexuel']; ?></td>
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
    		<td><?php $i++; echo $i;?></td>
    		<td><?php addGlyphiconToMod($url2,$donnees['IDLienReseau']); echo $donnees['IDRelation'].':'; ?></td>
    		<td><?php echo $donnees['NomEgo'].' '.$donnees['PrenomEgo'].' '.'('.$donnees['IDDossierEgo'].'-'.$donnees['IDEgo'].')'; ?></td>
    		<td><?php echo $donnees['NomAlter'].' '.$donnees['PrenomAlter'].' ('.$donnees['IDDossierAlter'].'-'.$donnees['IDAlter'].')'; ?></td>
    		<td><?php echo $donnees['ActionReseau']; ?></td>
    		<td><?php echo $donnees['DateIdentification']; ?></td>
            <td><?php echo $donnees['DateIdentificationApx']; ?></td>
    		<td><?php echo $donnees['IDLocalisationEgo'].' - '.$donnees['PaysEgo'].' / '.$donnees['VilleEgo'].' / '.$donnees['AdresseEgo'].' / '.$donnees['CodePostalEgo']; ?></td>
    		<td><?php echo $donnees['IDLocalisationAlter'].' - '.$donnees['PaysAlter'].' / '.$donnees['VilleAlter'].' / '.$donnees['AdresseAlter'].' / '.$donnees['CodePostalAlter']; ?></td>
    		<td><?php echo $donnees['Intermediaire']; ?></td>
    		<td><?php echo '#'.$donnees['IDReseau'].'#'; ?></td>
    		<td><?php echo $donnees['NoteAction']; ?></td>
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
    		<td><?php $i++; echo $i;?></td>
    		<td><?php addGlyphiconToMod($url2,$donnees['IDLienConnaissance']); echo $donnees['IDRelation'].':'; ?></td>
    		<td><?php echo $donnees['NomEgo'].' '.$donnees['PrenomEgo'].' '.'('.$donnees['IDDossierEgo'].'-'.$donnees['IDEgo'].')'; ?></td>
    		<td><?php echo $donnees['NomAlter'].' '.$donnees['PrenomAlter'].' ('.$donnees['IDDossierAlter'].'-'.$donnees['IDAlter'].')'; ?></td>
    		<td><?php echo $donnees['PremierEvenement']; ?></td>
    		<td><?php echo $donnees['IDLocalisationEgo'].' - '.$donnees['PaysEgo'].' / '.$donnees['VilleEgo'].' / '.$donnees['AdresseEgo'].' / '.$donnees['CodePostalEgo']; ?></td>
    		<td><?php echo $donnees['IDLocalisationAlter'].' - '.$donnees['PaysAlter'].' / '.$donnees['VilleAlter'].' / '.$donnees['AdresseAlter'].' / '.$donnees['CodePostalAlter']; ?></td>
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
            <td><?php $i++; echo $i;?></td>
            <td><?php addGlyphiconToMod($url2,$donnees['IDLienJuju']); echo $donnees['IDRelation'].':'; ?></td>
            <td><?php echo $donnees['NomEgo'].' '.$donnees['PrenomEgo'].' '.'('.$donnees['IDDossierEgo'].'-'.$donnees['IDEgo'].')'; ?></td>
            <td><?php echo $donnees['NomAlter'].' '.$donnees['PrenomAlter'].' ('.$donnees['IDDossierAlter'].'-'.$donnees['IDAlter'].')'; ?></td>
            <td><?php echo $donnees['Date']; ?></td>
            <td><?php echo $donnees['FonctionJujuEgo']; ?></td>
            <td><?php echo $donnees['FonctionJujuAlter']; ?></td>
            <td><?php echo $donnees['IDLocalisationCeremonie'].' - '.$donnees['PaysCeremonie'].' / '.$donnees['VilleCeremonie'].' / '.$donnees['AdresseCeremonie'].' / '.$donnees['CodePostalCeremonie']; ?></td>
            <td><?php echo '#'.$donnees['IDJuju'].'#'; ?></td>
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
            <td><?php $i++; echo $i;?></td>
            <td><?php addGlyphiconToMod($url2,$donnees['IDLienSoutien']); echo $donnees['IDRelation'].':'; ?></td>
            <td><?php echo $donnees['NomEgo'].' '.$donnees['PrenomEgo'].' '.'('.$donnees['IDDossierEgo'].'-'.$donnees['IDEgo'].')'; ?></td>
            <td><?php echo $donnees['NomAlter'].' '.$donnees['PrenomAlter'].' ('.$donnees['IDDossierAlter'].'-'.$donnees['IDAlter'].')'; ?></td>
            <td><?php echo $donnees['TypeSoutien']; ?></td>
            <td><?php echo $donnees['DatePremierContact']; ?></td>
            <td><?php echo $donnees['DatePremierContactApx']; ?></td>
            <td><?php echo $donnees['Intermediaire']; ?></td>
            <td><?php echo '#'.$donnees['IDSoutien'].'#'; ?></td>
        </tr>
        <?php
    }
}

?>
</table>
<?php
}

?>