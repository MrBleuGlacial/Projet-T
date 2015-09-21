<?php

function addLinkedDataEntry($readQuery,$selectPrint,$selectName,$argQueryID,$argQuery,$hideID){
    $rep = $readQuery;
    echo $selectPrint;
    ?>
    <select name= <?php echo $selectName; ?>>
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
    </br>
    <?php
    $rep->closeCursor();
}

function addLinkedDataEntryWithoutEmptyOption($readQuery,$selectPrint,$selectName,$argQueryID,$argQuery,$hideID){
    $rep = $readQuery;
    echo $selectPrint;
    ?>
    <select name= <?php echo $selectName; ?>>
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
  <select type="text" name= <?php echo $nomSelect; ?>>
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
    <option value = "Recherches Administratives"></option>
  </select>
  <?php
}

function addSimpleInput($selectPrint,$inputType,$inputName){
  echo $selectPrint;
  ?>
  <input type=<?php echo '\''.$inputType.'\''; ?> name=<?php echo '\''.$inputName.'\''; ?>/>
  <?php
}

function showTabBin($colonne1,$colonne2,$rep,$attribut1,$attribut2){
    ?>
    <table class="rowTitle tabRead scrollable">
    <tr><th><?php echo $colonne1 ?></th><th><?php echo $colonne2 ?></th></tr> 
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