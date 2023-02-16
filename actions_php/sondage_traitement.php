<?php
require_once 'bdd.php';

if(isset($_POST['validate'])){//si bouton valider est cliqué
    if(!empty($_POST['prenom'])){ //si rien n'est vide
        $nom = htmlspecialchars($_POST['nom']); //htmlspecialchars empêche les attaques XSS
        $prenom = htmlspecialchars($_POST['prenom']);
        $dateNaiss = htmlspecialchars($_POST['dateNaiss']);
        $adresse = htmlspecialchars($_POST['adresse']);
        $codePostal = htmlspecialchars($_POST['codePostal']);
        $ville = htmlspecialchars($_POST['ville']);
        $numTel = !empty($_POST['numTel'])?htmlspecialchars($_POST['numTel']):null;

        $demandeExist = $bdd->prepare('SELECT * FROM administre WHERE nomAdministré = :nomAdministre 
                                                                And prénomAdministré = :prenomAdministre
                                                                And adresseAdministré = :adresseAdministre'); //prepare la requette

        $demandeExist->bindParam(':nomAdministre', $nom);
        $demandeExist->bindParam(':prenomAdministre', $prenom);
        $demandeExist->bindParam(':adresseAdministre', $adresse);

        $demandeExist->execute();
        echo '<pre>';
        var_dump($demandeExist->fetchAll());
        echo '</pre>';

        if($demandeExist->rowCount() == 0){ //si un aucne demande avec ces deux infos sont trouvées alors

                $sql = "INSERT INTO administre(nomAdministré, prénomAdministré, dateNaissAdministré, adresseAdministré, codePostalAdministré, VilleAdministré, numTelAdministré)
                        VALUES               (:nomAdministre, :prenomAdministre, :dateNaissAdministre, :adresseAdministre, :codePostalAdministre, :VilleAdministre, :numTelAdministre)";
                $trt = $bdd->prepare($sql);

                $trt->bindParam(':nomAdministre', $nom);
                $trt->bindParam(':prenomAdministre', $prenom);
                $trt->bindParam(':dateNaissAdministre', $dateNaiss);
                $trt->bindParam(':adresseAdministre', $adresse);
                $trt->bindParam(':codePostalAdministre', $codePostal);
                $trt->bindParam(':VilleAdministre', $ville);
                $trt->bindParam(':numTelAdministre', $numTel);
                
                $trt->execute();

                header('Location: index.php');
                exit();
        }else{
            $errorMSG = 'Demande pour ce club déjà réalisée';
        }
    }else{
        $errorMSG = 'Veuillez compléter tout les champs';
    }
}
?>