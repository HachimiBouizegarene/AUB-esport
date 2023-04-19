<div class="container">
    <p>Vous avez recu un code de confirmation au mail : <b><?=$_SESSION['mailConf']  ?></b> Veuillez le saisir !</p>
    <h1>Confirmation mail</h1>

    
    <form method="POST">
        <label>Code de confirmation :</label>
        <input type="text" id="codeConf" maxlength="7" name = "codeConf"?>
        <button type="submit">Valider</button>
        <span id="errorPhp" class="errorSpan"><?= $error ?></span>
    </form>
</div>