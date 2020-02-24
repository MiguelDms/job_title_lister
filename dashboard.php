<?php 

include_once 'config/init.php';


$job = new lib\Job;
$message = new lib\Message;
$user = new lib\User;
$template = new lib\Template('templates/main-dash.php');


$user_id = isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : null;

// check to see if user is logged in

if ($user_id) {
    $template->check = $user->checkEmployerStatus($user_id);
} else {
    redirect('index.php', 'Tem de estar logado para aceder a esta página', 'error');
}

if ( isset($_GET['posts'])) {
    //results per page
    $perPage = 5;

    // establecer o numero pagina

    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = (int) $_GET['page'];
    }

    $resul_pagina_corrente = ($page - 1) * $perPage;

    $template->allJobs = $job->getJobByUser($user_id);

    // PAGINAÇÂO
    $count = count($template->allJobs);
    //num total de paginas
    $template->nm_paginas = ceil($count / $perPage);

    //pagination part
    $sql = " LIMIT " . $resul_pagina_corrente . ',' . $perPage;

    // get jobs from db with pagination
    $template->allJobs = $job->getJobByUser($user_id, $sql);

    // get categories
    $template->categories = $job->getCategories();
} elseif (isset($_GET['messages'])) {
    $template->received = $message->getMessages($user_id);
}

//delete message 

if (isset($_POST['mess_id'])) {
    $mess_id = $_POST['mess_id'];
    if ($message->delete($mess_id)) {
        redirect('dashboard.php?messages=1', 'Mensagem Apagada', 'success');
    } else {
        redirect('dashboard.php?messages=1', 'Erro', 'error');
    }
}

echo $template;

