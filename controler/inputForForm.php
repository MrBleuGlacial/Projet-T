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


function addSimpleInput($selectPrint,$inputType,$inputName){
  echo $selectPrint;
  ?>
  <input class="form-control" type=<?php echo '\''.$inputType.'\''; ?> name=<?php echo '\''.$inputName.'\''; ?>/>
  <?php
}

function selectInput($description,$table,$selectName,$arg1,$arg2){
    ?><label><?php
    echo $description;
    ?></label>
    <?php $rep = readAllTable($table);?>
    <select class="form-control" name= <?php echo '\''. $selectName .'\'' ?>>
        <option value= ''>Valeur vide</option>
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

function showTabBin($colonne1,$colonne2,$rep,$attribut1,$attribut2){
    ?>
    <table class="rowTitle tabRead scrollable table table-bordered table-striped ">
    <tr class="info"><th><?php echo $colonne1 ?></th><th><?php echo $colonne2 ?></th></tr> 
    <?php
    while($donnees = $rep->fetch()){
    ?>  
      <tr>
        <td><?php echo $donnees[$attribut1] ?></td>
      <td><?php echo $donnees[$attribut2] ?></td>
    </tr>
    <?php
    } 
    ?>
  </table>
  <?php
}


?>