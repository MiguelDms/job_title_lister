<?php 

include_once 'config/init.php';

$user = new lib\User;


$data = array();


    parse_str($_POST['data'], $params);
    $email = $params['email'];
    $password = $params['password'];
    $first_name = $params['first_name'];
    $last_name = $params['last_name'];
    $username = $params['username'];
    $age = $params['age'];
    $contact_email = $params['contact_email'];
    $contact_name = $params['contact_name'];
    $employment_status = $params['employment_status'];
    $password_confirm = $params['password_confirm'];
    $company = $params['company'];
    $chosen_register = $params['chosen_register'];
    $website = $params['website'];
    $errors = array();


    if (!empty($website)) {
      die();
    }

 //form validation
 if (empty($email) || empty($password) || empty($first_name) || empty($last_name) || empty($username) || empty($employment_status) || empty($password_confirm) || empty($company)) {
    $errors[] = 'Tem de preencher todos os campos com asterisco';
  }

  //email validation

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Tem de entrar um email valido';
  }

  // check if email exists in db
  if (!empty($email)) {
    if ($user->checkUserEmail($email) == true) {
        $errors[] = 'Esse email já existe na base de dados';
    }

  }

  // Check confirmed email

  if ($password !== $password_confirm) {
    $errors[] = 'A password de confirmação é diferente da sua password';
  }

  // check if username exists in db
  if (!empty($username)) {
    if ($user->checkUsername($username) == true) {
        $errors[] = 'Esse username já existe na base de dados';
    }
  }
  

  // password more than six characters

    if (strlen($password) < 6) {
        $errors[] = 'A password tem de conter mais de 6 caracteres';
    } 

    // hash password

    $password = password_hash($password, PASSWORD_DEFAULT);

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo '<h6 class="border border-danger mb-2 p-1 b-rad">' . $error . '</h6>';
        }
    } else {

        
    
                $data = array();
                $data['first_name'] = $first_name;
                $data['last_name'] = $last_name;
                $data['company'] = $company;
                $data['username'] = $username;
                $data['age'] = $age;
                $data['contact_email'] = $contact_email;
                $data['contact_name'] = $contact_name;
                $data['employment_status'] = $employment_status;
                $data['email'] = $email;
                $data['password'] = $password;
                $data['is_employer'] = $chosen_register;
            
            
        
            if($user->create($data)) {
                echo 'index.php?registered=1';
            } else {
                echo 'error';
            } 
        } 
  

