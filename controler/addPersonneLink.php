<?php
//include("../controler/inputForForm.php");
?>

<form method="post" action="../model/writeBDDPersonneLink.php">

<?php

function formLinkDuo($valueSubMode, $fieldSetID, $nameFieldset, $inputName,$readQuery,$selectName, $argQueryID, $argQuery){
      if(isset($_GET['subMode']) AND $_GET['subMode']==$valueSubMode){
    ?> 
        <fieldset id= <?php echo '"'.$fieldSetID.'"';?>>
            <b><?php echo $nameFieldset;?></b></br>
            <div class="panelFieldsetBackground">
            <p>
                <div class="panelFieldsetBackground">
                    <fieldset>
                        Valeur existante :
                        <?php
                        addLinkedDataEntry($readQuery,'',$selectName,$argQueryID,$argQuery,True);
                        ?>
                    </fieldset>
                </div>
            </p>
            ou
            <p>
                <fieldset>
                    <?php
                        addSimpleInput('Nouvelle valeur :</br>','text',$inputName);
                    ?>
                </fieldset></div>
            </p>   
        </fieldset>
    <?php
    }
}

//---------------------------------------------------------------------------------------------------------------
?>


    Type de la donnée à ajouter :</br>

    <?php 
    $url = './index.php?modeRead='.$modeRead.'&IDPersonneMode='.$IDPersonneMode.'&attributsMode='.$attributsMode.'&modeWrite=link&subMode=';
    $varSubMode = $subMode;
    if($varSubMode == '' OR $varSubMode == 'undefined')
        $varSubMode = 'Veuillez choisir une valeur'; //Sélectionnez une valeur
    else
        $varSubMode = 'Actuel : '.$varSubMode;
    ?>
    
    <select class="btn btn-primary btn-xs" onchange="location = this.options[this.selectedIndex].value;">
        <option value= <?php echo '\''. $url . ''.'\'';?>><?php echo $varSubMode; ?></option>
        <option value= <?php echo '\''. $url . 'source'.'\'';?>>Source</option>
        <option value= <?php echo '\''. $url . 'alias'.'\'';?>>Alias</option>
        <option value= <?php echo '\''. $url . 'langue'.'\'';?>>Langue</option>
        <option value= <?php echo '\''. $url . 'telephone'.'\'';?>>Téléphone</option>
        <option value= <?php echo '\''. $url . 'localisation'.'\'';?>>Localisation</option>
    </select></br></br>


   

    

    <div class="panelbackground scrollable">

<?php
if(isset($_GET['subMode']) AND $_GET['subMode']!='undefined'){
    ?>

    <?php
    $rep = listPersonneForMenu();
    ?>

    Individu concerné :
    <?php selectIDPersonne('','IDPersonne'); ?>
    </br>
    <hr>
    <?php
    $rep->closeCursor();
    //echo '\''. $url . 'langue'.'\''
    ?>

    <fieldset id="LinkSource">
        <label>Source : </label>
        <!--
        <fieldset class="panelFieldsetBackground">
            Nom cote :
            </br><input type="text" name="NomCote"/></br>
            Nature :
            </br><?php selectNatureCote('NatureCote'); ?></br>
            Date :
            </br><input type="date" name="DateCote" title="aaaa-mm-dd"/></br>
            Informations non exploitées :
            </br><input type="textarea" name="InfoCote"/></br>
        </fieldset>

        ou
        -->
        
            <!--Source existante :-->
            <?php
            addLinkedDataEntryWithoutEmptyOption(readAllTable('cote'),'','IDCote','IDCote','NomCote',True);
            ?>
        
    </fieldset>
<?php
}


//----- SOURCE ONLY-----
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
                    </fieldset>
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