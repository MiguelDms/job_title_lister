<?php 

include 'includes/header.php';

?>


      <div class="jumbotron">
        <h3 class="display-3">Procure Emprego</h3>
        <form action="index.php" method="GET">
          <select name="category" id="" class="form-control">
            <option value="0">Escolha a Categoria</option>
            <?php foreach($categories as $category): ?>
              <option value="<?php echo $category->id;?>"><?php echo $category->name;?></option>
            <?php endforeach;?>
          </select>
          <hr>
          <input type="submit" class="btn btn-lg btn-success" value="Procurar">
        </form>
      </div>
      <div class="posts">
      <h1 class="latest"><?php echo $title?></h1>
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
        <div class="col-4 col-md-2 row align-self-center justify-content-end">
          <a href="job.php?id=<?php echo $job->id;?>" class="btn btn-danger">Ver</a>
        </div>
       
      </div>
      
      <?php endforeach; ?>
      <div class="col-12 text-center mt-3">
        <?php for ($i = 1; $i <= $nm_paginas; $i++) {
          echo '<a href="index.php?page=' . $i . '" class="m-2 ' . ((isset($_GET['page']) && $_GET['page'] == $i )? 'bor-disp' : '') . '"> ' . $i . ' </a>'; } ?> 
        </div>
      </div>
<?php
include 'includes/footer.php';

