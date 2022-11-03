<!DOCTYPE html>
<html>

<head>
    <title>WOW</title>
</head>

<body>
<?php

use Controller\AppController as AppController;

    function run()
    {
        $appController = new AppController();
        $appController->index();
    }

?>
</body>
</html>