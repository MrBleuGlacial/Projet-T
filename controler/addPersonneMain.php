<form  method="post" action="../model/writeBDDPersonneMain.php">

    <input type='hidden' name='formMode' value=<?php echo '"'.$formMode.'"';?>>

    <?php
    if($formMode=='mod'){
        $tmpWhere = 'IDPersonne = '.$IDPersonneMode;
        $donnees = readAllTableWhere('personne',$tmpWhere)->fetch();
        ?>
        <input type='hidden' name='IDPersonne' value=<?php echo '"'.$donnees['IDPersonne'].'"';?>>        
        <?php
    }
    ?>

    <label>Prénom :</label>
    <input class="form-control" type="text" name="Prenom"
    <?php if($formMode=='mod') echo 'value = "'.$donnees['Prenom'].'"';?>
    />
    
    <label>Nom :</label>
    <input class="form-control" type="text" name="Nom"
    <?php if($formMode=='mod') echo 'value = "'.$donnees['Nom'].'"';?>
    />

    <label>Lettre(s) identifiante(s) du dossier :</label>
    <input class="form-control" type="text" name="IDDossier" required 
    <?php if($formMode=='mod') echo 'value = "'.$donnees['IDDossier'].'"';?>
    />

    <?php
    selectInput('Cote Initiale :','cote','IDCoteInitiale','IDCote','NomCote',false,true,$donnees['IDCoteInitiale']);
    ?>
    
    <label>Sexe :</label>
    <select class="form-control" name="Sexe">
       <option value="Homme" <?php if($formMode){if($donnees['Sexe']=='Homme') echo ' selected';}?>>Homme</option>
       <option value="Femme" <?php if($formMode){if($donnees['Sexe']=='Femme') echo ' selected';}?>>Femme</option>
    </select>

    <label>Type de personne :</label>
    <select class="form-control" name="TypePersonne">
       <option value="Personne Physique" <?php if($formMode){if($donnees['TypePersonne']=='Personne Physique') echo ' selected';}?>>Physique</option>
       <option value="Personne Morale" <?php if($formMode){if($donnees['TypePersonne']=='Personne Morale') echo ' selected';}?>>Morale</option>
    </select>
    
    <label>Date de naissance :</label>
    <input class="form-control" type="date" name="DateNaissance"
    <?php if($formMode=='mod') echo 'value = "'.$donnees['DateNaissance'].'"'; else echo 'value = "aaaa-mm-jj"';?>
    />

    <label>Se prostitue :</label>
    <div class="form-control">
        <label class="radio-inline">
            <input name="SeProstitue" value="0" type="radio" 
            <?php if($formMode){if($donnees['SeProstitue']==0) echo ' checked';}?>
            >
            Non
        </label> 
        <label class="radio-inline">
            <input name="SeProstitue" value="1" type="radio"
            <?php if($formMode){if($donnees['SeProstitue']==1) echo ' checked';}?>
            >
            Oui
        </label> 
        <label class="radio-inline">
            <input name="SeProstitue" value="" type="radio"
            <?php if($formMode){if($donnees['SeProstitue']=='') echo ' checked';}?>
            >
            Inconnu
        </label> 
    </div>

<?php
/*
    Profession avant migration :
    </br>
    <input type="text" name="ProfessionAvantMigration"/>
    </br>

    Profession pendant interrogatoire :
    </br>
    <input type="text" name="ProfessionDurantInterrogatoire"/>
    </br>
*/
selectInput('Profession avant migration :','profession','ProfessionAvantMigration','IDProfession','Profession',true,true,$donnees['IDProfessionAvantMigration']);
selectInput('Profession pendant interrogatoire :','profession','ProfessionDurantInterrogatoire','IDProfession','Profession',true,true,$donnees['IDProfessionDurantInterrogatoire']);
selectInput('Nationalité :','pays','Nationalite','IDPays','Pays',true,true,$donnees['IDNationalite']);
selectInput('Ville de naissance :','ville','VilleNaissance','IDVille','Ville',true,true,$donnees['IDVilleNaissance']);
selectInput('Pays de naissance :','pays','PaysNaissance','IDPays','Pays',true,true,$donnees['IDPaysNaissance']);
?>


    <label>Montant de la dette initiale :</label>
    <input class="form-control" type="number" name="DetteInitiale"
    <?php if($formMode=='mod') echo 'value = "'.$donnees['DetteInitiale'].'"';?>
    />

    <label>Montant de la dette re-négociée :</label>
    <input class="form-control" type="number" name="DetteRenegociee"
    <?php if($formMode=='mod') echo 'value = "'.$donnees['DetteRenegociee'].'"';?>
    />

    <label>Date où la dette est payée :</label>
    <input class="form-control" type="date" name="DateDettePayee" 
    <?php if($formMode=='mod') echo 'value = "'.$donnees['DateDettePayee'].'"'; else echo 'value = "aaaa-mm-jj"';?>
    />

    <label>Date où x est recruté(e) :</label>
    <input class="form-control" type="date" name="DateEstRecrute" 
    <?php if($formMode=='mod') echo 'value = "'.$donnees['DateEstRecrute'].'"'; else echo 'value = "aaaa-mm-jj"';?>
    />

    <label>Date où x recrute :</label>
    <input class="form-control" type="date" name="DateRecrute" 
    <?php if($formMode=='mod') echo 'value = "'.$donnees['DateRecrute'].'"'; else echo 'value = "aaaa-mm-jj"';?>
    />

    <label>Dernier diplôme obtenu :</label>
    <select class="form-control" name="Diplome">
       <option value="primary school" <?php if($formMode){if($donnees['Diplome']=='primary school') echo ' selected';}?>>Primary School</option>
       <option value="secondary school" <?php if($formMode){if($donnees['Diplome']=='secondary school') echo ' selected';}?>>Secondary School</option>
       <option value=""  <?php if($formMode){if($donnees['Diplome']!='primary school' AND $donnees['Diplome']!='secondary school') echo ' selected';}?>>Aucun</option>
    </select>

    </br>
    </br>
    <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-ok"></span> Valider </button>
    <button class="btn btn-warning" type="reset"><span class="glyphicon glyphicon-repeat"></span> Reset </button>

</form>

<?php

// ONGLET DEROULANT AVEC PARSER INTEGRE : CLASS chzn-select A AJOUTER AU SELECT


/*
    Nationalité :
    </br>
    <?php $rep = readAllTable('nationalite');?>
    <select name="Nationalite">
        <option value= ''>Valeur vide</option>
        <?php
        while($donnees = $rep->fetch())
        {
            ?> 
            <option value= <?php echo '\''.$donnees['IDNationalite'].'\''; ?>>
                <?php echo $donnees['Nationalite']; ?>
            </option>
        <?php
        }
        ?>
    </select>
    </br>

    Ville de naissance :
    </br>
    <?php $rep = readAllTable('ville');?>
    <select name="VilleNaissance">
        <option value= ''>Valeur vide</option>
        <?php
        while($donnees = $rep->fetch())
        {
            ?> 
            <option value= <?php echo '\''.$donnees['IDVille'].'\''; ?>>
                <?php echo $donnees['Ville']; ?>
            </option>
        <?php
        }
        ?>
    </select>
    </br>
    Pays de naissance :
    </br>
    <?php $rep = readAllTable('pays');?>
    <select name="PaysNaissance">
        <option value= ''>Valeur vide</option>
        <?php
        while($donnees = $rep->fetch())
        {
            ?> 
            <option value= <?php echo '\''.$donnees['IDPays'].'\''; ?>>
                <?php echo $donnees['Pays']; ?>
            </option>
        <?php
        }
        ?>
    </select>
    </br>
*/

?>