<?php 

include 'includes/header.php';
?>

    <h2 class="page-header" id="create-header">Criar Entrada</h2>

    <?php if (isset($_POST['submit'])): ?>
       <div id="create-error" class="text-center my-4">
           <?php echo $error;?>
       </div>
    <?php endif; ?>

    <form action="create.php" method="POST">
        <div class="form-group">
            <label for="">Empresa<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="company">
        </div>
        <div class="form-group">
            <label for="">Categoria<span class="text-danger">*</span></label>
            <select class="form-control" name="category">
                <option value="0">Escolha uma categoria</option>
                <?php foreach($categories as $category): ?>
                <option value="<?php echo $category->id;?>"><?php echo $category->name;?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="form-group">
            <label for="">Designação do Posto<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="job_title">
        </div>
        <div class="form-group">
            <label for="">Descrição</label>
            <textarea class="form-control" name="description"></textarea>
        </div>
        <div class="form-group">
            <label for="">Local</label>
            <input type="text" class="form-control" name="location">
        </div>
        <div class="form-group">
            <label for="">Salário</label>
            <input type="text" class="form-control" name="salary">
        </div>
        <div class="form-group">
            <label for="">Pessoa de contacto</label>
            <input type="text" class="form-control" name="contact_user" value="<?php echo $user_ide->contact_name;?>">
        </div>
        <div class="form-group">
            <label for="">Contacto<span class="text-danger">*</span></label>
            <input type="email" class="form-control" name="contact_email" value="<?php echo $user_ide->contact_email; ?>">
        </div>
        <div class="form-group">
        <input type="text" name="website" class="form-control website-thing">
        </div>
        <input type="submit" class="btn btn-success" value="Submeter" name="submit">
    </form>

    

<?php
include 'includes/footer.php';

