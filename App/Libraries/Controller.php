<?php
    /* Base Controller
     * Loads the Model and Views
     */

    class Controller {

        // Loads the model method
        public function model($model){

            // Make the model required on load
            require_once "../App/Models/" . $model . ".php";
            
            // Instantiate Model
            return new $model();
        }

        public function view($view, $data = []){
            define("sectionStart", ROOT ."/Views/Layout/Header.php");
            define("sectionStop", ROOT ."/Views/Layout/Footer.php");
            //Check the view if file exists
            if(file_exists("../App/Views/" . $view . ".php")){
                require_once "../App/Views/" . $view . ".php";
            }else{
                //Returns a message if view does not exist
                die("View does not exists");
            }
        }

    }
?>