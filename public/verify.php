<?php 


    require_once "./autoload.php";
    require_once "../app/controllers/AuthController.php";
    $auth = new AuthController();

    if (isset($_GET['code'])) {
        $auth->verify($_GET['code']);
    }


?>