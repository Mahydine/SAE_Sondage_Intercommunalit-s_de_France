<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titre ?></title>
    <link rel="stylesheet" href="public/css/all.css" />
    <link rel="stylesheet" href="<?= $css ?>" />
</head>
<header>
    <nav>
    <div class="menu-burger">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="container">
            <div class="left-part">
                <img src="public/img/Logo.png" alt="logo" />
                <span>Sondable</span>
            </div>
            <div class="right-part">
                <a href="Accueil">Accueil</a>
                <a href="Sondage">Sondage</a>
            </div>
        </div>
    </nav>
</header>

<body>
    <?= $content ?>
    <script src="<?= $script ?>"></script>
</body>

</html>