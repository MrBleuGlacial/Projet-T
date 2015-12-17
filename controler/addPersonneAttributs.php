<?php

//echo "#ROOTING FONCTIONNEL";

?>


<?php 
$url = './index.php?modeRead='.$modeRead.'&IDPersonneMode='.$IDPersonneMode.'&modeWrite=attributs&subMode='.$subMode.'&attributsMode='; 
$varAttributsMode = $attributsMode;
if($varAttributsMode != 'familiaux' AND $varAttributsMode != 'administratifs')
	$varAttributsMode = 'Veuillez choisir le type d\'attribut';
else
	$varAttributsMode = 'Actuel : '.$varAttributsMode;
?>
  	<select class="btn btn-primary btn-xs" onchange="location = this.options[this.selectedIndex].value;">
        <option value= <?php echo '\''. $url . ''.'\'';?>><?php echo $varAttributsMode; ?></option>
        <option value= <?php echo '\''. $url . 'familiaux'.'\'';?>>Familiaux</option>
        <option value= <?php echo '\''. $url . 'administratifs'.'\'';?>>Administratifs</option>    
	</select></br></br>

	


<!-- Select Basic -->
<?php
if($attributsMode == 'familiaux' OR $attributsMode == 'administratifs'){
	
	/*
	Individu concerné : 
	<?php
	selectIDPersonne('','IDPersonne');
	*/
	//$url = $_SERVER['REQUEST_URI'];
	$url = '../view/index.php?modeRead=main&modeWrite=attributs&subMode='.$subMode.'&attributsMode='.$attributsMode;
	//echo $url;
	?>
	<form method="post" action=<?php echo '\''.$url.'\'';?>>
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
                <?php echo $donnees['Prenom'] . ' ' . $donnees['Nom']. ' (' . $donnees['IDDossier'] . $donnees['IDPersonne'] . ')';?>
            </option>
        <?php
        }
        ?>
    </select></br>
    </br>
	</form>
    <?php
    //if(isset($_POST['IDPersonneMode'])) echo $_POST['IDPersonneMode'];
    $rep->closeCursor();


}
if(isset($_POST['IDPersonneMode'])){
	$where = 'IDPersonne ='.$_POST['IDPersonneMode'];
    $rep = readAllTableWhere('personne',$where);
    $donnees =  $rep->fetch();
    $rep->closeCursor();
    echo 'Attributs '.$attributsMode.' de : <b>' . $donnees['Prenom'] . ' ' . $donnees['Nom'] . ' ('.$donnees['IDDossier'].$donnees['IDPersonne'].')</b></br>'; 
}
?>

<hr>

<form  method="post" action="../model/writeBDDPersonneAttributs.php">
<input type='hidden' name='attributsMode' value=<?php echo '"'.$attributsMode.'"';?>>
<?php 
//----------------------------ATTRIBUTS FAMILIAUX-----------------------------------
if($attributsMode == 'familiaux' AND isset($_POST['IDPersonneMode'])){
	include('../view/attributsFamiliauxForm.php');
	?>
	<input type='hidden' name='IDPersonne' value=<?php echo '"'.$_POST['IDPersonneMode'].'"';?>>
	<?php
}
elseif($attributsMode == 'administratifs' AND isset($_POST['IDPersonneMode'])){
	include('../view/attributsAdministratifsForm.php');
	?>
	<input type='hidden' name='IDPersonne' value=<?php echo '"'.$_POST['IDPersonneMode'].'"';?>>
	<?php
}
?>


</form>




