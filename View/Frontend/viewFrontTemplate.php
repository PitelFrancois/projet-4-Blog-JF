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
                <?php require_once 'footer.php' ; ?>
            </div>
    </div>
</body>
</html>