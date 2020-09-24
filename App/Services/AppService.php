<?php

    /*
    * @ Default Providers Services Register
    * 
    * @ Include Custom Services in Providers Array
    * 
    */

    $providers = [
        'Redirect' => '../App/Providers/Redirect.php',
        'SessionMessage' => '../App/Providers/SessionMessage.php',
        'UserSession' => '../App/Providers/UserSession.php',
        'Slugify' => '../App/Providers/Slug.php',
        'Protected' => '../App/Providers/ProtectedRedirect.php',
        'DieDown' => '../App/Providers/Die.php'
    ];

    require_once $providers['Redirect'];
    require_once $providers['SessionMessage'];
    require_once $providers['UserSession'];
    require_once $providers['Slugify'];
    require_once $providers['Protected'];
    require_once $providers['DieDown'];
    
?> 