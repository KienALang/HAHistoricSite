<?php require('./helper/function_helper.php'); ?>
<!doctype html>
<html lang="vi">
<head>
    <title><?= BRAND_NAME ?> | Chi tiết</title>
    <?php require 'views/includes/public/base_css.php'; ?>

    <!-- Theme Style -->
    <link rel="stylesheet" href="<?= URL ?>assets/public/css/style.css">
</head>
<body>

<?php require 'views/includes/public/header.php' ?>
<!-- END head -->

<section class="site-hero overlay" style='background-image: url("<?= URL; ?>public/images/hero_1.jpg")'>
    <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
            <div class="col-md-10 text-center">
                <h1 class="heading" data-aos="fade-up"><em><?= BRAND_NAME ?></em>, Quảng Nam</h1>
                <p class="sub-heading mb-5" data-aos="fade-up" data-aos-delay="100">Trang web giới thiệu các khu di tích
                    ở TP Hội An, tỉnh Quảng Nam.</p>
                <p data-aos="fade-up" data-aos-delay="100"><a href="#"
                                                              class="btn uppercase btn-primary mr-md-2 mr-0 mb-3 d-sm-inline d-block">Khám
                        Phá</a></p>
            </div>
        </div>
    </div>
</section>
<!-- END section -->

<section class="section visit-section">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-md-8">
                <h2 class="heading" data-aos="fade-up"><?= $hs['hs_name'] ?></h2>
                <p class="lead" data-aos="fade-up"><?= date("F j, Y, g:i a", strtotime($hs['create_time'])) ?></p>
                <p class="lead" data-aos="fade-up"><?= $hs['hs_view_count'] ?> Lượt xem</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-6">
                        <?php if ($hs['hs_image'] != NULL) { ?>
                            <img data-aos="fade-up" src="<?= URL; ?>upload/images/<?= $hs['hs_image'] ?>"
                                 class="img-fluid">
                        <?php } else { ?>
                            <img data-aos="fade-up" src="<?= URL; ?>public/images/default.jpg" class="img-fluid">
                        <?php } ?>
                    </div>

                    <div class="col-sm-6">
                        <p data-aos="fade-up"><?= $hs['hs_description'] ?></p>

                    </div>

                    <div class="col-sm-12 mt-2">
                        <p style="text-align: justify; " data-aos="fade-up"><?= $hs['hs_detail'] ?></p>
                        <?php if ($hs['hs_pdf'] != NULL) { ?>
                            <a data-aos="fade-up" target="_blank" href="<?= URL; ?>upload/pdfs/<?= $hs['hs_pdf'] ?>"
                               class="btn btn-info">Xem tiếp</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require 'views/includes/public/footer.php' ?>

<?php require 'views/includes/public/base_script.php' ?>
</body>
</html>