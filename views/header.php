

<header>
    <nav>
        <a href="#" id="openBtn">
            <span class="burger-icon">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </a>
        <ul>
            <li><a href="#">BILLETTERIE</a></li>
            <li><a href="<?= URL."inscription" ?>">INSCRIPTION</a></li>
            <li><a href="#">BOUTIQUE</a></li>
            <li><a href="#">BLOG</a></li>
            <li><a href="#">PARTENAIRES</a></li>
            <li><a href="#">CONTACT</a></li>
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
        <a href="#" id="">
            <img id="ic_account"  src="<?= $viewHelper->getImg("ic_account.svg") ?> "alt="compte">
        </a>
        
    </nav>
</header>