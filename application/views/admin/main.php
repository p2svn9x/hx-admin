<html>
<head>
    <?php $this->load->view('admin/head') ?>
</head>

<body class="sidebar-mini skin-purple">
<div id="spinner" class="spinner" style="display:none;">
    <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
</div>
<div class="wrapper">
    <?php $this->load->view('admin/header') ?>
    <?php $this->load->view('admin/left') ?>
    <?php $this->load->view($temp, $this->data); ?>


    <?php $this->load->view('admin/footer') ?>
</div>


</body>
</html>