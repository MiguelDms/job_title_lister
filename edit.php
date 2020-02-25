<?php 

include_once 'config/init.php';

/* $job = new Job;
$template = new Template('templates/job-edit.php'); */
$job = new lib\Job;
$template = new lib\Template('templates/job-edit.php');


// get Id
$job_id = isset($_GET['id']) ? $_GET['id'] : null;

// check for session 

$user_id = isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : null;

if (!$user_id) { // isto vai verificar se ha uma sessao aberta
    header('Location: index.php');
}


if(isset($_POST['submit'])) {

    $error = '';
    $job_title = $_POST['job_title'];
    $company = $_POST['company'];
    $category = $_POST['category'];
    $contact_email = $_POST['contact_email'];
    $website = $_POST['website'];

    if (!empty($website)) {
       die();
    }

    $data = array();
    $data['job_title'] = $_POST['job_title'];
    $data['company'] = $_POST['company'];
    $data['category_id'] = $_POST['category'];
    $data['description'] = $_POST['description'];
    $data['location'] = $_POST['location'];
    $data['salary'] = $_POST['salary'];
    $data['contact_user'] = $_POST['contact_user'];
    $data['contact_email'] = $_POST['contact_email'];

     //form validation
     if (empty($job_title) || empty($company) || empty($category) || empty($contact_email)) {
        $error = 'Tem de preencher todos os campos com asterisco';
      }

      if (!empty($error)) {

        $template->error = '<h5 class="text-danger font-weight-bolder border border-danger mb-2 p-1 b-rad">' . $error . '</h5>';
    
    } else {
        if ($job->update($data, $job_id)) {
                redirect('index.php', 'A entrada foi modificada com sucesso', 'success');
            } else {
                redirect('index.php', 'Algo correu mal com o update', 'error');
            }
        
    } 
}

// get categories

$template->categories = $job->getCategories();


if ($job_id) { //<-- isto vai verificar se a pagina não esta a ser acedida directamente
    
    // transfer job_id from getJob function into template
$template->job = $job->getJob($job_id); 
$template->user_id = $user_id; 
    
} else {
    header('Location: index.php');
}

echo $template;

