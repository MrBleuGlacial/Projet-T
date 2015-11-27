<?php

//echo "#ROOTING FONCTIONNEL";

?>

<form  method="post" action="../model/writeBDDPersonneAttributs.php">

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

	<input type='hidden' name='attributsMode' value=<?php echo '"'.$attributsMode.'"';?>>


<!-- Select Basic -->
<?php
if($attributsMode == 'familiaux' OR $attributsMode == 'administratifs'){
?>
Individu concerné : 
<?php
selectIDPersonne('','IDPersonne');
}
?>

<hr>


<?php 
//----------------------------ATTRIBUTS FAMILIAUX-----------------------------------
if($attributsMode == 'familiaux')
	include('../view/attributsFamiliauxForm.php');
elseif($attributsMode == ('administratifs'))
	include('../view/attributsAdministratifsForm.php');
?>


</form>




