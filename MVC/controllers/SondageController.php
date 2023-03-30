<?php

class SondageController
{
    private $sondageManager;

    public function __construct($url)
    {
        $this->sondageManager = new SondageManager();
        if (!empty($url[0]) && count($url) > 1) {
            throw new Exception('Page introuvable');
        } else {
            $this->afficher();
        }
    }

    public function afficher()
    {
        $categories = $this->sondageManager->getCategoriesAliments();
        $allAlimentsByCategories = $this->getAllAlimentsByCategories();
        $errorMSG = $this->traitementSondage();
        require_once('./views/View.php');
        $view = new View('Sondage', 'Sondage.css', 'Sondage', 'sondage.js');
        $view->generate([
            'categories' => $categories,
            'allAlimentsByCategories' => $allAlimentsByCategories,
            'errorMSG' => isset($errorMSG) ? $errorMSG : null
        ]);
    }
    

    public function traitementSondage()
    {
        if (isset($_POST['validate'])) { //si bouton valider est cliqué
            if (!empty($_POST['aliments']) && count($_POST['aliments']) == 10) {
                if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['dateNaiss']) && !empty($_POST['adresse']) && !empty($_POST['codePostal']) && !empty($_POST['ville'])) { //si rien n'est vide
                    $nom = htmlspecialchars(trim($_POST['nom'])); //htmlspecialchars empêche les attaques XSS
                    $prenom = htmlspecialchars(trim($_POST['prenom']));
                    $dateNaiss = htmlspecialchars(trim($_POST['dateNaiss']));
                    $adresse = htmlspecialchars(trim($_POST['adresse']));
                    $codePostal = htmlspecialchars(trim($_POST['codePostal']));
                    $ville = htmlspecialchars(trim($_POST['ville']));
                    $numTel = !empty($_POST['numTel']) ? htmlspecialchars(trim($_POST['numTel'])) : null;

                    $booleanDemandeDejaExistante = $this->sondageManager->getBooleanSondageDejaEffectue($nom, $prenom, $adresse);

                    if($booleanDemandeDejaExistante) { //si un aucune demande existante n'est trouvée alors :
                        // Ajout de l'administré
                        $this->sondageManager->setNewAdministe($nom, $prenom, $dateNaiss, $adresse, $codePostal, $ville, $numTel);
                        $idAdministré = $this->sondageManager->getBdd()->lastInsertId(); // récupération de l'id qui viens d'être ajouté
                        // Ajout des appréciations
                        foreach ($_POST['aliments'] as $idAliment) {
                            $this->sondageManager->setAdministreApprecieAliment($idAdministré, $idAliment);
                        }
                        // FIN
                        header('Location: Accueil');
                        exit();
                    } else {
                        return $errorMSG = 'Vous avez déjà répondu au sondage';
                    }
                } else {
                    return $errorMSG = 'Veuillez compléter tout les champs';
                }
            } else {
                return $errorMSG = 'Vous devez choisir 10 aliments !';
            }
        }
    }

    public function getAllAlimentsByCategories()
    {
        $categories = $this->sondageManager->getCategoriesAliments();
        $allAlimentsByCategories = array();

        foreach ($categories as $categorie) {
            $allAlimentsByCategories[$categorie] = $this->sondageManager->getAlimentsNameAndIdByCategorie($categorie);
        }
        return $allAlimentsByCategories;
    }
}
