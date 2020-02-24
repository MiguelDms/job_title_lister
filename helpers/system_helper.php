<?php 
    // Redirect to page
    function redirect($page = FALSE, $message = NULL, $message_type = NULL){
        if (is_string($page)) {
            $location = $page;
        } else{
            $location = $_SERVER['SCRIPT_NAME'];
        }

        //check for message
        if ($message != NULL) {
            //Set message
            $_SESSION['message'] = $message;
        }

        //check for type 
        if ($message_type != NULL) {
            $_SESSION['message_type'] = $message_type;
        }

        //redirect
        header('Location: ' . $location);
        exit;
    }


    function displayWelcome($message = NULL, $message_type = NULL) {
        //check for message
        if ($message != NULL) {
            //Set message
            $_SESSION['message'] = $message;
        }

        //check for type 
        if ($message_type != NULL) {
            $_SESSION['message_type'] = $message_type;
        }
    }

    // DIsplay message
    function displayMessage() {
        if (!empty($_SESSION['message'])) {

           //assign message var
           $message = $_SESSION['message'];

           if (!empty($_SESSION['message_type'])) {
              //assign message var
            $message_type = $_SESSION['message_type'];

                if ($message_type == 'error') {
                    echo '<div class="alert alert-danger">' . $message . '</div>';
                } else {
                    echo '<div class="alert alert-success">' . $message . '</div>';
                }
           }

           // Unset sessions 
            unset($_SESSION['message']);
            unset($_SESSION['message']);
            unset($_SESSION['message']);
            unset($_SESSION['message_type']);
        } else {
            echo '';
        }
    } 
    


    function displayErrors() {
  
        if (!empty($_SESSION['errors'])) {

            //assign message var
            $errors = $_SESSION['errors'];

            
            foreach($errors as $error) {
                echo '<div class="alert alert-danger">' . $error . '</div>';
            }

  // Unset sessions 
             unset($_SESSION['errors']);
  } else {
             echo '';
         }
           
        }

    


