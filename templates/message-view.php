
<?php 

include 'includes/header.php';
?>

<?php 

if ($user_id !== $received->user_receiver) {
    header('Location: index.php');
} else { ?>

    <h3><strong><?php echo $received->title;?></strong></h3>
    <p></p>
    <div class="message-body w-100">
        <h5><?php echo $received->body;?></h5>
    </div>
    <p></p>
    <a href="message.php?id=<?php echo $received->user_sender ?>" class="btn btn-primary float-right mb-3">Responder</a>
        <?php
}

include 'includes/footer.php';

