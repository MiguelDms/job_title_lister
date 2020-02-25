<?php 

include_once 'config/init.php';


$message = new Message;
$user = new User;
$template = new Template('templates/message-view.php');

/* $message = new lib\Message;
$user = new lib\User;
$template = new lib\Template('templates/message-view.php'); */


$user_id = isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : null;
$message_id = isset($_GET['id']) ? $_GET['id'] : null;
$viewed = isset($_GET['viewed']) ? $_GET['viewed'] : null;

// check to see if user is logged in

if ($user_id) {
    $template->user_id = $user_id;
    if (!$message_id) {
        header('Location: index.php');
    } else {
        $template->received = $message->getMessage($message_id);

        if ($viewed) {
            $message->updateChecked($message_id);
        }
    }
} else {
    redirect('index.php', 'Tem de estar logado para aceder a esta página', 'error');
}


//delete message 

if (isset($_POST['del_id'])) {
    $del_id = $_POST['del_id'];
    if ($job->delete($del_id)) {
        redirect('index.php', 'Job Deleted', 'success');
    } else {
        redirect('index.php', 'Job Not Deleted', 'error');
    }
}


echo $template;

