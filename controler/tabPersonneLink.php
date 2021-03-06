 <?php
/**
*Gère l'affichage des données multiples en fonction de l'ID d'une personne.
*/
/**
*
*/
 //include("../controler/inputForForm.php");

/*
    $modeWrite = "";
    $modeRead = "";
    $subMode = "";
*/
    //$url = './index.php?';
    
    //$url = $_SERVER['REQUEST_URI'];
    $url = './index.php?modeRead=link&modeWrite=link&subMode='.$subMode.'&attributsMode='.$attributsMode;
    //$url2 = $_SERVER['HTTP_HOST'];
    $url2 = './index.php?modeRead=link&modeWrite=link&IDPersonneMode='.$IDPersonneMode.'&subMode='.$subMode.'&attributsMode='.$attributsMode.'&formMode=';

/*
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
  */
    ?>
<div class='col-lg-12'>
<form method="get" action=<?php echo '\''.$url.'\'';?>>

    <input type="hidden" name="modeWrite" value="link">
    <input type="hidden" name="modeRead" value=<?php echo '"'.$modeRead.'"'; ?>>
    <input type="hidden" name="subMode" value=<?php echo '"'.$subMode.'"'; ?>>


    Sélectionner un individu :
    </br> 
    <select class="chzn-select" name="IDPersonneMode" onchange="this.form.submit()">
       <?php
       $rep = listPersonneForMenu();
       ?>
       <option value=''>Sélectionnez une valeur</option>
       <?php
       while($donnees = $rep->fetch())
       {
       ?>
            <option value= <?php echo '\''. $donnees['IDPersonne'] . '\''; ?>> 
                <?php 
                echo $donnees['Prenom'] . ' ' . $donnees['Nom']. ' (' . $donnees['IDDossier'] . $donnees['IDPersonne'] . ') ';
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
        <a class="glyphicon glyphicon-wrench" href=<?php echo '"'.$url2.'mod"'; ?>></a> 
        <?php
        //Affiche la personne concernée
        $where = 'IDPersonne ='.$IDPersonneMode;
        $rep = readAllTableWhere('personne',$where);
        $donnees =  $rep->fetch();
        $rep->closeCursor();
        echo '<b>' . $donnees['Prenom'] . ' ' . $donnees['Nom'] . ' ('.$donnees['IDDossier'].$donnees['IDPersonne'].') '; 
        $repTmp = readAllAssociationTable($donnees['IDPersonne'],'personneToAlias','alias','IDAlias','Alias');
        while($donneesTmp = $repTmp->fetch())
        {
            echo '\''.$donneesTmp['Alias'] . '\' ';
        }
        echo ':</b>';
        
//---------- Table Assoc ----------
//---------------------------------------------------------------------------------------------------        
        
        $rep = readAllAssociationTable($IDPersonneMode,'personneToAlias','alias','IDAlias','Alias');
        showTabBin('Nom Cote','Alias',$rep,'NomCote','Alias',0);
        $rep->closeCursor();

//---------------------------------------------------------------------------------------------------

        
        $rep = readRoleAssociation($IDPersonneMode);
        ?>
        <table class="scrollable table table-bordered table-striped ">
        <tr class="info">
            <th>Nom Cote</th>
            <th>Role</th>
            <th>Début</th>
            <th>Fin</th>
            <th>Date début approximation</th>
            <th>Date fin approximation</th>
            <th>Identifiant Qualitatif</th>
        <tr>
        <?php
        while($donnees = $rep->fetch()){
        ?>
        <tr>
            <td><?php echo $donnees['NomCote'];?></td>
            <td><?php echo $donnees['Role'];?></td>
            <td><?php echo $donnees['DebutRole'];?></td>
            <td><?php echo $donnees['FinRole'];?></td>
            <td><?php echo $donnees['PeriodeMois'];?></td>
            <td><?php echo $donnees['PeriodeAnnee'];?></td>
            <td><?php echo $donnees['IdentifiantQuali'];?></td>
        </tr>
        <?php
        }
        ?>
        </table>
        <?php
        $rep->closeCursor();
        
//---------------------------------------------------------------------------------------------------

        
        $rep = readPassportAssociation($IDPersonneMode);
        ?>
        <table class="scrollable table table-bordered table-striped ">
        <tr class="info">
            <th>Nom Cote</th>
            <th>Numéro Passport</th>
            <th>Nationalité Passport</th>
            <th>Début Validité</th>
            <th>Fin Validité</th>
        <tr>
        <?php
        while($donnees = $rep->fetch()){
        ?>
        <tr>
            <td><?php echo $donnees['NomCote'];?></td>
            <td><?php echo $donnees['NumPassport'];?></td>
            <td><?php echo $donnees['NationalitePassport'];?></td>
            <td><?php echo $donnees['DebutValPassport'];?></td>
            <td><?php echo $donnees['FinValPassport'];?></td>
        </tr>
        <?php
        }
        ?>
        </table>
        <?php
        $rep->closeCursor();

//---------------------------------------------------------------------------------------------------

        $rep = readAllAssociationTable($IDPersonneMode,'personneToLangue','langue','IDLangue','Langue');
        showTabBin('Nom Cote','Langue',$rep,'NomCote','Langue',0);
        $rep->closeCursor();

//---------------------------------------------------------------------------------------------------

        $rep = readAllAssociationTable($IDPersonneMode,'personneToTelephone','telephone','IDTelephone','NumTelephone');
        showTabBin('Nom Cote','Telephone',$rep,'NomCote','NumTelephone',0);
        $rep->closeCursor();

//---------------------------------------------------------------------------------------------------

        $rep = readSimilariteAssociation($IDPersonneMode);
        ?>
        <table class="scrollable table table-bordered table-striped ">
        <tr class="info"><th> Possibilité Personnes Similaires</th>
        <th>
            <pre>
                <?php
                $donnees = $rep->fetchAll();
                //print_r($donnees);
                
                        $nmbrCote = count($donnees);
                        for($i = 0; $i < $nmbrCote; $i++){
                            if($i==($nmbrCote-1))
                                echo '('.$donnees[$i][0].$donnees[$i][1].') '.$donnees[$i][2].' '.$donnees[$i][3];
                            else
                                echo '('.$donnees[$i][0].$donnees[$i][1].') '.$donnees[$i][2].' '.$donnees[$i][3].', ';
                        }
                
            ?>
            </pre>
        </th>
        </tr>
<?php
//---------------------------------------------------------------------------------------------------
        
        $rep = readLocalisationAssociation($IDPersonneMode);
        ?>
        <table class="scrollable table table-bordered table-striped ">
        <tr class="info"><th>Nom Cote</th><th>Date Début</th><th>Date Fin</th><th>ID Localisation</th><th>Pays</th><th>Ville</th><th>Code Postal</th><th>Adresse</th>
        <?php
        while($donnees = $rep->fetch()){
        ?>
            <tr>
                <td><?php echo $donnees['NomCote'];?></td>
                <td><?php echo $donnees['DateDebutApx'];?></td>
                <td><?php echo $donnees['DateFinApx'];?></td>
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

//---------------------------------------------------------------------------------------------------

        //$rep = readSourceOnlyAssociation($_GET['IDPersonneMode']);
        tabCoteLink($_GET['IDPersonneMode']);
        tabCoteLink($_GET['IDPersonneMode'],'personneToCoteFam','Sources attributs familiaux');
        tabCoteLink($_GET['IDPersonneMode'],'personneToCoteAdm','Sources attributs administratifs');


    }
    ?>

</form>
</div>