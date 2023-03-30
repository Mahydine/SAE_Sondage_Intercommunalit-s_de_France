<?php

class SondageManager extends ModelManager
{

    public function getCategoriesAliments()
    {
        $sql = 'SELECT DISTINCT alim_grp_nom_fr FROM aliments';
        $req = $this->getBdd()->prepare($sql);
        $req->execute();

        $categories = array();
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
            $categories[] = $row['alim_grp_nom_fr'];
        }

        return $categories;
    }

    public function getAlimentsNameAndIdByCategorie($categorie)
    {
        $sql = 'SELECT alim_code, alim_nom_fr FROM aliments where alim_grp_nom_fr = ?';
        $req = $this->getBdd()->prepare($sql);
        $req->execute([$categorie]);

        $alimentsParCategorie = array();
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
            $alimentsParCategorie[] = array($row['alim_code'], $row['alim_nom_fr']);
        }

        return $alimentsParCategorie;
    }

    public function getBooleanSondageDejaEffectue($nom, $prenom, $adresse)
    {
        $demandeExist = $this->getBdd()->prepare('SELECT * FROM administre WHERE nomAdministré = :nomAdministre 
        And prénomAdministré = :prenomAdministre
        And adresseAdministré = :adresseAdministre'); //prepare la requette

        $demandeExist->bindParam(':nomAdministre', $nom);
        $demandeExist->bindParam(':prenomAdministre', $prenom);
        $demandeExist->bindParam(':adresseAdministre', $adresse);

        $demandeExist->execute();

        return $demandeExist->rowCount() == 0;
    }

    public function setNewAdministe($nom, $prenom, $dateNaiss, $adresse, $codePostal, $ville, $numTel)
    {
        // Ajout de l'administré
        $sql = "INSERT INTO administre(nomAdministré, prénomAdministré, dateNaissAdministré, adresseAdministré, codePostalAdministré, VilleAdministré, numTelAdministré)
                VALUES (:nomAdministre, :prenomAdministre, :dateNaissAdministre, :adresseAdministre, :codePostalAdministre, :VilleAdministre, :numTelAdministre)";
        $trt = $this->getBdd()->prepare($sql);

        $trt->bindParam(':nomAdministre', $nom);
        $trt->bindParam(':prenomAdministre', $prenom);
        $trt->bindParam(':dateNaissAdministre', $dateNaiss);
        $trt->bindParam(':adresseAdministre', $adresse);
        $trt->bindParam(':codePostalAdministre', $codePostal);
        $trt->bindParam(':VilleAdministre', $ville);
        $trt->bindParam(':numTelAdministre', $numTel);

        $trt->execute();
    }

    public function setAdministreApprecieAliment($idAdministre, $idAliment)
    {
        $sql = 'INSERT INTO apprecie VALUES(:idAdministre, :alim_code)';
        $insertionApprecie = $this->getBdd()->prepare($sql);
        $insertionApprecie->bindParam(':idAdministre', $idAdministre);
        $insertionApprecie->bindParam(':alim_code', $idAliment);

        $insertionApprecie->execute();
    }
}
