
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo public_url() ?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $admin_info->FullName ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">

            <li>
                <a href="<?php echo admin_url() ?>">
                    <i class="fa fa-dashboard"></i> <span>Trang chủ</span>

                </a>

            </li>
            <?php if (isset($admin_info)) :  ?>
                <?php echo $menu_list; ?>
            <?php endif; ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>



