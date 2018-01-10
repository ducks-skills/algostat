<?php
spl_autoload_register(function($className) {
        if (file_exists(__DIR__ . "/classes/" .$className . ".class.php")) {
                require_once(__DIR__ . "/classes/" .$className . ".class.php");
        }
});
?>

