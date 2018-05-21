<!doctype html>
<head>
    <title>Đăng nhập</title>
    <?php require 'views/includes/auth/base_css.php' ?>

    <link rel="stylesheet" href="<?= URL ?>assets/auth/scss/style.css">
    <link href="<?= URL ?>assets/auth/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body class="bg-dark">
<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-logo">
                <a href="<?= URL; ?>" class="display-4 text-white">
                    Đăng nhập
                </a>
            </div>
            <div class="login-form">
                <form name="login" action="<?= URL; ?>authentication/login">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" required class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" required class="form-control" placeholder="Password">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Ghi nhớ đăng nhập
                        </label>
                        <label class="pull-right">
                            <a href="#">Quên mật khẩu?</a>
                        </label>

                    </div>
                    <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Đăng nhập</button>
                    <div class="social-login-content">
                        <div class="social-button">
                            <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i
                                        class="ti-facebook"></i>Đăng nhập bằng Facebook
                            </button>
                        </div>
                    </div>
                    <div class="register-link m-t-15 text-center">
                        <p>Chưa có tài khoản ? <a href="#"> Đăng ký ở đây</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php require 'views/includes/auth/base_script.php'; ?>
</body>
</html>
