
<?php 
if (isset($_GET['messages'])) {
    $allJobs = '';
} elseif (isset($_GET['posts'])) {
    $received = '';
}

include 'includes/header.php';
?>

<div class="row justify-content-between">
    <?php if (isset($_GET['messages'])) { ?>
        <h3 class="p-3 my-mess">As Minhas Mensagens</h3>
   <?php } elseif (isset($_GET['posts']) && $check->is_employer === '1') { ?>
      <h3 class="p-3  my-mess" >Os Meus Posts</h3>
   <?php } else { ?>
       <h3 class="p-3">Menu</h3>
   <?php } ?>

    <div class="row align-content-center mr-4" id="dash-content">
        <a href="dashboard.php" class="p-2" <?php echo((!isset(($_GET['messages'])) && !isset(($_GET['posts'])))? 'style="color:red;"': '');?>>Home</a>
        <a href="dashboard.php?messages=1" class="p-2" <?php echo((isset($_GET['messages']))? 'style="color:red;"': '');?>>Mensagens</a>
    <?php if($check->is_employer === '1'): ?>
        <a href="dashboard.php?posts=1" class="p-2" <?php echo((isset($_GET['posts']))? 'style="color:red;"': '');?>>Posts</a>
    <?php endif; ?>
    </div>
</div>

<?php if(!isset(($_GET['messages'])) && !isset(($_GET['posts']))): ?>
        <h5>O que os outros podem descobrir acerca de mim:</h5>
        <hr>
        <div class="presentation py-3">
            <ul class="list-unstyled">
            <?php echo (($check->is_employer == 0) ? '<li><strong> Situação Face ao Emprego:</strong><h6> '. $check->employment_status . '</h6></li>' : '')?>  
                <li><strong> Nome:</strong><h6><?php echo $check->first_name .' '. $check->last_name;?></h6></li>
            <?php echo (($check->show_email == 1) ? '<li><strong> Email de Contacto:</strong><h6> '. $check->contact_email . '</h6></li>' : '')?> 
                <li><strong> Idade:</strong><h6><?php echo $check->age;?></h6></li>
                <li><strong> Apresentação:</strong><h6><?php echo $check->presentation ;?></h6></li> 
            </ul>
        </div>
    <?php endif; ?>
<?php if($check->is_employer === '1'): ?>
    <?php if (isset($_GET['posts'])): ?>
        <a href="create.php" class="btn btn-success mb-2" id="create-post-btn">Criar Post</a>
        <?php if(!empty($allJobs)): ?>
            <?php foreach($allJobs as $job): ?>
                <hr class="w-75">
                <div class="row my-4 bg-gray"  id="dash-job">
                    <div class="col-8 col-md-10 pl-0">
                    <h4><?php echo $job->job_title; ?></h4>
                    <p class="mb-1"><?php 
                        foreach($categories as $category): 
                    echo (($category->id == $job->category_id)? $category->name :'');
                        endforeach;
                    ?></p>
                    <small><strong>Em <?php echo $job->location; ?>, criado a <?php echo $job->post_date; ?>.</strong></small>
                    </div>
                    <div class="col-4 col-md-2 pr-0">
                    <div class="row flex-column">
                        <a href="job.php?id=<?php echo $job->id;?>" class="btn btn-info float-right mb-1 py-1 px-2 align-self-end" style="width:60px">Ver</a>
                        <form action="job.php" style="display:inline;" method="POST">
                        <input type="hidden" name="del_id" value="<?php echo $job->id;?>">
                        <input type="submit" class="btn btn-danger float-right mt-1 px-2" value="Apagar" style="width:60px">
                        </form>
                    </div>
                    </div>
                </div>
                
            <?php endforeach; ?>
            
            <div class="col-12 text-center mt-3">
                <?php for ($i = 1; $i <= $nm_paginas; $i++) {
                echo '<a href="dashboard.php?posts=1&page=' . $i . '" class="m-2 ' . ((isset($_GET['page']) && $_GET['page'] == $i )? 'bor-disp' : '') . '"> ' . $i . ' </a>'; } ?> 
            </div>

        <?php endif; ?>
    <?php endif; ?>
<?php endif; ?>
<?php if (isset($_GET['messages'])): ?>
    <?php if(!empty($received)): ?>

        <table class=" table-bordered table-striped" id="table-disp">
            <thead>
                <th class="p-2">De</th><th class="p-2">Assunto</th><th class="p-2"></th><th class="p-2"></th>
            </thead>
            <tbody>
        
        <?php foreach($received as $message): ?>
        
                <tr <?php echo (($message->checked == 0)?'style="outline-offset: -4px; outline: 1px solid red;"':'') ?>>
                    <td class="p-3 w-50"><a href="apresentacao.php?id=<?php echo $message->uid; ?>"><h4><?php echo $message->username; ?></h4></a></td>
                    <td class="p-3 w-50"><?php echo $message->title; ?></td>
                    <td class="p-1 px-2"><a href="view.php?id=<?php echo $message->id;?>&viewed=1" class="btn btn-info ml-2 mt-1">Ver</a>
                    </td>
                    <td class="p-1 px-2">
                    <form action="dashboard.php" style="display:inline;" method="POST">
                    <input type="hidden" name="mess_id" value="<?php echo $message->id;?>">
                    <input type="submit" class="btn btn-danger mt-1 ml-2 px-2" value="Apagar">
                    </form>
                    </td>
                </tr>
    
        <?php endforeach; ?>

            </tbody>
        </table>

    <?php endif; ?>
<?php endif; ?>


<?php
include 'includes/footer.php';

