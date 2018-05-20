<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Category</title>
    <meta name="description" content="Admin - Hoian Historic Site">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="<?php echo URL; ?>favicon.ico">

    <link rel="stylesheet" href="<?php echo URL; ?>public/css/normalize.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="<?php echo URL; ?>public/css/lib/datatable/dataTables.bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo URL; ?>public/scss/style.css">
    <link href="<?php echo URL; ?>public/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

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
                        <li class="active">Dashboard</li>
                        <li class="active">Loại bài viết</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Loại bài viết</strong>
                        <button class="btn btn-success float-right" data-toggle="modal"
                                data-target="#add_category"><i class="fa fa-plus-circle"></i> Thêm mới
                        </button>
                    </div>
                    <div class="modal fade" id="add_category" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Thêm bài viết mới</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= URL ?>category/add" name="add-category" method="post"
                                      enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Tên Loại</label>
                                            <input type="text" required name="cate_name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Hình ảnh</label>
                                            <input type="file" required name="cate_image" class="form-control">
                                            <div class="alert alert-danger" hidden id="new-image-error"></div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng
                                        </button>
                                        <button type="submit" class="btn btn-primary">Lưu lại</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Hình ảnh</th>
                                <th>Xử lý</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($categories as $item) { ?>
                                <tr>
                                    <td><?= $item['cate_id'] ?></td>
                                    <td><?= $item['cate_name'] ?></td>
                                    <td><img src="<?= $item['cate_image'] ?>" alt="<?= $item['cate_name'] ?>"></td>
                                    <td>
                                        <a href="#" style="color: #2a62bc;" data-toggle="modal"
                                           data-target="#edit_category<?= $item['cate_id'] ?>"><i
                                                    class="fa fa-external-link"></i></a>
                                        <a href="#" data-toggle="modal"
                                           data-target="#delete_category<?= $item['cate_id'] ?>"
                                           style="color:red;"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <?php foreach ($categories as $item) { ?>
                    <div class="modal fade" id="delete_category<?= $item['cate_id'] ?>" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Xác nhận xoá</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Bạn có chắc chắn muốn xoá?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                    <form name="delete-category" action="<?= URL ?>category/delete" method="post">
                                        <input type="text" hidden name="cate_id" value="<?= $item['cate_id'] ?>">
                                        <button type="submit" class="btn btn-primary">Xoá</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php foreach ($categories as $item) { ?>
                    <!-- Modal -->
                    <div class="modal fade" id="edit_category<?= $item['cate_id'] ?>" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Cập nhật loại bài viết</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= URL ?>category/update" name="update-category" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>ID</label>
                                            <input type="text" readonly name="cate_id" class="form-control"
                                                   value="<?= $item['cate_id'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Tên Loại</label>
                                            <input type="text" required name="cate_name" class="form-control"
                                                   value="<?= $item['cate_name'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Hình ảnh</label>
                                            <br>
                                            <img src="<?= $item['cate_image'] ?>" alt="<?= $item['cate_name'] ?>">
                                            <input type="file" name="cate_image" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng
                                        </button>
                                        <button type="submit" class="btn btn-primary">Lưu lại</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>


        </div>
    </div>
</div>

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
    function validate(image) {
        var match = ["image/jpeg", "image/png", "image/jpg"];
        if ($.inArray(image.type, match) === -1) {
            var error = "File không đúng định dạng. Vui lòng chọn file hình ảnh JPEG hoặc PNG";
            showError(error);
            return false;
        }
        if (image.size > 2000000) {
            var error = "Dung lượng file vượt quá quy định. Vui lòng chọn file hình ảnh không quá 2MB";
            showError(error);
            return false;
        }
        return true;
    }

    function showError(error) {
        var element = $('#new-image-error');
        element.removeAttr('hidden');
        element.html(error);
    }

    function showModel(event) {
        var link = $(event.target.nodeName);
        alert(link);

        // $('#delete_category').attr('aria-hidden', false);
    }

    $(document).ready(function () {
        $('form[name="add-category"]').submit(function (e) {
            e.preventDefault();
            var form = $(this);
            var url = form.attr('action');
            var cate_image = $('form[name="add-category"] input[name="cate_image"]').prop('files')[0];
            if (cate_image != null && validate(cate_image)) {
                var formData = new FormData(this);
                $.ajax({
                    url: url,
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    type: 'post',
                    success: function (res) {
                        var obj = jQuery.parseJSON(res);
                        if (obj.success === true) {
                            location.reload();
                        }
                    }
                })
            }
        });

        $('form[name="update-category"]').submit(function (e) {
            e.preventDefault();
            var form = $(this);
            var url = form.attr('action');
            var cate_image = $('form[name="update-category"] input[name="cate_image"]').prop('files')[0];
            var isFileOK = true;
            if (cate_image != null) {
                isFileOK = validate(cate_image)
            }
            if (isFileOK) {
                var formData = new FormData(this);
                $.ajax({
                    url: url,
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    type: 'post',
                    success: function (res) {
                        var obj = jQuery.parseJSON(res);
                        if (obj.success === true) {
                            location.reload();
                        }
                    }
                })
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#bootstrap-data-table-export').DataTable();
    });

</script>

</body>
</html>