<?php require('./helper/function_helper.php'); ?>
<!doctype html>
<html lang="vi">
<head>
    <title><?= BRAND_NAME ?> | Loại bài đăng</title>
    <?php require 'views/includes/public/head.php'; ?>

    <!-- Theme Style -->
    <link rel="stylesheet" href="<?= CSS; ?>style.css">
</head>
<body>

<?php require 'views/includes/public/header.php' ?>
<!-- END head -->

<section class="site-hero overlay" style='background-image: url("<?= IMAGES; ?>hero_1.jpg")'>
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
                <h2 class="heading" data-aos="fade-up"><?= $category['cate_name'] ?></h2>

            </div>
        </div>
        <div class="row">
            <?php foreach ($hs as $item) { ?>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 post" data-aos="fade-up" data-aos-delay="100">

                    <div class="media media-custom d-block mb-4">
                        <a href="<?= URL; ?>show/historic?id=<?= $item['hs_id'] ?>" class="mb-4 d-block">
                            <?php if ($item['hs_image'] != NULL) { ?>
                                <img src="<?= URL; ?>upload/images/<?= $item['hs_image'] ?>"
                                     class="img-fluid">
                            <?php } else { ?>
                                <img src="<?= URL; ?>public/images/default.jpg" class="img-fluid">
                            <?php } ?>
                        </a>
                        <div class="media-body">
                            <span class="meta-post"><?= _substr($item['hs_description'], 50) ?></span>
                            <h2 class="mt-0 mb-3"><a
                                        href="<?= URL; ?>show/historic?id=<?= $item['hs_id'] ?>"><?= $item['hs_name'] ?></a>
                            </h2>
                        </div>
                    </div>

                </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php require 'views/includes/public/footer.php' ?>

<?php require 'views/includes/public/script.php' ?>
</body>
</html>