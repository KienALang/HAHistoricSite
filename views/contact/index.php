<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= BRAND_NAME ?> | Contact Show</title>
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
                        <li class="active"><a href="#">Contacts show</a></li>
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
                            <strong class="card-title">Contact</strong>
                        </div>
                        <br/>
                        
                        <br/> <br/>
                        
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Tên</th>
                                    <th>Số điện thoại</th>
                                    <th>Email</th>
                                    <th>Lời nhắn</th>
                                    <th>Chức năng</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($contacts as $contact) { ?>
                                    <tr>
                                        <td><?php echo $contact['name'] ?></td>
                                        <td><?php echo $contact['phone'] ?></td>
                                        <td><?php echo $contact['email'] ?></td>
                                        <td><?php echo $contact['message'] ?></td>
                                        <td>
                                            <?php if ($contact['status'] === "0") { ?>
                                                <a id="contact-<?php echo $contact['id'] ?>" href="javascript:;" class="btn btn-danger contact-click" >Xem</a>
                                            <?php } else { ?>
                                                <a href="javascript:;" class="btn btn-success" >Đã xem</a>
                                            <?php } ?>
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

<script type="text/javascript">
    $(".contact-click").click(function(){

        var id = $(this).attr('id');
        var arr = id.split('-');
        var first_id = arr[1];

        $.ajax({
            method: "POST",
            url: "contact/index",
            data: ({id: first_id}),
            success : function(response){
                location.reload();
            }
        });
    });
</script>

<script src="assets/auth/js/lib/data-table/datatables.min.js"></script>
<script src="assets/auth/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="assets/auth/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="assets/auth/js/lib/data-table/buttons.bootstrap.min.js"></script>
<script src="assets/auth/js/lib/data-table/jszip.min.js"></script>
<script src="assets/auth/js/lib/data-table/pdfmake.min.js"></script>
<script src="assets/auth/js/lib/data-table/vfs_fonts.js"></script>
<script src="assets/auth/js/lib/data-table/buttons.html5.min.js"></script>
<script src="assets/auth/js/lib/data-table/buttons.print.min.js"></script>
<script src="assets/auth/js/lib/data-table/buttons.colVis.min.js"></script>
<script src="assets/auth/js/lib/data-table/datatables-init.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#bootstrap-data-table-export').DataTable();
    });
</script>


</body>
</html>
