<?php 

include_once 'config/init.php';

$job = new lib\Job;
$user = new lib\User;
$template = new lib\Template('templates/apresentacao-user.php');


$user_id = isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : null;
$id = isset($_GET['id']) ? $_GET['id'] : null;

    if (!$id) {
       header('Location: index.php');
    } else {
        $template->id = $user->checkEmployerStatus($id);
        $template->jobs = $job->getJobByUser($id);
        // get categories
        $template->categories = $job->getCategories();
    }
    

echo $template;

