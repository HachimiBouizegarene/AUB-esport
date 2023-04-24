<div class="connexion">
    <h1>Connexion</h1>
    <form method="POST">
        <label for="mail">* Adresse mail</label>
        <input id="mail" name="mail" type="text">

        <label for="mdp">* Mot de passe</label>
        <input id="mdp" name="mdp" type="mdp">

        <button type="submit">Se connecter</button>
        <span id="errorPhp" class="errorSpan"><?= $error ?></span>
        <span id="errorJs" class="errorSpan"></span>
    </form>
</div>

<div class="inscription">
    <h1>Vous n'avez pas de compte ?</h1>
    <p>Créez un compte AUB-Esport pour vous inscrire a notre tournoi Esport !</p>
    <a href="#">Inscription</a>
</div>