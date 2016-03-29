<?php
/**
*Fichier comportant de nombreuses fonctions facilitant la création de formulaires.
*/

/**
*Permet de créer un champ de sélection générique pour une donnée à sélectionner via une requête spécifiée.
*Accepte une valeur nulle par défaut.
*/
function addLinkedDataEntry($readQuery,$selectPrint,$selectName,$argQueryID,$argQuery,$hideID, $IDValue = NULL){
    $rep = $readQuery;
    echo '<label>'. $selectPrint . '</label>';
    ?>
    <select class="chzn-select form-control" name= <?php echo $selectName; ?>>
       <option value= ''>
        Aucune valeur à ajouter
       </option>
       <?php
       while($donnees = $rep->fetch())
       {
       ?>
            <option value= <?php echo '\''. $donnees[$argQueryID] . '\'' ; if($IDValue==$donnees[$argQueryID]) echo 'selected'; ?>> 
                <?php
                    if($hideID)
                        echo $donnees[$argQuery];
                    else
                        echo $donnees[$argQueryID] . ' : ' . $donnees[$argQuery]; 
                ?>
            </option>
        <?php
        }
        ?>
    </select>
    <?php
    $rep->closeCursor();
}

/**
*Permet de créer un champ de sélection générique pour une donnée à sélectionner via une requête spécifiée.
*N'accepte aucune valeur nulle.
*/
function addLinkedDataEntryWithoutEmptyOption($readQuery,$selectPrint,$selectName,$argQueryID,$argQuery,$hideID,$IDValue = NULL){
    $rep = $readQuery;
    echo '<label>'. $selectPrint . '</label>';
    ?>
    <select class="chzn-select form-control" name= <?php echo $selectName; ?>>
       <?php
       while($donnees = $rep->fetch())
       {
       ?>
            <option value= <?php echo '\''. $donnees[$argQueryID] . '\' '; if($IDValue==$donnees[$argQueryID]) echo 'selected';?>> 
                <?php
                    if($hideID)
                        echo $donnees[$argQuery];
                    else
                        echo $donnees[$argQueryID] . ' : ' . $donnees[$argQuery]; 
                ?>
            </option>
        <?php
        }
        ?>
    </select>
    </br>
    <?php
    $rep->closeCursor();
}
/**
*Crée un champ de sélection pour la nature d'une cote.
*/
function selectNatureCote($nomSelect){
  ?>
  <select class="form-control" type="text" name= <?php echo '"'.$nomSelect.'"'; ?>>
    <option value = "Audition">Audition</option>
    <option value = "Carte d'identité">Carte d'identité</option>
    <option value = "Document administratif">Document administratif</option>
    <option value = "Interpellation">Interpellation</option>
    <option value = "IPC Interrogatoire première comparution">IPC Interrogatoire première comparution</option>
    <option value = "Livret de famille">Livret de famille</option>
    <option value = "Passeport">Passeport</option>
    <option value = "Récepissé demande d'asile">Récepissé demande d'asile</option>
    <option value = "Retranscription écoute">Retranscription écoute</option>
    <option value = "Titre de séjour">Titre de séjour</option>
    <option value = "Dossier étranger">Dossier étranger</option>
    <option value = "Document autorités autre pays UE">Document autorités autre pays UE</option>
    <option value = "Attache téléphonique">Attache téléphonique</option>
    <option value = "Recherches Administratives">Recherches Administratives</option>
  </select>
  <?php
}

/**
*Crée un champ de sélection pour une localisation.
*Peut admettre une valeur nulle.
*/
function selectLocalisation($label,$nomSelect,$IDLocalisation = NULL){
?>
<div class="panelFieldsetBackground">
  <fieldset>
    <label><?php echo $label;?></label>
    <select name=<?php echo '"'.$nomSelect.'"';?> class="chzn-select form-control">
          <option value= ''>
          Aucune valeur à ajouter
          </option>
      <?php
      $rep = readLocalisation();
      while($donnees = $rep->fetch())
      {
      ?>
          <option value= <?php echo '\''. $donnees['IDLocalisation'] . '\''; if($IDLocalisation != NULL){if($donnees['IDLocalisation']==$IDLocalisation) echo ' selected';}?>> 
              <?php echo $donnees['IDLocalisation'] . ' - ' . $donnees['Pays'] . ' / ' . $donnees['Ville'] . ' / ' . $donnees['Adresse'] . ' / ' .  $donnees['CodePostal'];?>
          </option>
      <?php
      }
      ?>
    </select>
  </fieldset>
</div>
<?php
}

/**
*Crée un champ de sélection pour une localisation.
*N'admet aucune valeur nulle.
*/
function selectLocalisationWithoutEmptyOption($label,$nomSelect,$IDLocalisation = NULL){
?>
<div class="panelFieldsetBackground">
  <fieldset>
    <label><?php echo $label;?></label>
    <select name=<?php echo '"'.$nomSelect.'"';?> class="chzn-select form-control">
      <?php
      $rep = readLocalisation();
      while($donnees = $rep->fetch())
      {
      ?>
          <option value= <?php echo '\''. $donnees['IDLocalisation'] . '\''; if($IDLocalisation != NULL){if($donnees['IDLocalisation']==$IDLocalisation) echo ' selected';}?>> 
              <?php echo $donnees['IDLocalisation'] . ' - ' . $donnees['Pays'] . ' / ' . $donnees['Ville'] . ' / ' . $donnees['Adresse'] . ' / ' .  $donnees['CodePostal'];?>
          </option>
      <?php
      }
      ?>
    </select>
  </fieldset>
</div>
<?php
}

/**
*Crée un champ permettant de sélectionner une relation par son ID.
*/
function selectIDRelation($label,$nomSelect){
   ?>
  <label><?php echo $label;?></label>
  <select name=<?php echo '"'.$nomSelect.'"';?> class="chzn-select form-control">
     <?php
      $rep = readRelationMain();
        while($donnees = $rep->fetch())
        {
        ?>
          <option value= <?php echo '\''. $donnees['IDRelation'] . '\''; ?>> 
              <?php echo $donnees['IDRelation'].': '.$donnees['IDDossierEgo'].'('.$donnees['IDEgo'].')-'.$donnees['IDDossierAlter'].'('.$donnees['IDAlter'].')   ('.$donnees['TypeLien'].')';?>
          </option>
        <?php
        }
        ?>
  </select>
  <?php
}

/**
*Crée un champ permettant de sélectionner un déplacement par son ID.
*/
function selectIDGeo($label,$nomSelect){
  ?>
  <label><?php echo $label;?></label>
  <select name=<?php echo '"'.$nomSelect.'"';?> class="chzn-select form-control">
     <?php
     $rep = readAllTable('geo');
     while($donnees = $rep->fetch()){
      ?>
        <option value= <?php echo '\''. $donnees['IDGeo'] . '\''; ?>>
           <?php echo 'ID - '.$donnees['IDGeo'];?>
        </option>
      <?php
      }
      ?>
  </select>
  <?php
}

/**
*Crée un champ permettant de sélectionner une personne par son ID.
*/
function selectIDPersonne($label,$nomSelect,$IDPersonne = NULL){
  ?>
  <label><?php echo $label;?></label>
  <select name=<?php echo '"'.$nomSelect.'"';?> class="chzn-select form-control">
     <?php
      $rep = listPersonneForMenu();
          while($donnees = $rep->fetch())
          {
          ?>
              <option value= <?php echo '\''. $donnees['IDPersonne'] . '\''; if($IDPersonne != NULL){if($donnees['IDPersonne']==$IDPersonne) echo ' selected';}?>> 
                  <?php echo $donnees['IDDossier'] .'-'. $donnees['IDPersonne'] . ' : ' . $donnees['Prenom'] . ' ' . $donnees['Nom'].' ';
                  $repTmp = readAllAssociationTable($donnees['IDPersonne'],'personneToAlias','alias','IDAlias','Alias');
                  while($donneesTmp = $repTmp->fetch())
                  {
                    echo '\''.$donneesTmp['Alias'] . '\' ';
                  }
                  ?>
              </option>
          <?php
          }
          ?>
  </select>
  <?php
}

/**
*Crée un champ permettant de sélectionner une personne par son ID.
*Peut admettre une valeur nulle.
*/
function selectIDPersonneWithEmptyOption($label,$nomSelect,$IDPersonne = NULL){
  ?>
  <label><?php echo $label;?></label>
  <select name=<?php echo '"'.$nomSelect.'"';?> class="chzn-select form-control">
     <?php
      $rep = listPersonneForMenu();
        ?>
        <option value= ''>
        Aucune valeur à ajouter
        </option>
        <?php
        while($donnees = $rep->fetch())
        {
        ?>
            <option value= <?php echo '\''. $donnees['IDPersonne'] . '\''; if($IDPersonne != NULL){if($donnees['IDPersonne']==$IDPersonne) echo ' selected';}?>> 
                <?php echo $donnees['IDDossier'] .'-'. $donnees['IDPersonne'] . ' : ' . $donnees['Prenom'] . ' ' . $donnees['Nom'].' ';
                $repTmp = readAllAssociationTable($donnees['IDPersonne'],'personneToAlias','alias','IDAlias','Alias');
                while($donneesTmp = $repTmp->fetch())
                {
                    echo '\''.$donneesTmp['Alias'] . '\' ';
                }
                ?>
            </option>
        <?php
        }
        ?>
  </select>
  <?php
}

/**
*Crée un input pré-formaté ne nécessitant aucune requête. 
*/
function addSimpleInput($selectPrint,$inputType,$inputName, $selectValue = NULL){
  ?>
  <label><?php echo $selectPrint;?></label>
  <input 
    class="form-control" 
    type=<?php echo '\''.$inputType.'\''; ?> 
    name=<?php echo '\''.$inputName.'\''; ?>
    <?php
    if($selectValue){ echo 'value = "'.str_replace('"','\'',$selectValue).'"';}
    ?>
  />
  <?php
}

/**
*Permet de créer un champ de sélection générique pour une donnée à sélectionner via une table spécifiée.
*N'Accepte aucune valeur nulle.
*/
function selectInput($description,$table,$selectName,$arg1,$arg2,$emptyValue = true, $select = false, $selectValue = NULL){
    ?><label><?php
    echo $description;
    ?></label>
    <?php $rep = readAllTable($table);?>
    <select class="chzn-select form-control" name= <?php echo '\''. $selectName .'\'' ?>>
        <?php if($emptyValue){ echo '<option value= \'\'>Valeur vide</option>'; }?>
        <?php
        while($donnees = $rep->fetch())
        {
            ?> 
            <option value= <?php echo '\''.$donnees[$arg1].'\' '; if($select){if($donnees[$arg1]==$selectValue) echo 'selected';};?>>
                <?php echo $donnees[$arg2]; ?>
            </option>
        <?php
        }
        ?>
    </select>

<?php
}

/**
*Crée un tableau à deux colonnes en fonction d'une requête. 
*Utilisé pour les données de fond.
*/
function showTabBin($colonne1,$colonne2,$rep,$attribut1,$attribut2,$dataTable = 1, $url = NULL){
    ?>
    <table class= 
      <?php 
        echo '"rowTitle ';
        if($dataTable == 1){ echo 'readTab '; }
        echo 'scrollable table table-bordered table-striped "';
      ?>
    >
    <thead>
      <tr class="info">
        <?php if($dataTable == 1){ ?>
          <th> Numéro </th>
        <?php } ?>
        <th><?php echo $colonne1 ?></th>
        <th><?php echo $colonne2 ?></th>
      </tr> 
    </thead>
    <?php
    $i = 0;
    while($donnees = $rep->fetch()){
    ?>  
      <tr>
        <?php if($dataTable == 1){ ?>
          <th> <?php $i++; echo $i;?> </th>
        <?php } ?>
        <td>
          <?php if($url){ ?>
          <a class="glyphicon glyphicon-wrench" href=<?php echo '"'.$url.$donnees[$attribut1].'"'; ?>></a>
          <?php } ?>
          <?php echo ' '.$donnees[$attribut1] ?>
        </td>
        <td><?php echo $donnees[$attribut2] ?></td>
      </tr>
    <?php
    } 
    ?>
  </table>
  <?php
}

/**
*Crée un input permettant au choix la saisie d'une nouvelle valeur ou la sélection d'une valeur pré-existante.
*/
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

/**
*Crée la liste des cotes liées à une personne déterminée par son ID.
*/
function tabCoteLink($IDPersonne,$tabName='personneToCote',$printTab='Sources identifiants'){
        $rep = readSourceOnlyAssociation($IDPersonne,$tabName);
        ?>
        <table class="rowTitle tabRead scrollable table table-bordered table-striped ">
            <tr class="info">
                <th><?php echo $printTab; ?></th>
                <th>
                    <pre>
                        <?php
                        //while($donnees = $rep->fetch()){
                        //    echo $donnees['NomCote'].' ';
                        //}   
                        $donnees = $rep->fetchAll();
                        $nmbrCote = count($donnees);
                        for($i = 0; $i < $nmbrCote; $i++){
                            if($i==($nmbrCote-1))
                                echo $donnees[$i][1];
                            else
                                echo $donnees[$i][1].', ';
                        }
                        //print_r($rep->fetchAll());
                        ?>
                    </pre>
                </th>
            </tr>
        </table>
        <?php
}

/**
*Crée une liste de cases qui correspond aux valeurs d'une table de données liée à une personne. Sert pour la désattribution de données liées.
*/
function checkBoxToDelRep($rep,$IDArg,$Arg){
    $i = 0;
    while($donnees = $rep->fetch()){
        ?>
        <input type="checkbox" name=<?php echo '"element'.$i++.'"'?> value=<?php echo '"'.$donnees[$IDArg].'"';?>>
        <?php echo $donnees[$Arg];?>
        <br>
        <?php
    }
    ?> <input type='hidden' name='numberElement' value=<?php echo '"'.$i.'"';?>> <?php 
}




/*
function formToDelLink(){
  
}
*/

?>