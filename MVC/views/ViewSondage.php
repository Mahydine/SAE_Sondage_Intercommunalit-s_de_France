<?php
//les fonction liees a cette vue
require_once 'views/functions/sondage.php';
?>

<body>
    <h1>SONDAGE : </h1>
    <form method="POST" action="index.php?action=traitementSondage">
        <label for="nom">Nom : *</label>
        <input type="text" name="nom"><br>

        <label for="prenom">Prénom : *</label>
        <input type="text" name="prenom"><br>

        <label for="dateNaiss">Date de naissance : *</label>
        <input type="date" name="dateNaiss"><br>

        <label for="adresse">Adresse : *</label>
        <input type="text" name="adresse"><br>

        <label for="codePostal">Code postal : *</label>
        <input type="text" name="codePostal" pattern="[0-9]+"><br>

        <label for="ville">Ville : *</label>
        <input type="text" name="ville"><br>

        <label for="numTel">Numéro de téléphone : </label>
        <input type="text" name="numTel" pattern="[0-9]+"><br><br>

        <?php echo afficherSelecteurCategories($categories, $allAlimentsByCategories); ?>

        <h3>Liste des aliments sélectionnés :</h3>
        <ul id="liste-aliments"></ul>

        <?php if (isset($errorMSG)) {echo '<span class="errorMSG">' . $errorMSG . '</span>';} ?>

        <br><input type="submit" value="Envoyer" name="validate">
    </form>

</body>
<script src="public/js/sondage.js"></script>
</html>