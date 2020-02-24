<?php 

$user = new lib\User;
$message = new lib\Message;

$logged = isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : null;

if ($logged) {
  $checked = '';

    $check = $user->checkEmployerStatus($logged);
    $messages = $message->getMessages($logged);

    foreach ($messages as $message_single) {
      if ($message_single->checked == '0') {
         $checked = true;
      break;

      } else {
          $checked = false;
      }
    }
} 

