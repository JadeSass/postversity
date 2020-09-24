<?php

    /*
     * @ Default Providers Services Register
     * 
     * @ Include Custom Services in Providers Array
     * 
     */

    $providers = [
        'Redirect' => '/Helpers/Services/Redirect.php'
    ];

    function register(){
        require_once $providers['Redirect'];
    }

    register();

?>