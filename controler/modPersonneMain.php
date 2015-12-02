<!--

NE SERA PROBABLEMENT PAS UTILISE SI CEST DEVELOPPE PLUS PROPREMENT

-->

<form  method="post" action="../model/writeBDDPersonneMain.php">

    <label>Prénom :</label>
    <input class="form-control" type="text" name="Prenom"/>
    
    <label>Nom :</label>
    <input class="form-control" type="text" name="Nom"/>

    <label>Lettre(s) identifiante(s) du dossier :</label>
    <input class="form-control" type="text" name="IDDossier" required />
    <?php
    selectInput('Cote Initiale :','cote','IDCoteInitiale','IDCote','NomCote',false);
    ?>
    <label>Sexe :</label>
    <select class="chzn-select form-control" name="Sexe">
       <option value="Homme">Homme</option>
       <option value="Femme">Femme</option>
    </select>

    <label>Type de personne :</label>
    <select class="chzn-select form-control" name="TypePersonne">
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
selectInput('Profession avant migration :','profession','ProfessionAvantMigration','IDProfession','Profession');
selectInput('Profession pendant interrogatoire :','profession','ProfessionDurantInterrogatoire','IDProfession','Profession');
selectInput('Nationalité :','pays','Nationalite','IDPays','Pays');
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
    <select class="chzn-select form-control" name="Diplome">
       <option value="primary school">Primary School</option>
       <option value="secondary school">Secondary School</option>
       <option value="" selected >Aucun</option>
    </select>

    </br>
    </br>
    <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-ok"></span> Valider </button>
    <button class="btn btn-warning" type="reset"><span class="glyphicon glyphicon-repeat"></span> Reset </button>

</form>


