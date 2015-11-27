
<?php
if(!isset($_GET['subMode']))
    $subModetmp = '';
else
    $subModetmp = $_GET['subMode'];
?>

<form method="post" action="../model/writeBDDPersonneLink.php">
    
    <input type='hidden' name='subMode' value=<?php echo '"'.$subModetmp.'"';?>>

    Type de la donnée à ajouter :</br>

    <?php 
    $url = './index.php?modeRead='.$modeRead.'&IDPersonneMode='.$IDPersonneMode.'&attributsMode='.$attributsMode.'&modeWrite=link&subMode=';
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
    ?>

    

    Individu concerné :
    <?php 
        selectIDPersonne('','IDPersonne'); 
    ?>
    </br>
    <hr>
    <?php
 
    //echo '\''. $url . 'langue'.'\''
   
   if(isset($_GET['subMode']) AND $_GET['subMode']!="possibiliteSimilaire"){
    ?>
    <fieldset id="LinkSource">
        <label>Source : </label>
        <!--Source existante :-->
        <?php
        if($_GET['subMode']=='sourceAttributsFam')
             addLinkedDataEntryWithoutEmptyOption(readAllTable('cote'),'','IDCoteAttributsFam','IDCote','NomCote',True);
        elseif($_GET['subMode']=='sourceAttributsAdm')
             addLinkedDataEntryWithoutEmptyOption(readAllTable('cote'),'','IDCoteAttributsAdm','IDCote','NomCote',True);           
        else
            addLinkedDataEntryWithoutEmptyOption(readAllTable('cote'),'','IDCote','IDCote','NomCote',True);
        ?>
        
    </fieldset>
<?php
} 
}


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
                <label>Période Mois :</label></br>
                <input type="text" name="PeriodeMois"></br>
                <label>Période Année :</label></br>
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
        <fieldset id="LinkLocalisation">   
            <b>Localisation :</b></br></br>
            <div class="panelFieldsetBackground">
                <fieldset>
                Nouvelle Localisation :</br>
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

            </div>
            ou
            <p>
            <div class="panelFieldsetBackground">
                <fieldset>
                Valeur existante :</br>
                <select name="IDLocalisation">
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
        <?php
        }
        ?>
</div>

    <!-- source + localisation (ville+pays+adresse)-->
    </br>
    <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-ok"></span> Valider </button>
    <button class="btn btn-warning" type="reset"><span class="glyphicon glyphicon-repeat"></span> Reset </button>
</form>

<?php
/*
    if(isset($_GET['subMode']) AND $_GET['subMode']=='alias'){
    ?>
        <fieldset id="LinkAlias">
            <b>Alias :</b> 
            <div class="panelFieldsetBackground">
            <fieldset>
                <?php
                    addSimpleInput('Nouvelle valeur :</br>','text','IDAliasNew');
                ?>
            </fieldset></div>

            ou

            <div class="panelFieldsetBackground">
            <fieldset>
                Valeur existante :</br>
                <?php
                addLinkedDataEntry(readAlias(),'','IDAlias','IDAlias','Alias',True);
                ?>
            </fieldset></div>
        </fieldset>
    <?php
    }
*/

/*
    if(isset($_GET['subMode']) AND $_GET['subMode']=='langue'){
    ?>
        <fieldset id="LinkLangue">
            Langue : </b>
            <div>
            <fieldset>
                <?php
                addLinkedDataEntry(readLangue(),'','IDLangue','IDLangue','Langue',True);
                ?>
            </fieldset>
            </div>
            ou
            <div>
                <fieldset>
                    Valeur Existante :</br>

                </fieldset> 
            </div>

        </fieldset>
    <?php
    }
    */

 /*
    if(isset($_GET['subMode']) AND $_GET['subMode']=='telephone'){
    ?>
        <fieldset id="LinkTelephone">
            <b>Téléphone :</b> 
            <div class="panelFieldsetBackground">
            <fieldset>
                <?php
                    addSimpleInput('Nouvelle valeur :</br>','text','IDTelephoneNew');
                ?>
            </fieldset></div>
            
            ou

            <div class="panelFieldsetBackground">
            <fieldset>
                Valeur existante :</br>
                <?php
                addLinkedDataEntry(readTelephone(),'','IDTelephone','IDTelephone','NumTelephone',True);
                ?>
            </fieldset></div>
        </fieldset>
    <?php
    }
    */

?>