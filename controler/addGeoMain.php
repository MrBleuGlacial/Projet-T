<!-- ADD GEO MAIN -->
<?php
/**
*Gère les formulaires d'ajout ou de modification de déplacements geo.
*Le paramètre 'formMode' détermine si on est en ajout ou en modification.
*@uses jqueryScript.js Bouton "Supprimer" est lié à une fonction jquery.
*/

/**
*/

?>
<form id="formAddModDel" method="post" action="../model/writeBDDGeoMain.php"> 

    <input type='hidden' name='formMode' value=<?php echo '"'.$formMode.'"';?>>

    <?php 
    if($formMode == 'mod'){
        $tmpWhere = 'IDGeo = '.$IDGeoMode;
        //echo $IDGeoMode;
        $donnees = readAllTableWhere('geo',$tmpWhere)->fetch();
        /*
        ?>
        <pre>
        <?php print_r($donnees); ?>
        </pre>
        */
        ?>
        <input type='hidden' name='IDGeo' value=<?php echo '"'.$donnees['IDGeo'].'"';?>>
        <?php
    }

    selectIDPersonne('Individu concerné :','IDPersonne',$donnees['IDPersonne']);
    ?> </br></br> <?php
    selectLocalisationWithoutEmptyOption('Localisation de départ','IDLocalisationDepart',$donnees['IDLocalisationDepart']);
    selectLocalisationWithoutEmptyOption('Localisation d\'arrivée','IDLocalisationArrivee',$donnees['IDLocalisationArrivee']);
    addSimpleInput('Date :','date','Date',$donnees['Date']);
    addSimpleInput('Cause du déplacement :','text','CauseDeplacement',$donnees['CauseDeplacement']);
    addSimpleInput('Mode de transport :','text','ModeTransport',$donnees['ModeTransport']);
    $maxID = checkMaxID('Identifiant','geo');
    addSimpleInput('Identifiant :','text','Identifiant',$donnees['Identifiant']);
    echo 'Nt: ID maximum actuel : '.$maxID.'</br>';
    ?>
	</br>
    </br>
    <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-ok"></span> Valider </button>
    <button class="btn btn-warning" type="reset"><span class="glyphicon glyphicon-repeat"></span> Reset </button>
    <?php 
    if($formMode=='mod'){
    ?>
        <input id="deleteValue" type="hidden"  name="delete"  value="0">
        <button class="btn btn-danger" id="deleteSubmit"/><span class="glyphicon glyphicon-remove-sign"></span> Supprimer </button> 
    <?php
    }
    ?>
</form>