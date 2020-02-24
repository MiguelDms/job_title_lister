<?php 

 if($job->user_id != $user_id) { 
    header('Location: index.php');
 } else {

include 'includes/header.php';
?>

    <h2 class="page-header" id="edit-header">Editar Post</h2>

    <?php if (isset($_POST['submit'])): ?>
       <div id="edit-error" class="text-center my-4">
            <?php echo $error;?>
       </div>
    <?php endif; ?>
    

    <form action="edit.php?id=<?php echo $job->id;?>" method="POST">
        <div class="form-group">
            <label for="">Empresa</label>
            <input type="text" class="form-control" name="company" value="<?php echo $job->compnay;?>">
        </div>
        <div class="form-group">
            <label for="">Categoria</label>
            <select class="form-control" name="category">
                <option value="0" <?php echo (($job->category_id == 0))? ' selected' : '' ;?>>Escolha a categoria</option>
                <?php foreach($categories as $category): ?>
                <option value="<?php echo $category->id;?>" <?php echo (($job->category_id == $category->id))? ' selected' : '' ;?>><?php echo $category->name;?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="form-group">
            <label for="">Designação de Posto</label>
            <input type="text" class="form-control" value="<?php echo $job->job_title;?>" name="job_title">
        </div>
        <div class="form-group">
            <label for="">Descrição</label>
            <textarea class="form-control" name="description"><?php echo $job->description;?></textarea>
        </div>
        <div class="form-group">
            <label for="">Local</label>
            <input type="text" class="form-control" name="location" value="<?php echo $job->location;?>">
        </div>
        <div class="form-group">
            <label for="">Salário</label>
            <input type="text" class="form-control" name="salary" value="<?php echo $job->salary;?>">
        </div>
        <div class="form-group">
            <label for="">Nome de Contacto</label>
            <input type="text" class="form-control" name="contact_user" value="<?php echo $job->contact_user;?>">
        </div>
        <div class="form-group">
            <label for="">Email de Contacto</label>
            <input type="text" class="form-control" name="contact_email" value="<?php echo $job->contact_email;?>">
        </div>
        <div class="form-group">
        <input type="text" name="website" class="form-control website-thing">
        </div>
        <input type="submit" class="btn btn-success" value="Submeter" name="submit">
    </form>

<?php
include 'includes/footer.php';

}

