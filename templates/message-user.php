
<?php 

include 'includes/header.php';
?>  

    <?php if(isset($_POST['submit'])): ?>
    <div id="error-message" class="text-center my-4">
        <?php echo $error;?>
    </div>
    <?php endif; ?>

    <div class="row justify-content-between">
    <h2 class="page-header" id="send-header">Enviar Mensagem</h2>
        <div class="flex-column row mr-5" id="sender-receiver">
           <strong>De:</strong><span><a href="dashboard.php"><?php echo $user_id->username;?></a></span>
           <strong>Para:</strong><span><a href="apresentacao.php?id=<?php echo $id_to->id?>"><?php echo $id_to->username;?></a></span>
        </div>
    </div>
    <form action="message.php?id=<?php echo $id_to->id;?>" id="message-form" method="POST">
        <input type="hidden" name="to" value="<?php echo $id_to->id;?>">
        <input type="hidden" name="from" value="<?php echo $user_id->id;?>">
        <div class="form-group">
            <label for="">Assunto:</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="form-group">
            <label for="">Mensagem:</label>
            <textarea name="body" id="" class="w-100" rows="10"></textarea>
        </div>
        <input type="submit" class="btn btn-success" value="Enviar" name="submit">
    </form>
<?php

include 'includes/footer.php';

