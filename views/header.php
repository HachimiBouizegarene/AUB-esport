

<header>
    <nav>
        <ul>
            <li><a href="#">BILLETTERIE</a></li>
            <li><a href="<?= URL."inscription" ?>">INSCRIPTION</a></li>
            <li><a href="#">BOUTIQUE</a></li>
        </ul>
        <a href="<?= URL."Accueil" ?> " >
            <img id="logo" src="<?= $viewHelper->getImg("logo.png") ?>" alt="logo"/>
        </a>
        
        <ul>
            <li><a href="#">BLOG</a></li>
            <li><a href="#">PARTENAIRES</a></li>
            <li><a href="#">CONTACT</a></li>
            
            <li><img id="ic_account"  src="<?= $viewHelper->getImg("ic_account.svg") ?> "alt="compte"></li>
        </ul>
    </nav>
</header>