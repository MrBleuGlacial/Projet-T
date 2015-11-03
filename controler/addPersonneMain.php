<form  method="post" action="../model/writeBDDPersonneMain.php">

    <label>Prénom :</label>
    <input class="form-control" type="text" name="Prenom" required />
    
    <label>Nom :</label>
    <input class="form-control" type="text" name="Nom" required />

    <label>Nom de la source :</label>
    <input class="form-control" type="text" name="IDDossier" required />

    <label>Sexe :</label>
    <select class="form-control" name="Sexe">
       <option value="Homme">Homme</option>
       <option value="Femme">Femme</option>
    </select>

    <label>Type de personne :</label>
    <select class="form-control" name="TypePersonne">
       <option value="Personne Physique">Physique</option>
       <option value="Personne Morale">Morale</option>
    </select>
    
    <label>Date de naissance :</label>
    <input class="form-control" type="date" name="DateNaissance" value="aaaa-mm-jj">

    <label>Se prostitue :</label>
    <div class="form-control">
        <label class="radio-inline">
            <input name="SeProstitue" value="0" type="radio">
            Non
        </label> 
        <label class="radio-inline">
            <input name="SeProstitue" value="1" type="radio">
            Oui
        </label> 
        <label class="radio-inline">
            <input name="SeProstitue" value="" checked="checked" type="radio">
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
selectInput('Profession avant migration :','profession','ProfessionAvantMigration','IDProfession','Profession');
selectInput('Profession pendant interrogatoire :','profession','ProfessionDurantInterrogatoire','IDProfession','Profession');
selectInput('Nationalité :','nationalite','Nationalite','IDNationalite','Nationalite');
selectInput('Ville de naissance :','ville','VilleNaissance','IDVille','Ville');
selectInput('Pays de naissance :','pays','PaysNaissance','IDPays','Pays');
?>


    <label>Montant de la dette initiale :</label>
    <input class="form-control" type="number" name="DetteInitiale"/>

    <label>Montant de la dette re-négociée :</label>
    <input class="form-control" type="number" name="DetteRenegociee"/>

    <label>Date où la dette est payée :</label>
    <input class="form-control" type="date" name="DateDettePayee" value="aaaa-mm-jj">

    <label>Date où x est recruté(e) :</label>
    <input class="form-control" type="date" name="DateEstRecrute" value="aaaa-mm-jj">

    <label>Date où x recrute :</label>
    <input class="form-control" type="date" name="DateRecrute" value="aaaa-mm-jj">

    <label>Dernier diplôme obtenu :</label>
    <select class="form-control" name="Diplome">
       <option value="primary school">Primary School</option>
       <option value="secondary school">Secondary School</option>
       <option value="" selected >Aucun</option>
    </select>

    </br>
    <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-ok"></span> Valider </button>
    <button class="btn btn-warning" type="reset"><span class="glyphicon glyphicon-repeat"></span> Reset </button>

</form>

<?php


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