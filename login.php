<?php 

include_once 'config/init.php';

$user = new lib\User;
/* $user = new User; */
$data = array();



    parse_str($_POST['data'], $params);
    $email = $params['email'];
    $password = $params['password'];
    $website = $params['website'];
    $errors = array();

    if (!empty($website)) {
      die();
    }


    //form validation
    if (empty($email) || empty($password)) {
        $errors[] = 'Tem de preencher ambos os campos';
      }

      //email validation

      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Tem de entrar um email valido';
      }


    // send user to check in database
    if($user->checkUserEmail($email)) {

       $userLogin = $user->checkUserEmail($email);
       
       if (!password_verify($password, $userLogin->password)) {
        $errors[] = 'A password não coincide. Por favor tente outra vez';
      } 

    } else {
          $errors[] = 'O email inserido não existe na base de dados';
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
        echo '<h6 class="border border-danger mb-2 p-2 b-rad">' . $error . '</h6>';
      }
    } else {
        $user_id = $userLogin->id;
        $_SESSION['logged_in'] = $user_id; //Assim que a funçao ocorrer, o user_id vai ser passado para a superglobal session
        $date = date("Y-m-d H:m:s"); //é assim que a base de dados guarda os dados.
        $user->updateUser($user_id, $date);
        echo 'index.php?logged=1';
    }

  

