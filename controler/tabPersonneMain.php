

<table class="rowTitle tabRead table table-bordered table-striped " id="tabPersonneMain">
 <caption></caption>
    <tr class="info">
        <th>ID</th>
        <th>Prénom</th>
        <th>Nom</th>
        <th>Sexe</th>
        <th>Naissance</th>
        <th>Nationalité</th>
        <th>Ville de naissance</th>
        <th>Pays de naissance</th>
        <th>Profession pré-immigration</th>
        <th>Profession durant l'interrogatoire</th>
        <th>Dette initiale</th>
        <th>Dette re-négociée</th>
        <th>Date où la dette est payée</th>
        <th>Date où x est recruté(e)</th>
        <th>Date où x recrute</th>
        <th>Dernier diplôme obtenu</th>
    </tr>
    <?php 
    
  
    $rep = readPersonneMain();
    while($donnees = $rep->fetch())
    {
    ?>
    <tr>
        <td><?php echo $donnees['IDDossier'] .'-'. $donnees['IDPersonne'];?></td>
        <td><?php echo $donnees['Prenom'];?></td>
        <td><?php echo $donnees['Nom'];?></td>
        <td><?php echo $donnees['Sexe'];?></td>
        <td><?php echo $donnees['DateNaissance'];?></td>
        <td><?php echo $donnees['Nationalite'];?></td>
        <td><?php echo $donnees['VilleNaissance'];?></td>
        <td><?php echo $donnees['PaysNaissance'];?></td>
        <td><?php echo $donnees['ProfessionAvantMigration'];?></td>
        <td><?php echo $donnees['ProfessionDurantInterrogatoire'];?></td>  
        <td><?php echo $donnees['DetteInitiale'];?></td> 
        <td><?php echo $donnees['DetteRenegociee'];?></td> 
        <td><?php echo $donnees['DateDettePayee'];?></td> 
        <td><?php echo $donnees['DateEstRecrute'];?></td> 
        <td><?php echo $donnees['DateRecrute'];?></td> 
        <td><?php echo $donnees['Diplome'];?></td>           
    </tr>
    <?php
    }
    $rep->closeCursor();
    ?>
</table>
