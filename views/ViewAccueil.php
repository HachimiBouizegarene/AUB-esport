<?php 

use Helper\ViewHelper;

$viewHelper = new ViewHelper ?>

<div class="page">

    <div class= "partenaires">
        <div class="partenaire_img_container">
            <img  src="<?= $viewHelper->getImg("logo_fedex.png") ?>" />
            <img  src="<?= $viewHelper->getImg("logo_epa.png") ?>" />
            <img  src="<?= $viewHelper->getImg("logo_aeroville.png") ?>"/>
        </div>
    </div>
    
    <div class="centre">
        <h1>| TOURNOI ESPORT |</h1>
        <h2>spécial commerce & marketing</h2>
        <a id="btn_inscription" href="<?= URL."inscription" ?>">INSCRIPTION</a>
    </div>

    <div class= "date_lieu_container">
        <div class="date_lieu_img_container">
            <h1>LE 2 ET 3 OCTOBRE </h1>
            <img id="img_date_lieu"class="logo_partenaire" src="<?= $viewHelper->getImg("accueil_date_lieu.png") ?>" />
            <h2>146 rue
                Jacques Salvator
                93300 Aubervilliers</h2>
        </div>
    </div>


</div>


