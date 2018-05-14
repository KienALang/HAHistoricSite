<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Di Tích</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="<?php echo URL; ?>public/css/normalize.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/lib/datatable/dataTables.bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="<?php echo URL; ?>public/scss/style.css">

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
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($hs as $item) { ?>
                                    <tr>
                                        <td><?php echo $item['hs_id']?></td>
                                        <td><?php echo $item['hs_name']?></td>
                                        <td><?php echo $item['hs_image']?></td>
                                        <td><?php echo $item['create_time']?></td>
                                        <td><?php echo $item['cate_name']?></td>
                                        <td><?php echo $item['hs_view_count']?></td>
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


<?php require 'views/includes/auth/script.php' ?>


<script src="<?php echo URL; ?>public/auth_js/lib/data-table/datatables.min.js"></script>
<script src="<?php echo URL; ?>public/auth_js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="<?php echo URL; ?>public/auth_js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="<?php echo URL; ?>public/auth_js/lib/data-table/buttons.bootstrap.min.js"></script>
<script src="<?php echo URL; ?>public/auth_js/lib/data-table/jszip.min.js"></script>
<script src="<?php echo URL; ?>public/auth_js/lib/data-table/pdfmake.min.js"></script>
<script src="<?php echo URL; ?>public/auth_js/lib/data-table/vfs_fonts.js"></script>
<script src="<?php echo URL; ?>public/auth_js/lib/data-table/buttons.html5.min.js"></script>
<script src="<?php echo URL; ?>public/auth_js/lib/data-table/buttons.print.min.js"></script>
<script src="<?php echo URL; ?>public/auth_js/lib/data-table/buttons.colVis.min.js"></script>
<script src="<?php echo URL; ?>public/auth_js/lib/data-table/datatables-init.js"></script>


<script type="text/javascript">
    $(document).ready(function () {
        $('#bootstrap-data-table-export').DataTable();
    });
</script>


</body>
</html>
