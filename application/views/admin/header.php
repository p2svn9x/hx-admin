<header class="main-header">
<!-- Logo -->
<a href="<?php echo admin_url() ?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>A</b>Z</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Admin</b></span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
<!-- Sidebar toggle button-->
<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
</a>

<div class="navbar-custom-menu">
<ul class="nav navbar-nav">
<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="<?php echo public_url()?>/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
        <span class="hidden-xs"><?php echo $admin_info->FullName; ?></span>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
            <img src="<?php echo public_url()?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </li>
        <!-- Menu Body -->

        <!-- Menu Footer-->
        <li class="user-footer">

            <div class="pull-right">
                <a href="<?php echo admin_url('admin/logout')?>" class="btn btn-default btn-flat">Đăng xuất</a>
            </div>
        </li>
    </ul>
</li>
<!-- Control Sidebar Toggle Button -->

</ul>
</div>
</nav>
</header>



<script>
    $(function() {
        var menuVisible = false;
        $('.iconmenu').click(function() {
            if (menuVisible) {
                $('#left_content').css({'display':'none'});
                menuVisible = false;
                return;
            }
            $('#left_content').css({'display':'block'});
            menuVisible = true;
        });
        $('.iconmenu').click(function() {
            $(this).css({'display':'none'});
            menuVisible = false;
        });
    });

</script>