<?php 

include_once 'config/init.php';

/* $job = new Job;
$user = new User;
$template = new Template('templates/job-create.php'); */
$job = new lib\Job;
$user = new lib\User;
$template = new lib\Template('templates/job-create.php');

$user_id = isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : null;

// check to see if user is logged in

if ($user_id) {
    $check = $user->checkEmployerStatus($user_id);

    if ($check->is_employer !== '1') {
        header('Location: index.php');
    } 
} else {
    header('Location: index.php');
}


if(isset($_POST['submit'])) {

    $error = '';
    $job_title = $_POST['job_title'];
    $company = $_POST['company'];
    $category = $_POST['category'];
    $contact_email = $_POST['contact_email'];
    $website = $_POST['website'];

    $data = array();
    $data['job_title'] = $job_title;
    $data['user_id'] = $user_id;
    $data['company'] = $company;
    $data['category_id'] = $category;
    $data['description'] = $_POST['description'];
    $data['location'] = $_POST['location'];
    $data['salary'] = $_POST['salary'];
    $data['contact_user'] = $_POST['contact_user'];
    $data['contact_email'] = $contact_email;

    if (!empty($website)) {
        die();
    }

     //form validation
     if (empty($job_title) || empty($company) || empty($category) || empty($contact_email)) {
        $error = 'Tem de preencher todos os campos com asterisco';
      }

      if (!empty($error)) {

        $template->error = '<h5 class="text-danger font-weight-bolder border border-danger mb-2 p-1 b-rad">' . $error . '</h5>';
    
    } else {
        if ($job->create($data)) {
                redirect('index.php', 'A entrada foi criada com sucesso', 'success');
            } else {
                redirect('index.php', 'Algo correu mal com a criação da entrada', 'error');
            }
        
    } 
}

// get categories

$template->categories = $job->getCategories();
$template->user_ide = $user->checkEmployerStatus($user_id);

echo $template;

