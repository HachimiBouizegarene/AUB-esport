
    <div class="container">
        <h1>Inscription</h1>
        <form method="POST">
            <div>
                <label for="prenom">Prenom *</label>
                <input id="prenom" name="prenom"/>
            </div>

            <div>
                <label for="nom">Nom *</label>
                <input id="nom" name="nom"/>
            </div>
            <div>
                <label for="sexe">Civilité *</label>
                <select id="sexe" name="sexe">
                    <option value="homme">Homme</option>
                    <option value="femme">Femme</option>
                    <option value="non-binaire">Non-precise</option>
                </select>
            </div>
            <div>
                <label for="dateNaiss">Date de naissance *</label>
                <input id="dateNaiss" name="dateNaiss"/>
            </div>
            <div>
                <label for="mail">Mail *</label>
                <input id="mail" name="mail"/>
            </div>

            <div>
                <label for="mdp">Mot de passe *</label>
                <input id="mdp" name="mdp"/>
            </div>
            <div>
                <label for="mdpConf">Confirmer mot de passe *</label>
                <input id="mdpConf" name="mdpConf"/>
            </div>

            

            
            
            <button type="submit">Valider</button>
            
        </form>
    </div>