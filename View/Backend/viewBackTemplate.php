<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <link rel="stylesheet" type="text/css" href="Public/CSS/style.css">
    <link rel="stylesheet" type="text/css" href="Public/CSS/responsive.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/0d1298be20.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php require_once 'header.php' ; ?>
    <div class="site-pusher">
            <div class="site-content">
                <?= $content ?>
            </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="Public/JS/cross.js"></script>
    <script type="text/javascript" src="Public/JS/menu.js"></script>
    <script type="text/javascript" src="Public/JS/closeSessionWindow.js"></script>
</body>
</html>