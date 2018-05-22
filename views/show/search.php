<?php require('./helper/function_helper.php'); ?>


<section class="section visit-section">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-md-8">
                <h2 class="heading" data-aos="fade-up">Danh sách tìm kiếm</h2>
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
