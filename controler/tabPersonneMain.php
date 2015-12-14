
<div class="btn-group  btn-group-justified" style="position:absolute; right:0%; left:0%;">
    <div class="btn-group">
        <button class="btn btn-custom2 btn-sm" onclick="showSelectedElements('identifiant');"> Informations Générales </button>
    </div>
    <div class="btn-group">
        <button class="btn btn-custom2 btn-sm" onclick="showSelectedElements('attributsFam');"> Attributs Familiaux </button>
    </div>
    <div class="btn-group">
        <button class="btn btn-custom2 btn-sm" onclick="showSelectedElements('attributsAdm');"> Attributs Administratifs </button>
    </div>
    <div class="btn-group">
        <button class="btn btn-custom2 btn-sm" onclick="showSelectedElements();"> Tout Voir </button>
    </div>
</div>
<div>
</br>
</br>
<table class="table table-bordered table-striped readTab" id="tabPersonne">
 <caption></caption>
    <thead>
        <tr class="info">
            <!-- PARTIE IDENTIFIANT-->
            <th>Numéro</th>
            <th>ID Personne</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Cote Initiale</th>
            <th>Type de personne</th>
            <th>Liste d'Alias</th>
            <th>Sexe</th>
            <th>Naissance</th>
            <th>Nationalité</th>
            <th>Se prostitue</th>
            <th>Ville de naissance</th>
            <th>Pays de naissance</th>
            <th>Profession pré-immigration</th>
            <th>Profession durant l'interrogatoire</th>
            <th>Dette initiale</th>
            <th>Dette re-négociée</th>
            <th>Date dette est payée</th>
            <th>Date x est recruté(e)</th>
            <th>Date x recrute</th>
            <th>Dernier diplôme obtenu</th>
            <!-- PARTIE ATTRIBUTS FAMILLIAUX -->
            <th>Père</th>
            <th>Mère</th>
            <th>Rupture parentale</th>
            <th>Fratrie</th>
            <th>Position dans la fratrie</th>
            <th>Situation matrimoniale</th>
            <th>Validation de la source</th>
            <th>Vit en couple</th>
            <th>Localisation du couple</th>
            <th>Enceinte</th>
            <th>Enfant pays d'origine</th>
            <th>Maison au Nigéria</th>
            <!-- PARTIE ATTRIBUTS ADMINISTRATIFS -->
            <th>N° d'étranger</th>
            <th>Numéro récépissé</th>
            <th>Numéro recours OFPRA</th>
            <th>Début validité récépissé</th>
            <th>Fin validité récépissé</th>
            <th>Numéro OQTF</th>
            <th>Début OQTF</th>
            <th>Fin OQTF</th>
            <th>Numéro de séjour</th>
            <th>Début validité séjour</th>
            <th>Fin validité séjour</th>
            <th>Carte nationale d'identité</th>
            <th>Prestation sociale</th>
            <th>Mode migration</th>
            <th>Arrivée en Europe</th>
            <th>Arrivée en Europe Approximation</th>
            <th>Arrivée en France</th>
            <th>Arrivée en France Approximation</th>
            <th>Pays de transit 1</th>
            <th>Pays de transit 2</th>
        </tr>
    </thead>
    <?php 
    
    $url = "../view/index.php?modeRead=main&modeWrite=main&subMode=&formMode=mod&IDPersonneMode=";
    $url2 = "../view/index.php?modeRead=link&modeWrite=link&subMode=&formMode=add&IDPersonneMode=";

    $i = 0;
    $rep = readPersonneMain();
    while($donnees = $rep->fetch())
    {
    ?>
    <tr>
        <!-- PARTIE IDENTIFIANT-->
        <td><?php $i++; echo $i;?></td>
        <td>
            <a class="glyphicon glyphicon-wrench" href=<?php echo '"'.$url.$donnees['IDPersonne'].'"'; ?>></a> 
            <?php echo '<a href="'.$url2.$donnees['IDPersonne'].'">'.$donnees['IDDossier'] .'-'. $donnees['IDPersonne'].'</a>';?>
        </td>
        <td><?php echo $donnees['Prenom'];?></td>
        <td><?php echo $donnees['Nom'];?></td>
        <td><?php echo $donnees['NomCoteInitiale'];?></td>
        <td><?php echo $donnees['TypePersonne'];?></td>
        <td><?php 
        $rep2 = readAllAssociationTable($donnees['IDPersonne'],'personneToAlias','alias','IDAlias','Alias');
        while($donnees2 = $rep2->fetch())
        {
            echo '\''.$donnees2['Alias'] . '\' ';
        }
        ?></td>
        <td><?php echo $donnees['Sexe'];?></td>
        <td><?php echo $donnees['DateNaissance'];?></td>
        <td><?php echo $donnees['Nationalite'];?></td>
        <td><?php echo $donnees['SeProstitue'];?></td>
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
        <!-- PARTIE ATTRIBUTS FAMILLIAUX --> 
        <td><?php echo $donnees['Pere'];?></td>
        <td><?php echo $donnees['Mere'];?></td>
        <td><?php echo $donnees['RuptureParentale'];?></td>
        <td><?php echo $donnees['Fratrie'];?></td>
        <td><?php echo $donnees['PositionFratrie'];?></td>
        <td><?php echo $donnees['SituationMatrimoniale'];?></td>
        <td><?php echo $donnees['ValidationSource'];?></td>
        <td><?php echo $donnees['VitEnCouple'];?></td>
        <th><?php echo $donnees['IDLocalisationCouple'].' - '.$donnees['PaysLocalisationCouple'].' / '.$donnees['VilleLocalisationCouple'].' / '.$donnees['AdresseLocalisationCouple'].' / '.$donnees['CodePostalLocalisationCouple']; ?></th>
        <td><?php echo $donnees['Enceinte'];?></td>
        <td><?php echo $donnees['EnfantPaysOrigine'];?></td>
        <td><?php echo $donnees['MaisonNigeria'];?></td>          
        <!-- PARTIE ATTRIBUTS ADMINISTRATIFS -->
        <td><?php echo $donnees['NumEtranger'];?></td>
        <td><?php echo $donnees['NumRecepisse'];?></td>
        <td><?php echo $donnees['NumRecoursOFPRA'];?></td>
        <td><?php echo $donnees['DebutValRecepisse'];?></td>
        <td><?php echo $donnees['FinValRecepisse'];?></td>
        <td><?php echo $donnees['NumOQTF'];?></td>
        <td><?php echo $donnees['DebutOQTF'];?></td>
        <td><?php echo $donnees['FinOQTF'];?></td>
        <td><?php echo $donnees['NumSejour'];?></td>
        <td><?php echo $donnees['DebutValSejour'];?></td>
        <td><?php echo $donnees['FinValSejour'];?></td>
        <td><?php echo $donnees['CarteNationale'];?></td>
        <td><?php echo $donnees['PrestationSociale'];?></td>
        <td><?php echo $donnees['ModeMigration'];?></td>
        <td><?php echo $donnees['ArriveeEurope'];?></td>
        <td><?php echo $donnees['ArriveeEuropeApx'];?></td>
        <td><?php echo $donnees['ArriveeFrance'];?></td>
        <td><?php echo $donnees['ArriveeFranceApx'];?></td>
        <td><?php echo $donnees['PaysTransit1'];?></td>
        <td><?php echo $donnees['PaysTransit2'];?></td>
    </tr>
    <?php
    }
    $rep->closeCursor();
    ?>
    <!--
    <tr>
        <td>
            <button class=<?php echo '"'.'btn  btn-success btn-xs'; if(isset($_COOKIE['hideModeWrite']) AND $_COOKIE['hideModeWrite']==1) echo 'hideMode'; echo '"';?> id="hideAndSeek" onclick="hideAndShowReadPan();">
                 <span class="glyphicon glyphicon-plus-sign"></span>
            </button>
        </td>
        
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
        
    </tr>
    -->
</table>
</div>