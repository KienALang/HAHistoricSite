<!doctype html>
<html lang="vi">
<head>
    <title><?= BRAND_NAME ?> | Trang Chủ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php require 'views/includes/public/base_css.php'; ?>

    <!-- Theme Style -->
    <link rel="stylesheet" href="<?= URL ?>assets/public/css/style.css">
</head>
<body>

<?php require 'includes/public/header.php' ?>
<!-- END head -->

<section class="site-hero overlay" style='background-image: url("assets/public/img/hero_1.jpg")'>
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
        <div class="row">
            <div class="col-md-12">
                <h2 class="heading" data-aos="fade-right">Danh mục</h2>
            </div>
        </div>
        <div class="row">
            <?php foreach ($categories as $category) { ?>
                <div class="col-lg-3 col-md-6 visit mb-3 historic-category" data-aos="fade-right">
                    <a href="<?= URL; ?>show/category?id=<?= $category['cate_id'] ?>">
                        <img src="assets/public/img/img_1.jpg" alt="<?= $category['cate_name'] ?>"
                             class="img-fluid">
                    </a>
                    <h3>
                        <a href="<?= URL; ?>show/category?id=<?= $category['cate_id'] ?>"><?= $category['cate_name'] ?>
                    </h3>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<section class="section visit-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="heading" data-aos="fade-right">Đề xuất cho bạn</h2>
            </div>
        </div>
        <div class="row">
            <?php foreach ($hsOffer as $item) { ?>
                <div class="col-lg-3 col-md-6 visit mb-3" data-aos="fade-right" data-aos-delay="100">
                    <a href="<?= URL; ?>show/historic?id=<?= $item['hs_id'] ?>">
                        <?php if ($item['hs_image'] != NULL) { ?>
                            <img src="<?= UPLOAD_IMAGES . $item['hs_image']; ?>"
                                 class="img-fluid">
                        <?php } else { ?>
                            <img src="assets/public/img/default.jpg" class="img-fluid">
                        <?php } ?>
                    </a>
                    <h3>
                        <a href="<?= URL; ?>show/historic?id=<?= $item['hs_id'] ?>"><?= $item['hs_name'] ?></a>
                    </h3>
                    <span class="reviews-count float-right">
                    <?= $item['hs_view_count'] ?> lượt xem
                </span>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- END section -->

<section class="section slider-section">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-md-8">
                <h2 class="heading" data-aos="fade-up">Hình ảnh nổi bật.</h2>
                <p class="lead" data-aos="fade-up" data-aos-delay="100">Các hình ảnh minh chứng lịch sử di tích nổi
                    bật.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="home-slider major-caousel owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">
                    <?php foreach ($slides as $slide) { ?>
                        <div class="slider-item">
                            <img src="<?= URL; ?>upload/slides/<?= $slide['image'] ?>"
                                 alt="<?= $slide['name'] ?>" class="img-fluid">
                        </div>
                    <?php } ?>
                </div>
                <!-- END slider -->
            </div>

            <div class="col-md-12 text-center"><a href="#" class="">View More Photos</a></div>

        </div>
    </div>
</section>
<!-- END section -->

<section class="section blog-post-entry bg-pattern">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-md-8">
                <h2 class="heading" data-aos="fade-up">Các bài giới thiệu gần đây</h2>
                <p class="lead" data-aos="fade-up">Những khám phá mới ở các khu di tích tại Hội An.</p>
            </div>
        </div>
        <div class="row">
            <?php foreach ($hsRecently as $item) { ?>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 post" data-aos="fade-up" data-aos-delay="100">

                    <div class="media media-custom d-block mb-4">
                        <a href="<?= URL; ?>show/historic?id=<?= $item['hs_id'] ?>" class="mb-4 d-block">
                            <?php if ($item['hs_image'] != NULL) { ?>
                                <img src="<?= URL; ?>upload/images/<?= $item['hs_image'] ?>"
                                     class="img-fluid">
                            <?php } else { ?>
                                <img src="assets/public/img/default.jpg" class="img-fluid">
                            <?php } ?>
                        </a>
                        <div class="media-body">
                            <span class="meta-post"><?= date("F j, Y, g:i a", strtotime($item['create_time'])) ?></span>
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
<!-- END section -->

<section class="section testimonial-section">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-md-8">
                <h2 class="heading" data-aos="fade-up">Các cảm nhận của người tham quan</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="testimonial text-center">
                    <div class="author-image mb-3">
                        <img src="assets/public/img/person_1.jpg" alt="Image placeholder" class="rounded-circle">
                    </div>
                    <blockquote>

                        <p>&ldquo;Et quidem, impedit eum fugiat excepturi iste aliquid suscipit, tempore, delectus rem
                            soluta voluptatem distinctio sed dolores, magni fugit nemo cum expedita. Totam a accusantium
                            sunt aut autem placeat officia.&rdquo;</p>
                    </blockquote>
                    <p><em>&mdash; Jean Smith</em></p>

                </div>
            </div>
            <!-- END col -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="testimonial text-center">
                    <div class="author-image mb-3">
                        <img src="assets/public/img/person_2.jpg" alt="Image placeholder" class="rounded-circle">
                    </div>
                    <blockquote>
                        <p>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. In dolor, iusto doloremque
                            quo odio repudiandae sunt eveniet? Enim facilis laborum voluptate id porro, culpa maiores
                            quis, blanditiis laboriosam alias&rdquo;</p>
                    </blockquote>
                    <p><em>&mdash; John Doe</em></p>
                </div>
            </div>
            <!-- END col -->

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="testimonial text-center">
                    <div class="author-image mb-3">
                        <img src="assets/public/img/person_3.jpg" alt="Image placeholder" class="rounded-circle">
                    </div>
                    <blockquote>

                        <p>&ldquo;Nostrum, alias, provident magnam sit blanditiis laboriosam unde quaerat, at ipsam,
                            ratione maiores saepe nisi modi corporis quas! Beatae quam, quod aspernatur debitis nesciunt
                            quasi porro ea iste nobis aliquid perspiciatis nostrum culpa impedit aut, iure blanditiis
                            itaque similique sunt!&rdquo;</p>
                    </blockquote>
                    <p><em>&mdash; John Doe</em></p>
                </div>
            </div>
            <!-- END col -->
        </div>
    </div>
</section>

<?php require 'includes/public/footer.php' ?>

<?php require 'views/includes/public/base_script.php'; ?>
</body>
</html>