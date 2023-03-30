<?php
require_once 'views/functions/accueil.php';
?>

<div class="page">
    <div class="haut-page">
        <h1>Resultats sondages</h1>
        <div class="container">
            <div class="info-container">
                <h2>Nombre de participants:</h2>
                <div class="content">
                    <img src="<?= $view->img('sondage.svg') ?>" alt="Icon personnage" />
                    <h2><?= $nbParticipants ?></h2>
                </div>
            </div>
            <div class="info-container">
                <h2>Nombre d'aliments appréciés:</h2>
                <div class="content">
                    <img src="<?= $view->img('food.svg') ?>" alt="Icon Aliment" />
                    <h2><?= $nbAliments ?></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="mid-page">
        <div class="container">
            <h1>Top 10 des aliments les plus appréciés :</h1>
            <div class="content">
                <?php echo afficher_aliments($top10Aliments, $view) ?>
            </div>
        </div>

        <div class="container">
            <h1>Consommation de categorie d'aliment par Age :</h1>
            <canvas id="graphique1"></canvas>
        </div>

        <div class="container conso_moy">
            <h1>Composition moyenne des aliments choisis </h1>
            <div class="content">
                <div class="part">
                    <h2>Nutriments principaux (100g)</h2>
                    <canvas id="graphique2"></canvas>
                </div>
                <div class="part">
                    <h2>Nutriments secondaires (100mg) </h2>
                    <canvas id="graphique3"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const data_consommation_age_categories = <?php echo json_encode($categorieAge) ?>;
    const data_moyenne_nutiments_principales = <?php echo json_encode($moyenneNutrimentsPrincipaux) ?>;
    const data_moyenne_nutriments_secondaires = <?php echo json_encode($moyenneNutrimentsSecondaires) ?>;
</script>