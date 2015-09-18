<?php
include("../controler/inputForForm.php");
?>

<form method="post" action="../model/writeBDDPersonneLink.php">

<?php

function formLinkDuo($valueSubMode, $fieldSetID, $nameFieldset, $inputName,$readQuery,$selectName, $argQueryID, $argQuery){
      if(isset($_GET['subMode']) AND $_GET['subMode']==$valueSubMode){
    ?> 
        <fieldset id= <?php echo '"'.$fieldSetID.'"';?>>
            <b><?php echo $nameFieldset;?></b></br> 
            <div class="panelFieldsetBackground">
            <fieldset>
                <?php
                    addSimpleInput('Nouvelle valeur :</br>','text',$inputName);
                ?>
            </fieldset></div>
            
            ou

            <div class="panelFieldsetBackground">
            <fieldset>
                Valeur existante :</br>
                <?php
                addLinkedDataEntry($readQuery,'',$selectName,$argQueryID,$argQuery,True);
                ?>
            </fieldset></div>
        </fieldset>
    <?php
    }
}

//---------------------------------------------------------------------------------------------------------------
?>


    Type de la donnée à ajouter :</br>

    <?php $url = 'http://localhost/tetrum/view/index.php?modeRead=main&modeWrite=link&subMode=';?>
    <select onchange="location = this.options[this.selectedIndex].value;">
        <option value= <?php echo '\''. $url . ''.'\'';?>>Sélectionnez une valeur</option>
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
    </br> 
    <select name="IDPersonne">
       <?php
       while($donnees = $rep->fetch())
       {
       ?>
            <option value= <?php echo '\''. $donnees['IDPersonne'] . '\''; ?>> 
                <?php echo $donnees['IDDossier'] . $donnees['IDPersonne'] . ' : ' . $donnees['Prenom'] . ' ' . $donnees['Nom'];?>
            </option>
        <?php
        }
        ?>
    </select></br>
    </br>
    <?php
    $rep->closeCursor();
    //echo '\''. $url . 'langue'.'\''
    ?>

    <fieldset id="LinkSource">
        <b>Source : </b>
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
        <fieldset class="panelFieldsetBackground">
            <!--Source existante :-->
            <?php
            addLinkedDataEntryWithoutEmptyOption(readAllTable('cote'),'','IDCote','IDCote','NomCote',True);
            ?>
        </fieldset>
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
            <b>Localisation :</b><br>
            <div class="panelFieldsetBackground">
                <fieldset>
                 - Nouvelle Localisation -</br>
                <?php
                addLinkedDataEntry(readAllTable('pays'),'Pays : ','IDPays','IDPays','Pays',True);
                addLinkedDataEntry(readAllTable('ville'),'Ville : ','IDVille','IDVille','Ville',True);
                ?>
                Adresse :</br>  
                <input type="text" name="Adresse">
                Code Postal :</br>
                <input type="text" name="CodePostal">

                </fieldset>
            </div>
            ou
            <div class="panelFieldsetBackground">
                <fieldset>
                Valeur existante :
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
                            <?php echo $donnees['IDLocalisation'] . ' - ' . $donnees['Pays'] . ' / ' . $donnees['Ville'] . ' / ' . $donnees['Adresse'];?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
                </fieldset>
            </div>
        </fieldset>
        <?php
        }
        ?>
</div>

    <!-- source + localisation (ville+pays+adresse)-->
    </br>
    <input type="submit" value="Valider" />
    <input type="reset" value="Reset" />
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