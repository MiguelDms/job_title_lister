<?php 

include_once 'config/init.php';


$job = new lib\Job;
$user = new lib\User;
$template = new lib\Template('templates/preferencias-main.php');


$user_id = isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : null;

// check to see if user is logged in

if ($user_id) {
    $template->check = $user->checkEmployerStatus($user_id);
} else {
    redirect('index.php', 'Tem de estar logado para aceder a esta página', 'error');
}

if(isset($_POST['submit'])) {
    $data = array();
    $data['employment_status'] = $_POST['employment_status'];
    $data['contact_email'] = $_POST['contact_email'];
    $data['show_email'] = $_POST['show_email'];
    $data['contact_name'] = $_POST['contact_name'];
    $data['company'] = $_POST['company'];
    $data['presentation'] = $_POST['presentation'];

    if($user->update($data, $user_id)) {
        redirect('preferencias.php', 'A sua conta foi alterada com sucesso', 'success');
    } else {
        redirect('preferencias.php', 'Algo correu mal com o update', 'error');
    }
}

echo $template;

