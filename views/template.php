<?php

use Helper\ViewHelper;

$viewHelper = new ViewHelper ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= URL ?>public/css/all.css" />
    <link rel="stylesheet" href="<?= $css ?>" />

    <title><?php echo $titre ?></title>
</head>

<body>
    <div id="ecran-noir"></div>
    <div id="html-spinner"></div>
    <header>
        <?php require 'header.php' ?>
    </header>
    <div class="page">
        <?php echo $content ?>
    </div>
<?php require 'footer.php' ?>
</body>


<script src="<?= URL ?>public/js/all.js"></script>
<script src="<?= $script?>"></script>
</html>