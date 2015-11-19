<?php

function addLinkedDataEntry($readQuery,$selectPrint,$selectName,$argQueryID,$argQuery,$hideID){
    $rep = $readQuery;
    echo '<label>'. $selectPrint . '</label>';
    ?>
    <select class="form-control" name= <?php echo $selectName; ?>>
       <option value= ''>
        Aucune valeur à ajouter
       </option>
       <?php
       while($donnees = $rep->fetch())
       {
       ?>
            <option value= <?php echo '\''. $donnees[$argQueryID] . '\''; ?>> 
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

function addLinkedDataEntryWithoutEmptyOption($readQuery,$selectPrint,$selectName,$argQueryID,$argQuery,$hideID){
    $rep = $readQuery;
    echo '<label>'. $selectPrint . '</label>';
    ?>
    <select class="form-control" name= <?php echo $selectName; ?>>
       <?php
       while($donnees = $rep->fetch())
       {
       ?>
            <option value= <?php echo '\''. $donnees[$argQueryID] . '\''; ?>> 
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

function selectLocalisation($label,$nomSelect){
?>
<div class="panelFieldsetBackground">
  <fieldset>
    <label><?php echo $label;?></label>
    <select name=<?php echo '"'.$nomSelect.'"';?> class="form-control">
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
<?php
}

function selectIDPersonne($label,$nomSelect){
  ?>
  <label><?php echo $label;?></label>
  <select name=<?php echo '"'.$nomSelect.'"';?> class="form-control">
     <?php
      $rep = listPersonneForMenu();
          while($donnees = $rep->fetch())
          {
          ?>
              <option value= <?php echo '\''. $donnees['IDPersonne'] . '\''; ?>> 
                  <?php echo $donnees['IDDossier'] .'-'. $donnees['IDPersonne'] . ' : ' . $donnees['Prenom'] . ' ' . $donnees['Nom'];?>
              </option>
          <?php
          }
          ?>
  </select>
  <?php
}

function selectIDPersonneWithEmptyOption($label,$nomSelect){
  ?>
  <label><?php echo $label;?></label>
  <select name=<?php echo '"'.$nomSelect.'"';?> class="form-control">
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
            <option value= <?php echo '\''. $donnees['IDPersonne'] . '\''; ?>> 
                <?php echo $donnees['IDDossier'] .'-'. $donnees['IDPersonne'] . ' : ' . $donnees['Prenom'] . ' ' . $donnees['Nom'];?>
            </option>
        <?php
        }
        ?>
  </select>
  <?php
}


function addSimpleInput($selectPrint,$inputType,$inputName){
  ?>
  <label><?php echo $selectPrint;?></label>
  <input class="form-control" type=<?php echo '\''.$inputType.'\''; ?> name=<?php echo '\''.$inputName.'\''; ?>/>
  <?php
}

function selectInput($description,$table,$selectName,$arg1,$arg2,$emptyValue = true){
    ?><label><?php
    echo $description;
    ?></label>
    <?php $rep = readAllTable($table);?>
    <select class="form-control" name= <?php echo '\''. $selectName .'\'' ?>>
        <?php if($emptyValue){ echo '<option value= \'\'>Valeur vide</option>'; }?>
        <?php
        while($donnees = $rep->fetch())
        {
            ?> 
            <option value= <?php echo '\''.$donnees[$arg1].'\''; ?>>
                <?php echo $donnees[$arg2]; ?>
            </option>
        <?php
        }
        ?>
    </select>

<?php
}

function showTabBin($colonne1,$colonne2,$rep,$attribut1,$attribut2,$dataTable = 1){
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
        <td><?php echo $donnees[$attribut1] ?></td>
        <td><?php echo $donnees[$attribut2] ?></td>
      </tr>
    <?php
    } 
    ?>
  </table>
  <?php
}

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

?>