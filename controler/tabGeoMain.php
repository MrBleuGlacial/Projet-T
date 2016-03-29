<?php
/**
*Gère le tableau d'affichage des données de déplacements.
*/
/**
*
*/
?>

<table class="table table-bordered table-striped readTab" id="tabPersonne">
	<caption></caption>
	<thead>
		<tr class="info">
			<th>Numéro</th>
			<th>ID Géo</th>
			<th>Personne</th>
			<th>Sources</th>
			<th>Départ de :</th>
			<th>Arrivée à :</th>
			<th>Date</th>
			<th>Cause déplacement</th>
			<th>Mode de transport</th>
			<th>Identifiant</th>
		</tr>
	</thead>
	<?php

	$url = "../view/index.php?geoView=1&modeRead=main&modeWrite=main&subMode=&formMode=mod&IDGeoMode=";
	$url2 = "../view/index.php?geoView=1&modeRead=main&modeWrite=link&subMode=&formMode=mod&IDGeoMode=";

	$i = 0;
	$rep = readGeoMain();
	while($donnees = $rep->fetch()){
	?>
	<tr>
		<td> <?php $i++; echo $i;?> </td>
		<td> 
			<a class="glyphicon glyphicon-wrench" href=<?php echo '"'.$url.$donnees['IDGeo'].'"'; ?>></a>  
			<?php echo $donnees['IDGeo'];?> 
		</td>
		<td> <?php echo $donnees['Nom'].' '.$donnees['Prenom'].' ('.$donnees['IDPersonne'].')';?> </td>
		<td> 
			<?php 
			$rep2=readGeoAndSourceAssociation($donnees['IDGeo']);
        	$donnees2 = $rep2->fetchAll();
			if($donnees2 != NULL) echo '<a class="glyphicon glyphicon-wrench" href="'.$url2.$donnees['IDGeo'].'">'.'</a>';
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
			?> 
		</td>
		<td> <?php echo $donnees['IDLocalisationDepart'].' - '.$donnees['PaysDepart'].' / '.$donnees['VilleDepart'].' / '.$donnees['AdresseDepart'].' / '.$donnees['CodePostalDepart'];?> </td>
		<td> <?php echo $donnees['IDLocalisationArrivee'].' - '.$donnees['PaysArrivee'].' / '.$donnees['VilleArrivee'].' / '.$donnees['AdresseArrivee'].' / '.$donnees['CodePostalArrivee'];?> </td>
		<td> <?php echo $donnees['Date'];?> </td>
		<td> <?php echo $donnees['CauseDeplacement'];?> </td>
		<td> <?php echo $donnees['ModeTransport'];?> </td>
		<td> <?php echo $donnees['Identifiant'];?> </td>
	</tr>
	<?php
	}
	$rep->closeCursor();
	?>
</table>