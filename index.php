<?php 

include_once 'config/init.php';

/* $job = new Job;
$template = new Template('templates/frontpage.php'); */
$job = new lib\Job;
$template = new lib\Template('templates/frontpage.php');

// get category id 
$category = isset($_GET['category']) ? $_GET['category'] : null;

if (isset($_GET['registered'])) {
    redirect('index.php', 'Você registou-se com sucesso', 'success');

} elseif (isset($_GET['logged'])) {
    redirect('index.php', 'Você está autenticado', 'success');
} else {
    $message = null;
}

$message_type = isset($_GET['logged']) || isset($_GET['registered']) ? 'success' : null;

displayWelcome($message, $message_type);



//results per page
$perPage = 5;

// establecer o numero pagina

if (!isset($_GET['page'])) {
    $page = 1;
  } else {
    $page = (int) $_GET['page'];
  }

  $resul_pagina_corrente = ($page - 1) * $perPage;

if ($category) {
     // ir buscar ao titulo o nome da categoria
     $template->title = 'Emprego em ' . $job->getCategory($category)->name;

    $template->jobs = $job->getByCategory($category);

    // PAGINAÇÂO
    $count = count($template->jobs);
    //num total de paginas
    $template->nm_paginas = ceil($count / $perPage);

    // pagination part
     $sql = " LIMIT " . $resul_pagina_corrente . ',' . $perPage;

    // get jobs by category with pagination
    $template->jobs = $job->getByCategory($category, $sql);
   
} else {
    $template->title = 'Ultimo Empregos';

    // get jobs from db
    $template->jobs = $job->getAllJobs();

    // PAGINAÇÂO
    $count = count($template->jobs);
    //num total de paginas
    $template->nm_paginas = ceil($count / $perPage);

    //pagination part
    $sql = " LIMIT " . $resul_pagina_corrente . ',' . $perPage;

    // get jobs from db with pagination
    $template->jobs = $job->getAllJobs($sql);
}



 



// get categories

$template->categories = $job->getCategories();
echo $template;

