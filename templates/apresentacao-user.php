
<?php 


include 'includes/header.php';
?>

        <div class="presentation py-3">
            <ul class="list-unstyled">
            <?php echo (($id->is_employer == 0) ? '<li><strong> Situação Face ao Emprego:</strong><h6> '. $id->employment_status . '</h6></li>' : '')?> 
                <?php echo  (($id->is_employer == 1)?'<h4 class="mb-4 font-weight-bolder"> Empregador </h4>' : '')?> 
                <li><strong> Nome:</strong><h6><?php echo $id->first_name .' '. $id->last_name;?></h6></li>
            <?php echo (($id->show_email == 1) ? '<li><strong> Email de Contacto:</strong><h6> '. $id->contact_email . '</h6></li>' : '')?> 
                <li><strong> Idade:</strong><h6><?php echo $id->age;?></h6></li>
                <li><strong> Apresentação:</strong><h6><?php echo $id->presentation ;?></h6></li> 
            </ul>
        </div>

  

        <?php if($id->is_employer == 1): ?>
        <hr>
        
        <div class="posts">
            <h3 class="mb-4 font-weight-bolder">Posts</h3>
            <?php foreach ($jobs as $job): ?>
                <hr class="w-75">
            <div class="row my-4">
                <div class="col-8 col-md-10">
                <h4><?php echo $job->job_title; ?></h4>
                <p class="mb-1"><?php 
                    foreach($categories as $category): 
                echo (($category->id == $job->category_id)? $category->name :'');
                    endforeach;
                ?></p>
                <small><strong>Em <?php echo $job->location; ?>, criado a <?php echo $job->post_date; ?>.</strong></small>
                </div>
                <div class="col-4 col-md-2 row justify-content-center align-content-center">
                <a href="job.php?id=<?php echo $job->id;?>" class="btn btn-danger">Ver</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
            <?php endif; ?>

        
<?php

include 'includes/footer.php';

