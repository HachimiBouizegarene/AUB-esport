<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/fr.js"></script>
Usage


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
                <label for="civilite">Civilité *</label>
                <select id="civilite" name="civilite">
                <option value="" selected>--Choisissez votre civilité--</option>
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
                <input type="mail"id="mail" name="mail"/>
            </div>

            <div>
                <label for="mdp">Mot de passe *</label>
                <input type="password" id="mdp" name="mdp"/>
            </div>
            <div>
                <label for="mdpConf">Confirmer mot de passe *</label>
                <input type="password" id="mdpConf" name="mdpConf"/>
            </div>
            
            <button type="submit">Valider</button>
            <span id="errorSpan"></span>
            
        </form>
    </div>