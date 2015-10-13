
<div class="btn-group  btn-group-justified">
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

</br>
<table class="table table-bordered table-striped" id="tabPersonne">
 <caption></caption>
    <thead>
        <tr class="info">
            <!-- PARTIE IDENTIFIANT-->
            <th>Numéro</th>
            <th>ID Personne</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th class="identifiantTab">Sexe</th>
            <th class="identifiantTab">Naissance</th>
            <th class="identifiantTab">Nationalité</th>
            <th class="identifiantTab">Ville de naissance</th>
            <th class="identifiantTab">Pays de naissance</th>
            <th class="identifiantTab">Profession pré-immigration</th>
            <th class="identifiantTab">Profession durant l'interrogatoire</th>
            <th class="identifiantTab">Dette initiale</th>
            <th class="identifiantTab">Dette re-négociée</th>
            <th class="identifiantTab">Date dette est payée</th>
            <th class="identifiantTab">Date x est recruté(e)</th>
            <th class="identifiantTab">Date x recrute</th>
            <th class="identifiantTab">Dernier diplôme obtenu</th>
            <!-- PARTIE ATTRIBUTS FAMILLIAUX -->
            <th class="attributsFamTab">Père</th>
            <th class="attributsFamTab">Mère</th>
            <th class="attributsFamTab">Rupture parentale</th>
            <th class="attributsFamTab">Fratrie</th>
            <th class="attributsFamTab">Position dans la fratrie</th>
            <th class="attributsFamTab">Situation matrimoniale</th>
            <th class="attributsFamTab">Validation de la source</th>
            <th class="attributsFamTab">Vit en couple</th>
            <th class="attributsFamTab">Enceinte</th>
            <!-- PARTIE ATTRIBUTS ADMINISTRATIFS -->
            <th class="attributsAdmTab">Numéro de passport</th>
            <th class="attributsAdmTab">Debut validité Passport</th>
            <th class="attributsAdmTab">Fin validité Passport</th>
            <th class="attributsAdmTab">Numéro récépissé</th>
            <th class="attributsAdmTab">Début validité récépissé</th>
            <th class="attributsAdmTab">Fin validité récépissé</th>
            <th class="attributsAdmTab">Numéro de séjour</th>
            <th class="attributsAdmTab">Début validité séjour</th>
            <th class="attributsAdmTab">Fin validité séjour</th>
            <th class="attributsAdmTab">Prestation sociale</th>
            <th class="attributsAdmTab">Mode migration</th>
            <th class="attributsAdmTab">Arrivée en Europe</th>
            <th class="attributsAdmTab">Arrivée en France</th>
            <th class="attributsAdmTab">Pays de transit 1</th>
            <th class="attributsAdmTab">Pays de transit 2</th>
        </tr>
    </thead>
    <?php 
    
    $i = 0;
    $rep = readPersonneMain();
    while($donnees = $rep->fetch())
    {
    ?>
    <tr>
        <!-- PARTIE IDENTIFIANT-->
        <td><?php $i++; echo $i;?></td>
        <td><?php echo $donnees['IDDossier'] .'-'. $donnees['IDPersonne'];?></td>
        <td><?php echo $donnees['Prenom'];?></td>
        <td><?php echo $donnees['Nom'];?></td>
        <td class="identifiantTab"><?php echo $donnees['Sexe'];?></td>
        <td class="identifiantTab"><?php echo $donnees['DateNaissance'];?></td>
        <td class="identifiantTab"><?php echo $donnees['Nationalite'];?></td>
        <td class="identifiantTab"><?php echo $donnees['VilleNaissance'];?></td>
        <td class="identifiantTab"><?php echo $donnees['PaysNaissance'];?></td>
        <td class="identifiantTab"><?php echo $donnees['ProfessionAvantMigration'];?></td>
        <td class="identifiantTab"><?php echo $donnees['ProfessionDurantInterrogatoire'];?></td>  
        <td class="identifiantTab"><?php echo $donnees['DetteInitiale'];?></td> 
        <td class="identifiantTab"><?php echo $donnees['DetteRenegociee'];?></td> 
        <td class="identifiantTab"><?php echo $donnees['DateDettePayee'];?></td> 
        <td class="identifiantTab"><?php echo $donnees['DateEstRecrute'];?></td> 
        <td class="identifiantTab"><?php echo $donnees['DateRecrute'];?></td> 
        <td class="identifiantTab"><?php echo $donnees['Diplome'];?></td>
        <!-- PARTIE ATTRIBUTS FAMILLIAUX --> 
        <td class="attributsFamTab"><?php echo $donnees['Pere'];?></td>
        <td class="attributsFamTab"><?php echo $donnees['Mere'];?></td>
        <td class="attributsFamTab"><?php echo $donnees['RuptureParentale'];?></td>
        <td class="attributsFamTab"><?php echo $donnees['Fratrie'];?></td>
        <td class="attributsFamTab"><?php echo $donnees['PositionFratrie'];?></td>
        <td class="attributsFamTab"><?php echo $donnees['SituationMatrimoniale'];?></td>
        <td class="attributsFamTab"><?php echo $donnees['ValidationSource'];?></td>
        <td class="attributsFamTab"><?php echo $donnees['VitEnCouple'];?></td>
        <td class="attributsFamTab"><?php echo $donnees['Enceinte'];?></td>          
        <!-- PARTIE ATTRIBUTS ADMINISTRATIFS -->
        <td class="attributsAdmTab"><?php echo $donnees['NumPassport'];?></td>
        <td class="attributsAdmTab"><?php echo $donnees['DebutValPassport'];?></td>
        <td class="attributsAdmTab"><?php echo $donnees['FinValPassport'];?></td>
        <td class="attributsAdmTab"><?php echo $donnees['NumRecepisse'];?></td>
        <td class="attributsAdmTab"><?php echo $donnees['DebutValRecepisse'];?></td>
        <td class="attributsAdmTab"><?php echo $donnees['FinValRecepisse'];?></td>
        <td class="attributsAdmTab"><?php echo $donnees['NumSejour'];?></td>
        <td class="attributsAdmTab"><?php echo $donnees['DebutValSejour'];?></td>
        <td class="attributsAdmTab"><?php echo $donnees['FinValSejour'];?></td>
        <td class="attributsAdmTab"><?php echo $donnees['PrestationSociale'];?></td>
        <td class="attributsAdmTab"><?php echo $donnees['ModeMigration'];?></td>
        <td class="attributsAdmTab"><?php echo $donnees['ArriveeEurope'];?></td>
        <td class="attributsAdmTab"><?php echo $donnees['ArriveeFrance'];?></td>
        <td class="attributsAdmTab"><?php echo $donnees['PaysTransit1'];?></td>
        <td class="attributsAdmTab"><?php echo $donnees['PaysTransit2'];?></td>
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
