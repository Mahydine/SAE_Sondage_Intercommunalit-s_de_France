<?php 
require 'ressources/header.tpl';
require 'actions_php/bdd.php';
require 'actions_php/sondage_traitement.php';
?>

<h1>SONDAGE : </h1>

<form method="POST">
  <label for="nom">Nom : *</label>
  <input type="text" name="nom"><br>

  <label for="prenom">Prénom : *</label>
  <input type="text" name="prenom"><br>

  <label for="dateNaiss">Date de naissance : *</label>
  <input type="date" name="dateNaiss"><br>

  <label for="adresse">Adresse : *</label>
  <input type="text" name="adresse"><br>

  <label for="codePostal">Code postal : *</label>
  <input type="text" name="codePostal"><br>

  <label for="ville">Ville : *</label>
  <input type="text" name="ville"><br>

  <label for="numTel">Numéro de téléphone : </label>
  <input type="text" name="numTel"><br>

  <?php if(isset($errorMSG)){echo '<span class="errorMSG">'.$errorMSG.'</span>';} ?>

  <input type="submit" value="Envoyer" name="validate">
</form>


<?php require 'ressources/footer.tpl'; ?>