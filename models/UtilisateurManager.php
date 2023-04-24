<?php 
namespace Model;

use Model\Utilisateur;

class UtilisateurManager extends Model{
    public function getUtilisateurs(){
        return $this->getAll("utilisateurs", "\Model\Utilisateur");
    }


    public function register($utilisateur){

        $req = $this->getBdd()->prepare("INSERT INTO `utilisateurs` (`id`, `prenom`, `nom`, `sexe`, `dateNaiss`, `mail`, `mdp`, `codeVerif`, `verifie`)
        VALUES (NULL, :prenom, :nom, :sexe, :dateNaiss, :mail, :mdp, :codeVerif, 0)");

        $req->bindValue(':nom', $utilisateur->getNom());
        $req->bindValue(':prenom', $utilisateur->getPrenom());
        $req->bindValue(':sexe', $utilisateur->getSexe());
        $req->bindValue(':dateNaiss', $utilisateur->getDateNaiss());
        $req->bindValue(':mail', $utilisateur->getMail());
        $req->bindValue(':mdp', $utilisateur->getMdp());
        $req->bindValue(':codeVerif', $utilisateur->getCodeVerif());

        $req->execute();
    }

    public function delete($utilisateur){

        $req = $this->getBdd()->prepare("DELETE FROM utilisateurs WHERE `utilisateurs`.`mail` = :mail");

        $req->bindValue(':mail', $utilisateur->getMail());

        $req->execute();
    }


    public function mailExist($mail){
        $req =  $this->getBdd()->prepare("SELECT * FROM utilisateurs WHERE mail = :mail");
        $req->bindValue(":mail", $mail);
        $req->execute();
        return $req->rowCount() > 0;
    }

    public function verifCodeConfMail($mail, $codeVerif){
        $req =  $this->getBdd()->prepare("SELECT codeVerif FROM utilisateurs WHERE mail = :mail");
        $req->bindValue(":mail", $mail);
        $req->execute();


        $codeVerifMail = $req->fetch(\PDO::FETCH_ASSOC)['codeVerif'];
        if($codeVerifMail === (int) $codeVerif){
            $req = $this->getBdd()->prepare("UPDATE `utilisateurs` SET `verifie` = '1' WHERE `utilisateurs`.`mail` = :mail");
            $req->bindValue(":mail", $mail);
            $req->execute();
            unset($_SESSION['mailConf']);
            return true;
        }else{
            return false;
        }
        
    }
}