<!doctype html>

<head>
    <title>MVC Veículo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src=<?php echo WEBROOT . "templates/layouts/jquery/jquery.js" ?>></script>
    <script src=<?php echo WEBROOT . "templates/layouts/jquery/jquery.mask.js" ?>></script>
    <script src=<?php echo WEBROOT . "templates/layouts/yearpicker/yearpicker.js" ?>></script>
    <script src=<?php echo WEBROOT . "templates/layouts/jquery/default.js" ?>></script>

    <link rel="stylesheet" type="text/css" href=<?php echo WEBROOT . "templates/layouts/styles/style.css" ?>>
    <link rel="stylesheet" type="text/css" href=<?php echo WEBROOT . "templates/layouts/yearpicker/yearpicker.css" ?>>
</head>

<body>
    <main role="main" class="container">
        <div>
            <?php echo $content_for_layout; ?>
        </div>
    </main>
</body>

</html>