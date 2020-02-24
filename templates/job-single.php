
<?php 

include 'includes/header.php';
?>
    <div class="row justify-content-between" id="job-single-title">
        <h2 class="page-header mb-0"><?php echo $job->job_title;?> (<?php echo $job->location;?>)</h2>
        <?php if(isset($_SESSION['logged_in']) && $job->user_id != $user_id): ?>
        <a href="message.php?id=<?php echo $job->user_id ;?>" class="btn btn-info align-self-center p-2 mr-4 pb-2">Enviar Mensagem</a>
        <?php endif; ?>
    </div> 
    <p class="mb-1" id="category-detail"><?php 
                        foreach($categories as $category): 
                        echo (($category->id == $job->category_id)? $category->name :'');
                        endforeach;
                    ?></p>
    <small  class="d-block">Postado Por: <a href="apresentacao.php?id=<?php echo $job->user_id?>" ><?php echo $job->contact_user;?></a>  on <?php echo $job->post_date;?></small>
    <hr>
    <p class="lead"><?php echo $job->description;?></p>
    <ul class="list-group">
        <li class="list-group-item"><strong>Empresa: </strong><?php echo $job->compnay;?></li>
        <li class="list-group-item"><strong>Salário: </strong><?php echo $job->salary;?></li>
        <li class="list-group-item"><strong>Contacto: </strong><?php echo $job->contact_email;?></li>
    </ul>
    <br>
    <div class="row justify-content-between mx-3 mb-3 mt-1">
        <a href="index.php" class="btn btn-md btn-primary">Inicio</a>
        <p></p>
    <?php if(isset($_SESSION['logged_in'])): ?>
    <?php if($job->id &&  $job->user_id == $user_id): ?>
        <div class="well">
            <a href="edit.php?id=<?php echo $job->id;?>" class="btn btn-success">Editar</a>

            <form action="job.php" style="display:inline;" method="POST">
                <input type="hidden" name="del_id" value="<?php echo $job->id;?>">
                <input type="submit" class="btn btn-danger" value="Apagar">
            </form>
        </div>
        <?php endif; ?>
    <?php endif; ?>
    <?php if(isset($_SESSION['logged_in']) && $job->user_id != $user_id): ?>
        <a href="message.php?id=<?php echo $job->user_id ;?>" class="btn btn-info align-self-center p-2" id="msg-sm" style="display:none">Enviar Mensagem</a>
        <?php endif; ?>
    </div> 
   
<?php


include 'includes/footer.php';

