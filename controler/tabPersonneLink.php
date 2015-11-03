 <?php

 //include("../controler/inputForForm.php");

    $modeWrite = "";
    $modeRead = "";
    $subMode = "";
    //$url = './index.php?';
    
    $url = $_SERVER['REQUEST_URI'];
    $url2 = $_SERVER['HTTP_HOST'];
    if(isset($_GET['modeWrite']))
    {
        $modeWrite = $_GET['modeWrite'];
    }
    if(isset($_GET['modeRead']))
    {
        $modeRead = $_GET['modeRead'];
    }
    if(isset($_GET['subMode']))
    {
        $subMode = $_GET['subMode'];
    }
  
    ?>

<form method="get" action=<?php echo '\''.$url.'\'';?>>

    <input type="hidden" name="modeWrite" value=<?php echo '"'.$modeWrite.'"'; ?>>
    <input type="hidden" name="modeRead" value=<?php echo '"'.$modeRead.'"'; ?>>
    <input type="hidden" name="subMode" value=<?php echo '"'.$subMode.'"'; ?>>


    Sélectionner un individu :
    </br> 
    <select name="IDPersonneMode" onchange="this.form.submit()">
       <?php
       $rep = listPersonneForMenu();
       ?>
       <option value=''>Sélectionnez une valeur</option>
       <?php
       while($donnees = $rep->fetch())
       {
       ?>
            <option value= <?php echo '\''. $donnees['IDPersonne'] . '\''; ?>> 
                <?php echo $donnees['Prenom'] . ' ' . $donnees['Nom']. ' (' . $donnees['IDDossier'] . $donnees['IDPersonne'] . ')';?>
            </option>
        <?php
        }
        ?>
    </select></br>
    </br>
    <?php
    $rep->closeCursor();
    /*
    ?>
    <pre>
    <?php
    print_r($_POST);
    ?>
    </pre>
    <?php
    */
    if(isset($_GET['IDPersonneMode']) AND $_GET['IDPersonneMode'] != ''){
        ?>
        <?php

        //Affiche la personne concernée
        $where = 'IDPersonne ='.$_GET['IDPersonneMode'];
        $rep = readAllTableWhere('personne',$where);
        $donnees =  $rep->fetch();
        $rep->closeCursor();
        echo '<b>' . $donnees['Prenom'] . ' ' . $donnees['Nom'] . ' ('.$donnees['IDDossier'].$donnees['IDPersonne'].') :</b>'; 


        //---------- Table Assoc ----------
        
        $rep = readAllAssociationTable($_GET['IDPersonneMode'],'personneToAlias','alias','IDAlias','Alias');
        showTabBin('Nom Cote','Alias',$rep,'NomCote','Alias',0);
        $rep->closeCursor();

        $rep = readAllAssociationTable($_GET['IDPersonneMode'],'personneToLangue','langue','IDLangue','Langue');
        showTabBin('Nom Cote','Langue',$rep,'NomCote','Langue',0);
        $rep->closeCursor();

        $rep = readAllAssociationTable($_GET['IDPersonneMode'],'personneToTelephone','telephone','IDTelephone','NumTelephone');
        showTabBin('Nom Cote','Telephone',$rep,'NomCote','NumTelephone',0);
        $rep->closeCursor();

        $rep = readLocalisationAssociation($_GET['IDPersonneMode']);
        ?>
        <table class="rowTitle tabRead scrollable table table-bordered table-striped ">
        <tr class="info"><th>Nom Cote</th><th>ID Localisation</th><th>Pays</th><th>Ville</th><th>Code Postal</th><th>Adresse</th>
        <?php
        while($donnees = $rep->fetch()){
        ?>
            <tr>
                <td><?php echo $donnees['NomCote'];?></td>
                <td><?php echo $donnees['IDLocalisation'];?></td>
                <td><?php echo $donnees['Pays'];?></td>
                <td><?php echo $donnees['Ville'];?></td>
                <td><?php echo $donnees['CodePostal'];?></td>
                <td><?php echo $donnees['Adresse'];?></td>
            </tr>
        <?php
        }
        ?>
        </table>
        <?php
        $rep->closeCursor();

        $rep = readSourceOnlyAssociation($_GET['IDPersonneMode']);
        ?>
        <table class="rowTitle tabRead scrollable table table-bordered table-striped ">
            <tr class="info">
                <th>Sources utilisées</th>
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
    ?>

</form>