<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= BRAND_NAME ?> | Bài Đăng</title>
    <?php require 'views/includes/auth/base_css.php'; ?>

    <link rel="stylesheet" href="<?= URL ?>assets/auth/scss/style.css">
    <link rel="stylesheet" href="<?= URL ?>assets/auth/css/lib/datatable/dataTables.bootstrap.min.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
<!-- Left Panel -->
<?php require 'views/includes/auth/left_panel.php' ?>
<!-- Left Panel -->

<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <!-- Header-->
    <?php require 'views/includes/auth/header.php' ?>
    <!-- Header-->

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Table</a></li>
                        <li class="active">Data table</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Di tích</strong>
                        </div>
                        <?php if (isset($_GET['msg'])) { ?>
                            <div class="alert alert-success">
                                Thêm bài đăng thành công!
                            </div>
                        <?php } ?>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>Hình Ảnh</th>
                                    <th>Thời gian tạo</th>
                                    <th>Tên Loại</th>
                                    <th>Số lượng View</th>
                                    <th>Xử lý</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($hs as $item) { ?>
                                    <tr>
                                        <td><?= $item['hs_id'] ?></td>
                                        <td><?= $item['hs_name'] ?></td>
                                        <td><img src="<?= URL. $item['hs_image'] ?>" alt="<?= $item['hs_name'] ?>"/></td>
                                        <td><?= $item['create_time'] ?></td>
                                        <td><?= $item['cate_name'] ?></td>
                                        <td><?= $item['hs_view_count'] ?></td>
                                        <td>
                                            <a href="<?= URL ?>historic_site/viewUpdateForm/<?= $item['hs_id'] ?>"
                                               style="color: #2a62bc;"><i class="fa fa-external-link"></i></a>
                                            <a href="<?= URL ?>historic_site/delete/<?= $item['hs_id'] ?>"
                                               style="color: red;"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->


</div><!-- /#right-panel -->

<!-- Right Panel -->


<?php require 'views/includes/auth/base_script.php' ?>


<script src="<?= URL; ?>assets/auth/js/lib/data-table/datatables.min.js"></script>
<script src="<?= URL; ?>assets/auth/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="<?= URL; ?>assets/auth/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="<?= URL; ?>assets/auth/js/lib/data-table/buttons.bootstrap.min.js"></script>
<script src="<?= URL; ?>assets/auth/js/lib/data-table/jszip.min.js"></script>
<script src="<?= URL; ?>assets/auth/js/lib/data-table/pdfmake.min.js"></script>
<script src="<?= URL; ?>assets/auth/js/lib/data-table/vfs_fonts.js"></script>
<script src="<?= URL; ?>assets/auth/js/lib/data-table/buttons.html5.min.js"></script>
<script src="<?= URL; ?>assets/auth/js/lib/data-table/buttons.print.min.js"></script>
<script src="<?= URL; ?>assets/auth/js/lib/data-table/buttons.colVis.min.js"></script>
<script src="<?= URL; ?>assets/auth/js/lib/data-table/datatables-init.js"></script>


<script type="text/javascript">
    $(document).ready(function () {
        $('#bootstrap-data-table-export').DataTable();
    });
</script>


</body>
</html>
