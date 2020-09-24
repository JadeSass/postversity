<?php
    // Load the config file
    require_once "Config/Config.php";
    require_once "Services/AppService.php";
    //

    // Load required libraries on load, the bootstrap file autoloads the file

    spl_autoload_register(function($className){
        require_once "Libraries/". $className . ".php";
    });
?>