 <?php

include("../model/writeBDDFather.php");


if(isset($_POST['IDRelation']) AND isset($_POST['IDCote'])){
	$bdd->exec('INSERT INTO relationToCote (IDRelation, IDCote)
				VALUES('.$_POST['IDRelation'].','.$_POST['IDCote'].')');
}
	

?>


<pre>
<?php
print_r($_POST);
?>
</pre>

<?php
$url = 'Location: ../view/index.php?relationView=1&modeRead=main&modeWrite=link';
header($url);  