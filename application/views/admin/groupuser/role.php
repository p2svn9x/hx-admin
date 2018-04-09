<!-- head -->
<div class="content-wrapper">
    <?php if ($admin_info->Status == "A"): ?>
        <section class="content-header">
            <h1>
                Phân quyền nhóm người dùng
            </h1>
        </section>
        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <div class="box box-body">
                        <form id="form" class="form" enctype="multipart/form-data" method="post" action="">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12">
                                            <?php echo $list; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-3 col-md-2">
                                        </div>
                                        <div class="col-xs-6 col-md-4">
                                            <input type="submit" class="btn bg-purple" value="Cập nhật">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    <?php else : ?>
        <section class="content-header">
            <h1>
                Bạn không được phân quyền
            </h1>
        </section>
    <?php endif ?>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $(function () {
            $("input[type='checkbox']").change(function () {
                $(this).siblings('ul')
                    .find("input[type='checkbox']")
                    .prop('checked', this.checked);
            });
        });
    });
</script>