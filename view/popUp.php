<?php
include("../controler/head.php");
?>
<div>
<input type=button onclick="refreshPopUp('source');" value="Ajout d'une Source">
<input type=button onclick="refreshPopUp('localisation');" value="Ajout d'une Localisation">
</br><hr>
<input type=button onclick="refreshPopUp('ville');" value="Ajout d'une Ville">
<input type=button onclick="refreshPopUp('pays');" value="Ajout d'un Pays"> 
<input type=button onclick="refreshPopUp('nationalite');" value="Ajout d'une Nationalité"> 
<input type=button onclick="refreshPopUp('langue');" value="Ajout d'une Langue"> 
<input type=button onclick="refreshPopUp('alias');" value="Ajout d'un Alias"> 
<input type=button onclick="refreshPopUp('telephone');" value="Ajout d'un Téléphone"> 
<input type=button onclick="refreshPopUp('profession');" value="Ajout d'une Profession"> 
</div>

<div class="scrollable panelShadow panelBackground popUpPanel">
<?php
include("../controler/popUpControler.php");
?>
</div>