<?php 


include 'includes/header.php';
?>

    <h2 class="page-header" id="prefe-header">Opções de Conta</h2>
    <form action="preferencias.php" method="POST">
        <?php if($check->is_employer === '1'): ?>
            <div class="form-group">
                <div class="row px-3 justify-content-between">
                <label for="">Empresa</label>
                    <div class="row  align-content-start">
                        <img src="Imagens/iconfinder_sun-symbol_110801.png" alt="" width="20px" height="20px">
                        <label class="switch">
                        
                        <input type="checkbox" name="theme" onchange="colorChange();">
                        <span class="slider round"></span>
                        </label>
                        <img src="Imagens/iconfinder_icon-ios7-moon-outline_211778.png" alt="" width="30px" height="30px" style="margin-top: -10px; margin-left: 1px">
                    </div>
                </div>
                <input type="text" class="form-control" name="company" value="<?php echo $check->company;?>">
            </div>
        <?php else: ?>
            <input type="hidden" name="company" value="<?php echo $check->company;?>">
        <?php endif; ?>
        <?php if($check->is_employer !== '1'): ?>
        <div class="form-group">
            <label for="">Situação Face ao Emprego</label>
            <select class="form-control" name="employment_status">
                <option value="Procura Full Time" <?php echo (($check->employment_status == 'Procura Full Time'))? ' selected' : '' ;?>>Procura Full Time</option>
                <option value="Procura Part Time" <?php echo (($check->employment_status == 'Procura Part Time'))? ' selected' : '' ;?>>Procura Part Time</option>
                <option value="Procura Part Time e Full Time" <?php echo (($check->employment_status == 'Procura Part Time e Full Time'))? ' selected' : '' ;?>>Procura Part Time e Full Time</option>
            </select>
        </div>
        <?php endif; ?>
        <div class="form-group">
            <label for="">Nome de contacto</label>
            <input type="text" class="form-control" name="contact_name" value="<?php echo $check->contact_name;?>">
        </div>
        <div class="container row justify-content-between p-0 m-0">
            <div class="form-group w-100">
                <label for="">Email de Contacto</label>
                <input type="text" class="form-control pr-0" name="contact_email" value="<?php echo $check->contact_email;?>">
            </div>
            <div class="form-group">
                <label for="" class="mr-1">Mostrar Email na Página de Apresentação</label>

                <input type="hidden" name="show_email" value="0">
                <input type="checkbox" name="show_email" value="1" <?php echo (($check->show_email == '1')? ' checked' :'') ?>>
            </div>
        </div>
        <div class="form-group">
            <label for="">Apresentação</label>
            <textarea class="form-control" name="presentation" rows="10"><?php echo $check->presentation;?></textarea>
        </div>
        
        <input type="submit" class="btn btn-success" value="Editar" name="submit">
    </form>


<?php
include 'includes/footer.php';



