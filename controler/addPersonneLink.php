<?php

/**
*Gère les formulaires d'ajout de données liées à des personnes. Il permet de choisir dans un premier temps le type de donnée à traiter et crée le formulaire en conséquence.
*Le paramètre formMode determine si on est en ajout ou en désattribution.
*/

/**
*Crée les cases à cocher pour désattribuer les données liées.
*/
function checkBoxToDelCoteOnly($IDPersonneMode,$tableName){
    $i = 0;
    $rep = readSourceOnlyAssociation($IDPersonneMode,$tableName);
    while($donnees = $rep->fetch()){
        ?>
        <input type="checkbox" name=<?php echo '"element'.$i++.'"';?> value=<?php echo '"'.$donnees['IDCote'].'"';?>>
        <?php echo $donnees['NomCote'];?>
        <br>
        <?php
    }
    ?> <input type='hidden' name='numberElement' value=<?php echo '"'.$i.'"';?>> <?php 
}




if(!isset($_GET['subMode']))
    $subModetmp = '';
else
    $subModetmp = $_GET['subMode'];
?>

<form method="post" action="../model/writeBDDPersonneLink.php">
    
    <input type='hidden' name='subMode' value=<?php echo '"'.$subModetmp.'"';?>>
    <input type='hidden' name='formMode' value=<?php echo '"'.$formMode.'"';?>>

    <?php 
    if(isset($formMode) AND $formMode=='mod'){
        $where = 'IDPersonne ='.$IDPersonneMode;
        $rep = readAllTableWhere('personne',$where);
        $donnees =  $rep->fetch();
        $rep->closeCursor();
        echo '</br></br><b>' . $donnees['Prenom'] . ' ' . $donnees['Nom'] . ' ('.$donnees['IDDossier'].$donnees['IDPersonne'].') :</b></br>'; 
        ?> Type de la donnée à modifier :</br><?php
    }
    else{
        ?> Type de la donnée à ajouter :</br><?php
    }

    $url = './index.php?modeRead='.$modeRead.'&IDPersonneMode='.$IDPersonneMode.'&attributsMode='.$attributsMode.'&formMode='.$formMode.'&modeWrite=link&subMode=';
    $varSubMode = $subMode;

    if($varSubMode=='sourceAttributsFam')
        $varSubMode='source attributs familiaux';
    elseif($varSubMode=='sourceAttributsAdm')
        $varSubMode='source attributs administratifs';
    elseif($varSubMode=='source')
        $varSubMode='source seule';
    elseif($varSubMode=='possibiliteSimilaire')
        $varSubMode='possibilité similarité';

    if($varSubMode == '' OR $varSubMode == 'undefined')
        $varSubMode = 'Veuillez choisir une valeur'; //Sélectionnez une valeur
    else
        $varSubMode = 'Actuel : '.$varSubMode;
    ?>
    
    <select class="btn btn-primary btn-xs" onchange="location = this.options[this.selectedIndex].value;">
        <option value= <?php echo '\''. $url . ''.'\'';?>><?php echo $varSubMode; ?></option>
        <option value= <?php echo '\''. $url . 'source'.'\'';?>>Source Seule</option>
        <!-- -->
        <option value= <?php echo '\''. $url . 'sourceAttributsFam'.'\'';?>>Source Attributs Familiaux</option>
        <option value= <?php echo '\''. $url . 'sourceAttributsAdm'.'\'';?>>Source Attributs Administratifs</option>
        <!-- -->
        <option value= <?php echo '\''. $url . 'alias'.'\'';?>>Alias</option>
        <option value= <?php echo '\''. $url . 'langue'.'\'';?>>Langue</option>
        <option value= <?php echo '\''. $url . 'telephone'.'\'';?>>Téléphone</option>
        <option value= <?php echo '\''. $url . 'localisation'.'\'';?>>Localisation</option>
        <option value= <?php echo '\''. $url . 'role'.'\'';?>>Rôle</option>
        <option value= <?php echo '\''. $url . 'passport'.'\'';?>>Passport</option>
        <option value= <?php echo '\''. $url . 'possibiliteSimilaire'.'\'';?>>Possibilité Similarité</option>
    </select></br></br>
    

    <div class="panelbackground scrollable">

<?php

if(isset($_GET['subMode']) AND $_GET['subMode']!='undefined'){
    if($formMode=='' OR $formMode == 'add'){
        ?>

        Individu concerné :
        <?php 
            selectIDPersonne('','IDPersonne', $IDPersonneMode); 
        ?>
        </br>
        <hr>
        <?php
     
        //echo '\''. $url . 'langue'.'\''
       
       if(isset($_GET['subMode']) AND ($_GET['subMode']!="possibiliteSimilaire" AND $_GET['subMode']!='')){
        ?>
        <fieldset id="LinkSource">
            <label>Source : </label>
            <!--Source existante :-->
            <?php
            if($_GET['subMode']=='sourceAttributsFam')
                 addLinkedDataEntryWithoutEmptyOption(readAllTable('cote'),'','IDCoteAttributsFam','IDCote','NomCote',True);
            elseif($_GET['subMode']=='sourceAttributsAdm')
                 addLinkedDataEntryWithoutEmptyOption(readAllTable('cote'),'','IDCoteAttributsAdm','IDCote','NomCote',True);           
            elseif($_GET['subMode']=='source')
                addLinkedDataEntryWithoutEmptyOption(readAllTable('cote'),'','IDCote','IDCote','NomCote',True);
            else
                addLinkedDataEntry(readAllTable('cote'),'','IDCote','IDCote','NomCote',True);
            ?>
            
        </fieldset>
        <?php
        }
    }  
}

if($formMode=='' OR $formMode == 'add'){
    //----- SOURCE ONLY -----
    //----------------------------------------------------------------------------------------------------------------

    if(isset($_GET['subMode']) AND $_GET['subMode']=='source'){
        echo "</br>Lie uniquement cette source à cet individu.</br>";
    }

    //----- ALIAS -----
    //----------------------------------------------------------------------------------------------------------------

    formLinkDuo('alias','LinkAlias','Alias :','AliasNew',readAllTable('alias'),'IDAlias','IDAlias','Alias');

    //----- LANGUE -----
    //----------------------------------------------------------------------------------------------------------------

    formLinkDuo('langue','LinkLangue','Langue :','LangueNew',readAllTable('langue'),'IDLangue','IDLangue','Langue');

    //----- ROLE -----
    //----------------------------------------------------------------------------------------------------------------

    if(isset($_GET['subMode']) AND $_GET['subMode']=="role"){
        ?> 
            <fieldset id="linkRole">
                <b>Association de Rôle :</b></br>
                <div class="panelFieldsetBackground">
                <p style="margin-left:3%">
                    </br>
                    <?php
                    addLinkedDataEntryWithoutEmptyOption(readAllTable('role'),'Rôle Selectionné :','IDRole','IDRole','Role',True);
                    ?>
                    <label>Début du Rôle :</label></br>
                    <input type="date" name="DebutRole"></br>
                    <label>Fin du Rôle :</label></br>
                    <input type="date" name="FinRole"></br>
                    <label>Date début approximative :</label></br>
                    <input type="text" name="PeriodeMois"></br>
                    <label>Date fin approximative :</label></br>
                    <input type="text" name="PeriodeAnnee"></br>
                    <label>Identifiant Quali :</label></br>
                    <input type="text" name="IdentifiantQuali"></br>
                 
                </p>   
            </fieldset>
        <?php
    }

    //----- PASSPORT -----
    //----------------------------------------------------------------------------------------------------------------

    if(isset($_GET['subMode']) AND $_GET['subMode']=="passport"){
          ?> 
            <fieldset id="linkPassport">
                <b>Association de Passport :</b></br>
                <div class="panelFieldsetBackground">
                <p style="margin-left:3%">
                    </br>
                  
                    <label>Numéro de Passport :</label></br>
                    <input type="text" name="NumPassport"></br>
                    <?php
                    addLinkedDataEntryWithoutEmptyOption(readAllTable('pays'),'Nationalité du Passport :','IDNationalitePassport','IDPays','Pays',True);
                    ?>
                    <label>Début Validité Passport :</label></br>
                    <input type="date" name="DebutValPassport"></br>
                    <label>Fin Validité Passport :</label></br>
                    <input type="date" name="FinValPassport"></br>
                 
                </p>   
            </fieldset>
        <?php
    }

    //----- POSSIBILITESIMILAIRE -----
    //----------------------------------------------------------------------------------------------------------------

    if(isset($_GET['subMode']) AND $_GET['subMode']=="possibiliteSimilaire"){

       selectIDPersonne('Possibilité Similaire :','IDPersonneMineure');

    }

    //----- TELEPHONE -----
    //----------------------------------------------------------------------------------------------------------------
        
    formLinkDuo('telephone','LinkTelephone','Téléphone :','TelephoneNew',readAllTable('telephone'),'IDTelephone','IDTelephone','NumTelephone');

    //----- LOCALISATION -----
    //----------------------------------------------------------------------------------------------------------------
         
        if(isset($_GET['subMode']) AND $_GET['subMode']=='localisation'){
        ?>
            </br>
            <b>Localisation :</b></br>
            <fieldset style="background-color: #ccebff;" id="LinkLocalisation">   
                <div class="panelFieldsetBackground">
                    <fieldset>
                    Nouvelle Localisation :
                    <p style="margin-left:3%">
                        <?php
                        addLinkedDataEntry(readAllTable('pays'),'Pays : ','IDPays','IDPays','Pays',True);
                        addLinkedDataEntry(readAllTable('ville'),'Ville : ','IDVille','IDVille','Ville',True);
                        ?>
                        <label>Adresse :</label></br>
                        <input type="text" name="Adresse"></br>
                        <label>Code Postal :</label></br>
                        <input type="text" name="CodePostal"></br>
                        
                    </p>
                    </fieldset>
                </div>
                ou
                <p>
                <div class="panelFieldsetBackground">
                    <fieldset>
                    Valeur existante :</br>
                    <select class="chzn-select form-control" name="IDLocalisation">
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
                    </fieldset>
                </div>
                </p>
            </fieldset>
            </br>
            <label>Date début Approximation :</label></br>
            <input type="text" name="DateDebutApx"></br>
            <label>Date fin Approximation :</label></br>
            <input type="text" name="DateFinApx"></br>
            <?php
            }
            ?>
    </div>

<?php
}
else{
    echo 'Quels éléments voulez vous dé-attribuer de cette personne ?</br></br>';
    ?>  <input type='hidden' name='IDPersonneMode' value=<?php echo '"'.$IDPersonneMode.'"';?>> <?php
    if($subMode == 'source'){
       checkBoxToDelCoteOnly($IDPersonneMode,'personneToCote');
       /*?>
       <input type="checkbox" name="vehicle1" value="bike">I have a bike
        <br>
        <input type="checkbox" name="vehicle2" value="cat">I have a cat 
        <br><br>
        <?*/
    }
    if($subMode == 'sourceAttributsFam'){
        checkBoxToDelCoteOnly($IDPersonneMode,'personneToCoteFam');
    }
    if($subMode == 'sourceAttributsAdm'){
        checkBoxToDelCoteOnly($IDPersonneMode,'personneToCoteAdm');
    }
    if($subMode == 'alias'){
        $rep = readAllAssociationTable($IDPersonneMode,'personneToAlias','alias','IDAlias','Alias');
        checkBoxToDelRep($rep,'IDAlias','Alias');
        /*
        $i = 0;
        while($donnees = $rep->fetch()){
            ?>
            <input type="checkbox" name=<?php echo '"element'.$i++.'"'?> value=<?php echo '"'.$donnees['IDAlias'].'"';?>>
            <?php echo $donnees['Alias'];?>
            <br>
            <?php
        }
        */
    } 
    if($subMode == 'langue'){
        $rep = readAllAssociationTable($IDPersonneMode,'personneToLangue','langue','IDLangue','Langue');
        checkBoxToDelRep($rep,'IDLangue','Langue');
    }
    if($subMode == 'telephone'){
        $rep = readAllAssociationTable($IDPersonneMode,'personneToTelephone','telephone','IDTelephone','NumTelephone');
        checkBoxToDelRep($rep,'IDTelephone','NumTelephone');
    }
    if($subMode == 'localisation'){
        $rep = readLocalisationAssociation($IDPersonneMode);
        //echo $subMode;
        $i = 0;
        while($donnees = $rep->fetch()){
            ?>
            <input type="checkbox" name=<?php echo '"element'.$i++.'"'?> value=<?php echo '"'.$donnees['IDPersonneToLocalisation'].'"';?>>
            <?php echo $donnees['IDLocalisation'].' - '.$donnees['Pays'].' / '.$donnees['Ville'].' / '.$donnees['Adresse'].' / '.$donnees['CodePostal'];?>
            <br>
            <?php
        }
        ?> <input type='hidden' name='numberElement' value=<?php echo '"'.$i.'"';?>> <?php 
    }
    if($subMode == 'role'){
        $rep = readRoleAssociation($IDPersonneMode);
        checkBoxToDelRep($rep,'IDRole','Role');
    }
    if($subMode == 'passport'){
        $rep = readPassportAssociation($IDPersonneMode);
        checkBoxToDelRep($rep,'NumPassport','NumPassport');
    }
    if($subMode == 'possibiliteSimilaire'){
        $rep = readSimilariteAssociation($IDPersonneMode); 
        $i = 0;
        while($donnees = $rep->fetch()){
            ?>
            <input type="checkbox" name=<?php echo '"element'.$i++.'"'?> value=<?php echo '"'.$donnees['IDPersonne'].'"';?>>
            <?php echo '('.$donnees['IDDossier'].'-'.$donnees['IDPersonne'].') '.$donnees['Nom'].' '.$donnees['Prenom'];?>
            <br>
            <?php
        }
        ?> <input type='hidden' name='numberElement' value=<?php echo '"'.$i.'"';?>> <?php 
    }
    /*
    ?>
    <pre>
    <?php print_r($rep->fetchAll());?>
    </pre>
    <?php
    */  

}
?>

    <!-- source + localisation (ville+pays+adresse)-->
    </br>
    <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-ok"></span> Valider </button>
    <button class="btn btn-warning" type="reset"><span class="glyphicon glyphicon-repeat"></span> Reset </button>
    <!--<button onclick="javascript:history.back();" class="btn btn-warning"><span class="glyphicon glyphicon-fast-backward"> Retour </button>->
</form>

