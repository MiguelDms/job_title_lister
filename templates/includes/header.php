<?php 

include_once '../config/init.php';
include '../head.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobLister</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    
<div class="container">
      <div class="header clearfix pb-0">
        <h3 class="text-muted d-inline-block"><a href="index.php"><?php echo SITE_TITLE;?></a></h3>
        <nav class="d-inline">
          <ul class="nav nav-pills float-right">
            <?php if(isset($_SESSION['logged_in']) && $check->is_employer == '1'):  ?>
            <li class="nav-item">
              <a class="nav-link px-3 pb-0" href="create.php">Criar Post</a>
            </li>
            <?php endif; ?>
            <?php if(isset($_SESSION['logged_in'])):  ?>

              <div class="dropdown">
              <button class="btn btn-default pr-1 pb-0 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $check->username;?>
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="dashboard.php">Dashboard</a>
                <a class="dropdown-item" href="preferencias.php">Preferências</a>
                <a class="dropdown-item" href="logout.php?logout=1">Logout</a>
              </div>
            </div>
            <?php endif; ?>

            <?php if($logged): ?>
            <li class="nav-item">
              <a class="nav-link px-1" href="dashboard.php?messages=1"><img src="imagens/iconfinder_message_172503.svg" class="<?php echo (($message_single->checked == '0')? 'new-message' : '') ?>" height="20px" width="30px" alt="message icon"> <span class="sr-only">(current)</span><?php echo (($checked == true)? '<span class="text-danger font-weight-bolder envelope-span">*</span>' : '') ?></a>
            </li>
            <?php endif; ?>

            <?php if(!isset($_SESSION['logged_in'])): ?>
            <li class="nav-item">
              <a class="nav-link px-3" href="index.php" data-toggle="modal" data-target="#login-modal">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link px-3" href="index.php" data-toggle="modal" data-target="#register-modal1">Registo</a>
            </li>
            <?php endif;?>
          </ul>
        </nav>
      </div>

      
      <?php include 'modal.php'?>
    

      <div id="error-message">
        <?php displayMessage(); ?>
      </div>
    

    