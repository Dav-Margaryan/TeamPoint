<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>TeamPoint</title>
        <?php require_once 'blocks/scripts.php'?>
    </head>
    <body>
        <?php require_once 'blocks/menu.php'?>
        <div class="main container">
            <?= $content ?>
        </div>

        <canvas id="bg"></canvas>
<!--        --><?php //require_once 'blocks/footer.php'?>
        <script src="<?= BASE_URL ?>/resources/js/script.js"></script>
    </body>
</html>