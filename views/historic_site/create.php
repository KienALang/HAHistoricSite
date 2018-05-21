<!doctype html>
<head>
    <title><?= BRAND_NAME ?> | Thêm Bài Đăng</title>
    <?php require 'views/includes/auth/head.php' ?>
    <link rel="stylesheet" href="<?= URL ?>public/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <!-- CK Editor plugins -->
    <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
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
                        <li><a href="#">Bài Đăng</a></li>
                        <li class="active">Tạo Mới</li>
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
                            <strong class="card-title">Tạo Bài Đăng Mới</strong>
                        </div>
                        <div class="card-body">
                            <form name="create-form" action="<?php echo URL; ?>historic_site/create" method="POST"
                                  enctype="multipart/form-data" id="create-form">
                                <div class="form-group">
                                    <label>Tên bài đăng (*) </label>
                                    <input type="text" name="hs_name" class="form-control"
                                           value="<?php if (isset($hs['hs_name'])) echo $hs['hs_name'] ?>">
                                </div>

                                <div class="form-group">
                                    <label>Danh mục (*) </label>
                                    <select name="cate_id" class="form-control">
                                        <?php foreach ($cats as $cat) { ?>
                                            <option value="<?php echo $cat['cate_id'] ?>"><?php echo $cat['cate_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Mô tả (*) </label>
                                    <textarea name="hs_description" cols="7"
                                              class="form-control"><?php if (isset($hs['hs_description'])) echo $hs['hs_description'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Chi tiết (*) </label>
                                    <textarea name="hs_detail" cols="7"
                                              class="form-control"><?php if (isset($hs['hs_detail'])) echo $hs['hs_detail'] ?></textarea>
                                    <script>
                                        CKEDITOR.replace('hs_detail');
                                    </script>
                                </div>
                                <div class="form-group">
                                    <?php if ($errorImage !== "") { ?>
                                        <div class="alert alert-danger">
                                            <?php echo $errorImage ?>
                                        </div>
                                    <?php } ?>
                                    <label>Hình ảnh (*) </label>
                                    <input type="file" name="hs_image" class="form-control">
                                </div>
                                <div class="form-group">
                                    <?php if ($errorPdf !== "") { ?>
                                        <div class="alert alert-danger">
                                            <?php echo $errorPdf ?>
                                        </div>
                                    <?php } ?>
                                    <label>File PDF</label>
                                    <input type="file" name="hs_pdf" class="form-control">
                                </div>
                                <div class="form-group text-center">
                                    <input type="submit" name="submit" value="Thêm bài đăng" class="btn btn-primary">
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
