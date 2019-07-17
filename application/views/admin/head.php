<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Admin HenXui| Dashboard</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="<?php echo public_url() ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet"
      href="<?php echo public_url() ?>/site/bootstrap/bootstrap-datetimepicker.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo public_url() ?>/bower_components/font-awesome/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="<?php echo public_url() ?>/bower_components/Ionicons/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo public_url() ?>/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="<?php echo public_url() ?>/dist/css/skins/_all-skins.min.css">
<!--<link rel="stylesheet" href="--><?php //echo public_url() ?><!--/dist/css/skins/skin-green.min.css">-->


<!-- Morris chart -->
<link rel="stylesheet" href="<?php echo public_url() ?>/bower_components/morris.js/morris.css">
<!-- jvectormap -->
<link rel="stylesheet" href="<?php echo public_url() ?>/bower_components/jvectormap/jquery-jvectormap.css">
<!-- Date Picker -->
<link rel="stylesheet" href="<?php echo public_url() ?>/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<!-- Daterange picker -->
<link rel="stylesheet" href="<?php echo public_url() ?>/bower_components/bootstrap-daterangepicker/daterangepicker.css">
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="<?php echo public_url() ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">


<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<script>var baseUrl= "<?php echo admin_url()?>"</script>
<script src="<?php echo public_url() ?>/site/bootstrap/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo public_url() ?>/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo public_url() ?>/site/bootstrap/moment.js"></script>
<script src="<?php echo public_url() ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo public_url() ?>/bower_components/raphael/raphael.min.js"></script>
<!--<script src="--><?php //echo public_url() ?><!--/bower_components/morris.js/morris.min.js"></script>-->
<!-- Sparkline -->
<script src="<?php echo public_url() ?>/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo public_url() ?>/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo public_url() ?>/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo public_url() ?>/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script
    src="<?php echo public_url() ?>/site/bootstrap/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="<?php echo public_url() ?>/js/jquery.twbsPagination.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo public_url() ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<script src="<?php echo public_url() ?>/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo public_url() ?>/bower_components/fastclick/lib/fastclick.js"></script>
<script src="<?php echo public_url('js') ?>/axios.min.js"></script>

<script src="<?php echo public_url() ?>/dist/js/adminlte.min.js"></script>

<script src="<?php echo public_url() ?>/dist/js/demo.js"></script>
<script src="<?php echo public_url() ?>/site/bootstrap/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="<?php echo public_url() ?>/site/bootstrap/jquery.dataTables.min.css">
<script src="<?php echo public_url() ?>/js/common.js"></script>
<script type="text/javascript" src="<?php echo public_url() ?>/js/jquery.table2excel.js"></script>
<script src="<?php echo public_url() ?>/site/bootstrap/highcharts.js"></script>
<script src="<?php echo public_url() ?>/site/bootstrap/exporting.js"></script>
<script src="<?php echo public_url('js') ?>/jquery/jquery.colorbox.js"></script>
<script src="<?php echo public_url('js') ?>/callapi.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo public_url('admin')?>/css/colorbox.css" media="screen" />
<script type="text/javascript" src="<?php echo public_url()?>/js/jquery.simplePagination.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo public_url()?>/admin/css/simplePagination.css" media="screen" />


<script>



     jQuery(function ($) {
         $("ul a").click(function (e) {
             var link = $(this);
             var item = link.parent("li");
             if (item.hasClass("active")) {
                 item.removeClass("active").children("a").removeClass("active");
             } else {
                 item.addClass("active").children("a").addClass("active");
             }
             if (item.children("ul").length > 0) {
                 var href = link.attr("href");
                 console.log(href);
                 link.attr("href", "#");
                 setTimeout(function () {
                     link.attr("href", href);
                 }, 3000);
                 e.preventDefault();
             }
         })
             .each(function () {
                 var link = $(this);
                 if (link.get(0).href === location.href) {
                     link.addClass("active").parents("li").addClass("active");
                     return false;
                 }
             });
     });
</script>