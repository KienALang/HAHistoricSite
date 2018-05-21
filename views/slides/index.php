<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= BRAND_NAME ?> | Slides Show</title>
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
                        <li class="active"><a href="#">Slides show</a></li>
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
                            <strong class="card-title">Slide ( Quản lý hình ảnh giới thiệu trang chủ )</strong>
                        </div>
                        <br/>
                        <div class="col-md-3">
                            <a href="<?= URL . 'slides/create' ?>" class="btn btn-primary">Thêm mới Slide</a>
                        </div>
                        <br/> <br/>
                        <?php if (isset($_GET['msg'])) { ?>
                            <div class="alert alert-success">
                                <?php if ($_GET['msg'] == 1) echo "Thêm Slide thành công"; ?>
                                <?php if ($_GET['msg'] == 2) echo "Xóa Slide thành công"; ?>
                            </div>
                        <?php } ?>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th width="60%">Hình Ảnh</th>
                                    <th width="20%%">Chức năng</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($slides as $slide) { ?>
                                    <tr>
                                        <td><?= $slide['id'] ?></td>
                                        <td><?= $slide['name'] ?></td>
                                        <td class="image-admin">
                                            <img src="<?= URL . 'upload/slides/' . $slide['image'] ?>"
                                                 alt="<?= $slide['name'] ?>">
                                        </td>
                                        <td>
                                            <div class="btn btn-primary">
                                                <i class="fa fa-edit"></i><a
                                                        href="<?= URL . 'slides/edit?id=' . $slide['id']; ?>">
                                                    Sửa</a>
                                            </div>
                                            <div class="btn btn-danger">
                                                <i class="fa fa-remove"></i><a
                                                        onclick="return confirm('Bạn có thật sự muốn xóa?');"
                                                        href="<?= URL . 'slides/del?id=' . $slide['id']; ?>">Xóa</a>
                                            </div>
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


<script src="<?= URL; ?>public/auth_js/lib/data-table/datatables.min.js"></script>
<script src="<?= URL; ?>public/auth_js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="<?= URL; ?>public/auth_js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="<?= URL; ?>public/auth_js/lib/data-table/buttons.bootstrap.min.js"></script>
<script src="<?= URL; ?>public/auth_js/lib/data-table/jszip.min.js"></script>
<script src="<?= URL; ?>public/auth_js/lib/data-table/pdfmake.min.js"></script>
<script src="<?= URL; ?>public/auth_js/lib/data-table/vfs_fonts.js"></script>
<script src="<?= URL; ?>public/auth_js/lib/data-table/buttons.html5.min.js"></script>
<script src="<?= URL; ?>public/auth_js/lib/data-table/buttons.print.min.js"></script>
<script src="<?= URL; ?>public/auth_js/lib/data-table/buttons.colVis.min.js"></script>
<script src="<?= URL; ?>public/auth_js/lib/data-table/datatables-init.js"></script>


<script type="text/javascript">
    $(document).ready(function () {
        $('#bootstrap-data-table-export').DataTable();
    });
</script>


</body>
</html>
