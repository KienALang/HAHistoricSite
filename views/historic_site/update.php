<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <?php require 'views/includes/auth/head.php' ?>
    <link rel="stylesheet" href="<?php echo URL; ?>public/scss/style.css">

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
                        <li><a href="#">Post</a></li>
                        <li class="active">Update</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form enctype="multipart/form-data" action="<?php echo URL; ?>historic_site/doUpdate" method="post">
                    <div class="form-group">
                        <label>ID</label>
                        <input type="text" readonly name="hs_id" class="form-control"
                               value="<?= $post['hs_id']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Tiêu Đề Bài Viết</label>
                        <input type="text" name="hs_name" class="form-control" required
                               value="<?= $post['hs_name']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Loại Bài Viết</label>
                        <select name="cate_id" class="form-control" required>

                            <?php
                            foreach ($categories as $category) {
                                $selected = null;
                                if ($post['cate_id'] == $category['cate_id']) {
                                    $selected = "selected";
                                }
                                echo "<option value='" . $category['cate_id'] . "' " . $selected . ">" . $category['cate_name'] . "</option>";
                            }
                            ?>

                        </select>
                    </div>

                    <div class="form-group">
                        <label>Mô tả tóm tắt</label>
                        <textarea name="hs_description" rows="10" class="form-control" required>
                            <?= $post['hs_description'] ?>
                        </textarea>
                    </div>

                    <div class="form-group">
                        <label>Nội Dung</label>
                        <textarea name="hs_detail" class="form-control" required>
                            <?= $post['hs_detail']; ?>
                        </textarea>
                        <script>
                            CKEDITOR.replace('hs_detail');
                        </script>
                    </div>

                    <div class="form-group">
                        <label>Hình Ảnh</label>

                        <?php
                        if (isset($post['hs_image']))
                            echo '<br><small><i>File cũ: </i></small>';
                            echo '<img src="' . URL . $post['hs_image'] . '">';
                        ?>
                        <br><small><i>File mới: </i></small>
                        <input type="file" name="hs_image" class="form-control">
                    </div>
                    <?php if (isset($errors['hs_image'])) { ?>
                        <div class="alert alert-danger">
                            <?= $errors['hs_image'] ?>
                        </div>
                    <?php } ?>

                    <div class="form-group">
                        <label>File PDF</label> <br>
                        <?php if (isset($post['hs_pdf'])) {
                            echo '<embed src = ' . URL . $post['hs_pdf'] . ' width="100%" />';
                        } ?>
                        <input type="file" name="hs_pdf" class="form-control">
                    </div>
                    <?php if (isset($errors['hs_pdf'])) { ?>
                        <div class="alert alert-danger">
                            <?= $errors['hs_pdf'] ?>
                        </div>
                    <?php } ?>

                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-success" value="Cập nhật">
                    </div>
                </form>
            </div>
        </div>
    </div>

</div><!-- /#right-panel -->

<!-- Right Panel -->

<?php require 'views/includes/auth/script.php' ?>
<script src="<?php echo URL; ?>assets/js/dashboard.js"></script>
<script src="<?php echo URL; ?>assets/js/widgets.js"></script>

</body>
</html>