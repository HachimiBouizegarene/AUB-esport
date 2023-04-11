<div class="page">
    <div class="container">
        <h1>Inscription</h1>
        <form method="POST">
            <label for="prenom">Prenom *</label>
            <input id="prenom" name="prenom"/>

            <label for="nom">Nom *</label>
            <input id="nom" name="nom"/>

            <label for="sexe">Civilité *</label>
            <select id="sexe" name="sexe">
                <option value="homme">Homme</option>
                <option value="femme">Femme</option>
                <option value="non-binaire">Non-precise</option>
            </select>

            <label for="dateNaiss">Date de naissance *</label>
            <input id="dateNaiss" name="dateNaiss"/>

            <label for="mail">Mail *</label>
            <input id="mail" name="mail"/>

            <label for="mdp">Mot de passe *</label>
            <input id="mdp" name="mdp"/>

            <label for="mdpConf">Mot de passe *</label>
            <input id="mdpConf" name="mdpConf"/>
            
            <button type="submit">Valider</button>
            
        </form>
    </div>
</div>