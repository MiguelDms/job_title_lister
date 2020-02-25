<?php 

include_once 'config/init.php';

$job = new Job;
/* $job = new lib\Job; */

//delete job 

if (isset($_POST['del_id'])) {
    $del_id = $_POST['del_id'];
    if ($job->delete($del_id)) {
        redirect('index.php', 'Job Deleted', 'success');
    } else {
        redirect('index.php', 'Job Not Deleted', 'error');
    }
}

$template = new Template('templates/job-single.php');


// get job id 
$job_id = isset($_GET['id']) ? $_GET['id'] : null;
$user_id = isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : null;

if ($job_id) {
    
    // transfer job_id from getJob function into template
$template->job = $job->getJob($job_id);


    // get categories
    $template->categories = $job->getCategories();

    if ($user_id) {
        $template->user_id = $user_id;
    }
    
} else {
    header('Location: index.php');
}


echo $template;

