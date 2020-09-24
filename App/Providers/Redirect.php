<?php
    function redirect($gateway){
        header("location: " . URL . "/" . $gateway);
    }
?>