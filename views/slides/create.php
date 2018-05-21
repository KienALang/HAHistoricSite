<!doctype html>
<head>
    <title><?= BRAND_NAME ?> | Thêm Sides Show</title>
    <?php require 'views/includes/auth/head.php' ?>
    <link rel="stylesheet" href="<?= URL ?>public/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

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
                        <li class="active">Thêm mới Slide</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Thêm mới Slide</strong>
                        </div>
                        <div class="card-body">

                            <form name="create-form" action="<?php echo URL; ?>slides/create" method="POST"
                                  enctype="multipart/form-data" id="create-form">
                                <div class="form-group">
                                    <label>Tên Slide (*) </label>
                                    <input type="text" name="name" class="form-control"
                                           value="<?php if (isset($slide['name'])) echo $slide['name'] ?>">
                                </div>
                                <div class="form-group">
                                    <?php if ($errorImage !== "") { ?>
                                        <div class="alert alert-danger">
                                            <?php echo $errorImage ?>
                                        </div>
                                    <?php } ?>
                                    <label>Hình ảnh (*) </label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="form-group text-center">
                                    <input type="submit" name="submit" value="Thêm slide" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

</div><!-- /#right-panel -->

<!-- Right Panel -->

<?php require 'views/includes/auth/script.php' ?>
</body>
</html>
