<?php
//les fonction liees a cette vue
require_once 'views/functions/sondage.php';
?>

<body>
    <h1 id="titreSondage">SONDAGE : </h1>
    <form method="POST" action="index.php?action=traitementSondage">
        <div id="sectionAdministreSondage">
            <h3 class="titrePartiesSondage">Veuillez remplir ce formulaire :</h3>
            <label for="nom">Nom<span style="color:#eb0000">*</span> :</label>
            <input type="text" name="nom"><br>

            <label for="prenom">Prénom<span style="color:#eb0000">*</span> :</label>
            <input type="text" name="prenom"><br>

            <label for="dateNaiss">Date de naissance<span style="color:#eb0000">*</span> :</label>
            <input type="date" name="dateNaiss"><br>

            <label for="adresse">Adresse<span style="color:#eb0000">*</span> :</label>
            <input type="text" name="adresse"><br>

            <label for="codePostal">Code postal<span style="color:#eb0000">*</span> :</label>
            <input type="text" name="codePostal" pattern="[0-9]+"><br>

            <label for="ville">Ville<span style="color:#eb0000">*</span> :</label>
            <input type="text" name="ville"><br>

            <label for="numTel">Numéro de téléphone : </label>
            <input type="text" name="numTel" pattern="[0-9]+"><br><br>
        </div>
        <div id="sectionDroiteSondage">
            <div id="sectionAlimentSondage">
                <h3 class="titrePartiesSondage">Choisir 10 aliments, toutes catégorie confondue, qui font parti de ceux que vous préférer ou qui sont inclu dans votre consommation régulière :</h3>
                <?php echo afficherSelecteurCategories($categories, $allAlimentsByCategories); ?>
            </div>
            <div id="sectionAlimentChoisiSondage">
                <h3>Liste des aliments sélectionnés (<span>0</span>) :</h3>
                <ul id="liste-aliments"></ul>
                <br><input type="submit" value="Envoyer" name="validate"><br>
                <?php if (isset($errorMSG)) {
                    echo '<span class="errorMSG">' . $errorMSG . '</span>';
                } ?>
            </div>
        </div>
    </form>

</body>
<script src="public/js/sondage.js"></script>

</html>