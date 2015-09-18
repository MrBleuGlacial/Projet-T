<form method="post" action="../model/writeBDDPersonneMain.php">

    Prénom :
    </br>
    <input type="text" name="Prenom" required />
    </br>
    
    Nom :
    </br>
    <input type="text" name="Nom" required />
    </br>

    Nom de la source :
    </br>
    <input type="text" name="IDDossier" required />
    </br>

    Sexe :
    </br> 
    <select name="Sexe">
       <option value="Homme">Homme</option>
       <option value="Femme">Femme</option>
    </select>
    </br>
    
    Date de naissance :
    </br>
    <input type="date" name="DateNaissance" value="aaaa-mm-jj">
    </br>


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
selectInput('Profession avant migration :','profession','ProfessionAvantMigration','IDProfession','Profession');
selectInput('Profession pendant interrogatoire :','profession','ProfessionDurantInterrogatoire','IDProfession','Profession');
selectInput('Nationalité :','nationalite','Nationalite','IDNationalite','Nationalite');
selectInput('Ville de naissance :','ville','VilleNaissance','IDVille','Ville');
selectInput('Pays de naissance','pays','PaysNaissance','IDPays','Pays');
?>


    Montant de la dette initiale :
    </br>
    <input type="number" name="DetteInitiale"/>
    </br>

    Montant de la dette re-négociée :
    </br>
    <input type="number" name="DetteRenegociee"/>
    </br>

    Date où la dette est payée :
    </br>
    <input type="date" name="DateDettePayee" value="aaaa-mm-jj">
    </br>

    Date où x est recruté(e) :
    </br>
    <input type="date" name="DateEstRecrute" value="aaaa-mm-jj">
    </br>

    Date où x recrute :
    </br>
    <input type="date" name="DateRecrute" value="aaaa-mm-jj">
    </br>

    Dernier diplôme obtenu :
    </br>
    <select name="Diplome">
       <option value="primary school">Primary School</option>
       <option value="secondary school">Secondary School</option>
       <option value="" selected >Aucun</option>
    </select>
    </br>

    </br>
    <input type="submit" value="Valider" />
    <input type="reset" value="Reset" />

</form>

<?php

function selectInput($description,$table,$selectName,$arg1,$arg2){
    echo $description;
    ?>
    </br>
    <?php $rep = readAllTable($table);?>
    <select name= <?php echo '\''. $selectName .'\'' ?>>
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
    </br>

<?php
}

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