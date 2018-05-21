<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= BRAND_NAME ?> | Biểu Đồ</title>
    <?php require 'views/includes/auth/base_css.php'; ?>

    <link rel="stylesheet" href="<?= URL ?>assets/auth/scss/style.css">
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
                        <li><a href="#">Charts</a></li>
                        <li class="active">Float Chart</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3">Pie Chart</h4>
                            <div class="flot-container">
                                <div id="flot-pie" class="flot-pie-container"></div>
                            </div>
                        </div>
                    </div><!-- /# card -->
                </div><!-- /# column -->

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3">Line Chart</h4>
                            <div class="flot-container">
                                <div id="chart1" style="width:100%;height:275px;"></div>
                            </div>
                        </div>
                    </div><!-- /# card -->
                </div><!-- /# column -->
            </div><!-- /# row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3">Bar Chart</h4>
                            <div class="flot-container">
                                <div id="flotBar" style="width:100%;height:275px;"></div>
                            </div>
                        </div>
                    </div><!-- /# card -->
                </div><!-- /# column -->

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3">Bar Chart</h4>
                            <div class="flot-container">
                                <div id="flotCurve" style="width:100%;height:275px;"></div>
                            </div>
                        </div>
                    </div><!-- /# card -->
                </div><!-- /# column -->
            </div><!-- /# row -->


        </div><!-- .animated -->
    </div><!-- .content -->


</div><!-- /#right-panel -->

<!-- Right Panel -->

<?php require 'views/includes/auth/base_script.php' ?>

<!--  flot-chart js -->
<script src="<?= URL ?>assets/auth/js/lib/flot-chart/excanvas.min.js"></script>
<script src="<?= URL ?>assets/auth/js/lib/flot-chart/jquery.flot.js"></script>
<script src="<?= URL ?>assets/auth/js/lib/flot-chart/jquery.flot.pie.js"></script>
<script src="<?= URL ?>assets/auth/js/lib/flot-chart/jquery.flot.time.js"></script>
<script src="<?= URL ?>assets/auth/js/lib/flot-chart/jquery.flot.stack.js"></script>
<script src="<?= URL ?>assets/auth/js/lib/flot-chart/jquery.flot.resize.js"></script>
<script src="<?= URL ?>assets/auth/js/lib/flot-chart/jquery.flot.crosshair.js"></script>
<script src="<?= URL ?>assets/auth/js/lib/flot-chart/curvedLines.js"></script>
<script src="<?= URL ?>assets/auth/js/lib/flot-chart/flot-tooltip/jquery.flot.tooltip.min.js"></script>
<script src="<?= URL ?>assets/auth/js/lib/flot-chart/flot-chart-init.js"></script>

</body>
</html>
