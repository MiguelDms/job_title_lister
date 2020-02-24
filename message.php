<?php 

include_once 'config/init.php';

$message = new lib\Message;
$user = new lib\User;
$template = new lib\Template('templates/message-user.php');

$logged = isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : null;
$to_id = isset($_GET['id']) ? $_GET['id'] : null;


if ($logged) {
    // Get user
    $template->user_id = $user->checkEmployerStatus($logged);


} else {
    redirect('index.php', 'Tem de estar logado para aceder a esta página', 'error');
}

if ($to_id) {
    $template->id_to = $user->checkEmployerStatus($to_id);
}

// submit message

if(isset($_POST['submit'])) {

  $title = $_POST['title'];
  $body = $_POST['body'];

    $data = array();
    $data['user_sender'] = $_POST['from'];
    $data['user_receiver'] = $_POST['to'];
    $data['title'] = $title;
    $data['body'] = $body;


     //form validation
 if (empty($title) || empty($body)) {
    $error = 'Tem de preencher os dois campos';
  }


  if (!empty($error)) {

        $template->error = '<h5 class="text-danger font-weight-bolder">' . $error . '</h5>';
    
    } else {
        if($message->create($data)) {
            redirect('index.php', 'A sua mensagem foi enviada', 'success');
        } else {
            redirect('index.php', 'Something went wrong', 'error');
        }
    }
}


echo $template;

