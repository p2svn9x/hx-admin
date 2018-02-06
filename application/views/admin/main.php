<html>
<head>
    <?php $this->load->view('admin/head') ?>
</head>

<body class="sidebar-mini skin-purple">
<div class="wrapper">
    <?php $this->load->view('admin/header') ?>
    <?php $this->load->view('admin/left') ?>
    <?php $this->load->view($temp, $this->data); ?>
    <?php $this->load->view('admin/footer') ?>
</div>


</body>
</html>