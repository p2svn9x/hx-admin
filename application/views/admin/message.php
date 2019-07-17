<?php if(isset($message) && $message):?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Thông báo: <?php echo $message?></h4>

    </div>
<?php endif;?>


<?php if(isset($messageError) && $messageError):?>
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Thông báo: <?php echo $messageError?></h4>

    </div>
<?php endif;?>
