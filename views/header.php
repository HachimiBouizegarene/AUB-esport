

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
            <li><a class="link" href="#">BILLETTERIE</a></li>
            <li><a class="link" href="<?= URL."inscription" ?>">INSCRIPTION</a></li>
            <li><a class="link" href="#">BOUTIQUE</a></li>
            <li><a class="link" href="#">BLOG</a></li>
            <li><a class="link" href="#">PARTENAIRES</a></li>
            <li><a class="link" href="#">CONTACT</a></li>
        </ul>
        <a href="<?= URL."Accueil" ?> " >
            <img id="logo" src="<?= $viewHelper->getImg("logo.png") ?>" alt="logo"/>
        </a>

        <ul>
            <li><a class="link" href="#">BLOG</a></li>
            <li><a class="link" href="#">PARTENAIRES</a></li>
            <li><a class="link" href="#">CONTACT</a></li>
            <li>
            <a href="#" ><img id="ic_account"  src="<?= $viewHelper->getImg("ic_account.svg") ?> "alt="compte"/></a></li>
        </ul>
        <a href="#" id="a_ic_account">
            <img id="ic_account"  src="<?= $viewHelper->getImg("ic_account.svg") ?> "alt="compte">
        </a>
        
    </nav>
</header>