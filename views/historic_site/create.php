<!doctype html>
<head>
   <?php require 'views/includes/auth/head.php' ?>
   <title>Thêm bài đăng</title>
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
                        <div class="card-body col-md-9">
                            
                            <form name="create-form" action="<?php echo URL; ?>historic_site/create" method="POST" enctype="multipart/form-data" id="create-form">
                                <label>Tên bài đăng (*) </label>
                                <input type="text" name="hs_name" class="form-control" value="<?php if (isset($hs['hs_name'])) echo $hs['hs_name']?>">
                              
                                <label>Danh mục (*) </label>
                                <select name="cate_id" class="form-control">
                                    <?php foreach ($cats as $cat) { ?>
                                        <option value="<?php echo $cat['cate_id']?>"><?php echo $cat['cate_name']?></option>
                                    <?php } ?>
                                </select>

                                <label>Mô tả (*) </label>
                                <textarea name="hs_description" cols="7" class="form-control"><?php if (isset($hs['hs_description'])) echo $hs['hs_description']?></textarea>

                                <label>Chi tiết (*) </label>
                                <textarea name="hs_detail" cols="7" class="form-control"><?php if (isset($hs['hs_detail'])) echo $hs['hs_detail']?></textarea>

                                <?php if ($errorImage !== "") { ?>
                                <div class="alert alert-danger">
                                    <?php echo $errorImage ?>
                                </div>
                                <?php } ?>
                                <label>Hình ảnh (*) </label>
                                <input type="file" name="hs_image" class="form-control">
                                <br />

                                <?php if ($errorPdf !== "") { ?>
                                <div class="alert alert-danger">
                                    <?php echo $errorPdf ?>
                                </div>
                                <?php } ?>
                                <label>File PDF</label>
                                <input type="file" name="hs_pdf" class="form-control">
                                <br />

                                <input type="submit" name="submit" value="Thêm bài đăng" class="btn btn-primary">
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

<script type="text/javascript">
    $(document).ready(function (){
        CKEDITOR.replace('hs_detail');
    });
</script>

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
