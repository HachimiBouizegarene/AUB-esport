<?php
namespace Model;

class Utilisateur{
    private $_id;
    private $_nom;
    private $_prenom;
    private $_sexe;
    private $_mdp;
    private $_mail;
    private $_dateNaiss;
    private $_codeVerif;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data){
        foreach($data as $key=> $value){
            $method = 'set'. ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

    //SETTERS

    public function setId($id){
        $id = (int) $id;
        if($id > 0){
            $this->_id = $id;
        }
    }

    public function setCodeVerif($code){
        $code = (int) $code;
        if($code >= 1000000){
            $this->_codeVerif= $code;
        }
    }


    public function setMdp($mdp){
        if(is_string($mdp)){
            $this->_mdp = $mdp;
        }
    }

    public function setMail($mail){
        if(is_string($mail)){
            $this->_mail = $mail;
        }
    }

    public function setNom($nom){
        if(is_string($nom)){
            $this->_nom = $nom;
        }
    }

    public function setPrenom($prenom){
        if(is_string($prenom)){
            $this->_prenom = $prenom;
        }
    }

    public function setDateNaiss($dateNaiss){
        if(is_string($dateNaiss)){
            $this->_dateNaiss = $dateNaiss;
        }
    }

    public function setSexe($sexe){
        if(is_string($sexe)){
            $this->_sexe = $sexe;
        }
    }

    //GETTERS

    public function getId(){
        return $this->_id;
    }

    public function getNom(){
        return $this->_nom;
    }

    public function getPrenom(){
        return $this->_prenom;
    }
    public function getSexe(){
        return $this->_sexe;
    }
    public function getDateNaiss(){
        return $this->_dateNaiss;
    }
    public function getMdp(){
        return $this->_mdp;
    }

    public function getMail(){
        return $this->_mail;
    }

    public function getCodeVerif(){
        return $this->_codeVerif;
    }

}