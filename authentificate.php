<!-- sert a demader un mot de pass pour rentrer sur le site -->git 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
</head>

<style>

@import url('https://fonts.googleapis.com/css2?family=Oswald&display=swap'); 


    *{
        margin: 0;
        padding: 0;
        font-family: 'Oswald', sans-serif;
    }
    body{
        background-color: #f0f0f0;
    }

    .container{
        margin: auto;
        margin-top: 50vh; /* poussé de la moitié de hauteur de viewport */
        transform: translateY(-100%);
        width: 400px;
        padding: 20px;
        padding-top: 0;
        background-color: white;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        
    }

    h1{
        margin-bottom: 20px;
        color:rgba(0, 0, 0, 0.9);
        letter-spacing: 1px;
        font-size: 25px;
        width: 100%;
        text-align: center;
        background-color: #A69EEB;
        padding: 20px;
    }

    input{
        padding: 10px;
        font-size: 15px;
    }
    label{
        font-size: 20px;
        margin-bottom: 10px;
        font-weight: 700;
    }

    form{
        display: flex;
        flex-direction: column;

    }

    button{
        background-color: #A69EEB;
        cursor: pointer;
        width: 100%;
        padding: 10px;
        margin-top: 20px;
        border: none;
        font-size: 16px;
    }

    button:hover{
        background-color: #9187EE;
    }

    #error{
        color: red;
        font-size: 14px;
        margin: auto;
    }

    
    
</style>
<body>
    <div class="container">
        <h1>AUB'esport</h1>

        <form method="POST">
            <label>Mot de pass: </label>
            
            <input name="website_password" type="password">
            <?php if (isset($_POST['website_password']) && isset($_SESSION['website_auth']) && $_SESSION['website_auth'] == false) : ?>
            <span id="error">Mot de pass incorrect*</span>
            <?php endif ?>
            <button type="submit" >Valider</button>
            
        </form>
    </div>
</body>
</html>